<?php
include 'count.php';

function com($a, $b, $c){

    echo '</br> </br> THE COMMON VALUES ARE &nbsp; &nbsp;';
    for ($i=0; $i <counting($a) ; $i++) { 
       for ($x=0; $x <counting($b) ; $x++) { 
        for ($y=0; $y<counting($c) ; $y++) { 
           if($a[$i]==$b[$x]){
             if($b[$x]== $c[$y]){
                echo $a[$i] . ", &nbsp;";
             }
            }
           }
        }
       }
        
}
$a = array('a','b','c','d','e','f','g','h','q','r');
$b = array('a','e','o','u','g','h','r','q');
$c = array('o','e','a','q');

echo" ARRAY 1 &nbsp; &nbsp;</br>";
for ($w=0; $w <counting($a); $w++) { 
    echo "". $a[$w]. "&nbsp;";
}
echo"</br> ARRAY 2 &nbsp; &nbsp; </br>";
for ($e=0; $e <counting($b); $e++) { 
    echo "". $b[$e]. "&nbsp;";

}
echo"</br> ARRAY 3 &nbsp; &nbsp; </br>";
for ($l=0; $l <counting($c); $l++) { 
    echo "". $c[$l]. "&nbsp;";

}

com($a, $b, $c);

?>
