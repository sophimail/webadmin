<?php
namespace App\Model\Table;

use App\Model\Entity\Quota2;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Collection\Collection;

/**
 * Quota2 Model
 *
 */
class Quota2Table extends Table
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

        $this->table('quota2');
        $this->displayField('username');
        $this->primaryKey('username');
        $this->belongsTo('Mailbox', ['foreignKey' => 'username', 'joinType' => 'INNER']);
        
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
            ->requirePresence('bytes', 'create')
            ->notEmpty('bytes');

        $validator
            ->integer('messages')
            ->requirePresence('messages', 'create')
            ->notEmpty('messages');

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
     * Calculate in bytes the current total
     * storage usage for a domain
     *
     * Current domain: Configure::read('_domain')
     * Result in bytes
     *
     */    
    public function _curr_domain_usage() {
        
        $items = $this->find('all', ['fields' => ['Quota2.bytes'], 'contain' => 'Mailbox', 'conditions' => ['Mailbox.domain' => Configure::read('_domain')]]);
        $collection = new Collection($items);
        
        return $collection->sumOf('bytes');
    }  
}
