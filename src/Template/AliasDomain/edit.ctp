<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
use Cake\Core\Configure;
?>

<div class="container">
   <h1>Edit Domain Alias</h1>
   <hr>
   <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
         <div class="alert alert-info alert-dismissable">
            &nbsp;Source: <strong><?= $aliasDomain->alias_domain ?></strong> and Target: <strong><?= $aliasDomain->target_domain ?></strong>
         </div>   
          
         <?= $this->Form->create($aliasDomain, array('class' => 'form-horizontal', 'role' => 'form')); ?>          
          
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