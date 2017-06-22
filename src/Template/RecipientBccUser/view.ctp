<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Recipient Bcc User'), ['action' => 'edit', $recipientBccUser->username]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Recipient Bcc User'), ['action' => 'delete', $recipientBccUser->username], ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccUser->username)]) ?> </li>
<li><?= $this->Html->link(__('List Recipient Bcc User'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recipient Bcc User'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Recipient Bcc User'), ['action' => 'edit', $recipientBccUser->username]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Recipient Bcc User'), ['action' => 'delete', $recipientBccUser->username], ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccUser->username)]) ?> </li>
<li><?= $this->Html->link(__('List Recipient Bcc User'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recipient Bcc User'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($recipientBccUser->username) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Username') ?></td>
            <td><?= h($recipientBccUser->username) ?></td>
        </tr>
        <tr>
            <td><?= __('Bcc Address') ?></td>
            <td><?= h($recipientBccUser->bcc_address) ?></td>
        </tr>
        <tr>
            <td><?= __('Domain') ?></td>
            <td><?= h($recipientBccUser->domain) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($recipientBccUser->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($recipientBccUser->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Expired') ?></td>
            <td><?= h($recipientBccUser->expired) ?></td>
        </tr>
        <tr>
            <td><?= __('Active') ?></td>
            <td><?= $recipientBccUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

