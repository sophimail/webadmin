<?php
   /* @var $this \Cake\View\View */
   $this->extend('../Layout/TwitterBootstrap/dashboard');
   $this->loadHelper('Custom');
   use Cake\Core\Configure;
?>

<div class="page-header">
   <h2><?= __d('Users', 'List Mailboxes for '.Configure::read('_domain')) ?></h2>
</div>
<table class="table table-striped" cellpadding="0" cellspacing="0">
   <thead>
      <tr>
         <th><?= $this->Paginator->sort('username'); ?></th>
         <th><?= $this->Paginator->sort('name'); ?></th>
         <th><?= $this->Paginator->sort('quota'); ?></th>
         <th>Usage (MB)</th>
         <th>Usage %</th>
         <th>Messages</th>
         <th><?= $this->Paginator->sort('active'); ?></th>
         <th>Deliver to<BR />Mailbox</th>          
         <th class="actions"><?= __('Actions'); ?></th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($mailbox as $mailbox): ?>
      <tr>
        <?php $curr_mailbox_quota = $mailbox->quota; if ($mailbox->quota <= 0 ) $curr_mailbox_quota = PHP_INT_MAX; ?>  
         <td><?= h($mailbox->username) ?></td>
         <td><?= h($mailbox->name) ?></td>
         <td><?= $this->Custom->disabled_unlimited($this->Number->toReadableSize($mailbox->quota)) ?></td>
         <td><?= floor($mailbox->bytes/Configure::read('_Constants.quota_multiplier'))?>&nbsp;MB</td>
         <td>
            <div class="progress">
               <div class="progress-bar progress-bar-info" style="width: <?= $this->Number->toPercentage(100*($mailbox->bytes/$curr_mailbox_quota),0) ?>;">
                  <span style="color:rgb(51, 51, 51); margin-left:5px;"><?= $this->Number->toPercentage(100*($mailbox->bytes/$curr_mailbox_quota),0) ?></span>
               </div>
            </div>
         </td>
         <td><?= $this->Number->precision($mailbox->messages,0) ?></td>
         <td><?= h($mailbox->active)? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>' ?></td>
         <td><?= h($mailbox->goto_mailbox)? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>' ?></td>          
          
         <td class="actions">
            <?= $this->Html->link('', ['action' => 'view', $mailbox->username], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>             
            <?= $this->Html->link('', ['controller' => 'alias', 'action' => 'forward', $mailbox->username], ['title' => __('Forward'), 'class' => 'btn btn-default glyphicon glyphicon-share']) ?>                          
            <?= $this->Html->link('', ['action' => 'password', $mailbox->username], ['title' => __('Change Password'), 'class' => 'btn btn-default glyphicon glyphicon-lock']) ?>             
            <?= $this->Html->link('', ['action' => 'edit', $mailbox->username], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
            <?= $this->Form->postLink('', ['action' => 'delete', $mailbox->username], ['confirm' => __('Are you sure you want to delete # {0}?', $mailbox->username), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
<?= $this->element('create') ?>