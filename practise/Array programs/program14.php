<?php
include 'count.php';

function com($a, $b){

    echo '</br> </br> THE COMMON VALUES ARE &nbsp; &nbsp;';
    for ($i=0; $i <counting($a) ; $i++) { 
       for ($x=0; $x <counting($b) ; $x++) { 
           if($a[$i]==$b[$x]){
              echo $a[$i] . ", &nbsp;";
           }
       }
    }    
}
$a = array('a','b','c','d','e','f','g','h','q','r');
$b = array('a','e','o','u','g','h','r','q');

echo" ARRAY 1 &nbsp; &nbsp;</br>";
for ($w=0; $w <counting($a); $w++) { 
    echo "". $a[$w]. "&nbsp;";
}
echo"</br> ARRAY 2 &nbsp; &nbsp; </br>";
for ($e=0; $e <counting($b); $e++) { 
    echo "". $b[$e]. "&nbsp;";

}

com($a, $b);

?>
