<?php
use Cake\Core\Configure;
$this->layout = 'default';
$this->Flash->render('auth');
?>


<div class="container">
    <h1>Password reset</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Please, enter your email to reset your password</h3>
        
            <?= $this->Form->create($user, array('class' => 'form-horizontal', 'role' => 'form')) ?>
           
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <?= $this->Form->input('reference', array('label' => false, 'div' => false, 'placeholder' => 'Email')) ?>
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