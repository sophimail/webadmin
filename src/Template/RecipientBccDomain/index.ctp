<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Recipient Bcc Domain'), ['action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('domain'); ?></th>
            <th><?= $this->Paginator->sort('bcc_address'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= $this->Paginator->sort('expired'); ?></th>
            <th><?= $this->Paginator->sort('active'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recipientBccDomain as $recipientBccDomain): ?>
        <tr>
            <td><?= h($recipientBccDomain->domain) ?></td>
            <td><?= h($recipientBccDomain->bcc_address) ?></td>
            <td><?= h($recipientBccDomain->created) ?></td>
            <td><?= h($recipientBccDomain->modified) ?></td>
            <td><?= h($recipientBccDomain->expired) ?></td>
            <td><?= h($recipientBccDomain->active) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $recipientBccDomain->domain], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $recipientBccDomain->domain], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $recipientBccDomain->domain], ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccDomain->domain), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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