<?php
include 'count.php';

function dupli($arr){

    for ($i=0; $i <counting($arr) ; $i++) { 
 
        for ($s=$i+1; $s <counting($arr) ; $s++) { 
           if(($arr[$i] == $arr[$s]) && ($i != $s)){
            echo "The Dublicate number is: ".$arr[$s] ."</br>";
                 
            }
        }
    }
            
}
$arr = array(1,5,6,3,2,6);

echo 'Numbers of array:</br>';
for ($x=0; $x <counting($arr); $x++) { 
    echo "". $arr[$x]. "&nbsp;";
}
echo '</br>';

dupli($arr);

?>
