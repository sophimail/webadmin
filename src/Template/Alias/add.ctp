<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
use Cake\Core\Configure;
?>

<div class="container">
   <h1>Create Alias</h1>
   <hr>
   <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
         <div class="alert alert-info alert-dismissable">
            &nbsp;Domain: <strong><?= Configure::read('_domain') ?></strong> and Location: <strong><?= Configure::read('_datasource') ?></strong>
         </div>
          
         <div class="alert alert-warning alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-exclamation-triangle fa-2x\"></i>&nbsp;&nbsp;GoTo Field: Insert multiple email addresses separated by comma (,) 
         </div>
         <div class="alert alert-warning alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-exclamation-triangle fa-2x\"></i>&nbsp;&nbsp;To create a catch-all use an "*" as alias 
         </div>           
          
         <?= $this->Form->create($alias, array('class' => 'form-horizontal', 'role' => 'form')) ?>
          
         <label class="col-lg-3 control-label">Alias</label>
         <div class="col-lg-8">
            <?= $this->Form->input('local_part', array('label' => false, 'div' => false, 'placeholder' => 'Local part (eg. a.smith)', 'append' => '@'.Configure::read('_domain'))) ?>
         </div>
          
         <label class="col-lg-3 control-label">GoTo</label>
         <div class="col-lg-8">
            <?= $this->Form->input('goto', array('label' => false, 'div' => false, 'placeholder' => 'Email addresses')) ?>
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
