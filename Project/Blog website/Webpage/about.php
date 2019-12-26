<?php 
session_start();
if(isset($_SESSION["username"]))  
    {  
        $sessioname = $_SESSION["username"];
    }  
    else  
    {  
        session_destroy();
    }  

  
    
    
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myweb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql =("SELECT * FROM aboutus ORDER BY id DESC");
$stmt = $conn->prepare($sql);
$stmt->execute();
$resul = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$about = $stmt->fetchAll();


$sqlbt =("SELECT * FROM about  ORDER BY abtid DESC limit 1 ");
$stmtbt = $conn->prepare($sqlbt);
$stmtbt->execute();
$resultbt = $stmtbt->setFetchMode(PDO::FETCH_ASSOC);
$aboutpage = $stmtbt->fetchAll();

$sqlm =("SELECT head, messages,back_img,message_date,writer_name FROM admin_message ORDER BY id DESC");
$stmtm = $conn->prepare($sqlm);
$stmtm->execute();
$resulm = $stmtm->setFetchMode(PDO::FETCH_ASSOC);
$message = $stmtm->fetchAll();


$sqlbl =("SELECT * FROM blog");
$stmtb = $conn->prepare($sqlbl);
$stmtb->execute();
$resultb = $stmtb->setFetchMode(PDO::FETCH_ASSOC);
$blogers = $stmtb->fetchAll();


$sqlfe =("SELECT blogcategory FROM blog WHERE blogcategory like '%Feature'");
$stmtfe = $conn->prepare($sqlfe);
$stmtfe->execute();
$resultfe = $stmtfe->setFetchMode(PDO::FETCH_ASSOC);
$countfea = $stmtfe->fetchAll();

$sqlho =("SELECT blogcategory FROM blog WHERE blogcategory like '%Holiday'");
$stmtho = $conn->prepare($sqlho);
$stmtho->execute();
$resultho = $stmtho->setFetchMode(PDO::FETCH_ASSOC);
$countholi = $stmtho->fetchAll();


if(isset($_SESSION['index'])){
    $_SESSION['index']  += 1;
 }
 else{
    $_SESSION['index'] = 1;
 }
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
?>
<?php include 'navbar.php'; ?>

 <?php
 foreach ($about as $ab) {
 echo '
 <section class="hero-wrap hero-wrap-2" style="background-image: url('.$ab['backimg'].');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">'.$ab['head'].'</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section> '; break; } ?>

		<section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img" id="section-counter">
    	<div class="container">
 <?php foreach ($aboutpage as $a) {
  
 echo'   		<div class="row d-flex">
    			<div class="col-md-6 d-flex">
    				<div class="img d-flex align-self-stretch" style="background-image:url('.$a['abtimage'].');"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4"><span>'.$a['abthead'].'</span></h2>
		            <p>'.$a['abttxt'].'</p>
		          </div>
		        </div> ';} ?>
		    		<div class="row">
                    <?php echo '    <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number='.count($blogers).'>0</strong> 
		                <span>Total number of Blogs</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number='.count($countfea).'>0</strong>
		                <span>Feature</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number='.count($countholi).'>0</strong>
		                <span>Holiday sessons</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number='.$_SESSION['index'].'>0</strong>
		                <span>Visitor Customers</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>'; ?>
        </div>
    	</div>
    </section>

    <?php foreach ($message as $msg) {
echo '
    <section class="ftco-section ftco-no-pt ftco-section-about ftco-no-pb bg-darken">
    	<div class="container-fluid">
    		<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-9 order-md-last img py-5" style="background-image: url('.$msg['back_img'].');"></div>

	        <div class="col-sm-6 col-md-6 col-lg-3 py-4 text d-flex align-items-center ftco-animate">
	        	<div class="text-2 py-5 px-4">
	            <h1 class="mb-3">'.$msg['head'].'</h1>
	            <p class="mb-md-5">'.$msg['messages'].'</p>
	            <span class="signature">'.$msg['writer_name'].'</span>
	          </div>
	        </div>
    		</div>
    	</div>
	</section>
	'; break;}?>
		
	

  
    <?php include 'footer.php'; ?>
