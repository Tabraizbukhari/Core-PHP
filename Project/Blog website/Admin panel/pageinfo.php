
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
  
    $add = $_POST['address'];
    $num = $_POST['number'];
    $em = $_POST['email'];
    $head = $_POST['headsec'];
    $sql= "INSERT INTO pageinfo (page_address,phone_number,page_mail,head) VALUES ('$add','$num','$em','$head')";
    $conn->exec($sql); 
   
header("location: pageinfo.php");
}
     
            $sqla =("SELECT * FROM pageinfo");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $pageinfo = $stmt->fetchAll();

            $sqle =("SELECT * FROM pageinfo ORDER BY id DESC LIMIT 1");
            $stmte = $conn->prepare($sqle);
            $stmte->execute();

            $resulte = $stmte->setFetchMode(PDO::FETCH_ASSOC);
            $pager = $stmte->fetch();
    
   if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM pageinfo WHERE id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: pageinfo.php");
   }

   if(isset($_POST['update']))
   { $id =$_POST['myid'];
        $a = $_POST['addresss'];
       $n = $_POST['numbers'];
       $m = $_POST['mail'];
       $p = $_POST['paddress'];
    
 $sql ="UPDATE pageinfo set page_address ='$a',phone_number = '$n',page_mail='$m',head ='$p'  where id= $id";
         $conn->exec($sql);
   header('location: pageinfo.php');
       
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
      <input type="text" class="form-control" id="headsec" name="headsec" value="<?php echo $pager['head']; ?>"  placeholder="Section head name">
    </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="address" name="address"  placeholder="address">
    </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="number" id="text" placeholder="Phone number">
    </div>
    <div class="form-group col-md-10">
      <input type="email" class="form-control" name="email" id="text" placeholder="Email address">
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
      <th scope="col">Address</th>
      <th scope="col">Phone number</th>
      <th scope="col">Email Address</th>
    </tr>
  </thead>
    <tbody>  
 <?php foreach ($pageinfo as $info) {
echo' <tr>

 <td>'.$info['id'].' </td>

 <td>'.$info['page_address'].' </td><td>'.$info['phone_number'].' </td><td>'.$info['page_mail'].' </td>
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$info['id'].'">
 edit
</button>
<div class="modal" id="'.$info['id'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">'.$info['head'].'</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">
        <div class="form-group col-md-10">
        <input type="text" class="form-control"  name="paddress"  placeholder="Heading" value="'.$info['head'].'">
      </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="head" name="addresss"  placeholder="page address" value="'.$info['page_address'].'">
    </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="paras" name="numbers"  placeholder="Phone number" value="'.$info['phone_number'].'">
    </div>
    <div class="form-group col-md-10">
    <input type="text" class="form-control" id="paras" name="mail"  placeholder="page email" value="'.$info['page_mail'].'">
  </div>

    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$info['id'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value="'.$info['id'].'" />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>

 
      </tr>';}?>
  </tbody>
</table>
</div>

