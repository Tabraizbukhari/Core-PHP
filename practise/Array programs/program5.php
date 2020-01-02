<?php 
include 'count.php';

function index($a, $arr){
   for ($i=0; $i < counting($arr); $i++) {
      if($i == $a){
         echo "Array index match &nbsp;" .$i;
        
     }
     }
}
if(isset($_POST['submit'])){
   $a= $_POST['num1'];
$arr = array(1,2,4,5,6,7,8,9,10);

   index($a,$arr);

}
?>
<form method="post">
<input type="number"  name="num1">
<button name="submit" > Submit </button>
</form>
