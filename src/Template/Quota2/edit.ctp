<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $quota2->username],
        ['confirm' => __('Are you sure you want to delete # {0}?', $quota2->username)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Quota2'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $quota2->username],
        ['confirm' => __('Are you sure you want to delete # {0}?', $quota2->username)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Quota2'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($quota2); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Quota2']) ?></legend>
    <?php
    echo $this->Form->input('bytes');
    echo $this->Form->input('messages');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
