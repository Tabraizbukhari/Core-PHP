<?php 
include 'count.php';

function Missing($a) 
{ 

   
   $x =counting($a);
   

    $total = ($x + 2) * ($x + 1) / 2;  
   
    for ( $i = 0; $i < $x; $i++) 
   { $total -= $a[$i]; 
   
      }     
      return $total;     
   
   } 
  
// Driver Code 
$a = array(1, 2, 3 ,4, 5,6,7,8,10,11,12); 
echo "The missing number is:". Missing($a); 
  ?> 
