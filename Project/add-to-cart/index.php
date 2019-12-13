<?php

$servername = "localhost";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=product", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
   
   
	// $sql ="CREATE TABLE user(
	// 	userid int AUTO_INCREMENT primary key, 		
	// 	username varchar(50),
	// 	email nvarchar(200),
	// 	userpass nvarchar(200),
	// 	userimage nvarchar(5000)
	//   )";
	// 	$conn->exec($sql);

	$sqlc =("SELECT cartid, cname, cdescrip, cprice, cimage, ID, qty, subtotal FROM cart");
    $stmtc = $conn->prepare($sqlc);
	$stmtc->execute();
	$result = $stmtc->setFetchMode(PDO::FETCH_ASSOC);
$cartc = $stmtc->fetchAll();


$sql =("SELECT ID, pname, pdescrip, price, pimage, qty FROM product");
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$product = $stmt->fetchAll();

if(isset($_POST['pbtn'])){
	$i= $_POST['img'];
    $d= $_POST['pdescrip'];
    $n= $_POST['pname'];
    $p= $_POST['price'];
	$id= $_POST['id'];
	$q = $_POST ['quantity'];

	$check = [];

	$qty = 1;
	$sqla ="SELECT * FROM cart WHERE ID = '$id' ";
    $stmts = $conn->prepare($sqla);
    $stmts->execute();
 
    $results = $stmts->setFetchMode(PDO::FETCH_COLUMN, 0);
	$carts = $stmts->fetch(); 
	
if(empty($carts)){
	 array_push($check, 'If qty='.$q);
	$sql ="INSERT INTO cart ( cname, cdescrip, cprice, cimage, ID, qty  ) VALUES ('$n','$d','$p','$i','$id','$qty')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$stmtu = $conn->prepare("UPDATE product set qty = $q - 1 where ID = $id ");
	$stmtu->execute();
	header('location: index.php');
}
else if($q > 0 ){
	 array_push($check, 'Else If qty='.$q);

	$sqls = "UPDATE cart set qty = qty + 1, subtotal = qty * cprice where ID = $id";
	$stmts = $conn->prepare($sqls);
	$stmts->execute();
	
	$sqlu = "UPDATE product set qty = $q - 1 where ID = $id ";
	$stmtu = $conn->prepare($sqlu);
	$stmtu->execute();
	header('location: index.php');
	
	}
	else{
			$a = "PRODCUT  ". $n . " is not avialable";
	}

	 var_dump($check);
}
    
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}




$conn = null;


    ?>
<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/nelsonleite/pen/RaGwba?depth=everything&order=popularity&page=4&q=product&show_forks=false" />
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

<link rel='stylesheet' href='custom.css'>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="cart.php">ShoppingCart</a></li>
      
    </ul>
  </div>
</nav>



<<div class="container">
	<div class="row">

	<?php foreach ($product as $data) {
		echo	'	<div class="col-xs-12 col-sm-6 col-md-4">
		
		
		<article class="card-wrapper">		
		
				<form method="post" action="">
			
			<div class="image-holder">
			<input name="id" type="hidden" name="id" value='.$data['ID'].' />
	
			<input name="img" type="hidden" name="cid" value='.$data['pimage'].' />
		<div  class="image-liquid image-holder--original" style="background-image: url('.$img = $data['pimage'].')">
					</div>
				</div>

				<div class="product-description">
					<!-- title -->
<h1  class="product-description__title">
<input type="hidden" name="pname"  value='.$data['pname'].' />
	'.$data['pname'].'
</h1>

					<!-- category and price -->
					<div class="row">
						<div class="col-xs-12 col-sm-8 product-description__category secondary-text">
						<input type="hidden" name="pdescrip" value='.$data['pdescrip'].' />
							'.$data['pdescrip'].'
						</div>
						<div  class="col-xs-12 col-sm-4 product-description__price">
						<input type="hidden" name="price" value='.$data['price'].' />
							'.$data['price'].'
						</div>
					</div>
					<input  type="hidden" name="quantity" value='.$data['qty'].' />
					<!-- divider -->
					<hr />

					<button class="btn"   name="pbtn"  class="image-holder__link">Add</button>
					"
				
				</div>
	</form>
			</article> 
		</div>'; } ?>
<div class="col-md-4">
<?php if(isset($a)){ echo $a; } ?>
</div>
		
		
	</div>
</div>

</body></html>


