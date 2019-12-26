<?php

session_start();
if(isset($_SESSION['username']))  
    {  
   $edname =   $_SESSION['username'];
   $edid =  $_SESSION['id'];
   $edimg =  $_SESSION['img'];  
    $eemail =$_SESSION['mail'];
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
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
// $sql = "CREATE TABLE pageinfo (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     page_address VARCHAR(30) NOT NULL,
//     phone_number VARCHAR(30) NOT NULL,
//     page_mail VARCHAR(30) NOT NULL
//     )";
//     $conn->exec($sql);

$articalid = $_GET['blogid'];
$author = $_GET['Blogauthor'];


$sql =("SELECT * FROM singlepage ORDER BY id DESC");
$stmt = $conn->prepare($sql);
$stmt->execute();
$resul = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$headdata = $stmt->fetchAll();

$sqlbl =("SELECT * FROM blog WHERE blogid = $articalid");
    $stmtb = $conn->prepare($sqlbl);
    $stmtb->execute();
    $resultb = $stmtb->setFetchMode(PDO::FETCH_ASSOC);
    $blogers = $stmtb->fetchAll();



$sqle =("SELECT * FROM user where username ='$author' ");
$stmte = $conn->prepare($sqle);
$stmte->execute();
$resule = $stmte->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmte->fetchAll();


$sqlbl =("SELECT * FROM blog ORDER BY blogid limit 3");
$stmtbs = $conn->prepare($sqlbl);
$stmtbs->execute();
$resultbs = $stmtbs->setFetchMode(PDO::FETCH_ASSOC);
$bla = $stmtbs->fetchAll();



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


$search = $_POST['search'];
 
 $sqlss="SELECT * FROM blog WHERE bloghead LIKE '%$search%' Or blogtag LIKE '%$search%' Or blogcategory LIKE '%$search%'";
$stmts=$conn->prepare($sqlss);
$stmts->bindValue(':keyword','%'.$search.'%');
$stmts->execute();
$results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
$searchbox = $stmts->fetchAll();

if(isset($_POST['message'])){
$n = $_POST['name'];
$e = $_POST['email'];
$w = $_POST['web'];
$mes = $_POST['mesage'];
date_timestamp_set("Asia/Karachi");
$date = date("y-m-d");
$time = date('h:i:sa');

$sql= "INSERT INTO usercomment (uname,uemail,uweb,utext,udate, utime , blogid) VALUES ('$n','$e','$w','$mes','$date','$time','$articalid')";
$conn->exec($sql); 


}
 
if(isset($_POST['admin'])){

  $n = $_POST['name'];
  $e = $_POST['email'];
  $mes = $_POST['text'];
  date_timestamp_set("Asia/Karachi");
  $date = date("y-m-d");
  $time = date('h:i:sa');
  
  $sql= "INSERT INTO adminreply (aname,aemail,atext,adate, atime, blogid, userid) VALUES ('$n','$e','$mes','$date','$time','$articalid')";
  $conn->exec($sql); 
  
  
  }



$sqlw= "SELECT *  FROM usercomment where blogid = $articalid";
$stmtw = $conn->prepare($sqlw);
$stmtw->execute();
$resultw = $stmtw->setFetchMode(PDO::FETCH_ASSOC);
$ucomment = $stmtw->fetchAll();

// var_dump($ucomment);

$arr = array();

 foreach($ucomment as $coment){
 
  array_push($arr, array("id"=> $coment['userid'], "name"=> $coment['uname'], "date"=> $coment['udate'], "time"=> $coment['utime'], "text"=> $coment['utext']));

    $id = $coment['userid'];

    
 
$sqlar= "SELECT *  FROM adminreply where userid = $id ";
$stmtar = $conn->prepare($sqlar);
$stmtar->execute();
$resultar = $stmtar->setFetchMode(PDO::FETCH_ASSOC);
$adrply = $stmtar->fetchAll();

  foreach($adrply as $adrpl){

array_push($arr, array("id" => $adrpl['adminid'], "name"=> $adrpl['aname'], "date"=> $adrpl['adate'], "time"=> $adrpl['atime'], "text"=> $adrpl['atext']));
  }

    }

    // var_dump($arr); die;
 //array_push($arr['table'], array("id"=> $adrply['adminid'], "name"=> $ucomment['aname'], "date"=> $adrply['adate'], "time"=> $adrply['atime'], "text"=> $adrply['atext']));

// if($sessioname != ""){
// $sqlse= "SELECT *  FROM usercomment";
// $stmtse = $conn->prepare($sqlw);
// $stmtse->execute();
// $resultse = $stmtse->setFetchMode(PDO::FETCH_ASSOC);
// $admin = $stmtse->fetchAll();
// }

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


?>

<?php include 'navbar.php'; ?>

 <?php foreach($headdata as $head) { 
     echo '
     <section class="hero-wrap hero-wrap-2" style="background-image: url('.$head['backimg'].');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">'.$head['head'].'</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Article Single<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>'; break;}?>

    
    <section class="ftco-section">
      <div class="container">
        <div class="row">
       
           <div class="col-lg-8 order-lg-last ftco-animate">
           <?php 
    foreach($blogers as $blog){   echo'  <h2 class="mb-3">'.$blog['bloghead'].'</h2>
            <img src="'.$blog['blogimg'].'" alt="" class="img-fluid"> <br/><br/>
          <p>'.$blog['blogpara'].'  </p>
           ';}?>
         
            
      <?php foreach ($user as $us) { echo'
          <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="'.$us['userimage'].'" alt="Image placeholder" width="auto" height="100">
              </div>
              <div class="desc">
                <h3>'.$us['username'].'</h3>
                <p>'.$us['userabout'].'</p>
              </div>
            </div>
      ';} ?>

            <div class="pt-5 mt-5">
              <h3 class="mb-5"> COMMENTS</h3>
           <ul class="comment-list">
       
           <?php foreach ($arr as $ar) {
           echo'  <li class="comment">
         
              <div class="comment-body">
                    <h3>'.$ar['name'].'</h3>
                    <div class="meta">'.$ar['date'].' at '.$ar['time'].'</div>
                    <p>'.$ar['text'].'</p>
                  
                  </div>
                </li>
 ';}
  ?>
              <!-- END comment-list -->
              <?php if($edname == ""){ echo '
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a message</h3>
                <form action="#" method="post" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" name="web"  class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea  name="mesage" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                  
                  <button name="message" class="btn py-3 px-4 btn-primary">Post Comment </button>
      
                  </div>

                </form>
              </div>
            </div> ' ; }else{

       echo'       <div class="comment-form-wrap pt-5">
       <h3 class="mb-5">Admin</h3>
       <form action="#" method="post" class="p-5 bg-light">
         <div class="form-group">
           <label for="name">Name *</label>
           <input type="text" name="name" readonly class="form-control" value="Admin">
         </div>
         <div class="form-group">
           <label for="email">Email *</label>
           <input type="email" name="email" readonly class="form-control" value="'.$eemail.'" id="email">
         </div>
        

         <div class="form-group">
           <label for="message">Message</label>
           <textarea  name="text" cols="30" rows="10" class="form-control"></textarea>
         </div>
         <div class="form-group">
         
         <button name="admin" class="btn py-3 px-4 btn-primary">Post Comment </button>

         </div>

       </form>
     </div>
   </div> ';
            }
 ?>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pr-lg-5 ftco-animate">
            <div class="sidebar-box">
              <form action="#" method="post" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" name="search" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
         <?php 
          if($search != ""){   echo' <div class="sidebar-box ftco-animate">
              <h3 class="heading mb-4">Searching</h3>';
           
            foreach($searchbox as $se){	
echo ' 
           
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url('.$se['blogimg'].');"></a>
                <div class="text">
                  <h3><a href="singleartical.php?blogid='.$se['blogid'].'&amp;Blogauthor='.$se['Blogauthor'].'">'.$se['blogpara'].'</a></h3>
                  <div class="meta">
                    <div><a href="singleartical.php?blogid='.$se['blogid'].'&amp;Blogauthor='.$se['Blogauthor'].'"><span class="icon-calendar"></span> '.$se['blog_date_time'].'</a></div>
                    <div><a href="singleartical.php?blogid='.$se['blogid'].'&amp;Blogauthor='.$se['Blogauthor'].'"><span class="icon-person"></span>'.$se['Blogauthor'].'</a></div>
                  </div>
                </div>
              </div>';  }  }
else{
      
      echo'      <div class="sidebar-box ftco-animate">
              <ul class="categories">';
              foreach ($cat as $ca ) { echo '	          <h2 class="heading mb-4">'.$ca['head'].'</h2> ';} 
             foreach ($categ as $c ) {    echo'   <li><a href="'.$c['pagelink'].'">'.$c['categories_name'].' </a></li> ';}

           echo'   </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading mb-4">Recent Blog</h3>';
         foreach($bla as $b){
echo ' 
           
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url('.$b['blogimg'].');"></a>
                <div class="text">
                  <h3><a href="singleartical.php?blogid='.$b['blogid'].'&amp;Blogauthor='.$b['Blogauthor'].'">'.$b['blogpara'].'</a></h3>
                  <div class="meta">
                    <div><a href="singleartical.php?blogid='.$b['blogid'].'&amp;Blogauthor='.$b['Blogauthor'].'"><span class="icon-calendar"></span> '.$b['blog_date_time'].'</a></div>
                    <div><a href="singleartical.php?blogid='.$b['blogid'].'&amp;Blogauthor='.$b['Blogauthor'].'"><span class="icon-person"></span>'.$b['Blogauthor'].'</a></div>
                  </div>
                </div>
              </div>';  } }?>
            

            <!-- <div class="sidebar-box ftco-animate">
              <h3 class="heading mb-4">Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">dish</a>
                <a href="#" class="tag-cloud-link">menu</a>
                <a href="#" class="tag-cloud-link">food</a>
                <a href="#" class="tag-cloud-link">sweet</a>
                <a href="#" class="tag-cloud-link">tasty</a>
                <a href="#" class="tag-cloud-link">delicious</a>
                <a href="#" class="tag-cloud-link">desserts</a>
                <a href="#" class="tag-cloud-link">drinks</a>
              </div>
            </div> -->

           
          </div>

        </div>
      </div>
    </section> <!-- .section -->
		
	

    <?php include 'footer.php'; ?>
