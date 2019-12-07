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


     if(isset($_POST['submit']))
     {
         $a= $_POST['obj'];
        date_default_timezone_set("Asia/Karachi");
        $date = date("Y-m-d");
       
         if($a==""){
             $err = ' Fill All Form';
         }
         else{
         
         $sql = "INSERT INTO too (obj,Date,status) VALUES ('$a','$date','incomplete')";
         $conn->exec($sql);
       //  echo "New record created successfully";
         }
  }
// select query
  $sqla =("SELECT status, id, Date, obj FROM too where status like 'incomplete%' ORDER BY Date ASC ");
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
    header("location: index.php");
    
} 
// delet all
if(isset($_POST['delete'])){
    $sql= "DELETE FROM too where status like 'incomplete%' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: index.php");
    
}
// complet and incomplete
if(isset($_POST['ok'])){
    $bid =$_POST['id'];
    
    $sql = "UPDATE too SET status='complete' WHERE id= '$bid' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: index.php");
    
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

<h4 class="card-title" style="margin-top:50px; padding-left:-10px;">Awesome Todo list</h4>
<form method="post">
<div class="add-items d-flex"> <input type="text" value="" class="form-control todo-list-input" name="obj" placeholder="What do you need to do today?"> <button name="submit" class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button> </div>
</form>
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
    
     
      <td><form method="post"> <input type="hidden" name="id" value='.$data['id'].' />   <button class="btn btn-link remove  navbar-right" name="ok" ><i class="   icon-ok " style="padding-left:-100px;"></i></button> 
    </form>  </td>
<td> <form method="post">   <input type="hidden" name="id" value='.$data['id'].' />      <button class="btn btn-link remove"   navbar-right" name="delt"><i class="  icon-remove "></i></button> </form>
      </td>
      
    </tr> ';
} ?>
    
  </tbody>
 
</table>
<a href="today.php"  style="padding:10px; margin-left:20px;"  name="" class=" float-right navbar-right btn-large btn btn-primary ">TODAY TASK</a>
<a href="complete.php" style="padding:10px;"   name="comp" class=" float-right navbar-right btn-large btn btn-primary ">Completed Task</a>


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

