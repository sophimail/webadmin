<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * Mailbox Controller
 *
 * @property \App\Model\Table\MailboxTable $Mailbox
 */
class MailboxController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        
        if ((Configure::read('_domain')) && (Configure::read('_datasource'))) {
            
            if (!($this->Mailbox->Domain->exists(['domain' => Configure::read('_domain')]))) {
                $this->Flash->error(__('The domain does not exist in this location.'));
                return $this->redirect(['controller' =>'Domain', 'action' => 'add']);                
            } else {
                
                if ( (in_array($this->request->params['action'], ['add'])) && (!$this->Mailbox->Domain->_allow_new_mailboxes()) ) {
                    $this->Flash->error(__('You are not allowed to add more mailboxes.'));
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
        $this->paginate = array('conditions' => array('domain'=>Configure::read('_domain')));
        $mailbox = $this->paginate($this->Mailbox);
        
        /**
        * Merge tables Mailbox and Quota2
        * to return storage usage
        * for current domain
        *
        * Current domain: Configure::read('_domain')
        *
        */  
        
        $curr_quota = $this->Mailbox->Quota2->find('all', ['fields' => ['Quota2.bytes', 'Quota2.messages', 'Quota2.username'], 'contain' => 'Mailbox', 'conditions' => ['Mailbox.domain' => Configure::read('_domain')]]);
                
        foreach ($mailbox as $val1) {
            foreach ($curr_quota as $key => $val2) 
                if ($val1['username'] == $val2['username']) {
                    $val1['bytes'] = $val2['bytes'];
                    $val1['messages'] = $val2['messages'];
                }
            $val1['goto_mailbox'] = $this->Mailbox->Alias->_address_goto_exists($val1['username']);
        }

        $this->set(compact('mailbox'));
    }

    /**
     * View method
     *
     * @param string|null $id Mailbox id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $_domain_tmp = $this->Mailbox->get($id);

        if ($_domain_tmp['domain'] === Configure::read('_domain'))  {        

            $mailbox = $this->Mailbox->get($id);
            $alias = $this->Mailbox->Alias->_send_forward_array($id);
            $goto_mailbox = $this->Mailbox->Alias->_address_goto_exists($id);
            
            $this->set('mailbox', $mailbox);
            $this->set('alias', $alias);
            $this->set('goto_mailbox', $goto_mailbox);
            
        } else {
                $this->Flash->error(__('The domain is not valid.'));
                return $this->redirect(['action' => 'index']);
        }        
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {        
        if (Configure::read('_domain')) {
            $mailbox = $this->Mailbox->newEntity();
            $alias = $this->Mailbox->Alias->newEntity(); // Alias model for update

            $allowed_storage = $this->Mailbox->Domain->_allowed_quota();

            if ($this->request->is('post')) {
                $mailbox->set('domain', Configure::read('_domain'));
                $mailbox->set('username', $this->Mailbox->_create_username($this->request->data['local_part']));
                $mailbox->set('maildir', $this->Mailbox->_create_maildir($this->request->data['local_part']));
                $mailbox = $this->Mailbox->patchEntity($mailbox, $this->request->data);
                                
                if ( (!$this->Mailbox->exists(['username' => $mailbox->username])) && (!$this->Mailbox->exists(['maildir' => $mailbox->maildir])) ) {

                    // Update Alias Table
                    $alias->set('address', $mailbox->username);
                    $alias->set('goto', $mailbox->username);
                    $alias->set('domain', $mailbox->domain);
                    $alias->set('active', $mailbox->active);

                    if (($this->Mailbox->save($mailbox)) && ($this->Mailbox->Alias->save($alias))) {
                        $this->Flash->success(__('The mailbox '.$mailbox['username'].' has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The mailbox could not be saved. Please, try again.'));
                    }   
                    
                } else {
                    $this->Flash->error(__('The username or mail path exists. Please, try again.'));
                    return $this->redirect(['action' => 'add']);
                }
            }
            $this->set(compact('mailbox', 'allowed_storage'));
        } else {
            $this->Flash->error(__('The domain is not valid.'));
            return $this->redirect(['action' => 'index']);            
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Mailbox id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {                
        $_domain_tmp = $this->Mailbox->get($id);
        
        if ($_domain_tmp['domain'] === Configure::read('_domain'))  {
        
            $mailbox = $this->Mailbox->get($id);
            $allowed_storage = $this->Mailbox->Domain->_allowed_quota($id);
            
            if ($this->request->is(['patch', 'post', 'put'])) {
                $mailbox = $this->Mailbox->patchEntity($mailbox, $this->request->data);
                 
                if ($this->Mailbox->save($mailbox)) {
                    $this->Flash->success(__('The mailbox '.$mailbox['username'].' has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The mailbox could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('mailbox', 'allowed_storage'));
        
        } else {
                $this->Flash->error(__('The domain is not valid.'));
                return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Mailbox id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $_domain_tmp = $this->Mailbox->get($id);
            
        if ($_domain_tmp['domain'] === Configure::read('_domain'))  {        
            
            $this->request->allowMethod(['post', 'delete']);
            $mailbox = $this->Mailbox->get($id);
            if ($this->Mailbox->delete($mailbox)) {
                $this->Flash->success(__('The mailbox '.$mailbox['username'].' has been deleted.'));
            } else {
                $this->Flash->error(__('The mailbox could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
            
        } else {
                $this->Flash->error(__('The domain is not valid.'));
                return $this->redirect(['action' => 'index']);
        }
    }
    
    /**
     * Change Password method
     *
     * @param string|null $id Mailbox id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function password($id = null)
    {                
        $_domain_tmp = $this->Mailbox->get($id);
        
        if ($_domain_tmp['domain'] === Configure::read('_domain'))  {
        
            $mailbox = $this->Mailbox->get($id);
            
            if ($this->request->is(['patch', 'post', 'put'])) {
                $mailbox = $this->Mailbox->patchEntity($mailbox, $this->request->data);

                if ($this->Mailbox->save($mailbox)) {
                    $this->Flash->success(__('The password for mailbox '.$mailbox['username'].' has been updated.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The password could not be updated. Please, try again.'));
                }
            }
            $this->set(compact('mailbox'));
        
        } else {
                $this->Flash->error(__('The domain is not valid.'));
                return $this->redirect(['action' => 'index']);
        }
    }    
}
