<?php
$username = 'root';
$password = '';
$servername = "localhost";
try {
    $conn = new PDO("mysql:host=$servername;dbname=todo", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //   $sql = "CREATE TABLE too (
   //     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   //     obj VARCHAR(50) NOT NULL
     //   )";
    
     
  
// select query
  $sqla =("SELECT id, status, Date, obj FROM too where status like 'complete%' ORDER BY Date ASC");
  $stmt = $conn->prepare($sqla);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $arr = $stmt->fetchAll();



  if(isset($_POST['delt'])){
       
    $bid =$_POST['id'];
    $sql= "DELETE FROM too WHERE id = '$bid'  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: complete.php");
    
}
// delet all
if(isset($_POST['delete'])){
       
    $sql= "DELETE FROM too where status like 'incomplete%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: incomplete.php");
    
}

if(isset($_POST['incom'])){
    $bid =$_POST['id'];
    
    $sql = "UPDATE too SET status='incomplete' WHERE id= '$bid' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: complete.php");
    
}

   // echo "connection success";
} catch (PDOException $e) {
  echo "Connection failed". $e->getMessage();
}
$conn = null;
?>


<div class="container" >
<div class="row">
<div class="col-12">
<div class="col-10" >
<h4 class="card-title" style="padding-top:40px;" >TODO COMPLETE TASK</h4>
</div>
<table class="table table-light ">
<thead>
<tr><form method="post" action=''>  
    <th>
 <button class="btn btn-link btn-large " name="delete"><i class="icon-trash"> Delete All</i></button>
      </th>
      
</tr>
</thead>
<thead>
    <tr>
      <th scope="col">OBJECT</th>
      <th scope="col">DATE</th>
      <th scope="col">STATUS</th>
      <th scope="col">Delete</th>
      <th scope="col">INCOMPLETE</th>
    </tr>
  </thead>
  <tbody>
  
 
    </form> 
  <?php  foreach( $arr as $data){
      echo '
    <tr>

      <td "style:"padding-left:500px;"">'.$data['obj'].'</td>
      <td>'.$data['Date'].'</td>
      <td>'.$data['status'].'  </td>
      <td> <form method="post">   <input type="hidden" name="id" value='.$data['id'].' />      <button class="btn btn-link remove"   navbar-right" name="delt"><i class="  icon-remove "></i></button> </form>
      </td>
    <td><form method="post">  <input type="hidden" name="id" value='.$data['id'].' />   <button class="btn btn-link remove  navbar-right" name="incom" ><i class="   icon-exclamation " style="padding-left:-100px;"> Incomplete</i></button> 
    </form>  </td>
     
     
    </tr> ';
} ?>

  </tbody>
 
</table>


<a href="index.php"  name="comp" class=" float-right btn-large btn btn-primary "> BACK </a>


</div>
</div>
<div>

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel='stylesheet'>
<script src="//code.jquery.com/jquery-3.1.0.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

<script>
$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});

</script>
