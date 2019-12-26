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

    $sql =("SELECT * FROM clientcontacts ");
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $clientdata = $stmt->fetchAll();

    if(isset($_POST['delete'])){
        $id =$_POST['id'];
        $sql= "DELETE FROM clientcontacts WHERE id = '$id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        header("location: clientlist.php");
       }

       if(isset($_POST['update']))
    {
    
        $id = $_POST['myid'];
        $n = $_POST['name'];
        $e = $_POST['email'];
        $s = $_POST['sub'];
        $t = $_POST['txt'];
        
        
       
        
            $sql =("UPDATE clientcontacts set client_name = '$n', client_email='$e' ,client_sub='$s',client_text='$t' where id= $id");
            $conn->exec($sql);
     header('location: clientlist.php');}
       
      
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>
<?php include 'navbar.php'; ?>
<div class="container">
<div class="col-md-12">
<div class="ss" style="margin-bottom:100px;">
<table class="table">
<h3 class='log'>Contact us list</h3>
  <thead>
    <tr>
      <th scope="col">Client ID</th>
      <th scope="col">Client Name</th>
      <th scope="col"> Client Email</th>
        <th scope="col">Subject</th>
        <th scope="col">Message</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($clientdata as $c) {
echo'    <tr>

 <td>'.$c['id'].' </td>

 <td>'.$c['client_name'].' </td><td>'.$c['client_email'].' </td><td>'.$c['client_sub'].' </td><td>'.$c['client_text'].' </td>

 
 
    
<td><form method="post">
    <input type="hidden" name="id" value='.$c['id'].' />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>
<td>
<button type="button" class="btn-link" data-toggle="modal" data-target="#'.$c['id'].'">
 edit
</button>
<div class="modal" id="'.$c['id'].'">
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
      <input type="text" class="form-control" name="name"  placeholder="Heading" value="'.$c['client_name'].'">
    </div>
    <div class="form-group col-md-10">
    <input type="text" class="form-control" name="email"  placeholder="Heading" value="'.$c['client_email'].'">
  </div> 
    <div class="form-group col-md-10">
  <input type="text" class="form-control"  name="sub"  placeholder="Heading" value="'.$c['client_sub'].'">
</div>

  
<div class="form-group col-md-10">
<textarea class="form-control" rows="5"  name="txt"  placeholder="text" >'.$c['client_text'].'</textarea>

</div>

    <div class="form-group col-md-10">
    <input  name="myid" type="hidden" value="'.$c['id'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
</td>
 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div></div></div>
