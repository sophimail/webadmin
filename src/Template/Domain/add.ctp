<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
use Cake\Core\Configure;
?>

<div class="container">
    <h1>Create Domain</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
          
        <div class="alert alert-warning alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-exclamation-triangle fa-2x"></i>&nbsp;&nbsp;-1 = disable | 0 = unlimited
        </div>
          
        <h3>Configure New Domain</h3>
          
          <?= $this->Form->create($domain, array('class' => 'form-horizontal', 'role' => 'form')) ?>
            
            <label class="col-lg-3 control-label">Description</label>
            <div class="col-lg-8">
                <?= $this->Form->input('description', array('label' => false, 'div' => false, 'placeholder' => 'Domain Description')) ?>
            </div>          
          
            <label class="col-lg-3 control-label">Aliases</label>
            <div class="col-lg-8">
                <?= $this->Form->input('aliases', array('label' => false, 'div' => false, 'placeholder' => 'Domain Aliases', 'value'=>Configure::read('_Constants.aliases'))) ?>
            </div>          
          
            <label class="col-lg-3 control-label">Mailboxes</label>
            <div class="col-lg-8">
                <?= $this->Form->input('mailboxes', array('label' => false, 'div' => false, 'placeholder' => 'Mailboxes', 'value'=>Configure::read('_Constants.mailboxes'))) ?>
            </div>          
                    
            <label class="col-lg-3 control-label">Mailbox Quota</label>
            <div class="col-lg-8">
                <?= $this->Form->input('maxquota', array('label' => false, 'div' => false, 'placeholder' => 'Mailbox Quota', 'append' => 'MB', 'value'=>Configure::read('_Constants.maxquota'))) ?>
            </div>          
                    
            <label class="col-lg-3 control-label">Domain Quota</label>
            <div class="col-lg-8">
                <?= $this->Form->input('quota', array('label' => false, 'div' => false, 'placeholder' => 'Domain Quota','append' => 'MB', 'value'=>Configure::read('_Constants.domain_quota_default'))) ?>
            </div>
                    
            <label class="col-lg-3 control-label">Transport</label>
            <div class="col-lg-8">
                <?= $this->Form->input('transport', array('label' => false, 'div' => false, 'type'=>'select', 'options'=>Configure::read('_Constants.transport_options'), 'default' => Configure::read('_Constants.transport_default'))) ?>
            </div>
          
            <label class="col-lg-3 control-label">Backup MX</label>
            <div class="col-lg-8">
                <?= $this->Form->input('backupmx', array('data-size' => 'small', 'data-toggle' => 'toggle', 'label' => false, 'div' => false, 'placeholder' => 'Backup MX')) ?>
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