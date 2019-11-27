<?php 
$name = array("Tabraiz","Hamad","jawad");

echo "like ". $name[0] ."And". $name[1] . "OR" . $name[2] ."_";

?>

<?php

$ary = array("Mercedes","Doge","Challenger");
$arrylength = count($ary);
for($x = 0; $x < $arrylength; $x++)
{
    echo $ary[$x];
    echo"<br/>";
}
?>

<?php
    $name = array("Tabraiz",1062, true);
    echo "like ". $name[0] ."Number".$name[1]."Boolean".$name[2] ;
    echo "<br/>";
?>

<?php
function mine(){
    $a = 5;
    
for($i = 0; $i < $a; $i++){
    for($x=0; $x <= $i; $x++)
    {
        
        echo "*";
    }
    echo "<br/>";
}
    }
mine();
?>

<?php
$a = 2;
$b = 2;
print $a;
echo $a, 'asdas', $b;
?>
<?php 
$a=20.590;
echo $a;
var_dump($a);

?>