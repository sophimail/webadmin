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
   use Cake\Core\Configure;
   $this->extend('../Layout/TwitterBootstrap/dashboard');
   $this->loadHelper('Custom');
   $multiplier = Configure::read('_Constants.quota_multiplier');
   ?>
<div class="container">
   <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
         <div class="alert alert-info alert-dismissable">
            &nbsp;Mailbox: <strong><?= $mailbox->username ?></strong> and Domain: <strong><?= $mailbox->domain ?></strong>
         </div>
         <h3>Change Password</h3>
         <?= $this->Form->create($mailbox, array('class' => 'form-horizontal', 'role' => 'form')); ?>
          
         <label class="col-lg-3 control-label">Password</label>
         <div class="col-lg-8">
            <?= $this->Form->input('password', array('label' => false, 'div' => false, 'placeholder' => 'New Password', 'append' => 'min: '.Configure::read('_Constants.password_length').' characters')) ?>
         </div>
         <label class="col-lg-3 control-label">Password (again)</label>
         <div class="col-lg-8">
            <?= $this->Form->input('confirm_password', array('type' => 'password', 'label' => false, 'div' => false, 'placeholder' => 'Confirm', 'autocomplete' => 'off')) ?>
         </div>
          
         <div class="form-group">
            <div class="col-lg-8">
               <label class="col-md-3 control-label"></label>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
               <?= $this->element('save') ?>
               <span></span>
               <?=$this->element('reset') ?>
            </div>
         </div>
         <?= $this->Form->end() ?>
      </div>
   </div>
</div>
