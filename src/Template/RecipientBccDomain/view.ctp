<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Recipient Bcc Domain'), ['action' => 'edit', $recipientBccDomain->domain]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Recipient Bcc Domain'), ['action' => 'delete', $recipientBccDomain->domain], ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccDomain->domain)]) ?> </li>
<li><?= $this->Html->link(__('List Recipient Bcc Domain'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recipient Bcc Domain'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Recipient Bcc Domain'), ['action' => 'edit', $recipientBccDomain->domain]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Recipient Bcc Domain'), ['action' => 'delete', $recipientBccDomain->domain], ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccDomain->domain)]) ?> </li>
<li><?= $this->Html->link(__('List Recipient Bcc Domain'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recipient Bcc Domain'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($recipientBccDomain->domain) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Domain') ?></td>
            <td><?= h($recipientBccDomain->domain) ?></td>
        </tr>
        <tr>
            <td><?= __('Bcc Address') ?></td>
            <td><?= h($recipientBccDomain->bcc_address) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($recipientBccDomain->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($recipientBccDomain->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Expired') ?></td>
            <td><?= h($recipientBccDomain->expired) ?></td>
        </tr>
        <tr>
            <td><?= __('Active') ?></td>
            <td><?= $recipientBccDomain->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

