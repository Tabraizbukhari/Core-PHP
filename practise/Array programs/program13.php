<?php
include 'count.php';

function comon($a, $b){
    echo '</br> </br> THE COMMON VALUES ARE &nbsp; &nbsp;';
    for ($i=0; $i <counting($a) ; $i++) { 
       for ($x=0; $x <counting($b) ; $x++) { 
           if($a[$i]== $b[$x]){
               echo $a[$i] . ", &nbsp;";
           }
       }
}
}

$a = array(1,2,3,4,5,6,7,8,9);
$b = array(4,5,6,9,10,13);

echo" ARRAY 1 &nbsp; &nbsp;</br>";
for ($w=0; $w <counting($a); $w++) { 
    echo "". $a[$w]. "&nbsp;";
}
echo"</br> ARRAY 2 &nbsp; &nbsp; </br>";
for ($e=0; $e <counting($b); $e++) { 
    echo "". $b[$e]. "&nbsp;";
}

comon($a, $b);

?>
