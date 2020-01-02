<?php 

include 'count.php';
  $arr = array(1,2,3,4,5);

function addition($arr){
  for ($i=0; $i < counting($arr); $i++) {
    $count= $arr[$i];
  }

 
  $sum = 0;

  for ($i = 0; $i < $count; $i++) {
    $sum += $arr[$i]; 
  }
  echo $sum;
 
  $averg = $sum/$count;

 echo "</br> Average : &nbsp;". $averg;
}
addition($arr);
?> 
