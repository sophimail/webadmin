<?php
namespace App\Model\Table;

use App\Model\Entity\SenderBccUser;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;


/**
 * SenderBccUser Model
 *
 */
class SenderBccUserTable extends Table
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
        
        $this->table('sender_bcc_user');
        $this->displayField('username');
        $this->primaryKey('username');

        $this->addBehavior('Timestamp');
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
            ->allowEmpty('username', 'create');

        $validator
            ->requirePresence('bcc_address', 'create')
            ->notEmpty('bcc_address');

        $validator
            ->requirePresence('domain', 'create')
            ->notEmpty('domain');

        $validator
            ->dateTime('expired')
            ->requirePresence('expired', 'create')
            ->notEmpty('expired');

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
}
