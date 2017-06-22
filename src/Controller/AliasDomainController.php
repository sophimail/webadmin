<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * AliasDomain Controller
 *
 * @property \App\Model\Table\AliasDomainTable $AliasDomain
 */
class AliasDomainController extends AppController
{
    
   public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        
        if ((Configure::read('_domain')) && (Configure::read('_datasource'))) {
            
            if (!($this->AliasDomain->Domain->exists(['domain' => Configure::read('_domain')]))) {
                $this->Flash->error(__('The domain does not exist in this location.'));
                return $this->redirect(['controller' =>'Domain', 'action' => 'add']);                
            } else {
/* *************************                
                
                if ( (in_array($this->request->params['action'], ['add'])) && (!$this->Mailbox->Domain->_allow_new_mailboxes()) ) {
                    $this->Flash->error(__('You are not allowed to add more mailboxes.'));
                    return $this->redirect(['controller' =>'Shards', 'action' => 'selector']);                    
                }
                
* ************************* */                
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

        if (Configure::read('_domain'))  {
            
            $this->paginate = array('conditions' => array( 'OR' => array('alias_domain'=>Configure::read('_domain'), 'target_domain'=>Configure::read('_domain'))));
            $aliasDomain = $this->paginate($this->AliasDomain);

            $this->set(compact('aliasDomain'));
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
        
            if (!$this->AliasDomain->_alias_domain_check()) {

                $aliasDomain = $this->AliasDomain->newEntity();

                $valid_domains = array();
                $resultsArray = TableRegistry::get('Shards')->_valid_domain_alias($this->request->session()->read('Auth.User.id'), $this->request->session()->read('Auth.User.datasource'));
                foreach ($resultsArray as $_valid_domains)
                    if ((!$this->AliasDomain->_source_domain_check($_valid_domains->domain)) && ($_valid_domains->domain != Configure::read('_domain'))) $valid_domains[$_valid_domains->domain] = $_valid_domains->domain; // Avoid chained domain aliases (domain1 -> domain2 -> domain3) and source == target

                if ($this->request->is('post')) {
                    $aliasDomain->set('alias_domain', Configure::read('_domain'));                    
                    $aliasDomain = $this->AliasDomain->patchEntity($aliasDomain, $this->request->data);
                    
                    if ($this->AliasDomain->save($aliasDomain)) {
                        $this->Flash->success(__('The alias domain has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The alias domain could not be saved. Please, try again.'));
                    }
                }
                $this->set(compact('aliasDomain', 'valid_domains'));

            } else {
                $this->Flash->error(__('The domain already exists in either source or target domain. Please, try again.'));
                return $this->redirect(['action' => 'index']);            

            }
            
        } else {
            $this->Flash->error(__('The domain is not valid.'));
            return $this->redirect(['action' => 'index']);            
        }            
            
    }

    /**
     * Edit method
     *
     * @param string|null $id Alias Domain id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {        
        $_domain_tmp = $this->AliasDomain->get($id);
        
        if (($_domain_tmp['alias_domain'] === Configure::read('_domain')) || ($_domain_tmp['target_domain'] === Configure::read('_domain')))  {
            
            $aliasDomain = $this->AliasDomain->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $aliasDomain = $this->AliasDomain->patchEntity($aliasDomain, $this->request->data);
                if ($this->AliasDomain->save($aliasDomain)) {
                    $this->Flash->success(__('The alias domain has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The alias domain could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('aliasDomain'));
        } else {
                $this->Flash->error(__('The domain is not valid.'));
                return $this->redirect(['action' => 'index']);
        }            
    }

    /**
     * Delete method
     *
     * @param string|null $id Alias Domain id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {        
        $_domain_tmp = $this->AliasDomain->get($id);
        
        if (($_domain_tmp['alias_domain'] === Configure::read('_domain')) || ($_domain_tmp['target_domain'] === Configure::read('_domain')))  {

            $this->request->allowMethod(['post', 'delete']);
            $aliasDomain = $this->AliasDomain->get($id);
            if ($this->AliasDomain->delete($aliasDomain)) {
                $this->Flash->success(__('The alias domain has been deleted.'));
            } else {
                $this->Flash->error(__('The alias domain could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        } else {
                $this->Flash->error(__('The domain is not valid.'));
                return $this->redirect(['action' => 'index']);
        }            
    }
}
