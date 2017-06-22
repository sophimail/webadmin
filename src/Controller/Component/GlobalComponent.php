<?php
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
