<?php 
include 'count.php';

function largest($arr) 
{ 
    $large= counting($arr);
   $largest=counting($arr);
    for($i=0;$i<counting($arr);$i++)
    {
        if($largest<$arr[$i])
        {
            $large= $largest;
            $largest=$arr[$i];
    
        }
        
    else if($large<$arr[$i] && $arr[$i]!=$largest)
    {  
         $large=$arr[$i];
    }
}
    
     
       echo "second largest value &nbsp;" . $large; 
} 
   

$arr = array(32,1,5,34,33,35);

echo"total numbers of array &nbsp;";
for ($s=0; $s <counting($arr) ; $s++) { 
echo $arr[$s].', &nbsp;';
    }
echo '</br>';

largest($arr);

?> 
