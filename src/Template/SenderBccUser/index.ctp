<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Sender Bcc User'), ['action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('username'); ?></th>
            <th><?= $this->Paginator->sort('bcc_address'); ?></th>
            <th><?= $this->Paginator->sort('domain'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= $this->Paginator->sort('expired'); ?></th>
            <th><?= $this->Paginator->sort('active'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($senderBccUser as $senderBccUser): ?>
        <tr>
            <td><?= h($senderBccUser->username) ?></td>
            <td><?= h($senderBccUser->bcc_address) ?></td>
            <td><?= h($senderBccUser->domain) ?></td>
            <td><?= h($senderBccUser->created) ?></td>
            <td><?= h($senderBccUser->modified) ?></td>
            <td><?= h($senderBccUser->expired) ?></td>
            <td><?= h($senderBccUser->active) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $senderBccUser->username], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $senderBccUser->username], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $senderBccUser->username], ['confirm' => __('Are you sure you want to delete # {0}?', $senderBccUser->username), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
    <p><?= $this->Paginator->counter() ?></p>
</div>