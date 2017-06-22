<?php
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