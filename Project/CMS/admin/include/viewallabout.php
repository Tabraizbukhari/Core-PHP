
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
                <th>Head</th> 
                <th>Content</th>
                <th>About image</th>
                <th>Image title</th>
                <th>Tags</th>
                <th>Date</th>
             
                <th>Edit</th>
                <th>Delete</th>
               
                </tr>
              </thead>
            <tbody>
         <?php   viewallabout(); ?>
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
    if(isset($_GET['abt_id'])){
     $id = $_GET['abt_id'];

     $sql= "DELETE FROM about WHERE abt_id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('location: pages.php');
      
     }

  
     ?> 
<?php include "include/footer.php" ?>
