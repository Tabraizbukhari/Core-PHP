<?php 

if(isset($_GET['source'])){

    $source =$_GET['source'];

}else{
    $source ="";
}

switch ($source) {
   
        //  case 'updateprofile':
        //     include 'include/updateprofile.php';
        // break;
        // // case 'user_role':
        // //     include 'include/user_role.php';
        // // break;
        
     default:
       include 'include/updateprofile.php';
        break;
}
?>
