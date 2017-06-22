<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
use Cake\Core\Configure;

?>

<?php if(Configure::read('_domain')) { ?>
<div class="alert alert-success alert-dismissable">
   <a class="panel-close close" data-dismiss="alert">×</a> 
   <i class="fa fa-lightbulb-o fa-2x"></i>&nbsp;Domain&nbsp;<strong><?= Configure::read('_domain') ?></strong>&nbsp;already selected for&nbsp;<strong><?= $this->request->session()->read('Auth.User.username') ?></strong>&nbsp;on database&nbsp;<strong><?= Configure::read('_datasource') ?></strong>
</div>
<?php } else { ?>
<div class="alert alert-danger alert-dismissable">
   <a class="panel-close close" data-dismiss="alert">×</a> 
   <i class="fa fa-lightbulb-o fa-2x"></i>&nbsp;&nbsp;Select a domain to manage.
</div>
<?php } ?>


 <div class="panel panel-info">
   <div class="panel-heading">
      <h3 class="panel-title"><?= __d('Selection', 'Select Domains for Management') ?></h3>
   </div>
   <div class="panel-body">
      <div class="row">
         <table class="table table-user-information">
            <tbody>
               <tr>
                  <th>Domain</th>
                  <th>Database</th>
                  <th>Description</th>
                  <th class="actions"><?= __d('Action', 'Action') ?></th>
               </tr>
               <?php foreach ($domains as $domain):
                  $rowheight = count($domain->accounts);
                  $c = 0; ?>
               <?php foreach ($domain->accounts as $account):?>        
               <?php
                  if ($c==0) echo '<tr><td rowspan="'.$rowheight.'">'.h($domain->domain).'</td><td>'.h($account->datasource).'</td><td>'.h($account->description).'</td><td class="actions">'.$this->Form->postLink('', ['action' => 'selector', $domain->id, $account->id], ['title' => __('select domain: '.$domain->domain), 'class' => 'btn btn-default glyphicon glyphicon-hand-left']).'</td></tr>';
                  	else
                  		echo '<tr><td>'.h($account->datasource).'</td><td>'.h($account->description).'</td><td class="actions">'.$this->Form->postLink('', ['action' => 'selector', $domain->id, $account->id], ['title' => __('select domain'), 'class' => 'btn btn-default glyphicon glyphicon-hand-left']).'</td></tr>';
                  	$c++;
                  ?>           
               <?php endforeach; ?>
               <?php endforeach; ?>
         </table>
      </div>
   </div>              
</div>