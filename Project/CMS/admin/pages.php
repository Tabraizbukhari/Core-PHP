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
   
         case 'addabout':
            include 'include/addabout.php';
        break;
        case 'editabout':
            include 'include/editabout.php';
        break;
        // case 'editpost':
        //     include 'include/editpost.php';
        // break;
        
     default:
       include 'include/viewallabout.php';
        break;
}
}
?>
