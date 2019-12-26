<?php 


session_start();


	
	if(isset($_SESSION['username']))  
    {  
		$_SESSION['pagename'] = $_SERVER["PHP_SELF"];
  	 $edname =   $_SESSION['username'];
   	$edid =  $_SESSION['id'];
   	$edimg =  $_SESSION['img'];  
	$eemail =$_SESSION['mail'];
$edabout =	$_SESSION['about'];
	// $epage =$_SESSION["pagename"];	

  }
    else  
    {  
		session_unset();
		
		$_SESSION['pagename'] = $_SERVER["PHP_SELF"];
	
      //  header("location: singleartical.php");  
    }  
  
$index = $_SERVER['PHP_SELF'];
$servername = "localhost";
$username = "root";
$password = "";

try {
	error_reporting(0);
    $conn = new PDO("mysql:host=$servername;dbname=myweb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    
    // $sql = "CREATE TABLE adminreply(
    //     adminid int  AUTO_INCREMENT,
    //     aname nvarchar(100),
    //    	aemail nvarchar(100),
    //     aweb  nvarchar(50),
    //     atext nvarchar(5000),
	// 	adate nvarchar(50),
	// 	atime nvarchar(50),
	// 	userid int,
	// 	PRIMARY KEY (adminid),
    // FOREIGN KEY (userid) REFERENCES usercomment(userid)
    //     )";
	// 	$conn->exec($sql);
		

	// slider 
	$sql =("SELECT shead,stext,sliderimage,scategory FROM slider");
    $stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$slider = $stmt->fetchAll();

// blogs
$sqlb =("SELECT * FROM blog  ORDER BY blogid DESC limit 4 ");
$stmtb = $conn->prepare($sqlb);
$stmtb->execute();
$resultb = $stmtb->setFetchMode(PDO::FETCH_ASSOC);
$blogs = $stmtb->fetchAll();




$sqlh =("SELECT * FROM blog WHERE blogcategory LIKE '%Holiday' ORDER BY blogid DESC limit 2 ");
$stmth = $conn->prepare($sqlh);
$stmth->execute();
$resulth = $stmth->setFetchMode(PDO::FETCH_ASSOC);
$holiday = $stmth->fetchAll();

$sqlbt =("SELECT abtimage,abthead,abttxt FROM about  ORDER BY abtid DESC limit 1 ");
$stmtbt = $conn->prepare($sqlbt);
$stmtbt->execute();
$resultbt = $stmtbt->setFetchMode(PDO::FETCH_ASSOC);
$about = $stmtbt->fetchAll();

$sqlbl =("SELECT * FROM blog");
$stmtb = $conn->prepare($sqlbl);
$stmtb->execute();
$resultb = $stmtb->setFetchMode(PDO::FETCH_ASSOC);
$blogers = $stmtb->fetchAll();




$sqlho =("SELECT blogcategory FROM blog WHERE blogcategory like '%Holiday'");
$stmtho = $conn->prepare($sqlho);
$stmtho->execute();
$resultho = $stmtho->setFetchMode(PDO::FETCH_ASSOC);
$countholi = $stmtho->fetchAll();

$sqlu =("SELECT userimage, username, userabout FROM user ORDER BY userid DESC");
$stmtu = $conn->prepare($sqlu);
$stmtu->execute();
$resulu = $stmtu->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmtu->fetchAll();


$sqlm =("SELECT head, messages,back_img,message_date,writer_name FROM admin_message ORDER BY id DESC");
$stmtm = $conn->prepare($sqlm);
$stmtm->execute();
$resulm = $stmtm->setFetchMode(PDO::FETCH_ASSOC);
$message = $stmtm->fetchAll();


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

$sqlfe =("SELECT blogcategory FROM blog WHERE blogcategory like '%Feature'");
$stmtfe = $conn->prepare($sqlfe);
$stmtfe->execute();
$resultfe = $stmtfe->setFetchMode(PDO::FETCH_ASSOC);
$countfea = $stmtfe->fetchAll();

if(isset($_SESSION['index'])){
	$_SESSION['index']  += 1;
 }
 else{
	$_SESSION['index'] = 1;
 }


 $search = $_GET['search'];
 
 $sqlss="SELECT * FROM blog WHERE bloghead LIKE '%$search%' Or blogtag LIKE '%$search%' Or blogcategory LIKE '%$search%'";
$stmts=$conn->prepare($sqlss);
$stmts->bindValue(':keyword','%'.$search.'%');
$stmts->execute();
$results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
$searchbox = $stmts->fetchAll();


	$sqla =("SELECT * FROM blog WHERE blogcategory LIKE '%Feature' ORDER BY blogid DESC limit 3 ");
$stmta = $conn->prepare($sqla);
$stmta->execute();
// $last_id = $conn->lastInsertId();
$resulta = $stmta->setFetchMode(PDO::FETCH_ASSOC);
$feature = $stmta->fetchAll();
	

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>
<?php include 'navbar.php'; ?>

    <section class="home-slider owl-carousel">


	<?php foreach ($slider as $data) {
		
		echo '
      <div class="slider-item">
        <div class="container">
          <div class="row d-flex slider-text justify-content-center align-items-center" data-scrollax-parent="true">
						
						<div class="img" style="background-image: url('.$data['sliderimage'].');"></div>

            <div class="text d-flex align-items-center ftco-animate">
				<div class="text-2 pb-lg-5 mb-lg-4 px-4 px-md-5">
				
		          	<h3 class="subheading mb-3">'.$data['scategory'].'</h3>
		            <h1 class="mb-5">'.$data['shead'].'</h1>
		            <p class="mb-md-5">'.$data['stext'].'</p>
		           </div>
            </div>

          </div>
        </div>
      </div>

          </div>
        </div>
      </div>'; }  ?>
	</section>
	
	

<?php	
	if($search != ""){ 		
	
echo	'<section class="ftco-section ftco-no-pt">
    	<div class="container">
		<div class="row">
		<div class="col-md-12">';

	  
		foreach ($user as $use) { echo'
				  <div class="sidebar-wrap">
					 <div class="sidebar-box p-4 ftco-animate">
				   <form action="#" method="get" class="search-form">
					 <div class="form-group">
					   <span class="icon icon-search"></span>
					   <input name="search" type="text" class="form-control" placeholder="Search" >
					  </div>
				   </form>
				 </div>
				 
		   </div>
			 </div>'; break;}
	echo'	</div>
		<div class="row">
			<div class="col-lg-10">
			
        		<div class="row">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4"><span>Serching</span></h2>
		          </div>
		        </div>
        		<div class="row">';

				foreach($searchbox as $se){		
					echo '
	
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
					</div>';} 	
			
						
					
    					
					
        	echo '	</div>
        	</div>

           </div>
    	</div>
    </section>'; } 	?>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
          <div class="col-md-7 heading-section ftco-animate">
            <h2 class="mb-4"><span>Recent Stories</span></h2>
          </div>
        </div>
  	<div class="row">


    			<div class="col-md-6 order-md-last col-lg-6 ftco-animate">
			<?php
		foreach ($blogers as $recent) {		echo ' 		<div class="blog-entry">
    			<div class="img img-big d-flex align-items-end" style="background-image: url('.$recent['blogimg'].');">
    						<div class="overlay"></div>
    						<div class="text">
    						<span class="subheading">'.$recent['blogcategory'].'</span> 
							
	<h3><a href="singleartical.php?blogid='.$recent['blogid'].'&amp;Blogauthor'.$recent['Blogauthor'].'">'.$recent['bloghead'].'</a></h3>
							
	<p class="mb-0"><a href="singleartical.php?blogid='.$recent['blogid'].'&amp;Blogauthor'.$recent['Blogauthor'].'" class="btn-custom">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
    						</div>
	    				</div>
    				</div> ' ; break;}  ?>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
    					
    					
			<?php	foreach($blogs as $recent){		echo '
    					<div class="col-md-6 ftco-animate">
    						<div class="blog-entry">
		    					<a href="singleartical.php?blogid='.$recent['blogid'].'&amp;Blogauthor='.$recent['Blogauthor'].'" class="img d-flex align-items-end" style="background-image: url('.$recent['blogimg'].');">
		    						<div class="overlay"></div>
			    				</a>
			    				<div class="text pt-3">
	    							<p class="meta d-flex"><span class="pr-3">'.$recent['blogcategory'].'</span><span class="ml-auto pl-3">'.$recent['blog_date_time'].'</span></p>
	    							<h3><a href="singleartical.php?blogid='.$recent['blogid'].'&amp;Blogauthor='.$recent['Blogauthor'].'">'.$recent['bloghead'].'</a></h3>
	    							<p class="mb-0"><a href="singleartical.php?blogid='.$recent['blogid'].'&amp;Blogauthor='.$recent['Blogauthor'].'" class="btn-custom">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
	    						</div>
							</div>
						</div>
					';  }	?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
        <div class="row">
        	<div class="col-lg-9">
        		<div class="row">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4"><span>Featured Posts</span></h2>
		          </div>
		        </div>
        		<div class="row">

				<?php
			
foreach($feature as $fea){		echo '

	<div class="col-md-4 ftco-animate">
	<div class="blog-entry">
	<form method="post"> <a href="singleartical.php?blogid='.$fea['blogid'].'&amp;Blogauthor='.$fea['Blogauthor'].'" class="img-2"><img src="'.$fea['blogimg'].'" class="img-fluid" alt="Colorlib Template"></a>
	</form>
	<div class="text pt-3">
	<p class="meta d-flex"><span class="pr-3">'.$fea['blogcategory'].'</span><span class="ml-auto pl-3">'.$fea['blog_date_time'].'</span></p>
	<h3><form method="post"><a href="singleartical.php?blogid='.$fea['blogid'].'&amp;Blogauthor='.$fea['Blogauthor'].'">'.$fea['bloghead'].'</a></form></h3>
	<p class="mb-0"><form method="post"><a href="singleartical.php?blogid='.$fea['blogid'].'&amp;Blogauthor='.$fea['Blogauthor'].'" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></form></p>
	</div>
	</div>
	</div>';} 	?>
    					
					
        		</div>
        	</div>

      
	 	<div class="col-lg-3">
     
		
	 	 		<div class="sidebar-wrap">
 <?php	  if($edname != "") {
	  echo'      		<div class="sidebar-box p-4 about text-center ftco-animate">
			          <h2 class="heading mb-4">About Me</h2>
			          <img src="'.$edimg.'" class="img-fluid" alt="Colorlib Template">
			          <div class="text pt-4">
			          	<p>Hi! My name is <strong>'.$edname.'</strong> '.$edabout.'</p>
			          </div>
	        		</div>'; } ?>
	        		<div class="sidebar-box p-4 ftco-animate">
	              <form action="#" method="get" class="search-form">
					<div class="form-group">
					  <span class="icon icon-search"></span>
					  <input name="search" type="text" class="form-control" placeholder="Search" >
					 </div>
	              </form>
				</div>
				
				
            </div>
        	</div>
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

    <section class="ftco-section">
    	<div class="container">
        <div class="row">
        	<div class="col-md-9">
        		<div class="row">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4"><span>Holiday Seasons Recipes</span></h2>
		          </div>
		        </div>
        		<div class="row">
					<?php foreach ($holiday as $ho) {
					echo '
        			<div class="col-md-6 col-lg-6 ftco-animate">
		    				<div class="blog-entry">
		    					<div class="img img-big img-big-2 d-flex align-items-end" style="background-image: url('.$ho['blogimg'].');">
		    						<div class="overlay"></div>
		    						<div class="text">
		    							<span class="subheading">'.$ho['blogcategory'].'</span>
		    							<h3><a href="singleartical.php?blogid='.$ho['blogid'].'&amp;Blogauthor='.$recent['Blogauthor'].'">'.$ho['bloghead'].'</a></h3>
		    							<p class="mb-0"><a href="singleartical.php?blogid='.$ho['blogid'].'&amp;Blogauthor='.$recent['Blogauthor'].'" class="btn-custom">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
		    						</div>
			    				</div>
		    				</div>
		    			</div>
		    			 ';} ?>
        		</div>
        	</div>
        	<div class="col-md-3">
        		<div class="sidebar-wrap pt-4">
	            <div class="sidebar-box categories text-center ftco-animate">
				<?php foreach ($cat as $ca ) { echo '	          <h2 class="heading mb-4">'.$ca['head'].'</h2> ';} ?>
			          <ul class="category-image">
					  <?php foreach ($categ as $c ) {    echo'       	<li>
			<a href="'.$c['pagelink'].'" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url('.$c['cate_img'].');">
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
   	
    
    <section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img" id="section-counter">
    	<div class="container">
    	<?php foreach($about as $abt){ echo '	<div class="row d-flex">
    			<div class="col-md-6 d-flex">
    				<div class="img d-flex align-self-stretch" style="background-image:url('.$abt['abtimage'].');"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4">'.$abt['abthead'].'</h2>
		            <p>'.$abt['abttxt'].'</p>
		          </div>
				</div>
				'; } ?>
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


	<?php include 'footer.php'; ?>
  
