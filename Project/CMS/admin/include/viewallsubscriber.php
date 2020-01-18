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
                <th>Subscriber id</th> 
                <th>Subscriber name</th>
                <th>edit</th>  
                <th>delete</th>  
            </tr>
              </thead>
            <tbody>
         <?php   viewallsubscriber(); ?>
            </tbody>
              
            </table>
           
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid-->
<?php
    if(isset($_GET['subid'])){
        $subid = $_GET['subid'];
        $sql= "DELETE FROM newsletter WHERE id = '$subid' ";
        $conn ->exec($sql);
    
    header('location: subscribe.php');
     
    }


     ?> 
<?php include "include/footer.php" ?>
