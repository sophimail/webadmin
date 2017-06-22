<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Quota2 Controller
 *
 * @property \App\Model\Table\Quota2Table $Quota2
 */
class Quota2Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $quota2 = $this->paginate($this->Quota2);

        $this->set(compact('quota2'));
        $this->set('_serialize', ['quota2']);
    }

    /**
     * View method
     *
     * @param string|null $id Quota2 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quota2 = $this->Quota2->get($id, [
            'contain' => []
        ]);

        $this->set('quota2', $quota2);
        $this->set('_serialize', ['quota2']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quota2 = $this->Quota2->newEntity();
        if ($this->request->is('post')) {
            $quota2 = $this->Quota2->patchEntity($quota2, $this->request->data);
            if ($this->Quota2->save($quota2)) {
                $this->Flash->success(__('The quota2 has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quota2 could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('quota2'));
        $this->set('_serialize', ['quota2']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Quota2 id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quota2 = $this->Quota2->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quota2 = $this->Quota2->patchEntity($quota2, $this->request->data);
            if ($this->Quota2->save($quota2)) {
                $this->Flash->success(__('The quota2 has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quota2 could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('quota2'));
        $this->set('_serialize', ['quota2']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Quota2 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quota2 = $this->Quota2->get($id);
        if ($this->Quota2->delete($quota2)) {
            $this->Flash->success(__('The quota2 has been deleted.'));
        } else {
            $this->Flash->error(__('The quota2 could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
