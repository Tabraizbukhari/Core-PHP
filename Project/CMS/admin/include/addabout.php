
<?php $name = $_SERVER['PHP_SELF']; ?>



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
<form method="post" enctype="multipart/form-data">
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" class="form-control" required name="fname" placeholder="First name">
    </div>
    <div class="form-group col-md-6">
    <input type="text" class="form-control" required name="lname"  placeholder="Last name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress">Age:</label>
      <input type="date" class="form-control" required name="age" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
    <label for="inputAddress">Email:</label>
      <input type="email" class="form-control" required name="email" placeholder="useremail">
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" required name="city" placeholder="City name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Address</label>
      <input type="text" class="form-control" required name="address" placeholder="User address">
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">Role:</label>
      <select id="inputState" name="role" class="form-control">
        <option selected>Choose here...</option>
        <option>commenter</option>
        <option>blogpost</option>
      </select>
    </div>
   
  </div>
  
  <div class="form-row">
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
    
          <input type="password" required name="pass" class="form-control" placeholder="password">
    </div>
    <div class="form-group col-md-4">
    
    <?php  echo '<span style="color:red;"> '; adduser(); echo'</span>';?>
      <input type="password" required name="compass" class="form-control" placeholder="Conform password">
    </div>
    <div class="col-md-1">
  <label for="inputState">Gender: &nbsp;</label>
  </div>
  <div class="col-md-1">
  <input type="radio" name="gender"> 
    <label>Male</label>
    </div>
    <div class="col-md-2">
    <input type="radio" name="gender"> 
    <label>Female</label>
    </div>
    
    </div>
    <div class="form-row">
    <div class="form-group col-md-3">
          <input type="file"  name="userimg" class="form-control" placeholder="password">
    </div>
    
    <div class="form-group col-md-8">
    <button  name="adduser" class="btn btn-danger float-right ">Create new account</button>
    </div>
    </div>
   
</form>

</div>

</div>
  </div>


  <?php include "include/footer.php" ?>

