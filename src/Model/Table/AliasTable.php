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

use App\Model\Entity\Alias;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Utility\Text;

/**
 * Alias Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Domain
 */
class AliasTable extends Table
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

        $this->table('alias');
        $this->displayField('address');
        $this->primaryKey('address');

        $this->addBehavior('Timestamp');
        $this->belongsTo('Mailbox', ['foreignKey' => 'username', 'joinType' => 'INNER']);
        $this->belongsTo('Domain', ['foreignKey' => 'domain', 'propertyName' => 'domain', 'joinType' => 'INNER']);    
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
            ->allowEmpty('address', 'create');

        $validator
            ->notEmpty('domain');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }
    
    /* CUSTOM Functions */

    /**
     * Constract address for a new alias
     * 
     * Current domain: Configure::read('_domain')
     *
     */   
    
    public function _create_address($local_part){
        
        if ($local_part === '*') return '@' . Configure::read('_domain'); //merge local_part and domain
    
        return $local_part . '@' . Configure::read('_domain'); //merge local_part and domain
    }    
    
    /**
     * Checks if 'address' exists in 'goto' substring (,) in DB
     * split comma-separated 'goto' into an array
     *
     * Return boolean
     *
     */
    public function _address_goto_exists($address) {
        
        $result = $this->find()->select(['goto'])->where(['address' => $address])->first()->goto;
        $result = Text::tokenize($result, ',');

      return in_array($address, $result, true);
    }

    
    /**
     * Checks if 'address' exists in 'goto' substring (,) in $this->request->data
     * split comma-separated 'goto' into an array
     *
     * Return boolean
     *
     */
    public function _uri_address_goto_exists($address, $goto) {
        
        $result = Text::tokenize($goto, ',');

      return in_array($address, $result, true);
    }
    
    
    
    /**
     * Prepair array to send to 'goto' field in form
     * split comma-separated 'goto' into an array and
     * remove address values if found (mailbox)
     *
     * Return array
     *
     */
    public function _send_forward_array($address) {
        
        $result = $this->find()->select(['goto'])->where(['address' => $address])->first()->goto;
        $result = Text::tokenize($result, ',');
        
        if (in_array($address, $result, true)) unset($result[array_search($address, $result)]);

      return implode(',', $result);
    }      
    
    
    /**
     * Returns usernames alias('address')
     *
     * which are not mailboxes
     *
     * Current domain: Configure::read('_domain')
     *
     * Results: array of valid addresses
     *
     */
    public function _valid_alias_usernames() {
        
        $stack = array();
        
        $query = $this->find()->select(['address'])->where(['domain'=>Configure::read('_domain')])->toArray();
        foreach ($query as $_array) if (!$this->Mailbox->_is_mailbox($_array->address)) 
            array_push($stack, $_array->address);
        
        if(empty($stack)) array_push($stack, NULL);
        
        return $stack;
    }
    
    /**
     * Count active aliases
     * 
     * Current domain: Configure::read('_domain')
     *
     */    
    public function _domain_active_aliases() {        

        return count($this->_valid_alias_usernames());
    }    
}
