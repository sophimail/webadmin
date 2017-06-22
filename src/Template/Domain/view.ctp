<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->loadHelper('Custom');
use Cake\Core\Configure;
?>

<div class="col-md-8">
   <div class="panel panel-info">
      <div class="panel-heading">
         <h3 class="panel-title"><strong>Domain: </strong><?= h($domain->domain) ?></h3>
      </div>
      <div class="panel-body">
         <div class="row">
            <table class="table table-user-information">
               <tbody>
                  <tr>
                     <td>Domain:</td>
                     <td><?= h($domain->domain) ?></td>
                  </tr>
                  <tr>
                     <td>Description:</td>
                     <td><?= h($domain->description) ?></td>
                  </tr>
                  <tr>
                     <td>Allowed Mailboxes:</td>
                     <td><?= $this->Custom->disabled_unlimited($this->Number->format($domain->mailboxes)) ?></td>
                  </tr>
                  <tr>
                     <td>Current Mailboxes:</td>
                     <td><?= $this->Number->format($domain_active_mailboxes) ?></td>
                  </tr>                   
                  <tr>
                     <td>Allowed Aliases:</td>
                     <td><?= $this->Custom->disabled_unlimited($this->Number->format($domain->aliases)) ?></td>
                  </tr>                   
                  <tr>
                     <td>Current Aliases:</td>
                     <td><?= $this->Number->format($domain_active_aliases) ?></td>
                  </tr>
                  <tr>
                     <td>Maximum Domain Quota:</td>
                     <td><?= $this->Custom->disabled_unlimited($this->Custom->format_size($domain->quota)) ?></td>
                  </tr>
                  <tr>
                     <td>Domain Quota Reserved:</td>
                     <td><?= $this->Number->toReadableSize($domain_storage_reserved) ?></td>
                  </tr>
                  <tr>
                     <td>Domain Quota Used:</td>
                     <td><?= $this->Number->toReadableSize($domain_storage_used) ?></td>
                  </tr>                   
                  <tr>
                     <td>Mailbox Quota:</td>
                     <td><?= $this->Custom->disabled_unlimited($this->Custom->format_size($domain->maxquota)) ?></td>
                  </tr>
                  <tr>
                     <td>Active:</td>
                     <td><?= h($domain->active)? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>' ?></td>
                  </tr>
                  <tr>
                     <td>Backupmx:</td>
                     <td><?= h($domain->backupmx)? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>' ?></td>
                  </tr>
                  <tr>
                     <td>Transport:</td>
                     <td><?= h($domain->transport) ?></td>
                  </tr>
                  <tr>
                     <td>Created:</td>
                     <td><?= h($domain->created) ?></td>
                  </tr>
                  <tr>
                     <td>Modified:</td>
                     <td><?= h($domain->modified) ?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <div class="panel-footer">
         <?= $this->element('edit_no_var') ?>
         <span>&nbsp;&nbsp;</span>
         <?= $this->element('delete_no_var', ['viewvar' => Configure::read('_domain')]) ?>
      </div>
   </div>
</div>
