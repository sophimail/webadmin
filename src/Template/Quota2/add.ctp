<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Quota2'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Quota2'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($quota2); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Quota2']) ?></legend>
    <?php
    echo $this->Form->input('bytes');
    echo $this->Form->input('messages');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
