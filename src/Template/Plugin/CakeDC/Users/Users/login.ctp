<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;
$this->layout = 'default';
$this->Html->css('form-signin', ['block' => true]);
?>

<div class="wrapper">
      <?= $this->Flash->render('auth') ?>
      <?= $this->Form->create(null , array('class' => 'form-signin')) ?>
      
    <h2 class="form-signin-heading">Please login</h2>
      <?= $this->Form->input('username', array('class' => 'form-control', 'label' => false, 'div' => false, 'placeholder' => 'Username')) ?>
      <?= $this->Form->input('password', array('class' => 'form-control', 'label' => false, 'div' => false, 'placeholder' => 'Password')) ?>
    
      <?php
        if (Configure::check('Users.RememberMe.active')) {
            echo $this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
                'type' => 'checkbox',
                'label' => __d('Users', 'Remember me'),
                'checked' => 'checked'
            ]);
        }
      ?>
    
        <p>
            <?php
            $registrationActive = Configure::read('Users.Registration.active');
            if ($registrationActive) {
                echo $this->Html->link(__d('users', 'Register'), ['action' => 'register']);
            }
            if (Configure::read('Users.Email.required')) {
                if ($registrationActive) {
                    echo ' | ';
                }
                echo $this->Html->link(__d('users', 'Reset Password'), ['action' => 'requestResetPassword']);
            }
            ?>
        </p>
      
      <?php if (Configure::read('Users.Social.login')) : ?>
        <?php $providers = Configure::read('OAuth.providers'); ?>
        <?php foreach ($providers as $provider => $options) : ?>
            <?php if (!empty($options['options']['redirectUri'])) : ?>
                <?= $this->User->socialLogin($provider); ?>
            <?php endif; ?>
        <?php endforeach; ?>
      <?php
      endif; ?>
    
    <?= $this->Form->button('Submit', array( 'bootstrap-type' => 'primary', 'class' => 'btn btn-lg btn-primary btn-block', 'rule' => 'button', 'escape' => false, 'type' => 'submit')) ?>
    <?= $this->Html->image('sophimail-logo.png', ['alt' => 'SophiMail Administration Panel', 'class' => 'image-login']) ?>
    <?= $this->Form->end() ?>
</div>
