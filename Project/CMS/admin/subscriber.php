<?php include "include/header.php"; ?>

<?php 

if($_SESSION['role'] == 'admin'){
    include "include/navbar.php";
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
}
?>
