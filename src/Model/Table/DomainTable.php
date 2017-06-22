<?php
/**
 *
 * Copyright (c) 2017 AVERWAY LTD
 *
 * LICENSE:
 *
 * This file is part of SophiMail Dashboard (http://www.sophimail.com).
 *
 * SophiMail Dashboard is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any
 * later version with exceptions for vendors and plugins.
 *
 * See the LICENSE file for a full license statement.
 *
 * SophiMail Dashboard is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with SophiMail Dashboard.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 *
 * @author AVERWAY LTD <support@sophimail.com>
 * @license GNU/GPLv3 or later; https://www.gnu.org/licenses/gpl.html
 * @copyright 2017 AVERWAY LTD
 * 
 * SophiMail is a registered trademark of AVERWAY LTD
 *
 */
namespace App\Model\Table;

use App\Model\Entity\Domain;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;


/**
 * Domain Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Alias
 */
class DomainTable extends Table
{
  
    public static function defaultConnectionName() {
        return Configure::read('_datasource');
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->table('domain');
        $this->displayField('domain');
        $this->primaryKey('domain');

        $this->addBehavior('Timestamp');
        
        $this->hasMany('mailbox', ['foreignKey' => 'domain', 'dependent' => true, 'cascadeCallbacks' => true]);
        $this->hasMany('alias', ['foreignKey' => 'domain', 'dependent' => true]);
        $this->hasOne('AliasDomain', ['foreignKey' => 'alias_domain', 'dependent' => true]);         
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('domain', 'create')
            ->notEmpty('domain');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('aliases')
            ->add('aliases', 'validValue', ['rule' => ['range', -1, PHP_INT_MAX], 'message' => __('Lowest value is -1')])            
            ->requirePresence('aliases', 'create')
            ->notEmpty('aliases');

        $validator
            ->integer('mailboxes')
            ->add('mailboxes', 'validValue', ['rule' => ['range', -1, PHP_INT_MAX], 'message' => __('Lowest value is -1')])                        
            ->requirePresence('mailboxes', 'create')
            ->notEmpty('mailboxes');

        $validator
            ->integer('maxquota')
            ->add('maxquota', 'validValue', ['rule' => ['range', -1, PHP_INT_MAX], 'message' => __('Lowest value is -1')])            
            ->requirePresence('maxquota', 'create')
            ->notEmpty('maxquota');

        $validator
            ->integer('quota')
            ->add('quota', 'validValue', ['rule' => ['range', -1, PHP_INT_MAX], 'message' => __('Lowest value is -1')])            
            ->requirePresence('quota', 'create')
            ->notEmpty('quota');

        $validator
            ->requirePresence('transport', 'create')
            ->notEmpty('transport');

        $validator
            ->boolean('backupmx')
            ->requirePresence('backupmx', 'create')
            ->notEmpty('backupmx');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }
        
    /* CUSTOM Functions */
    
    
    /**
     * Return if new mailboxes allowed
     *
     * Current domain: Configure::read('_domain')
     *
     * Return: boolean
     * 
     */
    public function _allow_new_mailboxes(){
        
        $allowed = false;        
        $domain_mailboxes = $this->find('all', ['fields' => ['Domain.mailboxes'], 'conditions' => ['Domain.domain' => Configure::read('_domain')]])->first()->mailboxes;
        $cur_mailboxes = $this->Mailbox->_domain_active_mailboxes();
        
        if ($domain_mailboxes == 0) $allowed = true; // Unlimited        
        if ( ($domain_mailboxes > 0) && ($cur_mailboxes < $domain_mailboxes) ) $allowed = true; 
        
        return $allowed;
    }
    
    /**
     * Return if new aliases allowed
     *
     * Current domain: Configure::read('_domain')
     *
     * Return: boolean
     * 
     */
    public function _allow_new_aliases(){
        
        $allowed = false;        
        $domain_aliases = $this->find('all', ['fields' => ['Domain.aliases'], 'conditions' => ['Domain.domain' => Configure::read('_domain')]])->first()->aliases;
        $cur_aliases = $this->Alias->_domain_active_aliases();
        
        if ($domain_aliases == 0) $allowed = true; // Unlimited        
        if ( ($domain_aliases > 0) && ($cur_aliases < $domain_aliases) ) $allowed = true; 
        
        return $allowed;
    }    

    /**
     * Return maximum Domain Quota
     *
     * Current domain: Configure::read('_domain')
     *
     * Return: MB
     * 
     */
    public function _domain_storage_quota(){

        return $this->find('all', ['fields' => ['Domain.quota'], 'conditions' => ['Domain.domain' => Configure::read('_domain')]])->first()->quota;  // MB
    }
        
    /**
     * Calculate in bytes available
     * storage for a user
     * If $current_user = null, calculates the 
     * allowed storage for new user
     *
     * Current domain: Configure::read('_domain')
     * Result in MB
     *
     */      
    public function _allowed_quota($current_user = null){
        
        $multiplier = Configure::read('_Constants.quota_multiplier');
            
        $domain_quota = $this->_domain_storage_quota(); // MB
        $mailbox_max_quota = $this->find('all', ['fields' => ['Domain.maxquota'], 'conditions' => ['Domain.domain' => Configure::read('_domain')]])->first()->maxquota;  // MB
        $domain_storage_reserved = $this->Mailbox->_domain_storage_reserved(); // Bytes
        if ($current_user) $mailbox_storage_reserved = $this->Mailbox->find('all', ['fields' => ['quota'], 'conditions' => ['username' => $current_user]])->first()->quota; // Bytes
        
        if ($domain_quota > 0 && !is_null($current_user)) $calculated_quota = $domain_quota - ($domain_storage_reserved / $multiplier) + ($mailbox_storage_reserved / $multiplier); // MB
        if ($domain_quota > 0 && is_null($current_user)) $calculated_quota = $domain_quota - ($domain_storage_reserved / $multiplier); // MB
        
        if ($domain_quota == 0 && $mailbox_max_quota > 0) $allowed_quota = $mailbox_max_quota;            
        if ($domain_quota == 0 && $mailbox_max_quota == 0) $allowed_quota = 0;
        if ($domain_quota > 0 && $mailbox_max_quota == 0) $allowed_quota = $calculated_quota;
        if ($domain_quota > 0 && $mailbox_max_quota > 0) $allowed_quota = min($calculated_quota,$mailbox_max_quota);
        
        return floor($allowed_quota);
    }    
}
