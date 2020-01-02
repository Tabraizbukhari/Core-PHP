<?php 
include 'count.php';

function arrs($a, $arr){
   
    for ($i=0; $i < counting($arr); $i++) {
        if($arr[$i] == $a){
           echo "Array found &nbsp;" .$arr[$i];
       }
}
}
if(isset($_POST['submit'])){
   $a= $_POST['num1'];
   $arr = array(1,2,4,5,6,7,8,9,10);
   arrs($a, $arr);
}

?>
<form method="post">
<input type="number"  name="num1">
<button name="submit" > Submit </button>
</form>
