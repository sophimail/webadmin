<?php
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
