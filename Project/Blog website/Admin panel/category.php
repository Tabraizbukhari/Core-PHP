
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
    if(isset($_POST["insert"])) {
    
        $h = $_POST['head'];
        $cname = $_POST['name'];
        $clink = $_POST['link'];     
    
     
        $image = $_FILES['fileToUpload']["name"];  

      
        $target_dir = "../admin/uploads/slider";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($image != "" )
        {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          $sql= "INSERT INTO category (head, categories_name, pagelink, cate_img) VALUES ('$h','$cname','$clink','$target_file')";
          $conn->exec($sql);
      
        } else {
          $sql= "INSERT INTO category (head, categories_name, pagelink) VALUES ('$h','$cname','$clink')";
          $conn->exec($sql);
        }
        header("location: category.php");
    
    }
 
    
  
    
   

       

        
            $sqla =("SELECT * FROM category");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $category = $stmt->fetchAll();

            $sqla =("SELECT * FROM category ORDER BY id DESC limit 1");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $catgo = $stmt->fetch();
    
   if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM category WHERE id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: category.php");
   }

   if(isset($_POST['update']))
   {
   
       $id = $_POST['myid'];
       $head = $_POST['head'];
       $name = $_POST['name'];
       $link = $_POST['link'];
     $image = $_FILES['backimgs']["name"];  
    

       date_default_timezone_set("Asia/Karachi");
       $dates = date("Y-m-d");
     
       $target_dir = "../admin/uploads/icon/";
   $target_file = $target_dir . basename($image);
   $uploadOk = 1;
   
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   $check = getimagesize($_FILES["backimgs"]["tmp_name"]);
  

if($image != "" )
{
 move_uploaded_file($_FILES["backimgs"]["tmp_name"], $target_file); 
 $sql ="UPDATE category set head='$head',categories_name='$name',pagelink='$link',cate_img= '$target_file' where id= $id";
         $conn->exec($sql);
         
}
else {
    $sql ="UPDATE category set head ='$head',categories_name = '$name',pagelink= '$link' where id= $id";
         $conn->exec($sql);
}
     

      header('location: category.php');
       
 }
    
       

    


}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>


<?php include 'navbar.php'; ?>


  <div class="container">
        <div class="col-md-12">
        <h3 class='log' style="text-align:center;">Page information</h3>
            <div class="slider">
        <form method="post" enctype="multipart/form-data">
        <div class="form-group col-md-10">
   <label>Section name:</label> </div>
        <div class="form-group col-md-10">
       <input type="text" class="form-control"  name="head" value="<?php echo $catgo['head']; ?>"  placeholder="Section heading"> 
    
   
      

    </div>
    
    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="name"  placeholder="Category name">
    </div>
    <div class="form-group col-md-10">
      <input type="url" class="form-control" name="link" placeholder="Page link">
    </div>
    <div class="form-group col-md-10">
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>


    <div class="form-group col-md-10">
    <button  name="insert" class="float-right btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>


<div class="ss">
  <table class="table">
<h3 class="log">Page information list</h3>
   <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category name</th>
      <th scope="col">Page link</th>
      <th scope="col">Category Image</th>
    </tr>
  </thead>
 <?php foreach ($category as $s) {
echo'  <tbody>  
  <tr>

 <td>'.$s['id'].' </td>

 <td>'.$s['categories_name'].' </td><td>'.$s['pagelink'].' </td><td>  <img src="'.$s['cate_img'].' " height="40px" width="auto" ></td>

 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$s['id'].'">
 edit
</button>
<div class="modal" id="'.$s['id'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">'.$s['head'].'</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">
        <div class="form-group col-md-10">
        <input type="text" class="form-control"  name="head"  placeholder="Heading" value="'.$s['head'].'">
      </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="name"  placeholder="page address" value="'.$s['categories_name'].'">
    </div>
    <div class="form-group col-md-10">
   <input type="text" class="form-control"  name="link"  placeholder="Page link" value="'.$s['pagelink'].'">
    </div>
    <div class="form-group col-md-10"><img src="'.$s['cate_img'].'" alt="Smiley face" height="150" width="auto"> <br/>
    <input type="file" name="backimgs" id="backimgs"> 
  </div>
 
    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$s['id'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value="'.$s['id'].'" />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>

 
      </tr>
  </tbody>';}?>
</table>
</div>

//footer section 3
