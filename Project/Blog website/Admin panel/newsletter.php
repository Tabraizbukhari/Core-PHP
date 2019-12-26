
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
    
    // $sql = "CREATE TABLE articalpage(
    //     arid int primary key AUTO_INCREMENT,
    //    head nvarchar(500),
    //   background nvarchar(5000)
    //    )";
    //     $conn->exec($sql);
   
    
    if(isset($_POST["insert"])) {
    
    $head = $_POST['head'];
    $txt = $_POST['text'];
    $sql= "INSERT INTO newsletter (letterhead,letterpara) VALUES ('$head','$txt')";
    $conn->exec($sql); 
   
header("location: newsletter.php");
}
     
            $sqla =("SELECT * FROM newsletter");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $newsletter = $stmt->fetchAll();

    
   if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM newsletter WHERE letterid = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: newsletter.php");
   }

   if(isset($_POST['update']))
   {
        $id = $_POST['myid'];
       $head = $_POST['heads'];
       $para = $_POST['paras'];
    
 $sql ="UPDATE newsletter set letterhead ='$head',letterpara = '$para'where letterid= $id";
         $conn->exec($sql);
   header('location: newsletter.php');
       
}
     

            $sqlsu =("SELECT * FROM subscriber");
            $stmtsu = $conn->prepare($sqlsu);
            $stmtsu->execute();

            $result = $stmtsu->setFetchMode(PDO::FETCH_ASSOC);
            $subcriber = $stmtsu->fetchAll();
            if(isset($_POST['deletess'])){
              $id =$_POST['id'];
              $sql= "DELETE FROM subscriber WHERE id = '$id' ";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              
              header("location: newsletter.php");
             }
          
             if(isset($_POST['updatess']))
             {
                  $id = $_POST['myid'];
                 $email = $_POST['email'];
           
              
           $sql ="UPDATE subscriber set email ='$email' where id= $id";
                  $conn->exec($sql);
             header('location: newsletter.php');
                 
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
      <input type="text" class="form-control" id="head" name="head"  placeholder="newsletter heading">
    </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="text" id="text" placeholder="newsletter text">
    </div>

    <div class="form-group col-md-10">
    <button  name="insert" class="float-right btn btn-primary">Submit</button>
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
      <th scope="col">text</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($newsletter as $letter) {
echo'    <tr>

 <td>'.$letter['letterid'].' </td>

 <td>'.$letter['letterhead'].' </td><td>'.$letter['letterpara'].' </td>
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$letter['letterid'].'">
 edit
</button>
<div class="modal" id="'.$letter['letterid'].'">
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
      <input type="text" class="form-control" id="head" name="heads"  placeholder="Heading" value="'.$letter['letterhead'].'">
    </div>
    <div class="form-group col-md-10">
    <textarea class="form-control" rows="5" id="paras" name="paras" >'.$letter['letterpara'].'</textarea>
     
    </div>

    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$letter['letterid'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$letter['letterid'].' />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>




<div class="ss">
<table class="table">
<h3 class='log'>Page Subscriber</h3>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Subscriber Email</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($subcriber as $sub) {
echo'    <tr>

 <td>'.$sub['id'].' </td>

 <td>'.$sub['email'].' </td>
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$sub['id'].'">
 edit
</button>
<div class="modal" id="'.$sub['id'].'">
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
      <input type="text" class="form-control" id="email" name="email"  placeholder="Heading" value='.$sub['email'].'>
    </div>

    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$sub['id'].'" >
    <button  name="updatess" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$sub['id'].' />
    <button class="btn-link" name="deletess" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div>
