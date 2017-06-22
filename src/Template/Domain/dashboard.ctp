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

$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->loadHelper('Custom');


echo $this->Html->script('chart.min', ['block' => 'scriptTop', 'once' => true]);
echo $this->Html->script('filesize.min', ['block' => true, 'once' => true]);

echo $this->fetch('scriptTop');
$multiplier = Configure::read('_Constants.quota_multiplier');
$userscount = sizeof($dataChart3['labels'])+1;

?>

<div class="row">
   <div class="col-md-12 text-center" style="padding-top: 15px;">
      <h1>Domain Storage Allocation</h1>
   </div>
   <div class="clearfix"></div>
   <div class="col-md-6" style="padding-top: 15px;">
      <canvas id="Chart1" height=150 style="border: 1px solid #D3D3D3;"></canvas>
      <?php echo $this->Html->scriptBlock("
         var data = ".json_encode($dataChart1).";
         
         var ctx = document.getElementById(\"Chart1\");

         var myDoughnutChart = new Chart(ctx, {type: 'doughnut', data: data,

               options: {
                  tooltips: {
                     enabled: true,
                     mode: 'single',
                     callbacks: {label: function(tooltipItems, data) { return filesize(data.datasets[0].data[tooltipItems.index]*$multiplier); }
                     }
                  }
               }
            }
         );
         
         ");?>
   </div>
   <div class="col-md-6" style="padding-top: 15px;">
      <canvas id="Chart2" height=150 style="border: 1px solid #D3D3D3;"></canvas>
      <?php echo $this->Html->scriptBlock("
         var data = ".json_encode($dataChart2).";
         
         var ctx = document.getElementById(\"Chart2\");

         var myDoughnutChart = new Chart(ctx, {type: 'polarArea', data: data,        

                  options: {
                     tooltips: {
                        enabled: true,
                        mode: 'single',
                        callbacks: {label: function(tooltipItems, data) { return filesize(tooltipItems.yLabel*$multiplier); }
                     }
                  }
               }
            }
         );
         
         ");?>
   </div>

   <div class="clearfix"></div>

   <div class="col-md-12 text-center" style="padding-top: 15px;">
      <canvas id="Chart3" height=<?= $userscount*15 ?> style="border: 1px solid #D3D3D3;"></canvas>
      <?php echo $this->Html->scriptBlock("
         var data = ".json_encode($dataChart3).";
         
         var ctx = document.getElementById(\"Chart3\");

         var myDoughnutChart = new Chart(ctx, {type: 'horizontalBar', data: data,

                  options: {
                     tooltips: {
                     enabled: true,
                     mode: 'single',
                     callbacks: {label: function(tooltipItems, data) { return filesize(tooltipItems.xLabel*$multiplier); }
                  }
               }
            }
         }
      );
         
      ");?>
	</div>
</div>
