<?php

namespace App\View\Helper;

use Cake\View\Helper;

class CustomHelper extends Helper
{
    function format_size($size) {
        $mod = 1000;
        $units = explode(' ','MB GB TB PB');
        for ($i = 0; $size >= $mod; $i++) {
            $size /= $mod;
        }
        return round($size, 2) . ' ' . $units[$i];
    }
    
    function disabled_unlimited($_val) {
        if ($_val == -1) return "Disabled";
        if ($_val == 0) return "Unlimited";        
        return $_val;
    }
    
}

?>