<?php
include 'count.php';

function equal($a, $b){
$x = counting($a);
$y = counting($b);
if($x == $y){
 echo 'equal';
}else{
    echo 'not equal';
}
}
$a = array(1,2,3,4,5);
$b = array(1,2,3,4,5);

equal($a, $b);
?>
