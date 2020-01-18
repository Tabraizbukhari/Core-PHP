<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php
  if(isset($_GET['blog_id']))
  {
  $id = $_GET['blog_id'];
  $stmt = $conn->prepare("SELECT * FROM blog WHERE blog_id = '$id' ");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $blog = $stmt->fetchAll(); 
  }
?>
<?php updatepost(); ?>

<?php $name = $_SERVER['PHP_SELF']; ?>


<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php if(isset($name)){ echo $name;}?></li>
      </ol>
  <?php foreach ($blog as $bs ) {
 
        
echo'    

      <form method="post" enctype="multipart/form-data">
    <div class="row d-flex justify-content-center">    
      <div class="col-9" >
  
  <div class="form-group">
    <input type="text" name="title" value="'.$bs['head'].'" class="form-control" id="exampleFormControlInput1" placeholder="Enter title here ..!">
  </div>
 
  <div class="form-group">
  <div class="img-responsive">
    <img src="'.$bs['blog_img'].'" alt="notfound" width ="200px;" height="100px;" class="img-thumbnail">
    <input type="file" name="blog_img" class="form-control-file" id="exampleFormControlFile1">
    </div>
 </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Blog content</label>
    <textarea name="content" class="form-control" id="body" rows="5">'.$bs['content'].'</textarea>
  </div>
  <div class="form-group">
    <input type="text" value="'.$bs['tags'].'" name="tags" class="form-control" id="exampleFormControlFile1" placeholder="Blog Tags">
  </div>
  <div class="form-group">
  <label for="exampleFormControlSelect1">Change status here !</label>
  <select name="status" class="form-control" id="exampleFormControlSelect2">
  '; if($bs['post_status'] == "published"){
    echo'
    <option value="published" >'.$bs['post_status'].'</option>
    <option value="draft" >draft</option>';
  }else{echo'
    <option value="draft" >'.$bs['post_status'].'</option>
    <option value="published" >published</option>
  ';}
  echo'
  </select>
      </div>
  <div class="form-group">
    <button type="submit" name="update" class="btn btn-danger float-right btn-lg" style="margin-top:20px;" name="add_post" >Submit</button>  
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
        <h5 style="color:grey;">Selected Category is <span style="color:Blue;">'.$bs['category_id'].'</span> </h2>
        <input type="hidden" name="selected_cat" value="'.$bs['category_id'].'">
        <label for="exampleFormControlSelect1">SELECT MULTIPLE CATEGORIES</label>
        <select name="categor" class="form-control" id="exampleFormControlSelect2">
        <option value="">Select Categories</option>
        ';
        category_select();
        echo'
        </select>
        </div>
        </div>

            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <input type="file" name="feature_img" >
            <div class="img-responsive">
            <img src="'.$bs['feature_img'].'" width ="200px;" height="100px;" alt="notfound" class="img-thumbnail">
            </div>
            </div>

                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Name</label>
                    <input type="text" name="aname" value="'.$bs['author_name'].'" class="form-control" id="exampleFormControlInput1" placeholder="Enter title here ..!">
                </div>
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea name="amsg" class="form-control" id="exampleFormControlTextarea1" rows="5">'.$bs['author_msg'].'</textarea>
                            </div>
                        <div class="form-group">
                        <div class="img-responsive">
                        <input type="file" name="author_img" class="form-control-file" id="exampleFormControlFile1">
                        <img src="'.$bs['author_img'].'" alt="notfound" width ="200px;" height="100px;" class="img-thumbnail">
                        
                        </div>
                        </div>
                    </div>

    </div>


    </div>
</form>

';} ?>
    </div>
   
<?php include "include/footer.php" ?>
