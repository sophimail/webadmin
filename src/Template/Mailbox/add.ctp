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
   use Cake\Core\Configure;
   ?>
<div class="container">
   <h1>Create Mailbox</h1>
   <hr>
   <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
         <div class="alert alert-info alert-dismissable">
            &nbsp;Domain: <strong><?= Configure::read('_domain') ?></strong> and Location: <strong><?= Configure::read('_datasource') ?></strong>
         </div>
         <div class="alert alert-warning alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-exclamation-triangle fa-2x\"></i>&nbsp;&nbsp;Uppercase characters not allowed in <b>Username</b>
         </div>         
         <?php if ($allowed_storage == 0) {
            echo "<div class=\"alert alert-warning alert-dismissable\">
              <a class=\"panel-close close\" data-dismiss=\"alert\">×</a> 
              <i class=\"fa fa-exclamation-triangle fa-2x\"></i>&nbsp;&nbsp;Quota: 0 = unlimited&nbsp;&nbsp;(not recommended)
            </div>"; 
            } ?>
         <h3>Configure New Mailbox</h3>
         <?= $this->Form->create($mailbox, array('class' => 'form-horizontal', 'role' => 'form')) ?>
         <label class="col-lg-3 control-label">Username</label>
         <div class="col-lg-8">
            <?= $this->Form->input('local_part', array('label' => false, 'div' => false, 'placeholder' => 'Local part (eg. a.smith)', 'append' => '@'.Configure::read('_domain'))) ?>
         </div>
         <label class="col-lg-3 control-label">Password</label>
         <div class="col-lg-8">
            <?= $this->Form->input('password', array('label' => false, 'div' => false, 'placeholder' => 'New Password', 'append' => 'min: '.Configure::read('_Constants.password_length').' characters')) ?>
         </div>
         <label class="col-lg-3 control-label">Password (again)</label>
         <div class="col-lg-8">
            <?= $this->Form->input('confirm_password', array('type' => 'password', 'label' => false, 'div' => false, 'placeholder' => 'Confirm', 'autocomplete' => 'off')) ?>
         </div>
         <label class="col-lg-3 control-label">Name</label>
         <div class="col-lg-8">
            <?= $this->Form->input('name', array('label' => false, 'div' => false, 'placeholder' => 'User Real Name')) ?>
         </div>
         <label class="col-lg-3 control-label">Quota (MB)</label>
         <div class="col-lg-8">
            <?php 
               if ($allowed_storage == 0) echo $this->Form->input('quota', array('type'=>'number', 'min'=>'0', 'max'=>PHP_INT_MAX, 'step'=>'1', 'label' => false, 'div' => false, 'placeholder' => 'Mailbox Quota', 'append' => 'max: unlimited'));
               if ($allowed_storage > 0) echo $this->Form->input('quota', array('type'=>'number', 'min'=>'1', 'max'=>$allowed_storage, 'step'=>'1', 'label' => false, 'div' => false, 'placeholder' => 'Mailbox Quota', 'append' => 'max: '.$allowed_storage.' MB'));
               if ($allowed_storage < 0) echo "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"fa fa-exclamation-triangle\"></i>&nbsp;&nbsp;Low Domain Quota</div>";
               ?>
         </div>
         <label class="col-lg-3 control-label">Active</label>
         <div class="col-lg-8">
            <?= $this->Form->input('active', array('data-size' => 'small', 'data-toggle' => 'toggle', 'label' => false, 'div' => false, 'placeholder' => 'Active', 'default' => true)) ?>                
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
               <?= $this->element('reset') ?>
            </div>
         </div>
         <?= $this->Form->end() ?>
      </div>
   </div>
</div>
