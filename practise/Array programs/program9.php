<?php
include 'count.php';

function maxs($arr){
   
for($i = 1;$i < counting($arr); ++$i)
{
   if($arr[0] < $arr[$i]){
       $arr[0] = $arr[$i];
    }
   
}
echo "Maximum value = ". $arr[0]. "</br>";
}
function mini($arr){
for($s = 1;$s > counting($arr); ++$s)
{
   if($arr[1] < $arr[$s]){
       $arr[1] = $arr[$s];
    }
   
}
echo "lowest value = ". $arr[1]. "</br>";
}
$arr = array(3,2,4,444,5,7,22,144,15,20,34,53,55);

echo"total numbers of array &nbsp;";
for ($s=0; $s <counting($arr) ; $s++) { 
echo $arr[$s].', &nbsp;';
    }
echo '</br>';
mini($arr);
maxs($arr);
?>
