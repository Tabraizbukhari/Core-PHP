<?php
session_start();
if(isset($_SESSION["username"]))  
    {  
        $sessioname = $_SESSION["username"];
    }  
    else  
    {  
        session_destroy();
         header("location: login.php");  
    }  
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myweb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    if(isset($_POST['submit']))
    {
        $h = $_POST['head'];
        $p = $_POST['para'];
        $c = $_POST['blogcategory'];
        date_default_timezone_set("Asia/Karachi");
        $date = date("Y-m-d");
    $image = $_FILES['blogimg']["name"];  

      
    $target_dir = "../admin/uploads/blogs/";
$target_file = $target_dir . basename($image);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["blogimg"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
  
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}

else {
    if (move_uploaded_file($_FILES["blogimg"]["tmp_name"], $target_file)) {
                
    $sql= "INSERT INTO blog (bloghead,blogpara,blogcategory,blog_date_time,Blogauthor,blogimg) VALUES ('$h','$p','$c','$date','$sessioname','$target_file')";
    $conn->exec($sql); 

        echo "The file ". basename( $_FILES["blogimg"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }


   }
   header('location: blog.php');
}

$sqla =("SELECT * FROM blog");
    $stmt = $conn->prepare($sqla);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $blog = $stmt->fetchAll();
    
  

 
    if(isset($_POST['delete'])){
       
        $id =$_POST['id'];
        $sql= "DELETE FROM blog WHERE blogid = '$id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        header("location: blog.php");
        
    }  




    if(isset($_POST['update']))
    {
    
        $id = $_POST['myid'];
        $head = $_POST['heads'];
        $para = $_POST['paras'];
        $cate = $_POST['blogcategory'];
      $image = $_FILES['blogimgs']["name"];  
     

        date_default_timezone_set("Asia/Karachi");
        $dates = date("Y-m-d");
      
        $target_dir = "../admin/uploads/adminmessage/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["blogimgs"]["tmp_name"]);
   

if($image != "" )
{
  move_uploaded_file($_FILES["blogimgs"]["tmp_name"], $target_file); 
  $sql ="UPDATE blog set bloghead ='$head',blogpara = '$para',blog_date_time='$dates',blogimg= '$target_file' where blogid= $id";
          $conn->exec($sql);
            echo "The file ". basename( $_FILES["blogimgs"]["name"]). " has been uploaded.";
}
    else if($cate != "") {
      $sql ="UPDATE blog set bloghead ='$head',blogpara = '$para',blogcategory='$cate',blog_date_time='$dates' where blogid= $id";
          $conn->exec($sql);
    }
    else {
      $sql ="UPDATE blog set bloghead ='$head',blogpara = '$para',blog_date_time='$dates' where blogid= $id";
      $conn->exec($sql);
    }
      
       header('location: blog.php');
        
  }
     
        



}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>


<?php include 'navbar.php'; ?>
        <div class="container">
        <div class="col-md-12">
            <div class="slider">
 <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="head" name="head"  placeholder="Blog Heading">
    </div>
    <div class="form-group col-md-10">
    <textarea class="form-control" name="para" id="para" placeholder="Blog Text" rows="3"></textarea>
    </div>

    <div class="form-group col-md-10">
      <input type="file" name="blogimg" id="blogimg">
    </div>

    <div class="form-group col-md-10">
    <select name="blogcategory"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected >Select category </option>
            <option class="form-control" name="blogcategory">Feature</option>
            <option class="form-control" name="blogcategory">Recently</option>
            <option class="form-control" name="blogcategory">Holiday</option>
        <!--     <option class="form-control" name="blogcategory"> </option> -->
      </select>
    </div>
    <div class="form-group col-md-10">
    <button  name="submit" class="float-right btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>

<div class="ss">
<table class="table">
<h3 class='log'>Blog list</h3>
<h4 class=''>Total number of blogs = <?php echo count($blog); ?></h4>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Heading</th>
      <th scope="col">content</th>
      <th scope="col">Blog image</th>
      <th scope="col">published date</th>
      <th scope="col">category</th>
      <th scope="col">Posted by</th>
      <th scope="col"></th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($blog as $blow) {
echo'    <tr>

 <td>'.$blow['blogid'].' </td>

 <td>'.$blow['bloghead'].' </td><td>'.$blow['blogpara'].' </td>
<td> <img src='.$blow['blogimg'].' alt="Smiley face" height="42" width="42"> </td> 
 <td> '.$blow['blog_date_time'].' </td> 
 <td> '.$blow['blogcategory'].' </td>
 <td> '.$blow['Blogauthor'].' </td>
 <td>

 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$blow['blogid'].'">
 edit
</button>
<div class="modal" id="'.$blow['blogid'].'">
 <div class="modal-dialog">
   <div class="modal-content">

     <!-- Modal Header -->
     <div class="modal-header">
       <h4 class="modal-title">BLOGS EDIT</h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>

     <!-- Modal body -->
     <div class="modal-body">
     <div class="container">
     <div class="col-md-12">
      
         <div class="slider">
         <form method="post" enctype="multipart/form-data">

<div class="form-group col-md-10">
<input type="text" class="form-control" id="head" name="heads"  placeholder="Blog Heading" value="'.$blow['bloghead'].'">
</div>
<div class="form-group col-md-10">
<textarea class="form-control" name="paras" id="paras" placeholder="Blog Text" rows="3">'.$blow['blogpara'].'</textarea>
</div>

<div class="form-group col-md-10">
<img name="bimage" src="'.$blow['blogimg'].'" width="auto" height="100px" ><br>
<input type="file" name="blogimgs" id="blogimgs" value="'.$blow['blogimg'].'">
</div>
<div class="form-group col-md-10">
<select name="blogcategory"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
<option selected >Select category </option>
<option class="form-control" name="blogcategory">Feature</option>
<option class="form-control" name="blogcategory">Recently</option>
<option class="form-control" name="blogcategory">Holiday</option>
<!--     <option class="form-control" name="blogcategory"> </option> -->
</select>
</div>
<div class="form-group col-md-10">
<input name="myid" type="hidden" value="'.$blow['blogid'].'" >
<button  name="update" class="float-right btn btn-primary">update</button>
</div>
</form>

</div>
</div>
     </div>

   </div>
 </div>
</div>

  </td> 
    
  <td><form method="post">
  <input type="hidden" name="id" value='.$blow['blogid'].' />
  <button class="btn-link" name="delete" >delete</button>
  </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>
