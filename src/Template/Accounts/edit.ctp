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
    <h1>Edit Location</h1>
  	<hr>
	<div class="row">      
      <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
              &nbsp;Location: <strong><?= $account->description ?></strong> and Location ID: <strong><?= $account->id ?></strong>
            </div>

    <h3>Database and Location Information</h3>
            
    <?= $this->Form->create($account, array('class' => 'form-horizontal', 'role' => 'form')); ?>

    <label class="col-lg-3 control-label">Datasource</label>
    <div class="col-lg-8">
      <?= $this->Form->input('datasource', array('label' => false, 'div' => false, 'placeholder' => 'Datasource')) ?>
    </div>

    <label class="col-lg-3 control-label">Location</label>            
    <div class="col-lg-8">
      <?= $this->Form->input('description', array('label' => false, 'div' => false, 'placeholder' => 'Location')) ?>
    </div>
            
    <label class="col-lg-3 control-label">Connected Domains</label>    
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
