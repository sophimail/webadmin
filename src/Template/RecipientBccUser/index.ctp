<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Recipient Bcc User'), ['action' => 'add']); ?></li>
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
        <?php foreach ($recipientBccUser as $recipientBccUser): ?>
        <tr>
            <td><?= h($recipientBccUser->username) ?></td>
            <td><?= h($recipientBccUser->bcc_address) ?></td>
            <td><?= h($recipientBccUser->domain) ?></td>
            <td><?= h($recipientBccUser->created) ?></td>
            <td><?= h($recipientBccUser->modified) ?></td>
            <td><?= h($recipientBccUser->expired) ?></td>
            <td><?= h($recipientBccUser->active) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $recipientBccUser->username], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $recipientBccUser->username], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $recipientBccUser->username], ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccUser->username), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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