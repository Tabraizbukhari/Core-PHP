<?php
function counting($arr){   
   $count= 0;

    foreach ($arr as $ar) {
        $count++;
    }
       return($count); 
   }
    $arr = array(1,2,4,5,6);
   echo counting($arr);
   ?>
