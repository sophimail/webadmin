<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->loadHelper('Custom');
?>

<div class="col-md-8">
   <div class="panel panel-info">
      <div class="panel-heading">
         <h3 class="panel-title"><strong>Mailbox:</strong> <?=  h($mailbox->name) ?></h3>
      </div>
      <div class="panel-body">
         <div class="row">
            <table class="table table-user-information">
               <tbody>
                  <tr>
                     <td>Username:</td>
                     <td><?= h($mailbox->username) ?></td>
                  </tr>
                  <tr>
                     <td>Name:</td>
                     <td><?= h($mailbox->name) ?></td>
                  </tr>
                  <tr>
                     <td>Location:</td>
                     <td><?= h($mailbox->maildir) ?></td>
                  </tr>
                  <tr>
                     <td>Local Part:</td>
                     <td><?= h($mailbox->local_part) ?></td>
                  </tr>
                  <tr>
                     <td>Mailbox Quota (Limit):</td>
                     <td><?= $this->Custom->disabled_unlimited($this->Number->toReadableSize($mailbox->quota)) ?></td>
                  </tr>
                  <tr>
                     <td>Active:</td>
                     <td><?= h($mailbox->active)? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>' ?></td>
                  </tr> 
                   
                  <tr>
                     <td>Deliver to mailbox:</td>
                     <td><?= h($goto_mailbox)? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>' ?></td>
                  </tr> 
                   
                  <tr>
                     <td>Email Forwards:</td>
                     <td><?= str_replace(',','<BR />',h($alias)) ?></td>
                  </tr>
                   
                  <tr>
                     <td>Created:</td>
                     <td><?= h($mailbox->created) ?></td>
                  </tr>
                  <tr>
                     <td>Modified:</td>
                     <td><?= h($mailbox->modified) ?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <div class="panel-footer">
         <?= $this->element('edit', ['viewvar' => $mailbox->username]) ?>
         <span>&nbsp;&nbsp;</span>
         <?= $this->element('delete', ['viewvar' => $mailbox->username]) ?>
      </div>
   </div>
</div>
