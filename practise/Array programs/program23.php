<?php
include 'count.php';

function endzero($arr) {
    $count = 0;  
  
    for ($i = 0; $i < counting($arr); $i++) {
        if ($arr[$i] != 0) {
            $arr[$count++] = $arr[$i];  
       
        }
        
    }   
    while ($count<counting($arr)) {
        $arr[$count++] = 0;  
    } 
   
    echo "push end of zeroes";
    for ($x=0; $x <counting($arr) ; $x++) { 
        echo $arr[$x];
    }
}

$arr = array(0,2,3,0,6); 
echo endzero($arr); 
?>
 
