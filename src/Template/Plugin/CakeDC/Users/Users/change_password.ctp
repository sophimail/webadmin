<?php
use Cake\Core\Configure;

if($this->request->Session()->read('Auth.User')){
    $this->extend('Layout/TwitterBootstrap/dashboard');
} else {
    $this->layout = 'default';
}

$this->Flash->render('auth');
?>

<div class="container">
    <h1>Change Password</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Please, enter the new password</h3><BR>
        
            <?= $this->Form->create($user, array('class' => 'form-horizontal', 'role' => 'form')) ?>

          
            <?php if ($validatePassword) : ?>
          
            <label class="col-lg-3 control-label">Current Password</label>
            <div class="col-lg-8">
              <?= $this->Form->input('current_password', array('label' => false, 'div' => false, 'placeholder' => 'Current Password', 'type' => 'password', 'required' => true)) ?>
            </div>          
            <?php endif; ?>
          
            <label class="col-lg-3 control-label">New Password</label>
            <div class="col-lg-8">
              <?= $this->Form->input('password', array('label' => false, 'div' => false, 'placeholder' => 'New Password')) ?>
            </div>
          
            <label class="col-lg-3 control-label">Confirm</label>
            <div class="col-lg-8">
              <?= $this->Form->input('password_confirm', array('label' => false, 'div' => false, 'placeholder' => 'Confirm Password', 'type' => 'password')) ?>
            </div>
          
            <div class="form-group">&nbsp;</div>
          
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