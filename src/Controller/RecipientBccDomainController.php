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
 * RecipientBccDomain Controller
 *
 * @property \App\Model\Table\RecipientBccDomainTable $RecipientBccDomain
 */
class RecipientBccDomainController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $recipientBccDomain = $this->paginate($this->RecipientBccDomain);

        $this->set(compact('recipientBccDomain'));
        $this->set('_serialize', ['recipientBccDomain']);
    }

    /**
     * View method
     *
     * @param string|null $id Recipient Bcc Domain id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipientBccDomain = $this->RecipientBccDomain->get($id, [
            'contain' => []
        ]);

        $this->set('recipientBccDomain', $recipientBccDomain);
        $this->set('_serialize', ['recipientBccDomain']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recipientBccDomain = $this->RecipientBccDomain->newEntity();
        if ($this->request->is('post')) {
            $recipientBccDomain = $this->RecipientBccDomain->patchEntity($recipientBccDomain, $this->request->data);
            if ($this->RecipientBccDomain->save($recipientBccDomain)) {
                $this->Flash->success(__('The recipient bcc domain has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recipient bcc domain could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('recipientBccDomain'));
        $this->set('_serialize', ['recipientBccDomain']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipient Bcc Domain id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipientBccDomain = $this->RecipientBccDomain->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipientBccDomain = $this->RecipientBccDomain->patchEntity($recipientBccDomain, $this->request->data);
            if ($this->RecipientBccDomain->save($recipientBccDomain)) {
                $this->Flash->success(__('The recipient bcc domain has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recipient bcc domain could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('recipientBccDomain'));
        $this->set('_serialize', ['recipientBccDomain']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipient Bcc Domain id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipientBccDomain = $this->RecipientBccDomain->get($id);
        if ($this->RecipientBccDomain->delete($recipientBccDomain)) {
            $this->Flash->success(__('The recipient bcc domain has been deleted.'));
        } else {
            $this->Flash->error(__('The recipient bcc domain could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
