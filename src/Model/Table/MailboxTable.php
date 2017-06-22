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

use App\Model\Entity\Mailbox;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Collection\Collection;

use Cake\Event\Event;
use Cake\ORM\Entity;

use ArrayObject;

/**
 * Mailbox Model
 *
 */
class MailboxTable extends Table
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

        $this->table('mailbox');
        $this->displayField('name');
        $this->primaryKey('username');

        $this->addBehavior('Timestamp');
        
        $this->hasOne('Quota2', ['foreignKey' => 'username', 'dependent' => true]); 
        $this->hasOne('Alias', ['foreignKey' => 'address', 'dependent' => true]);        
        
        $this->belongsTo('Domain', ['foreignKey' => 'domain', 'propertyName' => 'domain', 'joinType' => 'INNER']);        
    }
    
    
    /**
     * beforeMarshal()
     *
     */    
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if (isset($data['quota'])) $data['quota'] = $data['quota'] * Configure::read('_Constants.quota_multiplier'); // Convert quota from MB to bytes    

    }
    
        
    /**
     * beforeSave()
     *
     */
    public function beforeSave(Event $event, Entity $entity) {
        if (isset($entity->confirm_password)) $entity->unsetProperty('confirm_password'); // Remove 'confirm_password' field from array
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
            ->notEmpty('username');
        
        $validator
            ->notEmpty('maildir');
                
        $validator
            ->notEmpty('domain');
        
        if (Configure::read('_Constants.strong_password'))
        $validator
            ->requirePresence('password', 'create')
            ->add('password', 'length', ['rule' => ['minLength', Configure::read('_Constants.password_length')], 'message' => __('Password should be at least '.Configure::read('_Constants.password_length').' characters long')])            
            ->add('password', 'complexity1', ['rule' => ['custom', '/(?=(.*[A-z]){2})/'], 'message' => __('Passwords should contain at least two letters')])    
            ->add('password', 'complexity2', ['rule' => ['custom', '/(?=^(?:\D*\d){2})/'], 'message' => __('Passwords should contain at least two numbers')])
            ->add('password', 'complexity3', ['rule' => ['containsNonAlphaNumeric', 1], 'message' => __('Passwords should contain at least one special character')])        
            ->add('confirm_password', 'no-misspelling', ['rule' => ['compareWith', 'password'], 'message' => __('Passwords are not equal')])
            ->notEmpty('password');

        if (!Configure::read('_Constants.strong_password'))
        $validator
            ->requirePresence('password', 'create')    
            ->add('password', 'length', ['rule' => ['minLength', Configure::read('_Constants.password_length')], 'message' => __('Password should be at least '.Configure::read('_Constants.password_length').' characters long')])
            ->add('confirm_password', 'no-misspelling', ['rule' => ['compareWith', 'password'], 'message' => __('Passwords are not equal')])
            ->notEmpty('password');
        
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('quota', 'create')
            ->add('quota', 'validValue', ['rule' => ['range', 0, PHP_INT_MAX], 'message' => __('Lowest value is 0')])            
            ->notEmpty('quota');

        $validator
            ->requirePresence('local_part', 'create')
            ->add('local_part', 'rfc5322', ['rule' => ['custom', '/^((?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*)$/'], 'message' => __('RFC5322 Violation')])            
            ->notEmpty('local_part');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        return $rules;
    }
    
    /* CUSTOM Functions */
    

    /**
     * Checks if mailbox exists
     * 
     * Current domain: Configure::read('_domain')
     * Result boolean
     *
     */
    public function _is_mailbox($username) {
        
      return $this->exists(['username' => $username]);
    }    
    
    
    /**
     * Calculate in bytes the total mailbox
     * storage reserved for a domain (Mailbox.quota)
     * 
     * Current domain: Configure::read('_domain')
     * Result in bytes
     *
     */
    public function _domain_storage_reserved() {
        
        $items = $this->find('all', ['fields' => ['quota'], 'conditions' => ['domain' => Configure::read('_domain')]]);
        $collection = new Collection($items);
        
        return $collection->sumOf('quota');
    }
    
    /**
     * Count active mailboxes
     * 
     * Current domain: Configure::read('_domain')
     *
     */    
    public function _domain_active_mailboxes() {        

        return $this->find('all', ['fields' => ['domain'], 'conditions' => ['domain' => Configure::read('_domain')]])->count();
    }

    
    /**
     * Constract maildir path for a new mailbox
     * 
     * Current domain: Configure::read('_domain')
     *
     */   
    
    public function _create_maildir($local_part){
        
        if (Configure::read('_Constants.domain_in_mailbox')) {
            $maildir = Configure::read('_domain') . "/" . $local_part . '@' . Configure::read('_domain') . "/";
        } else {
            $maildir = Configure::read('_domain') . "/" . $local_part . "/";
        }
        
        return $maildir;
    } 
    
    /**
     * Constract username for a new mailbox
     * 
     * Current domain: Configure::read('_domain')
     *
     */   
    
    public function _create_username($local_part){    
    
        return $local_part . '@' . Configure::read('_domain'); //merge local_part and domain
    }
}
