<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="page-header">
    <h2><?= h('Datacenter Locations') ?></h2>
</div>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('datasource'); ?></th>
            <th><?= $this->Paginator->sort('description'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($accounts as $account): ?>
        <tr>
            <td><?= h($account->datasource) ?></td>
            <td><?= h($account->description) ?></td>
            <td><?= h($account->created) ?></td>
            <td><?= h($account->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $account->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $account->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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