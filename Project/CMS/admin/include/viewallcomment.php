<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>

<?php $name = $_SERVER['PHP_SELF']; ?>

<div class="content-wrapper">

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="col-12">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ALL COMMENTS </div>
        <div class="card-body">
          <div class="table-responsive " >
      
            <table class="table table-bordered table-hover"  >
           
              <thead>
                <tr>
                <th>Comment id</th> 
                <th>Comment name</th>
                <th>Comment subject</th>
                <th>Comment content</th> 
                <th>Comment email</th>
                 <th>Comment status</th>
                 <th>Comment date</th>
                 <th>In Response to</th>
                <th>changed status</th>  
                <th>edit</th>  
                <th>delete</th>  
            </tr>
              </thead>
            <tbody>
         <?php   viewallcomment(); ?>
            </tbody>
              
            </table>
           
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid-->
<?php
    if(isset($_GET['comment_id'])){
     $cid = $_GET['comment_id'];

     $sql= "DELETE FROM comment WHERE comment_id = '$cid' ";
     
     $conn ->exec($sql);
   
   if(isset($_GET['comment_post_id'])){
       $id = $_GET['comment_post_id'];
    $sqlc= "UPDATE blog  Set comment_count= - 1 WHERE blog_id = '$id' ";
    $conn ->exec($sqlc);
    header('location: comment.php');

       
     }
    }
     if(isset($_GET['approve'])){
       $approvid =  $_GET['approve'];
        $post_id =$_GET['blog_id'];
      $sqlc= "UPDATE blog  Set comment_count= comment_count + 1 WHERE blog_id = '$post_id' ";
    $stmtc = $conn->prepare($sqlc);
    $stmtc->execute();
    
  
       $sql= "UPDATE comment  Set comment_status= 'approved' WHERE comment_id = '$approvid' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if(isset($_GET['check'])){
           header("location: comment.php");
    }else{
      header("location: comment.php?comment=$post_id");
    }
     }
    if(isset($_GET['unapprove'])){
        $approvid =  $_GET['unapprove'];
        
        $post_id =$_GET['blog_id'];
        $sqlc= "UPDATE blog  Set comment_count= comment_count - 1 WHERE blog_id = '$post_id' ";
      $stmtc = $conn->prepare($sqlc);
      $stmtc->execute();

      
        $sql= "UPDATE comment  Set comment_status= 'unapproved' WHERE comment_id = '$approvid' ";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     if(isset($_GET['check'])){
      header("location: comment.php");
}else{
 header("location: comment.php?comment=$post_id");
}
     }
     ?> 
<?php include "include/footer.php" ?>
