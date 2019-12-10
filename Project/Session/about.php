<?php session_start();
$abt = $_SERVER["PHP_SELF"];
date_default_timezone_set("Asia/karachi");
$date= date("d/m/Y - h.i.s.A");
if(isset($_SESSION['abtc'])){
   $_SESSION['abtc']  += 1;
}
else{
   $_SESSION['abtc'] = 1;
}


if(isset($_SESSION['user'])){
$a = $_SESSION['user'];
$_SESSION['abtname'] = $abt;
$_SESSION['abtdate'] = $date;


  
   array_push($_SESSION['table'], array( "name"=>$_SESSION['user'], "action"=> $_SESSION['abtname'], "date"=>  $_SESSION['abtdate'], "count"=> $_SESSION['abtc']));
   

}
else{
header("location: index.php");
}


?>
<div class="container-fluid">
<div class='row'>
<div class="col-6">
<div class='text-center'><h1>Welcome to About page <?php echo $a; ?>  </h1> </div>
</div>

<div class='col-2'>

</div>
<div class="col-1">
<a href="home.php" class='text-left btn btn-primary' name="log" > Home</a>
</div>
<div class="col-1">
<a href="about.php" class='text-left btn btn-light' name="log" > About</a>
</div>
<div class="col-1">
<a href="contact.php" class='text-left btn btn-dark' name="log" > contact</a>
</div>
<div class="col-1">
<a href="logout.php" class='text-left btn btn-danger' name="log" > Logout </a>
</div>
</div>




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
