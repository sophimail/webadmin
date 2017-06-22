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


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Quota2'), ['action' => 'edit', $quota2->username]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Quota2'), ['action' => 'delete', $quota2->username], ['confirm' => __('Are you sure you want to delete # {0}?', $quota2->username)]) ?> </li>
<li><?= $this->Html->link(__('List Quota2'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Quota2'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Quota2'), ['action' => 'edit', $quota2->username]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Quota2'), ['action' => 'delete', $quota2->username], ['confirm' => __('Are you sure you want to delete # {0}?', $quota2->username)]) ?> </li>
<li><?= $this->Html->link(__('List Quota2'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Quota2'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($quota2->username) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Username') ?></td>
            <td><?= h($quota2->username) ?></td>
        </tr>
        <tr>
            <td><?= __('Bytes') ?></td>
            <td><?= $this->Number->format($quota2->bytes) ?></td>
        </tr>
        <tr>
            <td><?= __('Messages') ?></td>
            <td><?= $this->Number->format($quota2->messages) ?></td>
        </tr>
    </table>
</div>

