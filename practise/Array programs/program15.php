<?php
include 'count.php';

function com_del($a, $b){

  echo '</br> </br> THE COMMON VALUES ARE &nbsp; &nbsp;';

  for ($i=0; $i <counting($a) ; $i++) { 

  for ($x=0; $x <counting($b) ; $x++) { 

      if($a[$i]==$b[$x]){
echo $a[$i] ."&nbsp;";
  } 
 }
}



echo"</br> Arrays after deleting common &nbsp; &nbsp;</br>";
for ($v=0; $v<counting($a); $v++) { 
  
  for ($u=0; $u <counting($b) ; $u++) { 
  if($a[$v] == $b[$u]){
      unset($a[$v]);
   $a[$v] = null;
       } 
     
 }

 echo  $a[$v].'&nbsp;';

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

com_del($a, $b);


