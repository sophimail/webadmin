<?php
namespace App\Model\Table;

use App\Model\Entity\Account;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accounts Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Shards
 */
class AccountsTable extends Table
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

        $this->table('accounts');
        $this->displayField('datasource');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Shards', [
            'foreignKey' => 'account_id',
            'targetForeignKey' => 'shard_id',
            'joinTable' => 'shards_accounts'
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
            ->requirePresence('datasource', 'create')
            ->notEmpty('datasource');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}
