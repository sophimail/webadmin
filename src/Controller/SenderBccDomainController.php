<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SenderBccDomain Controller
 *
 * @property \App\Model\Table\SenderBccDomainTable $SenderBccDomain
 */
class SenderBccDomainController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $senderBccDomain = $this->paginate($this->SenderBccDomain);

        $this->set(compact('senderBccDomain'));
        $this->set('_serialize', ['senderBccDomain']);
    }

    /**
     * View method
     *
     * @param string|null $id Sender Bcc Domain id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $senderBccDomain = $this->SenderBccDomain->get($id, [
            'contain' => []
        ]);

        $this->set('senderBccDomain', $senderBccDomain);
        $this->set('_serialize', ['senderBccDomain']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $senderBccDomain = $this->SenderBccDomain->newEntity();
        if ($this->request->is('post')) {
            $senderBccDomain = $this->SenderBccDomain->patchEntity($senderBccDomain, $this->request->data);
            if ($this->SenderBccDomain->save($senderBccDomain)) {
                $this->Flash->success(__('The sender bcc domain has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sender bcc domain could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('senderBccDomain'));
        $this->set('_serialize', ['senderBccDomain']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sender Bcc Domain id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $senderBccDomain = $this->SenderBccDomain->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $senderBccDomain = $this->SenderBccDomain->patchEntity($senderBccDomain, $this->request->data);
            if ($this->SenderBccDomain->save($senderBccDomain)) {
                $this->Flash->success(__('The sender bcc domain has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sender bcc domain could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('senderBccDomain'));
        $this->set('_serialize', ['senderBccDomain']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sender Bcc Domain id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $senderBccDomain = $this->SenderBccDomain->get($id);
        if ($this->SenderBccDomain->delete($senderBccDomain)) {
            $this->Flash->success(__('The sender bcc domain has been deleted.'));
        } else {
            $this->Flash->error(__('The sender bcc domain could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
