<?php
include 'count.php';

function my($x, $c, $arr){

 
    for ($s=0; $s <counting($arr) ; $s++) { 
         $arr[$s];
        }
$count = counting($arr);

 for ($i = $count; $i >= $x; $i--){ 
     $arr[$i] = $arr[$i - 1]; 
 }
 // insert x at pos 
 $arr[$x - 1] = $c; 

    for ($s=0; $s <counting($arr) ; $s++) { 
 echo $arr[$s] ."&nbsp;";
    }

}

if(isset($_POST['submit'])){

        $a = $_POST['index'];
        $b = $_POST['value'];
    $arr = array(1,2,3,4,5,6);
    if($a!="" && $b!="" ){
    my($a, $b, $arr);
    }
    else{
    echo "empty";
        }
}
?>
<form method='post'>
<input type='number' name='index' placeholder="index">
<input type='number' name='value' placeholder="value">
<button name='submit' >submit</button> 
</form>
