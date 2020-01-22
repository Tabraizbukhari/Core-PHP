<?php include "include/database.php" ?>
<?php include "include/header.php" ?>
<?php

if(isset($_GET['blog_id'])){
    $id =$_GET['blog_id'];

$stmt = $conn->prepare("SELECT * FROM blog WHERE blog_id='$id'");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$blog = $stmt->fetch();
    
    $_SESSION['cookie'] =$cookie_name = $id;
    $cookie_value = $id ;
    
    $_SESSION['cookie'] =$cookie_name = $id;
   
     
    if(isset($_POST['likebtn'])){ 
        $cookie_value = 'blue';
        setcookie( $cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $_SESSION['color']= "blue";
    
    }  
    
    if(isset($_POST['unlike'])){
        setcookie( $cookie_name, $cookie_value, time() - 360000);
        $cookie_value = 'black';
        setcookie( $cookie_name, $cookie_value, time() + (86400 * 30), "/");
        $_SESSION['color']="black";
      
    }
    if(isset($_COOKIE[$cookie_name])==($id)){
    echo' 
    <style>
        .fa-thumbs-up{
        color:'.$_SESSION['color']. '!important;
        }
    
        </style>';
    }
}
    // if($_COOKIE[$cookie_name]== $id){

    //         echo' 
    //         <style>
    //             .fa-thumbs-up{
    //             color:blue;
            
    //             </style>';
    //     }
   

//       if(isset($_GET['blog_id'])){

//         $id = $_GET['blog_id'];
// if(isset($_POST['likebtn'])){

// $stmt = $conn->prepare("SELECT * FROM blog WHERE blog_id='$id'");
// $stmt->execute();
// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $blog = $stmt->fetch();

//     $_SESSION['cookiename'] =  $cookie_name =$blog['category_id'];
//    $_SESSION['cookievalue']= $cookie_value = "blue";
      

//      $sql = "UPDATE blog SET likes = likes+1 WHERE blog_id='$id'";
// $lk = $conn->exec($sql);
//       }




// if(isset($_POST['unlike'])){
//     // $_SESSION['cookiename'] =  $cookie_name = "user";
//     //  $_SESSION['cookievalue']= $cookie_value = "black";
        
  
//        $sql = "UPDATE blog SET likes = likes-1 WHERE blog_id='$id'";
//   $lk = $conn->exec($sql); 
//   session_destroy();
        
//  header("location:single.php?blog_id=$id" );
  
//   }
// if(isset($_SESSION['cookiename']) && ($id)){
//     setcookie( $_SESSION['cookiename'], $id, time() + (86400 * 30), "/"); 
// } 

// // var_dump($_SESSION); 
// $stmt = $conn->prepare("SELECT * FROM blog WHERE blog_id='$id'");
// $stmt->execute();
// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $blog = $stmt->fetch();

// if(isset($_SESSION['cookiename']) == $blog['category_id']){
//     if(isset($_SESSION['cookievalue'])){
//     echo' <style>
//     .fa-thumbs-up{
//     color:'.$_SESSION['cookievalue'].'

//     </style>';
//     }else{
//         $_SESSION['count']=0;
//     }
// }
//                 }
    //  $cookie_name = "like";
    // $cookie_value= "red";
    // setcookie( $cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
// if(isset($_POST['likebtn'])){

//     $cookie_name = "user";
//     $cookie_value= "blue";
 

//  ';}


// }
// if(isset($_POST['unlikebtn'])){
//     $cookie_name = "user";
//     $cookie_value= "black";
//    if(isset($_COOKIE[$cookie_name])){
//         echo' <style>
//      .fa-thumbs-up{
//          color:'.$_COOKIE[$cookie_name].'
//      </style>
//      ';}

//      }
//     //  $cookie_name= "user";
//      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

// if(isset($_POST['liked'])){

//     $bid = $_POST['post_id'];

//     $sql = "SELECT * FROM blog WHERE blog_id='$bid'";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $liked = $stmt->fetchAll();
//    foreach ($liked as $like) {

//     $sql = "SELECT count(likes) FROM blog  WHERE blog_id='$bid' "; 
//     $result = $conn->prepare($sql); 
//     $result->execute(); 
//     $numberlike = $result->fetchColumn();


// } 
// $sql = "UPDATE blog SET likes = likes+1 WHERE blog_id='$bid'";
// $lk = $conn->exec($sql);

// } 
 
// if(isset($_POST['unliked'])){
//     $bid = $_POST['post_id'];

//     $sql = "SELECT * FROM blog WHERE blog_id='$bid'";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $liked = $stmt->fetchAll();
//    foreach ($liked as $like) {
  
  
   
// } 
// $sql = "UPDATE blog SET likes = likes-1 WHERE blog_id='$bid'";
// $un = $conn->exec($sql);
// } 


?>

<?php include "include/navbar.php" ?>
<?php addcomment();
?>

<?php 

    //  if(isset($_COOKIE[$cookie_name])){
    //     echo' <style>
    //  .fa-thumbs-up{
    //      color:'.$_COOKIE[$cookie_name].'
     
    //  </style>
    //  ';}
?>

<!-- ##### Single Blog Area Start ##### -->
    <div class="single-blog-wrapper section-padding-0-100">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="single-blog-area blog-style-2 mb-50">
                       <?php if(isset($_GET['blog_id'])){

                             $id = $_GET['blog_id'];
                
                    //     $stmt = $conn->prepare("SELECT tags FROM blog WHERE blog_id = '$id' ORDER BY blog_id DESC  ");
                    //     $stmt->execute();
                    //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    //     $bloger = $stmt->fetchAll();
                    //     print_r($bloger);
                    //     foreach ($bloger as $blog) {
                    //         $b = $blog['tags'];
                    //         echo $b;
                    //  echo  $co = substr($b,0,5);
                    //     }
                    
            if(isset($_SESSION['username'])){
                echo'<a class="btn btn-primary float-right" href="../admin/post.php?source=editpost&blog_id='.$id.'">Edit post</a>';
        }
        echo'    <div class=" pull-right">
        '; 
        echo '
        <form method="post">
        '; if($_SESSION['color']=="blue"){
echo'
        <button name="unlike" class="btn like" ><i class="fa fa-thumbs-up" aria-hidden="true"></i> </button>';
        }else{
                    echo ' <br><button name="likebtn" class="btn like" ><i class="fa fa-thumbs-up" aria-hidden="true"></i> </button>';
        }
        


            echo'
        </form>
        ';
    //     echo'       

    //     <form method="post">
    //    '; if($_COOKIE[$cookie_name] == "black"){
    //        echo' <button name="likebtn" class="btn like" ><i class="fa fa-thumbs-up" aria-hidden="true"></i> </button>';
    //     }else{ echo' <button name="unlikebtn" class="btn unlike" ><i class="fa fa-thumbs-down" aria-hidden="true"></i> </button>'; }
    //   echo'   </form>
    //       ';
         
    //       echo'               <a href="#" class=" unlike btn-link btn"> <h1><i class="fa fa-thumbs-down" aria-hidden="true"></i></h1></a>
    // ';   
                   echo'     </div>'; 
        //blog select single
                        blog_post_select($id);
                    
                 if(!isset($_SESSION['username'])){       
                $sqlc= "UPDATE blog  Set views_count= views_count + 1 WHERE blog_id = '$id' ";
                $conn ->exec($sqlc);
                 }
               
                                                         } 
                                        
            $stmt = $conn->prepare("SELECT * FROM comment");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $comment = $stmt->fetchAll();     


           
            if(isset($_GET['ids'])){
                $myid = $_GET['ids'];
              
                $sql= "DELETE FROM reply WHERE id='$myid' ";
               $conn ->exec($sql);
        
            }
            ?>
                   
                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mt-70">
                        <h5 class="title">Comments</h5>

                        <ol>
                          
                        <?php if(isset($_GET['blog_id'])){

$id = $_GET['blog_id'];    comment_select($id);  }?>
                        </ol>
                    </div>

                    <div class="post-a-comment-area mt-70">
                        <h5>Leave a reply</h5>
                        <!-- Reply Form -->
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input required type="text" name="name" id="name" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Name</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input  required type="email" name="email" id="email" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <input  required type="text" name="subject" id="subject" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <textarea   required name="message" id="message" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Comment</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="addcomment" class="btn original-btn">Reply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            
                <?php include "include/sidebar.php" ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "include/footer.php" ?>
<?php 
if(isset($_GET['blog_id'])){

    $id = $_GET['blog_id'];    

?>
    
    <!-- <script>


    $(document).ready(function() {
        var post_id =  <?php echo $id; ?>;
        var user_id = 25;
        $('.like').click(function() {
             $.ajax({
                    url: "single.php?blogid=<?php echo $id; ?>",
                    type: "post",
                    data:{
                        'liked': 1,
                        'post_id': post_id,
                        'user_id': user_id

                   }
             });
        });


        $('.unlike').click(function() {
             $.ajax({
                    url: "single.php?blogid=<?php echo $id; ?>",
                    type: "post",
                    data:{
                        'unliked': 1,
                        'post_id': post_id,
                        'user_id': user_id

                   }
             });
        });
    });

  
    </script> -->

<?php } ?>
