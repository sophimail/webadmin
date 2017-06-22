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
/**
 * Domain Controller
 *
 * @property \App\Model\Table\DomainTable $Domain
 */
class DomainController extends AppController
{
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        
        if ((Configure::read('_domain')) && (Configure::read('_datasource'))) {

            if ((in_array($this->request->params['action'], ['add'])) && ($this->Domain->exists(['domain' => Configure::read('_domain')]))) {
                $this->Flash->error(__('Domain already exists.'));
                return $this->redirect(['controller' =>'Shards', 'action' => 'selector']);
            }

            if ((in_array($this->request->params['action'], ['view', 'edit', 'delete'])) && !($this->Domain->exists(['domain' => Configure::read('_domain')]))) {
                $this->Flash->error(__('The domain does not exist in this location.'));
                return $this->redirect(['controller' =>'Domain', 'action' => 'add']);                
            }
            
        } else {
            $this->Flash->error(__('Domain or Datasource error.'));
            return $this->redirect(['controller' =>'Shards', 'action' => 'selector']);
        }
    }

    /**
     * Dashboard method
     *
     * @param string|null $id Domain id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */    
    public function dashboard(){

        $multiplier = Configure::read('_Constants.quota_multiplier');
        $domain_quota_free = round($this->Domain->_domain_storage_quota() - ($this->Domain->Mailbox->_domain_storage_reserved() / $multiplier));
        $domain_storage_reserved = round($this->Domain->Mailbox->_domain_storage_reserved() / $multiplier);
        $domain_storage_used = round($this->Domain->Mailbox->Quota2->_curr_domain_usage() / $multiplier);

        /**
        * Chart1
        *
        * First Pie which shows the free (Unallocate domain space)
        * Domain Storage - Reservations
        */
        $dataChart1 = [
            'labels' => [
                "Domain Quota Reserved",
                "Domain Quota Unallocated"
            ],
            'datasets' => [
                [
                    'data' => [$domain_storage_reserved, $domain_quota_free],
                    'backgroundColor' => [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ]
                ]
            ]
        ];

        $this->set('dataChart1', $dataChart1);

        /**
        * Chart2
        *
        * Detailed storage diagram 
        *
        */
        $dataChart2 = [
                    'labels' => [
                        "Total Domain Quota",
                        "Quota Reserved",
                        "Quota Used"
                    ],
                    'datasets' => [
                        [
                            'data' => [$this->Domain->_domain_storage_quota(), $domain_storage_reserved, $domain_storage_used],
                            'backgroundColor' => [
                                "#4BC0C0",
                                "#FF6384",
                                "#FFCE56"
                            ]
                        ]
                    ]
                ];

            $this->set('dataChart2', $dataChart2);

        /**
        * Chart3
        *
        * User detailed storage diagram 
        *
        */
        $curr_quota = $this->Domain->Mailbox->Quota2->find('all', ['fields' => ['Quota2.bytes', 'Quota2.username'], 'contain' => 'Mailbox', 'conditions' => ['Mailbox.domain' => Configure::read('_domain')]]);
        $mailbox_quota = $this->Domain->Mailbox->find('all', ['fields' => ['quota', 'username'],'contain' => 'Domain', 'conditions' => ['Domain.domain' => Configure::read('_domain')]]);

        $labels = array();
        $max_quota = array();
        $running_quota = array();

        foreach ($mailbox_quota as $val1) {
            foreach ($curr_quota as $key => $val2) 
                if ($val1['username'] == $val2['username']) {
                    array_push($labels, strstr($val1['username'], '@', true));
                    array_push($max_quota, floor($val1['quota'] / $multiplier));
                    array_push($running_quota, floor($val2['bytes'] / $multiplier));
                }
        }              

        $dataChart3 = [
                    'labels' => $labels,
                    'datasets' => [
                            [
                                'label' => "Max Quota",
                                'data' => $max_quota,
                                'backgroundColor' => "#4BC0C0"
                            ],
                            [
                                'label' => "Current Quota",
                                'data' => $running_quota,
                                'backgroundColor' => "#FF6384"
                            ]
                        ]
                ];

            $this->set('dataChart3', $dataChart3);
    }

    /**
     * View method
     *
     * @param string|null $id Domain id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $this->set('domain', $this->Domain->get(Configure::read('_domain')));
        $this->set('domain_storage_reserved', $this->Domain->Mailbox->_domain_storage_reserved());
        $this->set('domain_storage_used', $this->Domain->Mailbox->Quota2->_curr_domain_usage());
        $this->set('domain_active_mailboxes', $this->Domain->Mailbox->_domain_active_mailboxes());        
        $this->set('domain_active_aliases', $this->Domain->Alias->_domain_active_aliases());

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
            $domain = $this->Domain->newEntity();
            if ($this->request->is('post')) {
                $domain = $this->Domain->patchEntity($domain, $this->request->data);
                $domain['domain'] = Configure::read('_domain');
                if ($this->Domain->save($domain)) {
                    $this->Flash->success(__('The domain has been saved.'));
                    return $this->redirect(['action' => 'view']);
                } else {
                    $this->Flash->error(__('The domain could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('domain'));
            $this->set('_serialize', ['domain']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Domain id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
            $domain = $this->Domain->get(Configure::read('_domain'));
            if ($this->request->is(['patch', 'post', 'put'])) {
                $domain = $this->Domain->patchEntity($domain, $this->request->data);
                if ($this->Domain->save($domain)) {
                    $this->Flash->success(__('The domain has been saved.'));
                    return $this->redirect(['action' => 'view']);
                } else {
                    $this->Flash->error(__('The domain could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('domain'));
            $this->set('_serialize', ['domain']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Domain id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
            $this->request->allowMethod(['post', 'delete']);
            $domain = $this->Domain->get(Configure::read('_domain'));
            if ($this->Domain->delete($domain)) {
                $this->Global->_deleteParams();
                $this->Flash->success(__('The domain '.$domain['domain'].' has been deleted.'));
            } else {
                $this->Flash->error(__('The domain could not be deleted. Please, try again.'));
            }
            return $this->redirect(['controller' =>'Shards', 'action' => 'selector']);
    }
}
?>
