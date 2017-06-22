<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$this->extend('Layout/TwitterBootstrap/dashboard');
?>
<!--
<div class="actions columns large-2 medium-3">
    <h3><?= __d('Users', 'Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__d('Users', 'New {0}', $tableAlias), ['action' => 'add']) ?></li>
    </ul>
</div>
-->
<div class="page-header">
    <h2><?= __d('Users', 'List Administrators') ?></h2>
</div>

<table class="table table-striped" cellpadding="0" cellspacing="0">    <thead>
        <tr>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('first_name') ?></th>
            <th><?= $this->Paginator->sort('last_name') ?></th>
            <th class="actions"><?= __d('Users', 'Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($Users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->first_name) ?></td>
            <td><?= h($user->last_name) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>                
                <?= $this->Html->link('', ['action' => 'changePassword', $user->id], ['title' => __('Change Password'), 'class' => 'btn btn-default glyphicon glyphicon-lock']) ?>                
                <?= $this->Html->link('', ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>             
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