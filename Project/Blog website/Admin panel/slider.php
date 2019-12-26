
<?php 

session_start();
if(isset($_SESSION["username"]))  
    {  
        $sessioname = $_SESSION["username"];
    }  
    else  
    {  
        session_destroy();
        session_unset();
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
    
 
   
    
    if(isset($_POST["sliderbtn"])) {
    
    $head = $_POST['sliderhead'];
    $txt = $_POST['slidertext'];
    $typ = $_POST['slidertype'];        

 
    $image = $_FILES['fileToUpload']["name"];  

      
    $target_dir = "../admin/uploads/slider";
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
        $sql= "INSERT INTO slider (shead,scategory,stext,sliderimage) VALUES ('$head','$typ','$txt','$target_file')";
        $conn->exec($sql); 
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
   
}

header("location: slider.php");
}        
            $sqla =("SELECT * FROM slider");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $slider = $stmt->fetchAll();

    
   if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM slider WHERE sliderid = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: slider.php");
   }

   if(isset($_POST['update']))
   {
   
       $id = $_POST['myid'];
       $head = $_POST['heads'];
       $para = $_POST['paras'];
       $cate = $_POST['ca'];
     $image = $_FILES['backimgs']["name"];  
    

       date_default_timezone_set("Asia/Karachi");
       $dates = date("Y-m-d");
     
       $target_dir = "../admin/uploads/about/";
   $target_file = $target_dir . basename($image);
   $uploadOk = 1;
   
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   $check = getimagesize($_FILES["backimgs"]["tmp_name"]);
  

if($image != "" )
{
 move_uploaded_file($_FILES["backimgs"]["tmp_name"], $target_file); 
 $sql ="UPDATE slider set shead ='$head',stext = '$para',sliderimage= '$target_file' where sliderid= $id";
         $conn->exec($sql);
           echo "The file ". basename( $_FILES["backimgs"]["name"]). " has been uploaded.";
}
else {
    $sql ="UPDATE slider set shead ='$head',stext = '$para',scategory= '$cate' where sliderid= $id";
         $conn->exec($sql);
}
     

      header('location: slider.php');
       
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
        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="head" name="sliderhead"  placeholder="Slider Heading">
    </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="slidertext" id="slidertext" placeholder="Slider Text">
    </div>

    <div class="form-group col-md-10">
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>

    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="slidertype" id="post_type" placeholder="post type">
    </div>
    <div class="form-group col-md-10">
    <button  name="sliderbtn" class="float-right btn btn-primary">Submit</button>
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
 <?php foreach ($slider as $slid) {
echo'    <tr>

 <td>'.$slid['sliderid'].' </td>

 <td>'.$slid['shead'].' </td><td>'.$slid['stext'].' </td>
<td> <img src='.$slid['sliderimage'].' alt="Smiley face" height="42" width="auto"> </td> 
 <td> '.$slid['scategory'].' </td> 
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$slid['sliderid'].'">
 edit
</button>
<div class="modal" id="'.$slid['sliderid'].'">
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
      <input type="text" class="form-control" id="head" name="heads"  placeholder="Heading" value="'.$slid['shead'].'">
    </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="ca" name="ca"  placeholder="Heading" value="'.$slid['scategory'].'">
    </div>
    <div class="form-group col-md-10">
    <textarea class="form-control" name="paras" id="paras" placeholder="Message" rows="3">"'.$slid['stext'].'" </textarea>
    </div>

    <div class="form-group col-md-10"><img src="'.$slid['sliderimage'].'" alt="Smiley face" height="150" width="auto"> <br/>
      <input type="file" name="backimgs" id="backimgs"> 
    </div>



    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$slid['sliderid'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value="'.$slid['sliderid'].'" />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>

