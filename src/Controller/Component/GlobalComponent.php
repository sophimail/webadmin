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
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

class GlobalComponent extends Component
{

    public function _deleteParams() {
        $this->request->session()->delete('Auth.User.datasource');
        $this->request->session()->delete('Auth.User.domain');
        Configure::delete('_domain');
        Configure::delete('_datasource');
	}


    public function _getDomain() {
        if ($this->_UserDomainExists()) {
			$results = TableRegistry::get('Shards')->get($this->request->session()->read('Auth.User.domain'));
			return $results['domain'];
        }
        
        return false;
    }


    public function _getDatasource() {
        if ($this->_DomainDatasourceExists()) {
            $results = TableRegistry::get('Accounts')->get($this->request->session()->read('Auth.User.datasource'));
			return $results['datasource'];
        }
        
        return false;
    }


    public function _UserDomainExists() {
	if (($this->request->session()->read('Auth.User.id')) && ($this->request->session()->read('Auth.User.domain')))
		return TableRegistry::get('UsersShards')->exists(['user_id' => $this->request->session()->read('Auth.User.id'), 'shard_id' => $this->request->session()->read('Auth.User.domain')]);
    }
    
    
    public function _DomainDatasourceExists() {
	if (($this->request->session()->read('Auth.User.datasource')) && ($this->request->session()->read('Auth.User.domain')))
		return TableRegistry::get('ShardsAccounts')->exists(['account_id' => $this->request->session()->read('Auth.User.datasource'), 'shard_id' => $this->request->session()->read('Auth.User.domain')]);
    } 
    
    
    public function _UserDomainDatasourceExists() {
		return (($this->_UserDomainExists()) && ($this->_DomainDatasourceExists()));
	}
}
