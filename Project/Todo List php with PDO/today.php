<?php
$username = 'root';
$password = '';
$servername = "localhost";
try {
    $conn = new PDO("mysql:host=$servername;dbname=todo", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // $sql = "CREATE TABLE too (
  //     id INT AUTO_INCREMENT PRIMARY KEY,
    //   obj VARCHAR(50) ,
  //     status VARCHAR(50) 
   //    )";
  //$stmt = $conn->prepare($sql);
//  $stmt->execute();


// select query
  $sqla =("SELECT  status, id, Date, obj FROM too where status like 'incomplete%' AND Date = CURDATE() ");
  $stmt = $conn->prepare($sqla);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $arr = $stmt->fetchAll();

 

 if(isset($_POST['delt'])){
//      var_dump($_POST);
 //     echo '<br>';
 //     var_dump($_POST['id']);
//      die();
       
    $bid =$_POST['id'];
    
    $sql= "DELETE FROM too WHERE id = '$bid'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location: today.php");
    
} 
// delet all
if(isset($_POST['delete'])){
    $sql= "DELETE FROM too WHERE Date = CURDATE()  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: today.php");
    
}
// complet and incomplete
if(isset($_POST['ok'])){
    $bid =$_POST['id'];
    
    $sql = "UPDATE too SET status='complete' WHERE id= '$bid' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: today.php");
    
}

 //   echo "connection success";
} catch (PDOException $e) {
  echo "Connection failed". $e->getMessage();
}
$conn = null;
?>

<div class="container">
<div class="row">
<div class="col-12">

<h4 class="card-title" style="margin-top:50px; padding-left:-10px;">TODAY TASKS</h4>
<table class="table table-light">

<thead>
<tr><form method="post" action=''>  
    <th>
 <button class="btn btn-link btn-large " name="delete"><i class="icon-trash"> Delete All</i></button>
      </th>
      </from>
</tr>
</thead>
<thead>
    <tr>
      <th scope="col">OBJECT</th>
      <th scope="col">DATE</th>
     <th scope="col">STATUS</th>
      <th scope="col">Complete</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>

  <tbody>
  <?php  foreach( $arr as $data){
      echo '
    <tr>
      <td>'.$data['obj'].'</td>
      <td>'.$data['Date'].'</td>
      
      <td>'.$data['status'].'  </td>
      <td><form method="post">  <input type="hidden" name="id" value='.$data['id'].' />   <button class="btn btn-link remove  navbar-right" name="ok" ><i class="   icon-ok " style="padding-left:-100px;"></i></button> 
    </form>  </td>
<td> <form method="post">   <input type="hidden" name="id" value='.$data['id'].' />      <button class="btn btn-link remove"   navbar-right" name="delt"><i class="  icon-remove "></i></button> </form>
      </td>
    </tr> ';
} ?>
    
  </tbody>
 
</table>
<a href="complete.php"  style="padding:10px; margin-left:20px;" name="" class=" float-right navbar-right btn-large btn btn-primary ">Completed Task</a>
<a href="index.php"  style="padding:10px;"  name="" class=" float-right navbar-right btn-large btn btn-primary ">Back</a>


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

