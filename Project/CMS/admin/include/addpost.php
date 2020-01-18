<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>

<?php $name = $_SERVER['PHP_SELF']; ?>
<?php addpost(); ?>
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
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title here ..!">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlFile1">BLOG IMAGE</label>
    <input type="file" name="blog_img" class="form-control-file" id="exampleFormControlFile1">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Blog content</label>
    <textarea name="content" class="form-control" id="body" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <input type="text" name="tags" class="form-control" id="exampleFormControlFile1" placeholder="Blog Tags">
  </div>
  <div class="form-group">
  <div class="form-group">
        <label for="exampleFormControlSelect1">What you want to do?</label>
        <select required name="status" class="form-control" id="exampleFormControlSelect2">
        <option value="" >Select any one</option>
        <option value="published" >published</option>
        <option value="draft" >draft</option>
        </select>
        </div>
    
  </div>
  <div class="form-group">
    <button name="addpost" class="btn btn-danger float-right btn-lg" style="margin-top:20px;" name="add_post" >Submit</button>  
  </div>
  
        </div> 
        <div class="col-md-3 border border-right-0 border-top-0 border-bottom-0" style="border-color:black !important;">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="btn nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Categories</a>
  <a class=" btn nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Feature Image</a>
  <a class="nav-link btn" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Author Details</a>
  
</div>
<div class="tab-content" id="v-pills-tabContent" style="margin-top:20px;">
       
<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="form-group">
        <label for="exampleFormControlSelect1">SELECT MULTIPLE CATEGORIES</label>
        <select required name="categor" class="form-control" id="exampleFormControlSelect2">
        <option value="" >Select Category</option>
  
      <?php  category_select();
       ?>
        </select>
        </div>
        </div>

            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <input type="file" name="feature_img" >
            <div class="img-responsive">
            </div>
            </div>

                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Name</label>
                    <input type="text"  name="aname"  class="form-control" value="<?php echo $userfirstname ?>" id="exampleFormControlInput1" placeholder="Enter username here ..!">
                </div>
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea name="amsg" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                        <div class="form-group">
                        <div class="img-responsive">
                        <input type="file" name="author_img"  class="form-control-file" id="exampleFormControlFile1">
                        <input type="hidden" name="a_img" value="<?php echo $userimage; ?>" >
                        <img src="<?php echo $userimage; ?>"  height="200px" width="200px" class="fluid-img">
                      </div>
                        </div>
                    </div>

    </div>
     
        
  </div>
</form>

    </div>
   
<?php include "include/footer.php" ?>
