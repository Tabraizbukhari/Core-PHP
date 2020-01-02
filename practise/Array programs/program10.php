<?php
include "count.php";
function reverse($arr){
for ($i = 0; $i <counting($arr)/2; $i++)
{ 
   $tmp = $arr[$i];
   $arr[$i] = $arr[counting($arr) -$i - 1];
  
   $arr[counting($arr) - $i - 1] = $tmp;
}
for ($c=0; $c <counting($arr) ; $c++) { 
    echo $arr[$c] ."&nbsp;";
}
}
$ar= [1,2,3,4,5,6];

reverse($ar);
?>
