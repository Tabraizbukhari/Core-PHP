<?php include "logincss.php" ?>
<?php
if(isset($_GET['lang']) && !empty($_GET['lang'])){
  $_SESSION['lang'] = $_GET['lang'];
  if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
      echo '<script type="text/javascript"> location.reload(); </script>';
  }
  if(isset($_SESSION['lang'])){
    include "language/".$_SESSION['lang'].".php";
  }else{
    include "language/en.php";
  }

}
?>

<div class='container-fluid '>

<div class='col-md-12 col-sm-12  '>
<div class="registration_center_div  ">

<form id="language" class="navbar-form navbar-right" action="">
  <div class="formgroup">
    <select name="lang" class="form-control" onchange="changelanguage()" >
      <option value="en" <?php   if(isset($_SESSION['lang']) && $_SESSION['lang'] == "en"){ echo "selected";} ?> >English</option>
      <option value="es" <?php   if(isset($_SESSION['lang']) && $_SESSION['lang'] == "es"){ echo "selected";} ?>>Spanish</option>
    </select>
  </div>
</form>

<?php echo'
<h1 style="color:red;" class="text-center">' .adduser(). '</h1>';
  ?>
<form method="post">
    <h3 class='text-center'><?php echo _register; ?></h3>

    <div class="form-row">
    <div class="form-group col-md-6">
    <h4><span class="label label-primary"><?php echo _lfirst; ?> :</span></h4>
      <input type="text" class="form-control" required name="fname" placeholder="<?php echo _first; ?>">
    </div>
    <div class="form-group col-md-6">
    <h4><span class="label label-primary"><?php echo _llast; ?>:</span></h4>
    <input type="text" class="form-control" required name="lname"  placeholder="<?php echo _last; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <h4><span class="label label-primary"><?php echo _lemail; ?> :</span></h4>
      <input type="text" class="form-control" required name="email"  placeholder="<?php echo _email; ?>">
    </div>
  </div>    
  <div class="form-row">
  
    <div class="form-group col-md-6">
    <h4><span class="label label-primary"><?php echo _lbirthday; ?> :</span></h4>
      <input type="date" class="form-control" required name="age">
    </div>
    <div class="form-group col-md-6">
    <h4><span class="label label-primary"><?php echo _lcity; ?> :</span></h4>
    <input type="text" class="form-control" required name="city"  placeholder="<?php echo _city; ?>">
    </div>
  </div> 
  <div class="form-row">
    <div class="form-group col-md-12">
    <h4><span class="label label-primary"><?php echo _laddress; ?>:</span></h4>
    <textarea class="form-control" required name="address" placeholder="<?php echo _address; ?>"></textarea>
    </div>
  </div>     

  <div class="form-row">
  
  <div class="form-group col-md-6">
  <h4><span class="label label-success"><?php echo _lpass; ?> :</span></h4>
    <input type="password" class="form-control" required name="pass">
  </div>
  <div class="form-group col-md-6">
  <?php  echo '<span style="color:red;"> '; adduser(); echo'</span>';?>
  <h4><span class="label label-danger"><?php echo _lcompass; ?> :</span></h4>
  <input type="text" class="form-control" required name="compass"  placeholder="<?php echo _password; ?>">
  </div>
</div> 
<div class="form-row">
<div class="form-group col-md-2">
<h4><span class="label label-danger">Gender :</span></h4> </div>
  <div class="form-group col-md-3">
  <h4><?php echo _lmale; ?> :  <input type="radio"  value="male" name="gender"></h4>
  
  </div>
  <div class="form-group col-md-2">
 
  <h4><?php echo _lfemale; ?> :  <input type="radio"  value="male" name="gender"></h4>
 
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

    <script>
        function changelanguage(){
            document.getElementById('language').submit();
        }
    </script>

<?php include "footer.php" ?>
