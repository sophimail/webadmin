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

/**
 * RecipientBccUser Controller
 *
 * @property \App\Model\Table\RecipientBccUserTable $RecipientBccUser
 */
class RecipientBccUserController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $recipientBccUser = $this->paginate($this->RecipientBccUser);

        $this->set(compact('recipientBccUser'));
        $this->set('_serialize', ['recipientBccUser']);
    }

    /**
     * View method
     *
     * @param string|null $id Recipient Bcc User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipientBccUser = $this->RecipientBccUser->get($id, [
            'contain' => []
        ]);

        $this->set('recipientBccUser', $recipientBccUser);
        $this->set('_serialize', ['recipientBccUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recipientBccUser = $this->RecipientBccUser->newEntity();
        if ($this->request->is('post')) {
            $recipientBccUser = $this->RecipientBccUser->patchEntity($recipientBccUser, $this->request->data);
            if ($this->RecipientBccUser->save($recipientBccUser)) {
                $this->Flash->success(__('The recipient bcc user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recipient bcc user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('recipientBccUser'));
        $this->set('_serialize', ['recipientBccUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipient Bcc User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipientBccUser = $this->RecipientBccUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipientBccUser = $this->RecipientBccUser->patchEntity($recipientBccUser, $this->request->data);
            if ($this->RecipientBccUser->save($recipientBccUser)) {
                $this->Flash->success(__('The recipient bcc user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recipient bcc user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('recipientBccUser'));
        $this->set('_serialize', ['recipientBccUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipient Bcc User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipientBccUser = $this->RecipientBccUser->get($id);
        if ($this->RecipientBccUser->delete($recipientBccUser)) {
            $this->Flash->success(__('The recipient bcc user has been deleted.'));
        } else {
            $this->Flash->error(__('The recipient bcc user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
