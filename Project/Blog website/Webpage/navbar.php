<?php 

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myweb", $username, $password);
   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


   $sql =("SELECT * FROM navbar   ");
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   $navbar = $stmt->fetchAll();

   $sqls =("SELECT * FROM logo ORDER BY id DESC   ");
   $stmt = $conn->prepare($sqls);
   $stmt->execute();

   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   $logo = $stmt->fetch();


  }catch(PDOException $e)
  {
  echo "Connection failed: " . $e->getMessage();
  }

    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Stories - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><?php echo $logo['logo']; ?><span>.</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
      <?php
      foreach($navbar as $nav){ echo'     <li class="nav-item"><a href="'.$nav['link'].'" class="nav-link">'.$nav['pagename'].'</a></li> ';} ?>
	        
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
