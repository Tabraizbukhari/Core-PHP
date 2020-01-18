<?php 

// home section 1 about
function abt_select() {

global $conn;
$stmt = $conn->prepare("SELECT * FROM about ORDER BY abt_id DESC Limit 1");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$about = $stmt->fetch();

$content = substr($about['abt_content'],0,320);
echo'
<div class="col-12 col-lg-7">
<div class="single-blog-area clearfix mb-100">
    <!-- Blog Content -->
    <div class="single-blog-content">
                            <div class="line"></div>
                      
                            <a href="single.php?abt_id='.$about['abt_id'].'" class="post-tag">'.$about['abt_tag'].'</a>
                            <h4><a href="#" class="post-headline">'.$about['abt_head'].'</a></h4>
                            <p>'.$content.' </p>
                            <a href="about.php?abt_id='.$about['abt_id'].'" class="btn original-btn">Read More</a>
                        </div> 
</div>
</div>
<!-- Single Blog Area -->
<div class="col-12 col-md-6 col-lg-5">
<div class="single-catagory-area clearfix mb-100">
  <img src="'.$about['abt_img'].'" alt="">
    <!-- Catagory Title -->
    <a href="about.php?abt_id='.$about['abt_id'].'">   <div class="catagory-title" style="color:white; font-size:12px;">
       '.$about['abt_img_title'].'
    </div></a>
</div>
</div>
';
}

// home section latest_post
function latest_select(){
global $conn;
$stmt = $conn->prepare("SELECT * FROM latest_post ORDER BY id DESC Limit 1");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$lates = $stmt->fetch();

echo' <div class="single-catagory-area clearfix mb-100">
<img src="'.$lates['img'].'" alt="">
<!-- Catagory Title -->
<div class="catagory-title">
    <a href="#">'.$lates['head'].'</a>
</div>
</div> ';
}


function advertisment_select() {

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM sidebar_ads ORDER BY id DESC Limit 1");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $ads = $stmt->fetch();

    echo'
    <h5 class="title">'.$ads['head'].'</h5>
                            <a href="'.$ads['img_link'].'"><img src="'.$ads['img'].'" alt=""></a>';

}
function sidebar_latestpost(){
                    global $conn;

                $stmt = $conn->prepare("SELECT * FROM blog ORDER BY blog_id DESC");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $bloger = $stmt->fetchAll();

                foreach ($bloger as $b ) 
                if($b['post_status']=="published"){
                {
                    echo'<!-- Single Blog Post -->
                    <div class="single-blog-post d-flex align-items-center widget-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="'.$b['feature_img'].'" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="single.php?blog_id='.$b['blog_id'].'" class="post-tag">'.$b['tags'].'</a>
                            <h4><a href="single.php?blog_id='.$b['blog_id'].'" class="post-headline">'.$b['head'].'</a></h4>
                            <div class="post-meta">
                                <p><a href="#">'.$b['blog_date'].'</a></p>
                            </div>
                        </div>
                    </div>';

                }
            }
}

function blog_post_select($id){
 global $conn;
    $stmt = $conn->prepare("SELECT * FROM blog WHERE blog_id = '$id' ORDER BY blog_id DESC  ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $bloger = $stmt->fetchAll();
    
    foreach ($bloger as $blogs) {
        echo'
        
        <div class="single-blog-content">
        <div class="line"></div>
        <a href="#" class="post-tag">'.$blogs['tags'].'</a>
        <h4><a href="#" class="post-headline mb-0">'.$blogs['head'].'</a></h4>
        <div class="post-meta mb-50">
            <p>By <a href="#">'.$blogs['author_name'].'</a></p>
            <p>'.$blogs['comment_count'].' comments</p>
        </div>
        <div class="img-responsive  d-inline-block "  >
        <image src="'.$blogs['blog_img'].'" style="height=10px;" class=" d-inline-block img-fluid" >
        </div>
       
         <p class="lead" >       '.$blogs['content'].'</p>
    
     
    </div>
    </div>
    <div class="blog-post-author mt-100 d-flex">
    <div class="author-thumbnail">
        <img src="'.$blogs['author_img'].'" alt="">
    </div>
    <div class="author-info">
        <div class="line"></div>
        <span class="author-role">Author</span>
        <h4><a href="#" class="author-name">'.$blogs['author_name'].'</a></h4>
        '; if($blogs['author_msg'] !=""){echo '
        <p>'.$blogs['author_msg'].'</p>';
        }echo'
    </div>
    </div>
    
        ';
    }


}


function addcomment(){
    global $conn;
  
    if(isset($_POST['addcomment'])){
      $name =$_POST['name'];
      $email = $_POST['email'];
      $sub = $_POST['subject'];
      $msg = $_POST['message'];
      $status = "unapproved";
      $date = date('d/M/Y');
      $post_id = $_GET['blog_id'];
      $sql = "INSERT INTO comment(comment_name,comment_email,comment_subject,comment_content,comment_post_id,comment_date) VALUES 
      ('$name','$email','$sub','$msg','$post_id','$date')";
      $conn->exec($sql);

 
    }
  
  
  }


function comment_select($id){
    global $conn;

    if(isset($_POST['admin'])){
        
        if(isset($_SESSION['id'])){
            $adminid =$_SESSION['id'];
            $text = $_POST['text'];
            $comment_id = $_POST['ide'];
            $admin_name =  $_SESSION['fname']."&nbsp;".$_SESSION['lname'];
           
           $date = date("y-m-d");
    
           $sql= "INSERT INTO reply (admin_id,text_reply,post_id,comment_id,reply_date,admin_name) VALUES ('$adminid','$text','$id','$comment_id','$date','$admin_name')";
           $conn->exec($sql); 
           
        }
           
           }

 
    $stmt = $conn->prepare("SELECT * FROM comment WHERE comment_post_id = '$id' AND comment_status = 'Approved' ORDER BY comment_id DESC  ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $comment = $stmt->fetchAll();

$arr = array();

 foreach($comment as $coment){
 
  array_push($arr, array("type" => "comment","id"=> $coment['comment_id'], "name"=> $coment['comment_name'],"content"=> $coment['comment_content'],"date"=> $coment['comment_date']));

    $admin = $coment['comment_id'];
    

$sqlar= "SELECT *  FROM reply where comment_id ='$admin' ORDER BY id DESC ";
$stmtar = $conn->prepare($sqlar);
$stmtar->execute();
$resultar = $stmtar->setFetchMode(PDO::FETCH_ASSOC);
$adrply = $stmtar->fetchAll();

  foreach($adrply as $adrpl){
array_push($arr, array("type" => "admin","post_id"=> $adrpl['post_id'],"replyid"=> $adrpl['id'],"id"=> $adrpl['comment_id'],"name" => $adrpl['admin_name'], "content"=> $adrpl['text_reply'],"date"=> $adrpl['reply_date']));
  }

    }
    
                     
    foreach ($arr as $c ) {
    
         if($c['type'] == "comment"){
             
        echo'      <li class="single_comment_area">
        <div class="comment-content d-flex">
    
            <div class="comment-meta">
            <a href="#" class="post-date">'.$c['date'].'</a>
            <p><a href="#" class="post-author text-uppercase">'.$c['name'].'</a></p>
            <p>'.$c['content'].'</p>';
      if(isset($_SESSION['id'])){   echo'
           <ol class="children">
            <li class="comment">
            <div class="comment-body">
    <div class="col-md-6">         
          <form method="post">
          <span class="btn-group">
            <input type="text" name="text" > 
            <input type="hidden" name="ide" value="'.$c['id'].'">
            <button class="reply btn btn-primary " name="admin">Reply</button>
          </span>
            </form>
            </div>
              </div>
        </li>
        </ol>';}
  
    
   
echo'         </div>
         
        </div>
       '; }elseif($c['type']=="admin" ){
       echo'
        <ol class="children">
        <li class="single_comment_area">';
        if(isset($_SESSION['id'])){   echo'
        <a href="single.php?blog_id='.$c['post_id'].'&ids='.$c['replyid'].'"  class="float-right">delete</a>';} echo'
            <div class="comment-content d-flex">
                <div class="comment-meta">
                <a href="#" class="post-date">'.$c['date'].'</a>
                <p><a href="#" class="post-author text-uppercase">'.$c['name'].'</a></p>
                <p>'.$c['content'].'</p>
            
                </div>
            </div>
        </li>
    </ol>';
       } echo'
        </li>
    
';  
// <a href="#" class="comment-reply">Reply</a>

}



}
function addsubscriber(){
    global $conn;

    if(isset($_POST['subscribe'])){
        $email = $_POST['email'];
        $sql = "INSERT INTO newsletter(subscriber) VALUES 
        ('$email')";
        $conn->exec($sql);
       
    }
}



function contactus(){
    global $conn;
  
    if(isset($_POST['contact'])){
      $name =$_POST['name'];
      $email = $_POST['email'];
      $sub = $_POST['subject'];
      $msg = $_POST['message'];
      $date = date('d-M-Y - H.m.sa');
      $sql = "INSERT INTO contact(c_name,email,c_subject,msg,c_date) VALUES 
      ('$name','$email','$sub','$msg','$date')";
      $conn->exec($sql);
    }
  }




 
  
  

  ?>
