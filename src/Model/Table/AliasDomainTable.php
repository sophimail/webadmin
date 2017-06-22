<?php
namespace App\Model\Table;

use App\Model\Entity\AliasDomain;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;


/**
 * AliasDomain Model
 *
 */
class AliasDomainTable extends Table
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

        $this->table('alias_domain');
        $this->displayField('alias_domain');
        $this->primaryKey('alias_domain');

        $this->addBehavior('Timestamp');
        $this->belongsTo('Domain', ['foreignKey' => 'domain', 'joinType' => 'INNER']);        
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
            ->allowEmpty('alias_domain', 'create');

        $validator
            ->requirePresence('target_domain', 'create')
            ->notEmpty('target_domain');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }
    
    
    /* CUSTOM Functions */

    
    /**
     * Checks if source domain already exist
     * in either alias_domain OR target_domain
     *
     *
     * @param Current domain: Configure::read('_domain')
     * @return boolean
     */    
    public function _alias_domain_check () {
        
        return $this->exists([ 'OR' => array('alias_domain'=>Configure::read('_domain'), 'target_domain'=>Configure::read('_domain'))]);
    }
    
    
    /**
     * Checks if source domain already exist
     * in alias_domain
     *
     *
     * @param input domain
     * @return boolean
     */    
    public function _source_domain_check ($_domain) {
        
        return $this->exists(['alias_domain'=>$_domain]);
    }    
    
    
}
