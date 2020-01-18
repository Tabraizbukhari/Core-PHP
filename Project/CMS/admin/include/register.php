<?php include "logincss.php" ?>


<div class='container-fluid '>

<div class='col-md-12 '>
<div class="registration_center_div  ">
<form method="post">
    <h3 class='text-center'>Registration here</h3>

    <div class="form-row">
    <div class="form-group col-md-6">
    <h4><span class="label label-primary">First Name :</span></h4>
      <input type="text" class="form-control" required name="fname" placeholder="First name">
    </div>
    <div class="form-group col-md-6">
    <h4><span class="label label-primary">Last Name :</span></h4>
    <input type="text" class="form-control" required name="lname"  placeholder="Last name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <h4><span class="label label-primary">Email address :</span></h4>
      <input type="text" class="form-control" required name="email"  placeholder="forexample@register.com">
    </div>
  </div>    
  <div class="form-row">
  
    <div class="form-group col-md-6">
    <h4><span class="label label-primary">Birth-Day :</span></h4>
      <input type="date" class="form-control" required name="age">
    </div>
    <div class="form-group col-md-6">
    <h4><span class="label label-primary">City :</span></h4>
    <input type="text" class="form-control" required name="city"  placeholder="Your city">
    </div>
  </div> 
  <div class="form-row">
    <div class="form-group col-md-12">
    <h4><span class="label label-primary">Address :</span></h4>
    <textarea class="form-control" required name="address" placeholder="Enter your address"></textarea>
    </div>
  </div>     

  <div class="form-row">
  
  <div class="form-group col-md-6">
  <h4><span class="label label-success">Password :</span></h4>
    <input type="password" class="form-control" required name="pass">
  </div>
  <div class="form-group col-md-6">
  <?php  echo '<span style="color:red;"> '; adduser(); echo'</span>';?>
  <h4><span class="label label-danger">Conform Password :</span></h4>
  <input type="text" class="form-control" required name="compass"  placeholder="Conform password">
  </div>
</div> 
<div class="form-row">
<div class="form-group col-md-2">
<h4><span class="label label-danger">Gender :</span></h4> </div>
  <div class="form-group col-md-2">
  <h4>Male :  <input type="radio"  value="male" name="gender"></h4>
  
  </div>
  <div class="form-group col-md-2">
 
  <h4>Female :  <input type="radio"  value="male" name="gender"></h4>
 
  </div>

</div> 

<div class="text-center">
<button class='btn btn-danger btn-lg' name="create">Create new account</button></br>
<a  href="login.php" class="btn btn-link"><h5>LOGIN HERE</h5></a>
</div>
</form>
<h3>

<?php 
 if(isset($mg, $msg2)){ echo  $mg; echo $msg2;} ?> </h3>
</div>
</div>

</div>
<?php include "footer.php" ?>
