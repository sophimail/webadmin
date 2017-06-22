<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Sender Bcc Domain'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Sender Bcc Domain'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($senderBccDomain); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Sender Bcc Domain']) ?></legend>
    <?php
    echo $this->Form->input('bcc_address');
    echo $this->Form->input('expired');
    echo $this->Form->input('active');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
