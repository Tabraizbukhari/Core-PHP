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
      $bulkoption = $_POST['delete'];
      switch ($bulkoption) {
     
            case 'delete':  
              $sql= "DELETE FROM contact WHERE id = '$checkid' ";
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
             <form method="post">
                 <div id="bulkOptionsContainer form-control"   >
             <input class="form-group" type="checkbox" name="delete" id="selectcheckbox" value="delete" > <label>Check for delete all</label>
              <button class="btn btn-success form-group" >Delete All</button>
                    
                  </div>
                  </form>
              <thead>
                <tr>
                <!-- <th><input id="selectcheckbox" type="checkbox" ></th>  -->
                <th></th> 
                <th>ID</th> 
                <th>Name</th> 
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
               
                </tr>
              </thead>
            <tbody>
         <?php   viewallcontact(); ?>
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
    if(isset($_GET['contact'])){
     $blogid = $_GET['contact'];

     $sql= "DELETE FROM contact WHERE id = '$blogid' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('location: contact.php');
      
     }
     
    
        
   
     ?> 
<?php include "include/footer.php" ?>
