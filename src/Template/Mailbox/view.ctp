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
