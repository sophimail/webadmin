<?php
/**
 *
 * Copyright (c) 2017 AVERWAY LTD
 *
 * LICENSE:
 *
 * This file is part of SophiMail Dashboard (http://www.sophimail.com).
 *
 * SophiMail Dashboard is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any
 * later version with exceptions for vendors and plugins.
 *
 * See the LICENSE file for a full license statement.
 *
 * SophiMail Dashboard is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with SophiMail Dashboard.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 *
 * @author AVERWAY LTD <support@sophimail.com>
 * @license GNU/GPLv3 or later; https://www.gnu.org/licenses/gpl.html
 * @copyright 2017 AVERWAY LTD
 * 
 * SophiMail is a registered trademark of AVERWAY LTD
 *
 */
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
