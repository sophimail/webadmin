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
      <h3 class="panel-title"><strong>Location:&nbsp;&nbsp;</strong><?= h($account->id) ?></h3>
   </div>
   <div class="panel-body">
      <div class="row">
         <table class="table table-user-information">
            <tbody>
               <tr>
                  <td>ID:</td>
                  <td><?= h($account->id) ?></td>
               </tr>
               <tr>
                  <td>Datasource:</td>
                  <td><?= h($account->datasource) ?></td>
               </tr>
               <tr>
                  <td>Created:</td>
                  <td><?= h($account->created) ?></td>
               </tr>
               <tr>
                  <td>Modified:</td>
                  <td><?= h($account->modified) ?></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div class="panel-footer">
      <?= $this->element('edit', ['viewvar' => $account->id]) ?>
      <span>&nbsp;&nbsp;</span>
      <?= $this->element('delete', ['viewvar' => $account->id]) ?>
   </div>
</div>

    
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Connected Domains') ?></h3>
    </div>
    <?php if (!empty($account->shards)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Domain') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($account->shards as $shards): ?>
                <tr>
                    <td><?= h($shards->domain) ?></td>
                    <td><?= h($shards->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Shards', 'action' => 'view', $shards->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Shards', 'action' => 'edit', $shards->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Shards', 'action' => 'delete', $shards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shards->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no connected Domains</p>
    <?php endif; ?>
</div>
</div>
