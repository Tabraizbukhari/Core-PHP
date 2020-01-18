<?php 

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
        // case 'user_role':
        //     include 'include/user_role.php';
        // break;
        
     default:
       include 'include/viewalluser.php';
        break;
}
?>
