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
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    
    // $sql = "CREATE TABLE slider(
    //     id int primary key AUTO_INCREMENT,
    //     sliderimage nvarchar(500),
    //     shead nvarchar(100),
    //     scategory nvarchar(50),
    //     stext nvarchar(50)
    //     )";
    //     $conn->exec($sql);
   
    
    if(isset($_POST["submit"])) {
    $head = $_POST['head'];
    $image = $_FILES['fileToUpload']["name"];  

      
    $target_dir = "../admin/uploads/background";
$target_file = $target_dir . basename($image);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql= "INSERT INTO articalpage (head , background) VALUES ('$head','$target_file')";
        $conn->exec($sql); 
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
   
}

header("location: artical.php");
}        
            $sqla =("SELECT * FROM articalpage");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $artical = $stmt->fetchAll();

    
   if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM articalpage WHERE arid = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: artical.php");
   }

   
   if(isset($_POST['update']))
   {
   
       $id = $_POST['myid'];
       $head = $_POST['heads'];
     $image = $_FILES['backimgs']["name"];  
    $target_dir = "../admin/uploads/background/";
   $target_file = $target_dir . basename($image);
   $uploadOk = 1;
   
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   $check = getimagesize($_FILES["backimgs"]["tmp_name"]);
   
  if($image != ""){
    move_uploaded_file($_FILES["backimgs"]["tmp_name"], $target_file);
 $sql ="UPDATE articalpage set head ='$head',background= '$target_file' where arid= $id";
         $conn->exec($sql);
           echo "The file ". basename( $_FILES["backimgs"]["name"]). " has been uploaded."; 
}else{
  $sql ="UPDATE articalpage set head ='$head' where arid= $id";
         $conn->exec($sql);
}
      header('location: artical.php');
       
 }

    


 
 if(isset($_POST["single"])) {
  $head = $_POST['head'];
  $image = $_FILES['fileToUploaded']["name"];  

    
  $target_dir = "../admin/uploads/background";
$target_file = $target_dir . basename($image);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileToUploaded"]["tmp_name"]);
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
  if (move_uploaded_file($_FILES["fileToUploaded"]["tmp_name"], $target_file)) {
      $sql= "INSERT INTO singlepage (head , backimg) VALUES ('$head','$target_file')";
      $conn->exec($sql); 
      echo "The file ". basename( $_FILES["fileToUploaded"]["name"]). " has been uploaded.";
  } else {
      echo "Sorry, there was an error uploading your file.";
  }
 
}

header("location: artical.php");
}        
          $sqlss =("SELECT * FROM singlepage");
          $stmts = $conn->prepare($sqlss);
          $stmts->execute();

          $result = $stmts->setFetchMode(PDO::FETCH_ASSOC);
          $singlepage = $stmts->fetchAll();

  
 if(isset($_POST['deleted'])){
  $id =$_POST['id'];
  $sql= "DELETE FROM singlepage WHERE id = '$id' ";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  header("location: artical.php");
 }

 
 if(isset($_POST['updated']))
 {
 
     $id = $_POST['myid'];
     $head = $_POST['heads'];
   $image = $_FILES['backimg']["name"];  
  $target_dir = "../admin/uploads/background/";
 $target_file = $target_dir . basename($image);
 $uploadOk = 1;
 
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 $check = getimagesize($_FILES["backimg"]["tmp_name"]);
 
if($image != ""){
  move_uploaded_file($_FILES["backimg"]["tmp_name"], $target_file);
$sql ="UPDATE singlepage set head ='$head',backimg= '$target_file' where id= $id";
       $conn->exec($sql);
         echo "The file ". basename( $_FILES["backimg"]["name"]). " has been uploaded."; 
}else{
$sql ="UPDATE singlepage set head ='$head' where id= $id";
       $conn->exec($sql);
}
    header('location: artical.php');
     
}
       
///about

 
if(isset($_POST["about"])) {
  $head = $_POST['head'];
  $image = $_FILES['fileToUploaded']["name"];  

    
  $target_dir = "../admin/uploads/background";
$target_file = $target_dir . basename($image);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileToUploaded"]["tmp_name"]);
  if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
}

else {
  if (move_uploaded_file($_FILES["fileToUploaded"]["tmp_name"], $target_file)) {
      $sql= "INSERT INTO aboutus (head , backimg) VALUES ('$head','$target_file')";
      $conn->exec($sql); 
      echo "The file ". basename( $_FILES["fileToUploaded"]["name"]). " has been uploaded.";
  } else {
      echo "Sorry, there was an error uploading your file.";
  }
 
}

header("location: artical.php");
}        
          $sqlaaa =("SELECT * FROM aboutus");
          $stmta = $conn->prepare($sqlaaa);
          $stmta->execute();

          $result = $stmta->setFetchMode(PDO::FETCH_ASSOC);
          $about = $stmta->fetchAll();

  
 if(isset($_POST['deletes'])){
  $id =$_POST['id'];
  $sql= "DELETE FROM aboutus WHERE id = '$id' ";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  header("location: artical.php");
 }

 
 if(isset($_POST['updates']))
 {
 
     $id = $_POST['myid'];
     $head = $_POST['heads'];
   $image = $_FILES['backimg']["name"];  
  $target_dir = "../admin/uploads/background/";
 $target_file = $target_dir . basename($image);
 $uploadOk = 1;
 
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 $check = getimagesize($_FILES["backimg"]["tmp_name"]);
 
if($image != ""){
  move_uploaded_file($_FILES["backimg"]["tmp_name"], $target_file);
$sql ="UPDATE aboutus set head ='$head',backimg= '$target_file' where id= $id";
       $conn->exec($sql);
         echo "The file ". basename( $_FILES["backimg"]["name"]). " has been uploaded."; 
}else{
$sql ="UPDATE aboutus set head ='$head' where id= $id";
       $conn->exec($sql);
}
    header('location: artical.php');
     
}

    
// contact

if(isset($_POST["contact"])) {
  $head = $_POST['head'];
  $image = $_FILES['fileToUploaded']["name"];  

    
  $target_dir = "../admin/uploads/background";
$target_file = $target_dir . basename($image);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileToUploaded"]["tmp_name"]);
  if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
}

else {
  if (move_uploaded_file($_FILES["fileToUploaded"]["tmp_name"], $target_file)) {
      $sql= "INSERT INTO contactpage (head , back_img) VALUES ('$head','$target_file')";
      $conn->exec($sql); 
      echo "The file ". basename( $_FILES["fileToUploaded"]["name"]). " has been uploaded.";
  } else {
      echo "Sorry, there was an error uploading your file.";
  }
 
}

header("location: artical.php");
}        
          $sqlaaa =("SELECT * FROM contactpage");
          $stmta = $conn->prepare($sqlaaa);
          $stmta->execute();

          $result = $stmta->setFetchMode(PDO::FETCH_ASSOC);
          $contact = $stmta->fetchAll();

  
 if(isset($_POST['deletecontact'])){
  $id =$_POST['id'];
  $sql= "DELETE FROM contactpage WHERE id = '$id' ";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  
  header("location: artical.php");
 }

 
 if(isset($_POST['updatecontact']))
 {
 
     $id = $_POST['myid'];
     $head = $_POST['heads'];
   $image = $_FILES['backimg']["name"];  
  $target_dir = "../admin/uploads/background/";
 $target_file = $target_dir . basename($image);
 $uploadOk = 1;
 
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 $check = getimagesize($_FILES["backimg"]["tmp_name"]);
 
if($image != ""){
  move_uploaded_file($_FILES["backimg"]["tmp_name"], $target_file);
$sql ="UPDATE contactpage set head ='$head',back_img= '$target_file' where id= $id";
       $conn->exec($sql);
         echo "The file ". basename( $_FILES["backimg"]["name"]). " has been uploaded."; 
}else{
$sql ="UPDATE contactpage set head ='$head' where id= $id";
       $conn->exec($sql);
}
    header('location: artical.php');
     
}


}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>


<?php include 'navbar.php'; ?>


  <div class="container">
        <div class="col-md-12">
            <div class="slider">
            <h3 style=" text-align: center;">Multiple Page Articals</h3>

        <form method="post" enctype="multipart/form-data">
<div class="form-group col-md-10">
<h3>Page Heading:</h3>
      <input type="text" name="head" id="head">
    </div>
    <div class="form-group col-md-10">
<h3>Background image:</h3>
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <div class="form-group col-md-10">
    <button  name="submit" class="float-right btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>


<div class="ss" >
<table class="table">
<h3 class='log'>Mullti page list</h3>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Heading</th>
      <th scope="col">Background Image</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($artical as $art) {
echo'    <tr>

 <td>'.$art['arid'].' </td>

 <td>'.$art['head'].' </td>
<td> <img src='.$art['background'].' alt="Smiley face" height="42" width="auto"> </td> 
 
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$art['arid'].'">
 edit
</button>
<div class="modal" id="'.$art['arid'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">slider edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="head" name="heads"  placeholder="Heading" value='.$art['head'].'>
    </div>
    

    <div class="form-group col-md-10"><img src='.$art['background'].' alt="Smiley face" height="150" width="auto"> <br/>
      <input type="file" name="backimgs" id="backimgs"> 
    </div>



    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$art['arid'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$art['arid'].' />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>











  <div class="container" >
        <div class="col-md-12">
            <div class="slider" style='margin-top:100px;'>
            <h3 style=" text-align: center;">Single Page Articals</h3>

        <form method="post" enctype="multipart/form-data">
<div class="form-group col-md-10">
<h3>Page Heading:</h3>
      <input type="text" name="head" id="head">
    </div>
    <div class="form-group col-md-10">
<h3>Background image:</h3>
      <input type="file" name="fileToUploaded" id="fileToUploaded">
    </div>
    <div class="form-group col-md-10">
    <button  name="single" class="float-right btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>


<div class="ss" style="margin-bottom:100px;">
<table class="table">
<h3 class='log'>admin message list</h3>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Heading</th>
      <th scope="col">Background Image</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($singlepage as $n) {
echo'    <tr>

 <td>'.$n['id'].' </td>

 <td>'.$n['head'].' </td>
<td> <img src='.$n['backimg'].' alt="Smiley face" height="42" width="auto"> </td> 
 
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$n['id'].'">
 edit
</button>
<div class="modal" id="'.$n['id'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">slider edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="head" name="heads"  placeholder="Heading" value='.$n['head'].'>
    </div>
    

    <div class="form-group col-md-10"><img src='.$n['backimg'].' alt="Smiley face" height="150" width="auto"> <br/>
      <input type="file" name="backimg" id="backimg"> 
    </div>



    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$n['id'].'" >
    <button  name="updated" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$n['id'].' />
    <button class="btn-link" name="deleted" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>



<div class="container" >
        <div class="col-md-12">
            <div class="slider" style='margin-top:100px;'>
            <h3 style=" text-align: center;">About us</h3>

        <form method="post" enctype="multipart/form-data">
<div class="form-group col-md-10">
<h3>Page Heading:</h3>
      <input type="text" name="head" id="head">
    </div>
    <div class="form-group col-md-10">
<h3>Background image:</h3>
      <input type="file" name="fileToUploaded" id="fileToUploaded">
    </div>
    <div class="form-group col-md-10">
    <button  name="about" class="float-right btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>


<div class="ss" style="margin-bottom:100px;">
<table class="table">
<h3 class='log'>about list</h3>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Heading</th>
      <th scope="col">Background Image</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($about as $a) {
echo'    <tr>

 <td>'.$a['id'].' </td>

 <td>'.$a['head'].' </td>
<td> <img src='.$a['backimg'].' alt="Smiley face" height="42" width="auto"> </td> 
 
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$a['head'].'">
 edit
</button>
<div class="modal" id="'.$a['head'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="head" name="heads"  placeholder="Heading" value='.$a['head'].'>
    </div>
    

    <div class="form-group col-md-10"><img src='.$a['backimg'].' alt="Smiley face" height="150" width="auto"> <br/>
      <input type="file" name="backimg" id="backimg"> 
    </div>



    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$a['id'].'" >
    <button  name="updates" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$a['id'].' />
    <button class="btn-link" name="deletes" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>















<div class="container" >
        <div class="col-md-12">
            <div class="slider" style='margin-top:100px;'>
            <h3 style=" text-align: center;">Contact Us</h3>

        <form method="post" enctype="multipart/form-data">
<div class="form-group col-md-10">
<h3>Page Heading:</h3>
      <input type="text" name="head" id="head">
    </div>
    <div class="form-group col-md-10">
<h3>Background image:</h3>
      <input type="file" name="fileToUploaded" id="fileToUploaded">
    </div>
    <div class="form-group col-md-10">
    <button  name="contact" class="float-right btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>


<div class="ss" style="margin-bottom:100px;">
<table class="table">
<h3 class='log'>Contact us list</h3>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Heading</th>
      <th scope="col">Background Image</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($contact as $a) {
echo'    <tr>

 <td>'.$a['id'].' </td>

 <td>'.$a['head'].' </td>
<td> <img src='.$a['back_img'].' alt="Smiley face" height="42" width="auto"> </td> 
 
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$a['head'].'">
 edit
</button>
<div class="modal" id="'.$a['head'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="head" name="heads"  placeholder="Heading" value='.$a['head'].'>
    </div>
    

    <div class="form-group col-md-10"><img src='.$a['back_img'].' alt="Smiley face" height="150" width="auto"> <br/>
      <input type="file" name="backimg" id="backimg"> 
    </div>



    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$a['id'].'" >
    <button  name="updatecontact" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$a['id'].' />
    <button class="btn-link" name="deletecontact" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>
