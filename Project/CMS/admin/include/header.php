
<?php include "include/database.php" ?>
<?php include "function.php" ?>

<?php ob_start(); ?>

<?php 
if(isset($_SESSION['username'])){

        $userid = $_SESSION['uid'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = '$userid' ");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll(); 
foreach ($user as $u) {

    $sessionuserid     =  $_SESSION['id']  =  $u['user_id'];  
    $username     =  $_SESSION['username']  =  $u['user_email'];       
    $userfirstname    =  $_SESSION['fname']     =  $u['user_first_name']; 
    $userlastname     =  $_SESSION['lname']     =  $u['user_last_name']; 
    $userage      =  $_SESSION['age']       =  $u['user_age'];
    $userpassword =  $_SESSION['pass']      =  $u['user_password']; 
    $userrole     =  $_SESSION['role']      = $u['user_role'];
    $userdate     =  $_SESSION['date']      = $u['user_date']; 
    $userimage    =  $_SESSION['img']       = $u['user_img'];     
    $useraddress  =  $_SESSION['address']   = $u['user_address'] ;
    $usercity     =  $_SESSION['city']      = $u['city'];
    $userbio      =  $_SESSION['bio']       = $u['user_bio'];

}
// $username   =  $_SESSION['username'];
// $firstname  =  $_SESSION['fname'];
// $lastname   =  $_SESSION['lname']; 
// $userage        =  $_SESSION['age']; 
// $userpassword   =  $_SESSION['pass']; 
// $userrole      =  $_SESSION['role'];
// $userdate       =  $_SESSION['date']; 
// $userimage      =  $_SESSION['img']; 
// $userid = $_SESSION['uid'];
// $useraddress = $_SESSION['address'];
// $usercity = $_SESSION['city'];
// $userbio  = $_SESSION['bio'];
}else{
  session_destroy();
  header('location: include/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<!--  
<div id='loadscreen'><div id='load'></div></div> -->
