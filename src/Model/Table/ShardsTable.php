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

use App\Model\Entity\Shard;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

/**
 * Shards Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Accounts
 * @property \Cake\ORM\Association\BelongsToMany $Users
 */
class ShardsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
                
        $this->table('shards');
        $this->displayField('domain');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Accounts', [
            'foreignKey' => 'shard_id',
            'targetForeignKey' => 'account_id',
            'joinTable' => 'shards_accounts'
        ]);
        $this->belongsToMany('Users', [
            'className' => 'CakeDC/Users.Users',
            'foreignKey' => 'shard_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_shards'
        ]);
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('domain', 'create')
            ->add('domain', [
	            	'unique' => [
	            		'rule' => ['validateUnique', ['scope' => 'domain']],
	            		'provider' => 'table',
	            		'message' => 'Domain already exists'
	            	]
	            ])            
            ->notEmpty('domain');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
    
    
    /* CUSTOM Functions */

    
    public function _valid_domain_alias($_user_id, $_account_id) {
        
        return $this->find()->join([        
        'c' => ['table' => 'shards_accounts',
        'type' => 'LEFT',
        'conditions' => ['c.shard_id = Shards.id']],
        'u' => ['table' => 'users_shards',
        'type' => 'LEFT',
        'conditions' => ['u.shard_id = Shards.id']]])                                    
        ->where(['u.user_id' => $_user_id, 'c.account_id' => $_account_id  ])
        ->select(['Shards.domain'])->toArray();
    }
}
