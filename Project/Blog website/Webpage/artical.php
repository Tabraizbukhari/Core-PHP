<?php
session_start();
if(isset($_SESSION['username']))  
    {  
  	 $edname =   $_SESSION['username'];
   	$edid =  $_SESSION['id'];
   	$edimg =  $_SESSION['img'];  
	$eemail =$_SESSION['mail'];
$edabout =	$_SESSION['about'];
    // $epage =$_SESSION["pagename"];
  }
    else  
    {  
        session_destroy();
        session_unset();
      //  header("location: singleartical.php");  
    } 
$servername = "localhost";
$username = "root";
$password = "";

try {
	error_reporting(0);
    $conn = new PDO("mysql:host=$servername;dbname=myweb", $username, $password);
    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
// $sqlsub = "CREATE TABLE subcriber(
// 	id int primary key,
// 	email nvarchar(100)
// 	)";
// $conn->exec($sqlsub);



	$limit = 1;
$query = "SELECT * FROM blog";

$s = $conn->prepare($query);
$s->execute();
$total_results = $s->rowCount();

$total_pages = ceil($total_results/$limit);
// var_dump($total_pages);
if (!isset($_GET['page'])) {
    $page = 0; 
} else{
	$page = $_GET['page'];
	// var_dump($page);
}



$starting_limit = ($page-1)*$limit;
//   var_dump($starting_limit);
$sqlbl  = "SELECT * FROM blog ORDER BY blogid DESC LIMIT $starting_limit, $limit";
$stmtb = $conn->prepare($sqlbl);
$stmtb->execute();
$resultb = $stmtb->setFetchMode(PDO::FETCH_ASSOC);
// var_dump($stmtb);




    // $sqlbl =("SELECT * FROM blog");
    // $stmtb = $conn->prepare($sqlbl);
    // $stmtb->execute();
    // $resultb = $stmtb->setFetchMode(PDO::FETCH_ASSOC);
    // $blogers = $stmtb->fetchAll();


    $sqlu =("SELECT * FROM user ORDER BY userid DESC");
$stmtu = $conn->prepare($sqlu);
$stmtu->execute();
$resulu = $stmtu->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmtu->fetchAll();


// $sqla =("SELECT * FROM blog WHERE blogcategory LIKE '%Feature' ORDER BY blogid DESC limit 3 ");
// $stmta = $conn->prepare($sqla);
// $stmta->execute();
// // $last_id = $conn->lastInsertId();
// $resulta = $stmta->setFetchMode(PDO::FETCH_ASSOC);
// $feature = $stmta->fetchAll();

// $sqlh =("SELECT * FROM blog WHERE blogcategory LIKE '%Holiday' ORDER BY blogid DESC limit 2 ");
// $stmth = $conn->prepare($sqlh);
// $stmth->execute();
// $resulth = $stmth->setFetchMode(PDO::FETCH_ASSOC);
// $holiday = $stmth->fetchAll();


$sqlar =("SELECT * FROM articalpage ORDER BY arid DESC");
$stmtar = $conn->prepare($sqlar);
$stmtar->execute();
$resular = $stmtar->setFetchMode(PDO::FETCH_ASSOC);
$articaldata = $stmtar->fetchAll();

$sqlcate =("SELECT * FROM category Limit 3");
$stmtcate = $conn->prepare($sqlcate);
$stmtcate->execute();
$resultcate = $stmtcate->setFetchMode(PDO::FETCH_ASSOC);
$categ = $stmtcate->fetchAll();

$sqlcat =("SELECT * FROM category ORDER BY id DESC limit 1 ");
$stmtcat = $conn->prepare($sqlcat);
$stmtcat->execute();
$resultcat = $stmtcat->setFetchMode(PDO::FETCH_ASSOC);
$cat = $stmtcat->fetchAll();



$search = $_GET['search'];
 
 $sqlss="SELECT * FROM blog WHERE bloghead LIKE '%$search%' Or blogtag LIKE '%$search%' Or blogcategory LIKE '%$search%'";
$stmts=$conn->prepare($sqlss);
$stmts->bindValue(':keyword','%'.$search.'%');
$stmts->execute();
$results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
$searchbox = $stmts->fetchAll();



// $sqlp = " SELECT count(*) as num FROM blog ";
// $stmtp = $conn->prepare($sqlp);
// $stmtp->execute();
// $result = $stmtp->setFetchMode(PDO::FETCH_ASSOC);
// $ination = $stmtp->fetchAll();
// $ination = $stmtp[num];
	
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>


<?php include 'navbar.php'; ?>
<?php foreach ($articaldata as $art) {echo'    <section class="hero-wrap hero-wrap-2" style="background-image: url('.$art['background'].');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
     
	    <h1 class="mb-3 bread">'.$art['head'].'</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Foods <i class="ion-ios-arrow-forward"></i></span></p>
		
			</div>
        </div>
      </div>
	</section>'; break;} ?>



    <section class="ftco-section">
    	<div class="container">
        <div class="row">
        	<div class="col-lg-9">
        		<div class="row">
	   <?php       
	   
	   if($search != ""){
		foreach($searchbox as $se){		echo '

<div class="col-md-4 ftco-animate">
<div class="blog-entry">
<form method="post"> <a href="singleartical.php?blogid='.$se['blogid'].'&amp;Blogauthor='.$se['Blogauthor'].'" class="img-2"><img src="'.$se['blogimg'].'" class="img-fluid" alt="Colorlib Template"></a>
</form>
<div class="text pt-3">
<p class="meta d-flex"><span class="pr-3">'.$se['blogcategory'].'</span><span class="ml-auto pl-3">'.$se['blog_date_time'].'</span></p>
<h3><form method="post"><a href="singleartical.php?blogid='.$se['blogid'].'&amp;Blogauthor='.$se['Blogauthor'].'">'.$se['bloghead'].'</a></form></h3>
<p class="mb-0"><form method="post"><a href="singleartical.php?blogid='.$se['blogid'].'&amp;Blogauthor='.$se['Blogauthor'].'" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></form></p>
</div>
</div>
</div>';}	}
else{
	 
	while($blogers = $stmtb->fetchAll()){
	   foreach ($blogers as $blog) {		echo ' 			<div class="col-md-4 ftco-animate">
    						<div class="blog-entry">
		    					<a href="singleartical.php?blogid='.$blog['blogid'].'&amp;Blogauthor='.$blog['Blogauthor'].'" class="img-2"><img src="'.$blog['blogimg'].'" class="img-fluid" alt="Colorlib Template"></a>
			    				<div class="text pt-3">
	    							<p class="meta d-flex"><span class="pr-3">'.$blog['blogcategory'].'</span><span class="ml-auto pl-3">'.$blog['blog_date_time'].'</span></p>
	    							<h3><a href="singleartical.php?blogid='.$blog['blogid'].'&amp;Blogauthor='.$blog['Blogauthor'].'">'.$blog['bloghead'].'</a></h3>
	    							<p class="mb-0"><a href="singleartical.php?blogid='.$blog['blogid'].'&amp;Blogauthor='.$blog['Blogauthor'].'" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
	    						</div>
		    				</div>
    					</div>
	';} }	}
	  
?> 
        		</div>
        		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
						  <?php
					  for ($page=1; $page <= $total_pages ; $page++){
				echo'	  <li><a href="?page='.$page.'"> '.$page.'</a></li>
			
						';  }?>
		
		              </ul>
		            </div>
		          </div>
		        </div>
        	</div>

        	<div class="col-lg-3">
   <?php 	  if($edname != "") {
	     echo'		<div class="sidebar-wrap">
	        		<div class="sidebar-box p-4 about text-center ftco-animate">
			          <h2 class="heading mb-4">About us</h2>
			          <img src="'.$edimg.'" class="img-fluid" alt="Colorlib Template">
			          <div class="text pt-4">
			          	<p>Hi! My name is <strong>'.$edname.'</strong>'.$edabout.'</p>
			          </div>
	        		</div>'; } ?>
	        		<div class="sidebar-box p-4 ftco-animate">
	              <form action="#" method='get' class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input name="search" type="text" class="form-control" placeholder="Search" >
	                </div>
	              </form>
	            </div>
	            <div class="sidebar-box categories text-center ftco-animate">
				<?php foreach ($cat as $ca ) { echo '	          <h2 class="heading mb-4">'.$ca['head'].'</h2> ';} ?>
			          <ul class="category-image">
					  <?php foreach ($categ as $c ) {    echo'       	<li>
			<a href="foods.html" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url('.$c['cate_img'].');">
			          			<div class="text">
			          				<h3>'.$c['categories_name'].'</h3>
			          			</div>
			          		</a> 
						  </li>
					  ';} ?>
			          
			          </ul>
	        		</div>
            </div>
        	</div>
        </div>
    	</div>
    </section>

		
		


    <?php include 'footer.php'; ?>
    
  

  
