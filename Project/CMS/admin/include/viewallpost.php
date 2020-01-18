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
          <i class="fa fa-table"></i> ALL BLOG POST </div>
        <div class="card-body">
          <div class="table-responsive">
          <form method="post">

          
<?php 
if(isset($_POST['checkboxarray'])){
    foreach ($_POST['checkboxarray'] as $checkid) {
      $bulkoption = $_POST['bulkoption'];
      switch ($bulkoption) {
        case 'published':
          $sql= "UPDATE blog  Set post_status= '$bulkoption' WHERE blog_id = '$checkid' ";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          break;
          case 'draft':
            $sql= "UPDATE blog  Set post_status= '$bulkoption' WHERE blog_id = '$checkid' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            break;
            case 'delete':  
              $sql= "DELETE FROM blog WHERE blog_id = '$checkid' ";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              break;
        
        default:
          # code...
          break;
      }
    }
}

?>
            <table class="table table-bordered table-hover"  >
             
                 <div id="bulkOptionsContainer form-control"   >
              <select name="bulkoption" id="" classc="col-xs-12">
                <option value="">Select Options</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="delete">delete</option>
              </select>
              <button class="btn btn-success form-group" >Apply</button>
              <a href="post.php?source=addpost" class="btn btn-sm btn-danger form-group float-right">ADD NEW</a>
                    
                  </div>
                  
              <thead>
                <tr>
                <th><input id="selectcheckbox" type="checkbox" ></th> 
                <th>ID</th> 
                <th>Title</th> 
                <th>Content</th>
                <th>Blog image</th>
                <th>Feature image</th>
                <th>Author</th>
                <th>Author image</th>
                <th>Author message</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Comment Count</th>
                <th>Views Count</th>
                <th>Status</th>
                <th>Date</th>
                <th>view post</th>
                <th>Change status</th>
                <th>Edit</th>
                <th>Delete</th>
               
                </tr>
              </thead>
            <tbody>
         <?php   allpost(); ?>
            </tbody>
              
            </table>
              </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid-->
<?php
    if(isset($_GET['blog_id'])){
     $blogid = $_GET['blog_id'];

     $sql= "DELETE FROM blog WHERE blog_id = '$blogid' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('location: post.php');
      
     }

     if(isset($_GET['publish'])){
      $publish =  $_GET['publish'];
      
      $sql= "UPDATE blog  Set post_status= 'published' WHERE blog_id = '$publish' ";
   $stmt = $conn->prepare($sql);
   $stmt->execute();





   header('location: post.php');
    
   }

   if(isset($_GET['draft'])){
       $draft =  $_GET['draft'];
       
       $sql= "UPDATE blog  Set post_status= 'draft' WHERE blog_id = '$draft' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('location: post.php');
     
    }
     ?> 
<?php include "include/footer.php" ?>
