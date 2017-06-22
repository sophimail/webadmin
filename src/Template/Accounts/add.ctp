<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="container">
    <h1>Add Location</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Database and Location Information</h3>
        
            <?= $this->Form->create($account, array('class' => 'form-horizontal', 'role' => 'form')) ?>
          
            <label class="col-lg-3 control-label">Datasource</label>
            <div class="col-lg-8">
              <?= $this->Form->input('datasource', array('label' => false, 'div' => false, 'placeholder' => 'Datasource Name')) ?>
            </div>

            <label class="col-lg-3 control-label">Location</label>
            <div class="col-lg-8">
              <?= $this->Form->input('description', array('label' => false, 'div' => false, 'placeholder' => 'Location Description')) ?>
            </div>

            <label class="col-lg-3 control-label">Domain Connection</label>
            <div class="col-lg-8">
              <?= $this->Form->input('shards._ids', array('options' => $shards, 'label' => false, 'div' => false, 'placeholder' => 'Location', 'multiple' => 'checkbox')) ?>
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