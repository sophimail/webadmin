<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Sender Bcc User'), ['action' => 'edit', $senderBccUser->username]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Sender Bcc User'), ['action' => 'delete', $senderBccUser->username], ['confirm' => __('Are you sure you want to delete # {0}?', $senderBccUser->username)]) ?> </li>
<li><?= $this->Html->link(__('List Sender Bcc User'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sender Bcc User'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Sender Bcc User'), ['action' => 'edit', $senderBccUser->username]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Sender Bcc User'), ['action' => 'delete', $senderBccUser->username], ['confirm' => __('Are you sure you want to delete # {0}?', $senderBccUser->username)]) ?> </li>
<li><?= $this->Html->link(__('List Sender Bcc User'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sender Bcc User'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($senderBccUser->username) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Username') ?></td>
            <td><?= h($senderBccUser->username) ?></td>
        </tr>
        <tr>
            <td><?= __('Bcc Address') ?></td>
            <td><?= h($senderBccUser->bcc_address) ?></td>
        </tr>
        <tr>
            <td><?= __('Domain') ?></td>
            <td><?= h($senderBccUser->domain) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($senderBccUser->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($senderBccUser->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Expired') ?></td>
            <td><?= h($senderBccUser->expired) ?></td>
        </tr>
        <tr>
            <td><?= __('Active') ?></td>
            <td><?= $senderBccUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

