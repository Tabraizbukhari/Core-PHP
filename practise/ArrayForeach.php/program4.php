<?php
include "count.php";
function equal($a, $b){
foreach ($a as $ar) {
    if($ar != ""){
        foreach ($b as $br) {
            if($ar == $br){
                echo $ar;
                }
            }
        }
     }
} 
$a= array(1,2,3,4,5);
$b = array(1,4,5,6,3);

equal($a, $b);
?>
