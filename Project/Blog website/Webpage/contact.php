<?php
session_start();
if(isset($_SESSION['pagename']))  
    {  
 $epage =$_SESSION['pagename'];
  }
   

$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=myweb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //  $sql = "CREATE TABLE contactpage(
      //   id int primary key AUTO_INCREMENT,
      //   head nvarchar(100),
      //   back_img nvarchar(5000)
      //  )";
      //   $conn->exec($sql);


$sqli =("SELECT * FROM pageinfo  ORDER BY id DESC limit 1 ");
$stmti = $conn->prepare($sqli);
$stmti->execute();
$resulti = $stmti->setFetchMode(PDO::FETCH_ASSOC);
$info = $stmti->fetch();

if(isset($_POST['contact'])){
$n = $_POST['name'];
$e = $_POST['email'];
$s = $_POST['sub'];
$m = $_POST['message'];

$sql= "INSERT INTO clientcontacts (client_name,client_email,client_sub,client_text) VALUES ('$n','$e','$s','$m')";
  $conn->exec($sql); 
}


$sql =("SELECT * FROM contactpage  ORDER BY id DESC limit 1 ");
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$contact = $stmt->fetch();

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<?php include 'navbar.php'; ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo $contact['back_img']; ?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread"><?php echo $contact['head']; ?></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact us<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb contact-section">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" method="post" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" name='name'  class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" name='email' class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" name='sub' class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message"  id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
               <button name='contact'  class="btn btn-primary py-3 px-5"> Submit </button>
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-3 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<!-- <h3 class="mb-4">Address</h3> -->
	            <p><?php echo $info['page_address']; ?> </p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<!-- <h3 class="mb-4">Contact Number</h3> -->
	            <p><a href="tel://1234567920"><?php echo $info['phone_number']; ?></a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<!-- <h3 class="mb-4">Email Address</h3> -->
	            <p><a href="mailto:info@yoursite.com"><?php echo $info['page_mail']; ?> 	</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<!-- <h3 class="mb-4">Website</h3> -->
	            <p><a href="#">	<?php  echo $epage; ?></a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>


		
<?php include 'footer.php'; ?>
