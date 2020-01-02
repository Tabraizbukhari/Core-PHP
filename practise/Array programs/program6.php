<?php
include 'count.php';

function arr_delete($a, $arr){

for ($i=0; $i < counting($arr); $i++) {
    if($a ==$arr[$i] ){
        unset($arr[$i]);
        $arr[$i] = NULL;
    }
   echo "" . $arr[$i]."&nbsp; ";
  
   }
}
if(isset($_POST['submit'])){
    $a= $_POST['num1'];
 $arr = array(1,2,3,4,5,6,7,8,9,10);

    arr_delete($a, $arr);
 }
 ?>
 <form method="post">
 <input type="number"  name="num1">
 <button name="submit" > Submit </button>
 </form>

