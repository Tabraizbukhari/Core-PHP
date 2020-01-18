<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>

<?php $name = $_SERVER['PHP_SELF']; ?>
<?php delete_cat(); ?>
<?php update_cat(); ?>
<?php

$stmt = $conn->prepare("SELECT * FROM category ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$cate = $stmt->fetchAll(); ?>

<style>
.modal-title{
    color:black;
    }
</style>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php if(isset($name)){ echo $name;}?></li>
      </ol>
     
      <form method="post" enctype="multipart/form-data">
    <div class="row d-flex justify-content-center ">    
      <div class="col-9 " >
      
      
  
 
  <div class="form-group ">
 
    <label for="exampleFormControlFile1">ADD CATEGORY</label></br>
    <?php add_cate(); ?>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title here ..!">
  </div>
  <div class="form-group">
    <button class="btn btn-danger float-right btn-lg" style="margin-top:20px;" name="add_cate" >Submit</button>  
  </div>
 
        </div>   </div> 
         
  </form>
        <div class="row d-flex justify-content-center" style="margin-top:20px;">
        <div class="col-md-9 " style="border-color:black !important;">
        <table class="table table-light table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CATEGORIES</th>
      <th >Edit</th>
      <th >Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php

    
    foreach($cate as $c){
   echo'
   <tr> 
      <th scope="row">'.$c['cat_id'].'</th>
      <td>'.$c['cat_name'].'</td>
      <td><!-- Button trigger modal -->
      <form method="post" enctype="multipart/form-data">
      <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#'.$c['cat_id'].'">
            edit
      </button>
      
      <!-- Modal -->
     <div class="modal fade" id="'.$c['cat_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Categories</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
            <label for="exampleFormControlFile1">UPDATE CATEGORY</label>
            <input type="text" value="'.$c['cat_name'].'" name="update_title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title here ..!">
          </div>
            </div>
            <div class="modal-footer">
            <input name="updateid" type="hidden" value="'.$c['cat_id'].'" >
              <button type="submit" name="update_cat" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      </form></td>

      <td><form method="post">
      <input type="hidden" name="id" value="'.$c['cat_id'].'" />
      <button class="btn btn-link float-right" name="delete" >delete</button>
      </form></td>
      </tr>';
    } ?>
  </tbody>
</table>
        </div>
     
        </div>
 
    </div>
   
<?php include "include/footer.php" ?>
