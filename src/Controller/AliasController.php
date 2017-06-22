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
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Utility\Text;

/**
 * Alias Controller
 *
 * @property \App\Model\Table\AliasTable $Alias
 */
class AliasController extends AppController
{
    
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        
        if ((Configure::read('_domain')) && (Configure::read('_datasource'))) {
            
            if (!($this->Alias->Domain->exists(['domain' => Configure::read('_domain')]))) {
                $this->Flash->error(__('The domain does not exist in this location.'));
                return $this->redirect(['controller' =>'Domain', 'action' => 'add']);                
            } else {
                
        if ( (in_array($this->request->params['action'], ['add'])) && (!$this->Alias->Domain->_allow_new_aliases()) ) {
                    $this->Flash->error(__('You are not allowed to add more aliases.'));
                    return $this->redirect(['controller' =>'Shards', 'action' => 'selector']);                    
                }
            }
            
        } else {
            $this->Flash->error(__('Domain or Datasource error.'));
            return $this->redirect(['controller' =>'Shards', 'action' => 'selector']);
        }
    }
    

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = array('conditions' => array('address IN'=> $this->Alias->_valid_alias_usernames()));
        $alias = $this->paginate($this->Alias);

        $this->set(compact('alias'));
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alias = $this->Alias->newEntity();
        if ($this->request->is('post')) {
            $alias->set('domain', Configure::read('_domain'));
            $alias->set('address', $this->Alias->_create_address($this->request->data['local_part']));

            if (!$this->Alias->exists(['address' => $alias->address])) {            
            
                $alias = $this->Alias->patchEntity($alias, $this->request->data);
                if ($this->Alias->save($alias)) {
                    $this->Flash->success(__('The alias has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The alias could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('The alias exists. Please, try again.'));
                return $this->redirect(['action' => 'add']);
            }             
        }
        $this->set(compact('alias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Alias id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $_domain_tmp = $this->Alias->get($id);
        
        if ($_domain_tmp['domain'] === Configure::read('_domain')) {
            
            $alias = $this->Alias->get($id);
            
            if  ($this->request->is(['patch', 'post', 'put'])) {
                                    
                $alias = $this->Alias->patchEntity($alias, $this->request->data);
                if ($this->Alias->save($alias)) {
                    $this->Flash->success(__('The alias has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The alias could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('alias'));
        } else {
            $this->Flash->error(__('The domain is not valid.'));
            return $this->redirect(['controller' =>'mailbox', 'action' => 'index']);            
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Alias id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alias = $this->Alias->get($id);
        if ($this->Alias->delete($alias)) {
            $this->Flash->success(__('The alias has been deleted.'));
        } else {
            $this->Flash->error(__('The alias could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Email forward method
     *
     * @param string|null $id Alias id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function forward($id = null)
    {
        
        $_domain_tmp = $this->Alias->get($id);
        
        if ( ($_domain_tmp['domain'] === Configure::read('_domain')) && ($this->Alias->Mailbox->_is_mailbox($_domain_tmp['address'])) ) {
        
            $alias = $this->Alias->get($id);
            $goto_mailbox = $this->Alias->_address_goto_exists($id);
            $alias->set('goto', $this->Alias->_send_forward_array($id));            
                        
            if ($this->request->is(['patch', 'post', 'put'])) {
                
                if ($this->request->data['_store_and_forward']) $this->request->data['goto'] = join(',', array_filter(array($_domain_tmp['address'], $this->request->data['goto'])));
                
                
                $alias = $this->Alias->patchEntity($alias, $this->request->data);
                
                if ($this->Alias->save($alias)) {
                    $this->Flash->success(__('The alias has been saved.'));
                    return $this->redirect(['controller' =>'mailbox', 'action' => 'index']);
                } else {
                    $this->Flash->error(__('The alias could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('alias', 'goto_mailbox'));
        } else {
            $this->Flash->error(__('Not a mailbox or the domain is not valid.'));
            return $this->redirect(['controller' =>'mailbox', 'action' => 'index']);            
        }
    }
}
