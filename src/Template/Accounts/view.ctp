<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
    

<div class="panel panel-info">
   <div class="panel-heading">
      <h3 class="panel-title"><strong>Location:&nbsp;&nbsp;</strong><?= h($account->id) ?></h3>
   </div>
   <div class="panel-body">
      <div class="row">
         <table class="table table-user-information">
            <tbody>
               <tr>
                  <td>ID:</td>
                  <td><?= h($account->id) ?></td>
               </tr>
               <tr>
                  <td>Datasource:</td>
                  <td><?= h($account->datasource) ?></td>
               </tr>
               <tr>
                  <td>Created:</td>
                  <td><?= h($account->created) ?></td>
               </tr>
               <tr>
                  <td>Modified:</td>
                  <td><?= h($account->modified) ?></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div class="panel-footer">
      <?= $this->element('edit', ['viewvar' => $account->id]) ?>
      <span>&nbsp;&nbsp;</span>
      <?= $this->element('delete', ['viewvar' => $account->id]) ?>
   </div>
</div>

    
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Connected Domains') ?></h3>
    </div>
    <?php if (!empty($account->shards)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Domain') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($account->shards as $shards): ?>
                <tr>
                    <td><?= h($shards->domain) ?></td>
                    <td><?= h($shards->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Shards', 'action' => 'view', $shards->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Shards', 'action' => 'edit', $shards->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Shards', 'action' => 'delete', $shards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shards->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no connected Domains</p>
    <?php endif; ?>
</div>
</div>
