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
</div></div>
