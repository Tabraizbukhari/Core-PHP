<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php $name = $_SERVER['PHP_SELF']; ?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php if(isset($name)){ echo basename($name);}?></li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="col-12">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ALL BLOG POST </div>
        <div class="card-body">
          <div class="table-responsive">
          <form method="post">
              <table class="table border">
              <thead>
                <tr>
              
                <th>Name</th> 
                </tr>
              </thead>
            <tbody>
                <td><?php echo $_SESSION['fname']; ?></td>
              
            </tbody>
              
            </table>
              </form>
          </div>
        </div>
      </div>
    </div>
    </div>
 
<?php include "include/footer.php" ?>
