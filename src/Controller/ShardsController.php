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

/**
 * Shards Controller
 *
 * @property \App\Model\Table\ShardsTable $Shards
 */
class ShardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $shards = $this->paginate($this->Shards);

        $this->set(compact('shards'));
        $this->set('_serialize', ['shards']);
    }

    /**
     * View method
     *
     * @param string|null $id Shard id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shard = $this->Shards->get($id, [
            'contain' => ['Accounts', 'Users']
        ]);

        $this->set('shard', $shard);
        $this->set('_serialize', ['shard']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shard = $this->Shards->newEntity();
        if ($this->request->is('post')) {
            $shard = $this->Shards->patchEntity($shard, $this->request->data);
            if ($this->Shards->save($shard)) {
                $this->Flash->success(__('The shard has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The shard could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Shards->Accounts->find('list', ['limit' => 200]);
        $users = $this->Shards->Users->find('list', ['limit' => 200]);
        $this->set(compact('shard', 'accounts', 'users'));
        $this->set('_serialize', ['shard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shard id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shard = $this->Shards->get($id, [
            'contain' => ['Accounts', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shard = $this->Shards->patchEntity($shard, $this->request->data);
            if ($this->Shards->save($shard)) {
                $this->Flash->success(__('The shard has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The shard could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Shards->Accounts->find('list', ['limit' => 200]);
        $users = $this->Shards->Users->find('list', ['limit' => 200]);
        $this->set(compact('shard', 'accounts', 'users'));
        $this->set('_serialize', ['shard']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shard id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shard = $this->Shards->get($id);
        if ($this->Shards->delete($shard)) {
            $this->Flash->success(__('The shard has been deleted.'));
        } else {
            $this->Flash->error(__('The shard could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function selector($_domain = null, $_datasource = null)
    {
        if ($this->request->is('post')) {
            $this->Global->_deleteParams();

            $this->request->session()->write('Auth.User.datasource', $_datasource);
            $this->request->session()->write('Auth.User.domain', $_domain);
            return $this->redirect(['controller' =>'Domain', 'action' => 'view']);

        }
        $domains = array();
        $domains = $this->Shards->find('all')
		->contain(['Accounts'])->order(['domain' => 'ASC'])
		->matching('Users', function($q) {return $q->where(['Users.id' => $this->Auth->user('id')]);});

        $this->set('domains', $domains);
    }
}
