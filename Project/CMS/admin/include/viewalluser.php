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
          <div class="table-responsive">

          
          <?php 
if(isset($_POST['checkboxarray'])){
    foreach ($_POST['checkboxarray'] as $checkid) {
      $bulkoption = $_POST['bulkoption'];
      switch ($bulkoption) {
        case 'admin':
          $sql= "UPDATE users  Set user_role= '$bulkoption' WHERE user_id = '$checkid' ";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          break;
          case 'blogposter':
            $sql= "UPDATE users  Set user_role= '$bulkoption' WHERE user_id = '$checkid' "; $stmt = $conn->prepare($sql);
            $stmt->execute();
            break;
          
        default:
          # code...
          break;
      }
    }
}

?>

              <form method="post">
            <table class="table table-bordered table-hover" >
            <div id="bulkOptionsContainer form-control" >
              <label>Change user role here:</label>
              <select name="bulkoption" id="" classc="col-xs-12">
                <option value="">Select User-role</option>
                <option value="admin">Admin</option>
                <option value="blogposter">Blog_Poster</option>
              </select>
              <button class="btn btn-success form-group">Apply</button>
              <a href="user.php?source=adduser" class="btn btn-sm btn-danger form-group float-right">ADD NEW</a>
                    
                  </div>
              <thead>
                <tr>
                <th><input id="selectcheckbox" type="checkbox" ></th> 
                <th>user id</th> 
                <th>First name</th>
                <th>last name </th>
                <th>Email</th> 
                <th>Age</th>
                 <th>Password</th>
                 <th>Role</th>
                 <th>Date</th>
                <th>Status</th>
                <th>Images</th>   
            </tr>
              </thead>
            <tbody>
         <?php   viewallusers(); ?>
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
    if(isset($_GET['user_id'])){
     $cid = $_GET['user_id'];

     $sql= "DELETE FROM users WHERE user_id = '$cid' ";
     $conn ->exec($sql);
     header('location: user.php');
     }
    
     if(isset($_GET['active'])){
       $active =  $_GET['active'];
       
       $sql= "UPDATE users  Set user_status= 'active' WHERE user_id = '$active' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();





    header('location: user.php');
     
    }

    if(isset($_GET['unactive'])){
        $activeu =  $_GET['unactive'];
        
        $sql= "UPDATE users  Set user_status= 'unactive' WHERE user_id = '$activeu' ";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     header('location: user.php');
      
     }
     ?> 
<?php include "include/footer.php" ?>
