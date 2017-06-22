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
    /* @var $this \Cake\View\View */
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    use Cake\Core\Configure;
?>

<div class="page-header">
   <h2><?= __d('Users', 'List Aliases for '.Configure::read('_domain')) ?></h2>
</div>

<table class="table table-striped" cellpadding="0" cellspacing="0">
   <thead>
      <tr>
         <th><?= $this->Paginator->sort('address'); ?></th>
         <th><?= $this->Paginator->sort('goto'); ?></th>
         <th><?= $this->Paginator->sort('active'); ?></th>
         <th class="actions"><?= __('Actions'); ?></th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($alias as $alias): ?>
      <tr>
         <td><?= h($alias->address) ?></td>
         <td><?= str_replace(',','<BR>',h($alias->goto)) ?></td>
         <td><?= h($alias->active)? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>' ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'edit', $alias->address], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $alias->address], ['confirm' => __('Are you sure you want to delete # {0}?', $alias->address), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
   <ul class="pagination">
      <?= $this->Paginator->prev('< ' . __('previous')) ?>
      <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
      <?= $this->Paginator->next(__('next') . ' >') ?>
   </ul>
   <p><?= $this->Paginator->counter(['format' => 'range']) ?></p>
</div>
<?= $this->element('create') ?>
