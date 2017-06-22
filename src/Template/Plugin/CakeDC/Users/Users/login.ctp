<?php
/**
 *
 * Copyright (c) 2017 AVERWAY LTD
 *
 * LICENSE:
 *
 * This file is part of SophiMail Dashboard (http://www.sophimail.com).
 *
 * SophiMail Dashboard is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any
 * later version with exceptions for vendors and plugins.
 *
 * See the LICENSE file for a full license statement.
 *
 * SophiMail Dashboard is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with SophiMail Dashboard.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 *
 * @author AVERWAY LTD <support@sophimail.com>
 * @license GNU/GPLv3 or later; https://www.gnu.org/licenses/gpl.html
 * @copyright 2017 AVERWAY LTD
 * 
 * SophiMail is a registered trademark of AVERWAY LTD
 *
 */
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
