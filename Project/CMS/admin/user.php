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
   
         case 'adduser':
            include 'include/adduser.php';
        break;
    
        case 'edituser':
            include 'include/edituser.php';
        break;

        case 'onlineuser':
            include 'include/onlineuser.php';
        break;

        case 'forgotpassword':
            include 'include/forgotpassword.php';
        break;
        case 'reset':
            include 'include/reset.php';
        break;
        // case 'user_role':
        //     include 'include/user_role.php';
        // break;
        
     default:
       include 'include/viewalluser.php';
        break;
}
}else{
    header('location: index.php');
   
}
?>
