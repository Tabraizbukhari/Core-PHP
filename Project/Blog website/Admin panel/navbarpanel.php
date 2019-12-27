
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
    
    // $sql = "CREATE TABLE navbar(
    // id int primary key AUTO_INCREMENT,
    // pagename nvarchar(50),
    // link nvarchar(5000)
    //    )";
    //     $conn->exec($sql);
   if(isset($_POST['logo'])){

    $head = $_POST['name'];
    $sql= "INSERT INTO logo (logo) VALUES ('$head')";
    $conn->exec($sql); 
   
 header('location: navbarpanel.php');
   }

   $sqllogo =("SELECT * FROM logo ORDER BY id DESC limit 1 ");
   $stmt = $conn->prepare($sqllogo);
   $stmt->execute();

   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   $logo = $stmt->fetchAll();

   if(isset($_POST['logodelete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM logo WHERE id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: navbarpanel.php");
   }

   if(isset($_POST['logoupdate']))
   {
        $id = $_POST['myid'];
       $head = $_POST['heads'];
       $para = $_POST['paras'];
    
 $sql ="UPDATE logo set logo ='$head'where id= $id";
         $conn->exec($sql);
   header('location: navbarpanel.php');
       
}
     






    
    if(isset($_POST["submit"])) {
    
    $head = $_POST['name'];
    $txt = $_POST['link'];
    $sql= "INSERT INTO navbar (pagename,link) VALUES ('$head','$txt')";
    $conn->exec($sql); 
   
header("location: navbarpanel.php");
}
     
            $sqla =("SELECT * FROM navbar");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $navbar = $stmt->fetchAll();

    
   if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM navbar WHERE id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: navbarpanel.php");
   }

   if(isset($_POST['update']))
   {
        $id = $_POST['myid'];
       $head = $_POST['heads'];
       $para = $_POST['paras'];
    
 $sql ="UPDATE navbar set pagename ='$head',link = '$para'where id= $id";
         $conn->exec($sql);
   header('location: navbarpanel.php');
       
}
     


    


}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>


<?php include 'navbar.php'; ?>




<!-- <div class="container">
        <div class="col-md-12">
            <div class="slider">
 <div class="col-md-3">
    <?php 
    // foreach($logo as $l){ echo  ' <img src="'.$l['logo'].'" width="240" height="auto" >'; } ?>
</div>
<div class="col-md-3">
            <form method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" class="form-control" >
</br>
    <button  name="logo" class="float-right btn btn-primary">Submit</button>

</div>
</form>
</div>
</div>
 -->


 <div class="container">
        <div class="col-md-12">
            <div class="slider">
        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="name"   placeholder="page name">
    </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="link" id="slidertext" placeholder="link">
    </div>

    <div class="form-group col-md-10">
    <button  name="submit" class="float-right btn btn-danger">Submit</button>
</div>
</form>
</div>
</div>


<div class="container">
<div class="col-md-12">
<div class="ss">
<table class="table">
<h3 class='log'>Navbar list</h3>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($navbar as $nav) {
echo'    <tr>

 <td>'.$nav['id'].' </td>

 <td>'.$nav['pagename'].' </td><td>'.$nav['link'].' </td>
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$nav['id'].'">
 edit
</button>
<div class="modal" id="'.$nav['id'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">newsletter edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="head" name="heads"  placeholder="Heading" value="'.$nav['pagename'].'">
    </div>
    <div class="form-group col-md-10">
    <textarea class="form-control" rows="5" id="paras" name="paras" >'.$nav['link'].'</textarea>
     
    </div>

    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$nav['id'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$nav['id'].' />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>
</div>
</div>




<div class="container">
        <div class="col-md-12">
            <div class="slider">
              <h1>PAGE LOGO</h1>
        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="name"  placeholder="page name">
    </div>
   <div class="form-group col-md-10">
    <button  name="logo" class="float-right btn btn-danger">Submit</button>
</div>
</form>
</div>
</div>


<div class="container">
<div class="col-md-12">
<div class="ss">
<table class="table">
<h3 class='log'>Logo list</h3>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($logo as $log) {
echo'    <tr>

 <td>'.$log['id'].' </td>

 <td>'.$log['logo'].' </td>
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$log['id'].'">
 edit
</button>
<div class="modal" id="'.$log['id'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">newsletter edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="head" name="heads"  placeholder="Heading" value="'.$log['logo'].'">
    </div>
    

    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$log['id'].'" >
    <button  name="logoupdate" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$log['id'].' />
    <button class="btn-link" name="logodelete" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>
</div>
</div>
