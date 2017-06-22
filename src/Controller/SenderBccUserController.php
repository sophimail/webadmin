<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SenderBccUser Controller
 *
 * @property \App\Model\Table\SenderBccUserTable $SenderBccUser
 */
class SenderBccUserController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $senderBccUser = $this->paginate($this->SenderBccUser);

        $this->set(compact('senderBccUser'));
        $this->set('_serialize', ['senderBccUser']);
    }

    /**
     * View method
     *
     * @param string|null $id Sender Bcc User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $senderBccUser = $this->SenderBccUser->get($id, [
            'contain' => []
        ]);

        $this->set('senderBccUser', $senderBccUser);
        $this->set('_serialize', ['senderBccUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $senderBccUser = $this->SenderBccUser->newEntity();
        if ($this->request->is('post')) {
            $senderBccUser = $this->SenderBccUser->patchEntity($senderBccUser, $this->request->data);
            if ($this->SenderBccUser->save($senderBccUser)) {
                $this->Flash->success(__('The sender bcc user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sender bcc user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('senderBccUser'));
        $this->set('_serialize', ['senderBccUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sender Bcc User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $senderBccUser = $this->SenderBccUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $senderBccUser = $this->SenderBccUser->patchEntity($senderBccUser, $this->request->data);
            if ($this->SenderBccUser->save($senderBccUser)) {
                $this->Flash->success(__('The sender bcc user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sender bcc user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('senderBccUser'));
        $this->set('_serialize', ['senderBccUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sender Bcc User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $senderBccUser = $this->SenderBccUser->get($id);
        if ($this->SenderBccUser->delete($senderBccUser)) {
            $this->Flash->success(__('The sender bcc user has been deleted.'));
        } else {
            $this->Flash->error(__('The sender bcc user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
