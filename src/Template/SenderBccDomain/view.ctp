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
<li><?= $this->Html->link(__('Edit Sender Bcc Domain'), ['action' => 'edit', $senderBccDomain->domain]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Sender Bcc Domain'), ['action' => 'delete', $senderBccDomain->domain], ['confirm' => __('Are you sure you want to delete # {0}?', $senderBccDomain->domain)]) ?> </li>
<li><?= $this->Html->link(__('List Sender Bcc Domain'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sender Bcc Domain'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Sender Bcc Domain'), ['action' => 'edit', $senderBccDomain->domain]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Sender Bcc Domain'), ['action' => 'delete', $senderBccDomain->domain], ['confirm' => __('Are you sure you want to delete # {0}?', $senderBccDomain->domain)]) ?> </li>
<li><?= $this->Html->link(__('List Sender Bcc Domain'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sender Bcc Domain'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($senderBccDomain->domain) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Domain') ?></td>
            <td><?= h($senderBccDomain->domain) ?></td>
        </tr>
        <tr>
            <td><?= __('Bcc Address') ?></td>
            <td><?= h($senderBccDomain->bcc_address) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($senderBccDomain->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($senderBccDomain->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Expired') ?></td>
            <td><?= h($senderBccDomain->expired) ?></td>
        </tr>
        <tr>
            <td><?= __('Active') ?></td>
            <td><?= $senderBccDomain->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

