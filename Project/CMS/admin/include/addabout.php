
<?php addabout(); ?>
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
      
      <form method="post" enctype="multipart/form-data">
    <div class="row d-flex justify-content-center">    
      <div class="col-9" >
  
  <div class="form-group">
    <input type="text" name="head" class="form-control" id="exampleFormControlInput1" placeholder="Enter about Heading ..!">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlFile1">About IMAGE</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Image Title..!">
    <input type="file" name="abt_img" class="form-control-file" id="exampleFormControlFile1">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">About content</label>
    <textarea name="content" class="form-control" id="body" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <input type="text" name="tags" class="form-control" id="exampleFormControlFile1" placeholder="Blog Tags">
  </div>
  <div class="form-group">
  <!-- <div class="form-group">
        <label for="exampleFormControlSelect1">What you want to do?</label>
        <select required name="status" class="form-control" id="exampleFormControlSelect2">
        <option value="" >Select any one</option>
        <option value="published" >published</option>
        <option value="draft" >draft</option>
        </select>
        </div>
    
  </div> -->
  <div class="form-group">
    <button name="addabout" class="btn btn-danger float-right btn-lg" style="margin-top:20px;" name="add_post" >Submit</button>  
  </div>
  
        </div> 
        
    </div>
     
        
  </div>
</form>

    </div>
   
<?php include "include/footer.php" ?>
