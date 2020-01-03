
<?php 
function arrs($a, $arr){
   
    foreach ($arr as $arry ) {
        if($arry == $a){
            echo "Arrays Found &nbsp;" .$arry;
        }
    }


}


if(isset($_POST['submit'])){
   $a= $_POST['num1'];
   $arr = array(1,2,4,5,6,7,8,9,10);
   arrs($a, $arr);
   echo '</br> my arrays &nbsp;';
   foreach ($arr as $ar) {
    echo "&nbsp". $ar;
}

}
?>
<form method="post">
<input type="number"  name="num1">
<button name="submit" > Submit </button>
</form>
