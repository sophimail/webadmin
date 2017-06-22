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
