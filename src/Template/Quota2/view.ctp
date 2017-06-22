<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Quota2'), ['action' => 'edit', $quota2->username]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Quota2'), ['action' => 'delete', $quota2->username], ['confirm' => __('Are you sure you want to delete # {0}?', $quota2->username)]) ?> </li>
<li><?= $this->Html->link(__('List Quota2'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Quota2'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Quota2'), ['action' => 'edit', $quota2->username]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Quota2'), ['action' => 'delete', $quota2->username], ['confirm' => __('Are you sure you want to delete # {0}?', $quota2->username)]) ?> </li>
<li><?= $this->Html->link(__('List Quota2'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Quota2'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($quota2->username) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Username') ?></td>
            <td><?= h($quota2->username) ?></td>
        </tr>
        <tr>
            <td><?= __('Bytes') ?></td>
            <td><?= $this->Number->format($quota2->bytes) ?></td>
        </tr>
        <tr>
            <td><?= __('Messages') ?></td>
            <td><?= $this->Number->format($quota2->messages) ?></td>
        </tr>
    </table>
</div>

