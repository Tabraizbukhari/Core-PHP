<?php 

if(isset($_GET['source'])){

    $source =$_GET['source'];

}else{
    $source ="";
}

switch ($source) {
   
     default:
       include 'include/viewallsubscriber.php';
        break;
}
?>
