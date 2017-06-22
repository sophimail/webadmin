<?php
    use Cake\Core\Configure;
?>

<ul class="nav nav-sidebar">
    <li>
        <a aria-expanded="true" class="" href="javascript:;" data-toggle="collapse" data-target="#target1"><span class="fa fa-cogs" style="margin-right: 10px;"></span>Manage</a>
        <ul style="" aria-expanded="true" id="target1" class="collapse">
            <li><?= $this->Html->link('<i class="fa fa-user" style="margin-right: 10px;"></i>Adminstrators', ['plugin' =>'CakeDC/Users', 'controller' => 'users', 'action' => 'index'], ['escapeTitle' => false]); ?></li>
            <li><?= $this->Html->link('<i class="fa fa-home" style="margin-right: 10px;"></i>Locations', ['plugin' => NULL, 'controller' => 'accounts', 'action' => 'index'], ['escapeTitle' => false]); ?></li>
            <li><?= $this->Html->link('<i class="fa fa-tags" style="margin-right: 10px;"></i>Domains', ['plugin' => NULL, 'controller' => 'shards', 'action' => 'index'], ['escapeTitle' => false]); ?></li>
        </ul>
    </li>
    
    <li>
        <a aria-expanded="true" class="" href="javascript:;" data-toggle="collapse" data-target="#target2"><span class="fa fa-database" style="margin-right: 10px;"></span>Domain</a>
        <ul style="" aria-expanded="true" id="target2" class="collapse">
            <li><?= $this->Html->link('<i class="fa fa-crop" style="margin-right: 10px;"></i>Select', ['plugin' => NULL, 'controller' => 'Shards', 'action' => 'selector'], ['escapeTitle' => false]); ?></li>
            <?php if ((Configure::read('_domain')) && (Configure::read('_datasource'))) { ?>
                <li><?= $this->Html->link('<i class="fa fa-eye" style="margin-right: 10px;"></i>View', ['plugin' => NULL, 'controller' => 'Domain', 'action' => 'view'], ['escapeTitle' => false]); ?></li>
                <li><?= $this->Html->link('<i class="fa fa-share-alt" style="margin-right: 10px;"></i>Alias', ['plugin' => NULL, 'controller' => 'AliasDomain', 'action' => 'index'], ['escapeTitle' => false]); ?></li>
                <li><?= $this->Html->link('<i class="fa fa-pencil" style="margin-right: 10px;"></i>Edit', ['plugin' => NULL, 'controller' => 'Domain', 'action' => 'edit'], ['escapeTitle' => false]); ?></li>
            <?php } ?>
        </ul>
    </li>    
    
    <?php if ((Configure::read('_domain')) && (Configure::read('_datasource'))) { ?>
        <li>
            <a aria-expanded="true" class="" href="javascript:;" data-toggle="collapse" data-target="#target3"><span class="fa fa-envelope" style="margin-right: 10px;"></span>Mailboxes</a>    
            <ul style="" aria-expanded="true" id="target3" class="collapse">
                <li><?= $this->Html->link('<i class="fa fa-th-list" style="margin-right: 10px;"></i>List', ['plugin' => NULL, 'controller' => 'mailbox', 'action' => 'index'], ['escapeTitle' => false]); ?></li>
                <li><?= $this->Html->link('<i class="fa fa-plus-circle" style="margin-right: 10px;"></i>Create', ['plugin' => NULL, 'controller' => 'mailbox', 'action' => 'add'], ['escapeTitle' => false]); ?></li>
            </ul>                
        </li>
            
    <?php } ?>
    
    
    <?php if ((Configure::read('_domain')) && (Configure::read('_datasource'))) { ?>
        <li>
            <a aria-expanded="true" class="" href="javascript:;" data-toggle="collapse" data-target="#target5"><span class="fa fa-share-alt" style="margin-right: 10px;"></span>Aliases</a>    
            <ul style="" aria-expanded="true" id="target5" class="collapse">
                <li><?= $this->Html->link('<i class="fa fa-th-list" style="margin-right: 10px;"></i>List', ['plugin' => NULL, 'controller' => 'alias', 'action' => 'index'], ['escapeTitle' => false]); ?></li>
                <li><?= $this->Html->link('<i class="fa fa-plus-circle" style="margin-right: 10px;"></i>Create', ['plugin' => NULL, 'controller' => 'alias', 'action' => 'add'], ['escapeTitle' => false]); ?></li>
            </ul>                
        </li>
            
    <?php } ?> 

</ul>