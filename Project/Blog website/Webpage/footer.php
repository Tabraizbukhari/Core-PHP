<?php 
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=myweb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
if(isset($_POST['subscribe'])){
     
  $email =$_POST['email'];
    $sql ="INSERT INTO subscriber (email) VALUES ('$email')";
         $conn->exec($sql);
}
    // $sql = "CREATE TABLE subscriber (
    //   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //   email nvarchar(500) NOT NULL
    //       )";
  
    //   $conn->exec($sql);

    $sqlbl ="SELECT * FROM newsletter ORDER BY  letterid DESC Limit 1";
    $stmtb = $conn->prepare($sqlbl);
    $stmtb->execute();
    $resultb = $stmtb->setFetchMode(PDO::FETCH_ASSOC);
    $newsletter = $stmtb->fetchAll();

    $sqlbt ="SELECT abtimage,abthead,abttxt FROM about  ORDER BY abtid DESC limit 1 ";
$stmtbt = $conn->prepare($sqlbt);
$stmtbt->execute();
$resultbt = $stmtbt->setFetchMode(PDO::FETCH_ASSOC);
$about = $stmtbt->fetchAll();

$sqli ="SELECT * FROM pageinfo  ORDER BY id DESC limit 1 ";
$stmti = $conn->prepare($sqli);
$stmti->execute();
$resulti = $stmti->setFetchMode(PDO::FETCH_ASSOC);
$info = $stmti->fetchAll();

$sqlfbt ="SELECT * FROM footerabt ";
$stmtfbt = $conn->prepare($sqlfbt);
$stmtfbt->execute();
$resultfbt = $stmtfbt->setFetchMode(PDO::FETCH_ASSOC);
$fbt = $stmtfbt->fetch();


$sqlhe ="SELECT * FROM helpinfo Limit 5";
$stmthe = $conn->prepare($sqlhe);
$stmthe->execute();
$resulthe = $stmthe->setFetchMode(PDO::FETCH_ASSOC);
$helpinfo = $stmthe->fetchAll();

$sqlhel ="SELECT * FROM helpinfo ORDER BY id DESC limit 1 ";
$stmthel = $conn->prepare($sqlhel);
$stmthel->execute();
$resulthel = $stmthel->setFetchMode(PDO::FETCH_ASSOC);
$help = $stmthel->fetchAll();

$sqlcate ="SELECT * FROM category Limit 5";
$stmtcate = $conn->prepare($sqlcate);
$stmtcate->execute();
$resultcate = $stmtcate->setFetchMode(PDO::FETCH_ASSOC);
$categ = $stmtcate->fetchAll();

$sqlcat ="SELECT * FROM category ORDER BY id DESC limit 1 ";
$stmtcat = $conn->prepare($sqlcat);
$stmtcat->execute();
$resultcat = $stmtcat->setFetchMode(PDO::FETCH_ASSOC);
$cat = $stmtcat->fetchAll();

}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
<?php foreach($newsletter  as $letter){ echo '
<section class="ftco-subscribe ftco-section bg-light">
      <div class="overlay">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-8 text-wrap text-center heading-section ftco-animate">
              <h2 class="mb-4"><span>'.$letter['letterhead'].'</span></h2>
              <p>'.$letter['letterpara'].'</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" method="post" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="email" name="email" class="form-control" placeholder="Enter email address">
                      <button name="subscribe" class="submit px-3">Subscribe</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>';} ?>

<footer class="ftco-footer ftco-footer-2 ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><?php  echo $fbt['head']; ?></h2>
              <p><?php  echo $fbt['para']; ?></p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="<?php  echo $fbt['facebook_link']; ?>"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="<?php  echo $fbt['instagram_link']; ?>"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="<?php  echo $fbt['twitter_link']; ?>"><span class="icon-twitter"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
            <?php foreach ($help as $hee ) {   echo ' <h2 class="ftco-heading-2">'.$hee['head'].'</h2> '; } ?>
              <ul class="list-unstyled">
<?php foreach ($helpinfo as $he ) {   echo'   <li><a href="'.$he['page_link'].'" class="py-2 d-block">'.$he['page_name'].'</a></li> ';
  }                  
               ?> 
             
              </ul>
            </div>
          </div>
     <div class="col-md">
             <div class="ftco-footer-widget mb-4">
     
 <?php foreach ($cat as $ca ) {   echo ' <h2 class="ftco-heading-2">'.$ca['head'].'</h2> '; } ?>
              <ul class="list-unstyled">
<?php foreach ($categ as $c ) {   echo'   <li><a href="'.$c['pagelink'].'" class="py-2 d-block">'.$c['categories_name'].'</a></li> ';
  }                  
               ?> 
              </ul>  
            </div>
          </div>
          <div class="col-md">
   <?php foreach($info as $inf){echo ' 
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2"> '.$inf['head'].'</h2>
            	<div class="block-23 mb-3">
        
            <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">'.$inf['page_address'].'</span></li>
	                <li><span class="icon icon-phone"></span><span class="text">'.$inf['phone_number'].'</span></li>
	                <li><span class="icon icon-envelope"></span><span class="text">'.$inf['page_mail'].'</span></li>
	              </ul>
	            </div>
            </div>' ;}  ?>
          </div>
        </div>
        
      </div>
    </footer>

    <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
  
</body>
</html>
