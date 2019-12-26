
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
    $p = $_POST['Para'];
    $flink = $_POST['flink'];
    $ilink = $_POST['ilink'];
    $tlink = $_POST['tlink'];
    $sql= "INSERT INTO footerabt (head,para,facebook_link,instagram_link,twitter_link) VALUES ('$h','$p','$flink','$ilink','$tlink')";
    $conn->exec($sql); 
   
header("location: footerabout.php");
}
     
            $sqla =("SELECT * FROM footerabt");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $sec = $stmt->fetchAll();
    
   if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM footerabt WHERE id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: footerabout.php");
   }

   if(isset($_POST['update']))
   { $id =$_POST['myid'];
        $h = $_POST['head'];
       $p = $_POST['para'];
       $f = $_POST['flink'];
       $i = $_POST['ilink'];
       $t = $_POST['tlink'];
    
 $sql ="UPDATE footerabt set head ='$h',para = '$p',facebook_link='$f',instagram_link='$i',twitter_link='$t'  where id= $id";
         $conn->exec($sql);
   header('location: footerabout.php');
       
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
      <input type="text" class="form-control" name="head"  placeholder="About heading">
    </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="Para" placeholder="About detail">
    </div>
    <div class="form-group col-md-10">
      <input type="url" class="form-control" name="flink"  placeholder="Facebook link">
    </div>
    <div class="form-group col-md-10">
      <input type="url" class="form-control" name="ilink"  placeholder="Instagram link">
    </div>
    <div class="form-group col-md-10">
      <input type="url" class="form-control" name="tlink"  placeholder="Twitter link">
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
      <th scope="col">About heading</th>
      <th scope="col">Content</th>
      <th scope="col">Facebook link</th>
      <th scope="col">Instagram link</th>
      <th scope="col">Twitter link</th>
    </tr>
  </thead>
 <?php foreach ($sec as $s) {
echo'  <tbody>  
  <tr>

 <td>'.$s['id'].' </td>

 <td>'.$s['head'].' </td><td>'.$s['para'].' </td><td>'.$s['facebook_link'].' </td><td>'.$s['instagram_link'].' </td><td>'.$s['twitter_link'].' </td>
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
    <textarea class="form-control" rows="5" id="comment">"'.$s['para'].'"
    </textarea>
    </div>
    <div class="form-group col-md-10">
     <label>Facebook Link<label>
     </div>
    <div class="form-group col-md-10">
    
   <input type="text" class="form-control"  name="flink"  placeholder="Phone number" value="'.$s['facebook_link'].'">
    </div>
    <div class="form-group col-md-10">
    <label>Instagram Link<label></div>
    <div class="form-group col-md-10">
    
    <input type="text" class="form-control" name="ilink"  placeholder="page email" value="'.$s['instagram_link'].'">
  </div>
  <div class="form-group col-md-10">
  <label>Twitter Link<label></div>
  <div class="form-group col-md-10">
  
    <input type="text" class="form-control"  name="tlink"  placeholder="page email" value="'.$s['twitter_link'].'">
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
//footer section 1
