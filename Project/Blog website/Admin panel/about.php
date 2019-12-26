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
    
        $image = $_FILES['img']["name"];  

      
    $target_dir = "../admin/uploads/about/";
$target_file = $target_dir . basename($image);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["img"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                
    $sql= "INSERT INTO about (abtimage,abthead,abttxt) VALUES ('$target_file','$h','$p')";
    $conn->exec($sql); 

        echo "The file ". basename( $image). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }


   }
   header('location: about.php');
  }

  $sqla =("SELECT * FROM about");
  $stmt = $conn->prepare($sqla);
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $about = $stmt->fetchAll();

if(isset($_POST['delete'])){
       
  $id =$_POST['id'];
   $sqls= "DELETE FROM about WHERE id = '$id' ";
  $stmts = $conn->prepare($sqls);
  $stmts->execute();
header("location: about.php");
  
}

if(isset($_POST['update']))
{

    $id = $_POST['myid'];
    $head = $_POST['heads'];
    $para = $_POST['paras'];
  $image = $_FILES['abtimage']["name"];  
 

    date_default_timezone_set("Asia/Karachi");
    $dates = date("Y-m-d");
  
    $target_dir = "../admin/uploads/about/";
$target_file = $target_dir . basename($image);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["abtimage"]["tmp_name"]);


if($image != "" )
{
move_uploaded_file($_FILES["abtimage"]["tmp_name"], $target_file); 
$sql ="UPDATE about set abthead ='$head',abttxt = '$para',abtimage= '$target_file' where abtid= $id";
      $conn->exec($sql);
        echo "The file ". basename( $_FILES["abtimage"]["name"]). " has been uploaded.";
}
else {
  $sql ="UPDATE about set abthead ='$head',abttxt = '$para' where abtid= $id";
  $conn->exec($sql);
}
  

   header('location: about.php');
    
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
      <input type="text" class="form-control" id="head" name="head"  placeholder="Heading">
    </div>
    <div class="form-group col-md-10">
    <textarea class="form-control" name="para" id="para" placeholder="Text" rows="3"></textarea>
    </div>

    <div class="form-group col-md-10">
      <input type="file" name="img" id="img">
    </div>


    <!-- <div class="form-group col-md-10">
      <input type="text" class="form-control" name="author" id="author" placeholder="Blog autor">
    </div>

    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="autorimage" id="authorimage" placeholder="post type">
    </div>

    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="autordetail" id="authordetail" placeholder="post type">
    </div> -->
    <div class="form-group col-md-10">
    <button  name="submit" class="float-right btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>

<div class="ss">
<table class="table">
<h3 class='log'>admin message list</h3>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Heading</th>
      <th scope="col">content</th>
      <th scope="col">Page_about_image</th>
      <th scope="col"></th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($about as $abt) {
echo'    <tr>

 <td>'.$abt['abtid'].' </td>

 <td>'.$abt['abthead'].' </td><td>'.$abt['abttxt'].' </td>
<td> <img src='.$abt['abtimage'].' alt="Smiley face" height="42" width="42"> </td> 
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$abt['abtid'].'">
 edit
</button>
<div class="modal" id="'.$abt['abtid'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ADMIN MESSAGE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="heads" name="heads"  placeholder="Heading" value='.$abt['abthead'].'>
    </div>
    
    <div class="form-group col-md-10">
    <textarea class="form-control" name="paras" id="paras" placeholder="Message" rows="3">'.$abt['abttxt'].' </textarea>
    </div>

    <div class="form-group col-md-10"><img src='.$abt['abtimage'].' alt="Smiley face" height="150" width="auto"> <br/>
      <input type="file" name="abtimage" id="abtimage"> 
    </div>



    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$abt['abtid'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$abt['abtid'].' />
    <button class="btn btn-link" name="delete" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

 
</table>
</div>
</div>
