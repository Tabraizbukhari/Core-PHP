<?php

session_start();

  if(isset($_SESSION['logcount'])){
      $_SESSION['logcount']  += 1;
  }
  else{
      $_SESSION['logcount'] = 0;
  }
if (isset($_POST['btn'])) {
   
 $user=  $_POST['email'];
 $pass = $_POST['pass'];
 $login = $_SERVER["PHP_SELF"];
 date_default_timezone_set("Asia/karachi");
$logindate = date("d/m/Y - h.i.s.A");
 if ($user == 'admin' && $pass == 'admin') {
     $_SESSION['user'] =$user;
     $_SESSION['pass']= $pass;
     $_SESSION['logdate']= $logindate;
     $_SESSION['logaction'] = $login;
     $_SESSION['table'] = [];
  
   array_push($_SESSION['table'], array("name"=>$_SESSION['user'], "action"=> $_SESSION['logaction'], "date"=>  $_SESSION['logdate'], "count"=> $_SESSION['logcount']));
   

     $_SESSION['start'] = time();

     $_SESSION['expire'] = $_SESSION['start'] + 0.5 ; 
    
    header("location: home.php");
 
     
}
else{
    echo "error";
}
}




?>
<div class='container'>
<div class='col-12'>
<form method="post">
<div class="center">
<h2 class='text-center'>Login form</h2>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="email" class="form-control " required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pass" class="form-control" required id="exampleInputPassword1" placeholder="Password">
  </div>
  <button  name='btn' class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<style>
.center{
    padding-top:350px;
    margin: 0 auto;
    width:400px;
    
}
</style>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
