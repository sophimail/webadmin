<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $recipientBccUser->username],
        ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccUser->username)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Recipient Bcc User'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $recipientBccUser->username],
        ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccUser->username)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Recipient Bcc User'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($recipientBccUser); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Recipient Bcc User']) ?></legend>
    <?php
    echo $this->Form->input('bcc_address');
    echo $this->Form->input('domain');
    echo $this->Form->input('expired');
    echo $this->Form->input('active');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
