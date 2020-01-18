<?php 

if(isset($_GET['source'])){

    $source =$_GET['source'];

}else{
    $source ="";
}

switch ($source) {
   
        //  case 'comment_id':
        //     include 'include/comment.php';
        // break;
        // case 'category':
        //     include 'include/category.php';
        // break;
        // case 'editpost':
        //     include 'include/editpost.php';
        // break;
        
     default:
       include 'include/viewallcomment.php';
        break;
}
?>
