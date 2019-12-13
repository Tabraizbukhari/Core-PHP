<?php 
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=product", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  
    $sql ="UPDATE cart SET  subtotal = qty * cprice  where ID = ID ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 


   

    $sqlp ="SELECT ID, pname, pdescrip, price, pimage, qty FROM product";
    $stmtp = $conn->prepare($sqlp);
    $stmtp->execute();
    $result = $stmtp->setFetchMode(PDO::FETCH_ASSOC);
    $product = $stmtp->fetchAll();



    $sql ="SELECT cartid, cname, cdescrip, cprice, cimage, ID, qty, subtotal FROM cart";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $cart = $stmt->fetchAll();

    $sqla ="SELECT SUM(subtotal) as Total_amount FROM cart";
    $stmts = $conn->prepare($sqla);
    $stmts->execute();
 
    $results = $stmts->setFetchMode(PDO::FETCH_COLUMN, 0);
    $carts = $stmts->fetch(); 

    if (isset($_POST['updt'])) {
      $pid =$_POST['pid'];
      $cqty = $_POST['qty'];


      // $sqle ="SELECT qty as proqty FROM product where ID = '$pid'";
      // $stmte = $conn->prepare($sqle);
      // $stmte->execute();
      // $results = $stmte->setFetchMode(PDO::FETCH_COLUMN, 0);
      // $carte = $stmte->fetch(); 
      // // var_dump($carte);



       $sql ="UPDATE cart SET qty = $cqty  where ID = '$pid' ";
      $stmt = $conn->prepare($sql);
      $stmt->execute(); 
     
    
  }
    
if (isset($_POST['delete'])) {
    $cid =$_POST['cid'];
    $sql ="DELETE FROM cart where cartid = '$cid' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location: cart.php");
  
  

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
      <li class="active">

      <a href="cart.php">ShoppingCart</a></li>
     
    </ul>
  </div>
</nav>



<<div class="container">
	<div class="row">
<div class="col-md-6">
		<table class="table"> 
        <tr>
        
        <th>Product</th> 
    <th>Image</th>    <th>Description</th>
        <th>Price</th>
        <th>QTY</th>
        <th>sub total</th>
        
        </tr>
        <tbody>
        <?php 
        
        foreach ($cart as $data) {
     
    echo '<tr> 
   
    <td>'.$data['cname'].' </td>
    <td> <img src='.$data['cimage'].' alt="Smiley face" height="42" width="42"> </td>
    <td>'.$data['cdescrip'].' </td>
    <td>'.$data['cprice'].' </td>
<form method ="post">    <td>
    <input type="hidden" name="pid" value='.$data['ID'].' />
    <input type="number" name="qty" value='.$data['qty'].' />
  
    </td>
    <td> = '.  $data['subtotal'] .' </td>
    <td>  <button name="updt"> update </button>  </td> </form> 
    <form method="post" > <input type="hidden" name="pid" value='.$data['ID'].' /> </form>
    <td><form method ="post">
    <input type="hidden" name="cid" value='.$data['cartid'].' />
    <button name="delete"> DELETED </button> </form> </td>

    
   
    </tr>'; }

   echo'
   <tr> 
    <td></td>
    <td></td> <td></td>
    
         <td></td>
   <td>TOTAL </td>
          <td>
    = '.  $carts .'
         </td>
    </tr> <tr> 

    <td></td>
    <td> </td>
    <td></td>
    <td></td>
    <td></td>
    <td>
          <form method="post">
          <button name="mail" class="btn btn-info" >Buy Now</button>
          </form></td>
    </tr>'; ?>
      
        </tbody>
        <table>

		</div>
	</div>
</div>

</body></html>


