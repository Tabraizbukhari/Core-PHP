<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>

<?php $name = $_SERVER['PHP_SELF']; ?>

<?php
if(isset($_GET['user_id'])){

$id =$_GET['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id='$id' ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmt->fetch(); 


$stmts = $conn->prepare("SELECT * FROM user_role ");
$stmts->execute();
$results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
$user_role = $stmts->fetchAll(); 
}
?>

<?php updateuser(); ?>

<div class="content-wrapper">

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php if(isset($name)){ echo $name; } ?></li>
      </ol>

<div class="col-md-8">
<?php echo'
<form method="post" enctype="multipart/form-data">
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" value="'.$user['user_first_name'].'" class="form-control" required name="fname" placeholder="First name">
    </div>
    <div class="form-group col-md-6">
    <input type="text" value="'.$user['user_last_name'].'" class="form-control" required name="lname"  placeholder="Last name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress">Age:</label>
      <input type="date" value="'.$user['user_age'].'" class="form-control" required name="age" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
    <label for="inputAddress">Email:</label>
      <input type="email" value="'.$user['user_email'].'"  class="form-control" required name="email" placeholder="useremail">
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">City</label>
      <input type="text" value="'.$user['city'].'" class="form-control" required name="city" placeholder="City name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Address</label>
      <input type="text" value="'.$user['user_address'].'" class="form-control" required name="address" placeholder="User address">
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">Role:</label>
      <select id="inputState" name="role" class="form-control">
      <option>'.$user['user_role'].'</option>';
       foreach ($user_role as $role ) {
     $r = $user['user_role'];
     if($r != $role['user_role']){
        echo' 
     <option>'.$role['user_role'].'</option>'; } }
    echo'  </select>
    </div>
   
  </div>
  
  <div class="form-row">
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
    <label for="inputZip">User Password</label>
      <input  value="'.$user['user_password'].'" type="text" required name="pass" class="form-control" placeholder="password">
    </div>
    
    <div class="col-md-1">
    <input type="hidden" name="fixedgender" value="'.$user['user_gender'].'">
  <label for="inputState">Gender : '.$user['user_gender'].'  &nbsp;</label>
  </div>
  <div class="col-md-1">
  <input value="male" type="radio" name="gender"> 
    <label>Male</label>
    </div>
    <div class="col-md-2">
    <input value="female" type="radio" name="gender"> 
    <label>Female</label>
    </div>
    
    </div>
    <div class="form-row">
    <div class="form-group col-md-3">
          <input type="file"  name="userimg" class="form-control" placeholder="password">
        <img width="200px" height="200px" src="'.$user['user_img'].'" class="fluid-img" >
          </div>
    
    <div class="form-group col-md-8">
    <button  name="update" class="btn btn-danger float-right ">Create new account</button>
    </div>
    </div>
   
</form>
'; ?>

</div>

</div>
  </div>



  <?php include "include/footer.php" ?>
