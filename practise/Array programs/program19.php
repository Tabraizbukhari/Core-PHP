<?php
include 'count.php';

function sumarr($arr, $sum){
   
$count= 0;
    for ($i=0; $i <counting($arr) ; $i++) { 
        for ($x=$i+1; $x <counting($arr) ; $x++) { 
            if($arr[$i] + $arr[$x] == $sum){
                $count++;

            }
        }   
    }
    return($count);

}
$sum = 6;
$arr = array(5,1,4,2);
echo sumarr($arr, $sum);
?>
