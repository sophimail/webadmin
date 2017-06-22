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
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>


<div class="panel panel-info">
   <div class="panel-heading">
      <h3 class="panel-title"><strong>Domain:&nbsp;&nbsp;</strong><?= h($shard->id) ?></h3>
   </div>
   <div class="panel-body">
      <div class="row">
         <table class="table table-user-information">
            <tbody>
               <tr>
                  <td>ID:</td>
                  <td><?= h($shard->id) ?></td>
               </tr>
               <tr>
                  <td>Domain:</td>
                  <td><?= h($shard->domain) ?></td>
               </tr>
               <tr>
                  <td>Description:</td>
                  <td><?= h($shard->description) ?></td>
               </tr>
               <tr>
                  <td>Created:</td>
                  <td><?= h($shard->created) ?></td>
               </tr>
               <tr>
                  <td>Modified:</td>
                  <td><?= h($shard->modified) ?></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div class="panel-footer">
      <?= $this->element('edit', ['viewvar' => $shard->id]) ?>
      <span>&nbsp;&nbsp;</span>
      <?= $this->element('delete', ['viewvar' => $shard->id]) ?>
   </div>
</div>
   
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Connected Locations') ?></h3>
    </div>
    <?php if (!empty($shard->accounts)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Datasource') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($shard->accounts as $accounts): ?>
                <tr>
                    <td><?= h($accounts->datasource) ?></td>
                    <td><?= h($accounts->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Accounts', 'action' => 'view', $accounts->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Accounts', 'action' => 'edit', $accounts->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Accounts', 'action' => 'delete', $accounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accounts->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no connected Locations</p>
    <?php endif; ?>
</div>
    
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Administrators') ?></h3>
    </div>
    <?php if (!empty($shard->users)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Username') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($shard->users as $users): ?>
                <tr>
                    <td><?= h($users->username) ?></td>
                    <td><?= h($users->email) ?></td>
                    <td><?= h($users->first_name) ?></td>
                    <td><?= h($users->last_name) ?></td>
                    <td><?= h($users->active)? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>'; ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['plugin' =>'CakeDC/Users', 'controller' => 'Users', 'action' => 'view', $users->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['plugin' =>'CakeDC/Users', 'controller' => 'Users', 'action' => 'edit', $users->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['plugin' =>'CakeDC/Users', 'controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no Connected Administrators</p>
    <?php endif; ?>
</div>
