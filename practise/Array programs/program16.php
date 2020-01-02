<?php 
include 'count.php';

function largest($arr) 
{ 
    $large=$largest=counting($arr);
     
    for($i=1;$i <counting($arr); $i++)
    {
        if($large <$arr[$i])
    {
       $largest=$large;
        $large=$arr[$i];
    }
   
}
    
     
       echo "second largest value &nbsp;" . $largest; 
   
} 


function Smallest($arr) 
{ 
    $small=$s_small=counting($arr);
     
    for($i=1;$i<counting($arr);$i++)
    {
        if($small>$arr[$i])
    {
       $s_small=$small;
        $small=$arr[$i];
    }
    else if($s_small>$arr[$i] && $arr[$i]!=$small)
    {
        $s_small=$arr[$i];
    }
}
    
     
       echo "second Smallest value &nbsp;" . $s_small; 
} 
   

$arr = array(35,1,5,3,24,76,34,67,4);

echo"total numbers of array &nbsp;";
for ($s=0; $s <counting($arr) ; $s++) { 
echo $arr[$s].', &nbsp;';
    }
echo '</br>';


Smallest($arr);  echo "</br>";
largest($arr);

?> 
