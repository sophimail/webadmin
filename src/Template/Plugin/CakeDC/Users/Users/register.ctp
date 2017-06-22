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
$this->layout = 'default';
?>


<div class="container">
    <h1>Registration Form</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
            <?= $this->Form->create($user, array('class' => 'form-horizontal', 'role' => 'form')) ?>
          
            <label class="col-lg-3 control-label">Username</label>
            <div class="col-lg-8">
              <?= $this->Form->input('username', array('label' => false, 'div' => false, 'placeholder' => 'Username')) ?>
            </div>
           
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <?= $this->Form->input('email', array('label' => false, 'div' => false, 'placeholder' => 'Email')) ?>
            </div>
          
            <label class="col-lg-3 control-label">Password</label>
            <div class="col-lg-8">
              <?= $this->Form->input('password', array('label' => false, 'div' => false, 'placeholder' => 'Password')) ?>
            </div>
          
            <label class="col-lg-3 control-label">Confirm</label>
            <div class="col-lg-8">
              <?= $this->Form->input('password_confirm', array('label' => false, 'div' => false, 'placeholder' => 'Confirm Password', 'type' => 'password')) ?>
            </div>
          
            <label class="col-lg-3 control-label">First Name</label>
            <div class="col-lg-8">
              <?= $this->Form->input('first_name', array('label' => false, 'div' => false, 'placeholder' => 'First Name')) ?>
            </div>
          
            <label class="col-lg-3 control-label">Last Name</label>
            <div class="col-lg-8">
              <?= $this->Form->input('last_name', array('label' => false, 'div' => false, 'placeholder' => 'Last Name')) ?>
            </div>          

            <?php if (Configure::read('Users.Tos.required')) {
                echo '<div class="form-group">
                        <div class="col-lg-offset-3 col-lg-8">
                            <input name="tos" value="1" required="required" id="tos" type="checkbox">&nbsp;&nbsp;I accept the <a href="http://www.sophimail.com/wp-content/uploads/2016/03/SophiMail-Terms-of-Service.pdf" target="_blank">Terms of Service</a></input>
                        </div>
                    </div>';
                }
            ?>
        
            <div class="form-group">    
                <div class="col-lg-offset-3 col-lg-8">          
                    <?php echo $this->User->addReCaptcha(); ?>          
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
