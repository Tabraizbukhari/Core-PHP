<?php
include 'count.php';

function dubli($arr){
   
    for ($i=0; $i <counting($arr) ; $i++) { 
     
        for ($s=$i+1; $s <counting($arr) ; $s++) { 
           if(($arr[$i] == $arr[$s]) && ($i != $s)){
            echo "The Dublicate string is: ".$arr[$s] ."</br>";
                 
            }
        }
            
    }
    
}
$arr = array('e','s','d','s','a','e','z');
echo 'String of array:</br>';
for ($x=0; $x <counting($arr); $x++) { 
    echo "". $arr[$x]. "&nbsp;";
}
echo '</br>';

dubli($arr);
?>
