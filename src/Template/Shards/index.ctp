<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="page-header">
    <h2><?= h('Domain Reservation') ?></h2>
</div>

<table class="table table-striped" cellpadding="0" cellspacing="0">    <thead>
        <tr>
            <th><?= $this->Paginator->sort('domain') ?></th>
            <th><?= $this->Paginator->sort('description') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($shards as $shard): ?>
        <tr>
            <td><?= h($shard->domain) ?></td>
            <td><?= h($shard->description) ?></td>
            <td><?= h($shard->created) ?></td>
            <td><?= h($shard->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $shard->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $shard->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $shard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shard->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
<p><?= $this->element('create') ?></p>