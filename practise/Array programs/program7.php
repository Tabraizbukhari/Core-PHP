<?php 
include 'count.php';

function my( $a, $arr){
    echo'my arry';
    for ($i=0; $i < counting($arr); $i++) {
        echo''.  $arr[$i].'&nbsp;';
       }
       echo "</br>";
 
       for ($i=0; $i<$a ; $i++) { 
        for ($s=0; $s <counting($arr); $s++) { 
         
          echo "" . $arr[$s]."&nbsp;" ;
      }
      echo"</br>";
       }
          
}

if(isset($_POST['submit'])){
$a = $_POST['num1'];
$arr = array(1,2,3,4,5,6,7,8,9,10);
my($a, $arr);
}
 ?>
 <form method="post">
 <Lable>Iterating array</lable>
 <input type="number" placeholder="Enter the number iterating array"  name="num1">
 <button name="submit" > sumbit </button>
 </form> 

