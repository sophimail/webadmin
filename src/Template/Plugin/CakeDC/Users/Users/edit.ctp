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

<div class="container">
    <h1>Edit Account</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          &nbsp;Edit User: <strong><?= $Users->username ?></strong> and User ID: <strong><?= $Users->id ?></strong>

        </div>
        <h3>Personal info</h3>
        
            <?= $this->Form->create($Users, array('class' => 'form-horizontal', 'role' => 'form')) ?>
          
            <label class="col-lg-3 control-label">Username</label>
            <div class="col-lg-8">
              <?= $this->Form->input('username', array('label' => false, 'div' => false, 'placeholder' => 'Username')) ?>
            </div>
           
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <?= $this->Form->input('email', array('label' => false, 'div' => false, 'placeholder' => 'Email')) ?>
            </div>
            
            <label class="col-lg-3 control-label">First Name</label>
            <div class="col-lg-8">
              <?= $this->Form->input('first_name', array('label' => false, 'div' => false, 'placeholder' => 'First Name')) ?>
            </div>
            
            <label class="col-lg-3 control-label">Last Name</label>
            <div class="col-lg-8">
              <?= $this->Form->input('last_name', array('label' => false, 'div' => false, 'placeholder' => 'Last Name')) ?>
            </div>
            
            <label class="col-lg-3 control-label">Token</label>
            <div class="col-lg-8">
              <?= $this->Form->input('token', array('label' => false, 'div' => false, 'placeholder' => 'Token')) ?>
            </div>

            <label class="col-lg-3 control-label">Token Expiry Date:</label>
            <div class="col-lg-8">
              <?= $this->Form->input('token_expires', array('id'=>'datetimepicker1', 'type'=>'text', 'label' => false, 'div' => false, 'placeholder' => 'Token Expiry Date', 'wrapInput' => false, 'append' => '<span class = "glyphicon glyphicon-calendar"></span>')) ?>
            </div>           
          
            <label class="col-lg-3 control-label">API Token</label>
            <div class="col-lg-8">
              <?= $this->Form->input('api_token', array('label' => false, 'div' => false, 'placeholder' => 'API Token')) ?>
            </div>
            
            <label class="col-lg-3 control-label">Activation Date</label>
            <div class="col-lg-8">                
                 <?= $this->Form->input('activation_date', array('id'=>'datetimepicker2', 'type'=>'text', 'label' => false, 'div' => false, 'placeholder' => 'Activation Date', 'wrapInput' => false, 'append' => '<span class = "glyphicon glyphicon-calendar"></span>')) ?> 
            </div>
          
            <label class="col-lg-3 control-label">TOS Expiry Date</label>
            <div class="col-lg-8">
              <?= $this->Form->input('tos_date', array('id'=>'datetimepicker3', 'type'=>'text', 'label' => false, 'div' => false, 'placeholder' => 'TOS Expiry Date', 'wrapInput' => false, 'append' => '<span class = "glyphicon glyphicon-calendar"></span>')) ?>                
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
<?php $this->Html->scriptBlock('$(\'#datetimepicker1,#datetimepicker2,#datetimepicker3\').datetimepicker({format: \'DD/MM/YY HH:mm\'});', ['block' => true]); ?>