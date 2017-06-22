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
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="container">
    <h1>Edit Domain Reservation</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
              &nbsp;Domain: <strong><?= $shard->domain ?></strong> and Domain ID: <strong><?= $shard->id ?></strong>
            </div>

            <h3>Domain Information</h3>
            
            <?= $this->Form->create($shard, array('class' => 'form-horizontal', 'role' => 'form')) ?>
          
            <label class="col-lg-3 control-label">Domain Name</label>
            <div class="col-lg-8">
              <?= $this->Form->input('domain', array('label' => false, 'div' => false, 'placeholder' => 'Full domain name: mydomain.tld')) ?>
            </div>

            <label class="col-lg-3 control-label">Domain Description</label>
            <div class="col-lg-8">
              <?= $this->Form->input('description', array('label' => false, 'div' => false, 'placeholder' => 'Domain description')) ?>
            </div>
            
            <div class="col-lg-11"><HR></div>
                
            <label class="col-lg-3 control-label">Datasources</label>
            <div class="col-lg-8">
              <?= $this->Form->input('accounts._ids', array('options' => $accounts, 'label' => false, 'div' => false, 'placeholder' => 'Location', 'multiple' => 'checkbox')) ?>
            </div>          
                
            <div class="col-lg-11"><HR></div>
                
            <label class="col-lg-3 control-label">Administrators</label>
            <div class="col-lg-8">
              <?= $this->Form->input('users._ids', array('options' => $users, 'label' => false, 'div' => false, 'placeholder' => 'Location', 'multiple' => 'checkbox')) ?>
            </div>
          
            <div class="col-lg-11"><HR></div>
                
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
