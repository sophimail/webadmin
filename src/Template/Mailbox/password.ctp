<?php
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