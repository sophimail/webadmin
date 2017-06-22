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
