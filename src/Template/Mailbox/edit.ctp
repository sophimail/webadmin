<?php
   use Cake\Core\Configure;
   $this->extend('../Layout/TwitterBootstrap/dashboard');
   $this->loadHelper('Custom');
   $multiplier = Configure::read('_Constants.quota_multiplier');
   ?>
<div class="container">
   <h1>Edit Mailbox</h1>
   <hr>
   <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
         <div class="alert alert-info alert-dismissable">
            &nbsp;Mailbox: <strong><?= $mailbox->username ?></strong> and Domain: <strong><?= $mailbox->domain ?></strong>
         </div>
         <?php if ($allowed_storage == 0) {
            echo "<div class=\"alert alert-warning alert-dismissable\">
              <a class=\"panel-close close\" data-dismiss=\"alert\">×</a> 
              <i class=\"fa fa-exclamation-triangle fa-2x\"></i>&nbsp;&nbsp;Quota: 0 = unlimited&nbsp;&nbsp;(not recommended)
            </div>"; 
            } ?>
         <h3>Mailbox Information</h3>
         <?= $this->Form->create($mailbox, array('class' => 'form-horizontal', 'role' => 'form')); ?>
         <label class="col-lg-3 control-label">Name</label>
         <div class="col-lg-8">
            <?= $this->Form->input('name', array('label' => false, 'div' => false, 'placeholder' => 'Full Name', 'append' => 'Full Name')) ?>
         </div>
         <label class="col-lg-3 control-label">Quota (MB)</label>
         <div class="col-lg-8">
            <?php 
               if ($allowed_storage == 0) echo $this->Form->input('quota', array('type'=>'number', 'min'=>'0', 'max'=>PHP_INT_MAX, 'step'=>'1', 'value'=>$mailbox->quota/$multiplier, 'label' => false, 'div' => false, 'placeholder' => 'Mailbox Quota', 'append' => 'max: unlimited'));
               if ($allowed_storage > 0) echo $this->Form->input('quota', array('type'=>'number', 'min'=>'1', 'max'=>$allowed_storage, 'step'=>'1', 'value'=>$mailbox->quota/$multiplier, 'label' => false, 'div' => false, 'placeholder' => 'Mailbox Quota', 'append' => 'max: '.$allowed_storage.' MB')); 
               if ($allowed_storage < 0) echo "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"fa fa-exclamation-triangle\"></i>&nbsp;&nbsp;Low Domain Quota</div>";
               ?>
         </div>
         <label class="col-lg-3 control-label">Active</label>
         <div class="col-lg-8">
            <?= $this->Form->input('active', array('data-size' => 'small', 'data-toggle' => 'toggle', 'label' => false, 'div' => false, 'placeholder' => 'Active')) ?>                
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
