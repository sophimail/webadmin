<?php
namespace App\Model\Table;

use App\Model\Entity\SenderBccDomain;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

/**
 * SenderBccDomain Model
 *
 */
class SenderBccDomainTable extends Table
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

        $this->table('sender_bcc_domain');
        $this->displayField('domain');
        $this->primaryKey('domain');

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
            ->allowEmpty('domain', 'create');

        $validator
            ->requirePresence('bcc_address', 'create')
            ->notEmpty('bcc_address');

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
}
