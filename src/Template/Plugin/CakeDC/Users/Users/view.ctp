<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$this->extend('Layout/TwitterBootstrap/dashboard');
?>
<div class="col-md-8">
   <div class="panel panel-info">
      <div class="panel-heading">
         <h3 class="panel-title"><strong>Account:&nbsp;&nbsp;</strong><?= h($Users->id) ?></h3>
      </div>
      <div class="panel-body">
         <div class="row">
            <table class="table table-user-information">
               <tbody>
                  <tr>
                     <td>ID:</td>
                     <td><?= h($Users->id) ?></td>
                  </tr>
                  <tr>
                     <td>Username:</td>
                     <td><?= h($Users->username) ?></td>
                  </tr>
                  <tr>
                     <td>First Name:</td>
                     <td><?= h($Users->first_name) ?></td>
                  </tr>
                  <tr>
                     <td>Last Name:</td>
                     <td><?= h($Users->last_name) ?></td>
                  </tr>
                  <tr>
                     <td>Email:</td>
                     <td><?= h($Users->email) ?></td>
                  </tr>
                  <tr>
                     <td>Token:</td>
                     <td><?= h($Users->token) ?></td>
                  </tr>
                  <tr>
                     <td>Api Token:</td>
                     <td><?= h($Users->api_token) ?></td>
                  </tr>
                  <tr>
                     <td>Active:</td>
                     <td><?= $this->Number->format($Users->active)? '<span class="label label-success">YES</span>' : '<span class="label label-danger">NO</span>' ?></td>
                  </tr>
                  <tr>
                     <td>Token Expires:</td>
                     <td><?= h($Users->token_expires) ?></td>
                  </tr>
                  <tr>
                     <td>Tos Date:</td>
                     <td><?= h($Users->tos_date) ?></td>
                  </tr>
                  <tr>
                     <td>Activation:</td>
                     <td><?= h($Users->activation_date) ?></td>
                  </tr>
                  <tr>
                     <td>Role:</td>
                     <td><?= h($Users->role) ?></td>
                  </tr>
                  <tr>
                     <td>Created:</td>
                     <td><?= h($Users->created) ?></td>
                  </tr>
                  <tr>
                     <td>Modified:</td>
                     <td><?= h($Users->modified) ?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <div class="panel-footer">
         <?= $this->element('edit_with_plugin', ['viewvar' => $Users->id]) ?>
         <span>&nbsp;&nbsp;</span>
         <?= $this->element('delete_with_plugin', ['viewvar' => $Users->id]) ?>
      </div>
   </div>
</div>
