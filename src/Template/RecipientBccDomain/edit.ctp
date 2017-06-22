<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $recipientBccDomain->domain],
        ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccDomain->domain)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Recipient Bcc Domain'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $recipientBccDomain->domain],
        ['confirm' => __('Are you sure you want to delete # {0}?', $recipientBccDomain->domain)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Recipient Bcc Domain'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($recipientBccDomain); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Recipient Bcc Domain']) ?></legend>
    <?php
    echo $this->Form->input('bcc_address');
    echo $this->Form->input('expired');
    echo $this->Form->input('active');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
