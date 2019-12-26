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
   
//    $sql = "CREATE TABLE admin_message(
//         id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//         head nvarchar(50),
//         messages nvarchar(100),
//         back_img nvarchar(5000)
//         )";
//         $conn->exec($sql);

    if(isset($_POST['submit']))
    {
        $h = $_POST['head'];
        $p = $_POST['para'];
        date_default_timezone_set("Asia/Karachi");
        $date = date("Y-m-d");
       $name =  $_SESSION['username'] ;
    $image = $_FILES['backimg']["name"];  

      
    $target_dir = "../admin/uploads/adminmessage/";
$target_file = $target_dir . basename($image);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["backimg"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["backimg"]["tmp_name"], $target_file)) {
                
    $sql= "INSERT INTO admin_message (head, messages,back_img,message_date, writer_name) VALUES ('$h','$p','$target_file','$date','$name')";
    $conn->exec($sql); 

        echo "The file ". basename( $_FILES["backimg"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }


   }
   header('location: adminmessage.php');
}
    

$sqla =("SELECT * FROM admin_message");
    $stmt = $conn->prepare($sqla);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $mg = $stmt->fetchAll();
    
  
    if(isset($_POST['delete'])){
       
        $id =$_POST['id'];
        $sql= "DELETE FROM admin_message WHERE id = '$id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        header("location: adminmessage.php");
        
    }


  //   if(isset($_POST['edit']))
  // {
  //   $i = $_POST['editid'];
  //   $sqls =("SELECT * FROM admin_message where id = $i");
  //   $stmts = $conn->prepare($sqls);
  //   $stmts->execute();

  //   $results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
  //   $msgdata = $stmts->fetch();

  // }
    // $sqls =("SELECT * FROM admin_message");
    // $stmts = $conn->prepare($sqls);
    // $stmts->execute();

    // $results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
    // $ids = $stmts->fetchAll()[0];
    // $id = $ids['id'];


    // $sqlss =("SELECT * FROM admin_message Where id = '$id'"  );
    // $stmtss = $conn->prepare($sqlss);
    // $stmtss->execute();

    // $resultss = $stmtss->setFetchMode(PDO::FETCH_ASSOC);
    // $idss = $stmtss->fetchAll();
  
    if(isset($_POST['update']))
    {
    
        $id = $_POST['myid'];
        $head = $_POST['heads'];
        $para = $_POST['paras'];
        $image = $_FILES['backimgs']["name"];  
        date_default_timezone_set("Asia/Karachi");
        $dates = date("Y-m-d");
      
        $target_dir = "../admin/uploads/adminmessage/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        
if($image != "" )
{
             move_uploaded_file($_FILES["backimgs"]["tmp_name"], $target_file);
            echo "The file ". basename( $_FILES["backimgs"]["name"]). " has been uploaded.";     
            $sql =("UPDATE admin_message set head = '$head', messages='$para' ,back_img='$target_file',message_date='$dates' where id= $id");
            $conn->exec($sql);
}
else {
    $sql =("UPDATE admin_message set head = '$head', messages='$para' ,message_date='$dates' where id= $id");
    $conn->exec($sql);
}
           
        
     header('location: adminmessage.php');}
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
    <textarea class="form-control" name="para" id="para" placeholder="Message" rows="3"></textarea>
    </div>

    <div class="form-group col-md-10">
      <input type="file" name="backimg" id="backimg">
    </div>



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
      <th scope="col"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Message</th>
      <th scope="col">Background Image</th>
      <th scope="col">Message date</th>
      <th scope="col">Posted by</th>
      <th scope="col"></th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($mg as $masg) {
echo'    <tr>

 <td>'.$masg['id'].' </td>

 <td>'.$masg['head'].' </td><td>'.$masg['messages'].' </td>
<td> <img src='.$masg['back_img'].' alt="Smiley face" height="42" width="auto"> </td> 
 <td> '.$masg['message_date'].' </td> 
 <td>'.$masg['writer_name'].' <td>
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$masg['id'].'">
 edit
</button>
<div class="modal" id="'.$masg['id'].'">
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
      <input type="text" class="form-control" id="head" name="heads"  placeholder="Heading" value='.$masg['head'].'>
    </div>
    <div class="form-group col-md-10">
    <textarea class="form-control" name="paras" id="paras" placeholder="Message" rows="3">='.$masg['messages'].' </textarea>
    </div>

    <div class="form-group col-md-10"><img src='.$masg['back_img'].' alt="Smiley face" height="150" width="auto"> <br/>
      <input type="file" name="backimgs" id="backimgs"> 
    </div>



    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$masg['id'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$masg['id'].' />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>



<!-- 
if(isset($_POST['edit'])){
    
    $sql =("SELECT head, messages,back_img,message_date, writer_name FROM admin_message where id= $id");
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $stmt->fetch();
} -->
