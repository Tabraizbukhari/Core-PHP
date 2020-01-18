<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php 
if(isset($_GET['abt_id'])){
   $abid = $_GET['abt_id'];

$stmt = $conn->prepare("SELECT * FROM about WHERE abt_id='$abid' ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$about = $stmt->fetch(); 

if(isset($_POST['update'])){
        $head = $_POST['head'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $abtimg  = $_FILES['abt_img']['name'];
        $abttmp  = $_FILES['abt_img']['tmp_name'];
        $tag = $_POST['tags'];
        $date = date("d/M/Y");
        $target_dir = "../web/img/";
        $abt_tar = $target_dir . basename($abtimg);
        move_uploaded_file(  $abttmp , $abt_tar);
    
    if($abtimg!=""){
      
    $sql = "UPDATE about SET abt_head='$head',abt_tag='$tag',abt_content='$content',abt_img='$abt_tar',abt_img_title='$title',abt_date='$date' WHERE abt_id='$abid' ";
     $conn ->exec($sql);
     header("location: pages.php?source=editabout&abt_id=$abid");
     }
     else{
        $sql = "UPDATE about SET abt_head='$head',abt_tag='$tag',abt_content='$content',abt_img_title='$title',abt_date='$date' WHERE abt_id='$abid' ";
     $conn ->exec($sql);
     header("location: pages.php?source=editabout&abt_id=$abid"); 
     }
}

}
?>
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
    <input type="text" name="head" class="form-control" id="exampleFormControlInput1" value="<?php echo $about['abt_head']; ?>" placeholder="Enter about Heading ..!">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlFile1">About IMAGE</label>
    <input type="text" name="title" class="form-control" value="<?php echo $about['abt_img_title']; ?>" id="exampleFormControlInput1" placeholder="Image Title..!">
    <input type="file" name="abt_img" class="form-control-file" id="exampleFormControlFile1">
    <img src="<?php echo $about['abt_img']; ?>" width="100px" height="100px" >
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">About content</label>
    <textarea name="content" class="form-control" id="body" id="exampleFormControlTextarea1" rows="3"><?php echo $about['abt_content']; ?></textarea>
  </div>
  <div class="form-group">
    <input type="text" name="tags" class="form-control" value="<?php echo $about['abt_tag']; ?>" id="exampleFormControlFile1" placeholder="Blog Tags">
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
    <button name="update" class="btn btn-danger float-right btn-lg" style="margin-top:20px;" name="add_post" >Submit</button>  
  </div>
  
        </div> 
        
    </div>
     
        
  </div>
</form>

    </div>
   
<?php include "include/footer.php" ?>
