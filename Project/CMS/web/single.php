<?php include "include/database.php" ?>
<?php include "include/header.php" ?>
<?php

if(isset($_POST['liked'])){

    $post_id = $_POST['post_id'];
    $userid = $_POST['user_id'];
   
    //1 select post
$stmt = $conn->prepare("SELECT * FROM blog WHERE blog_id='$post_id'");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$blog = $stmt->fetch();
$like = $blog['likes'];


$sql = "SELECT count(likes) FROM blog "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_blog = $result->fetchColumn();

if($number_of_blog >= 1){
    echo $_POST['post_id'];
}
//2 update post like increment
$sql = "UPDATE blog SET likes=likes+1 WHERE blog_id='$post_id'";
$conn ->exec($sql);
//3 create like for post

$sql = "INSERT INTO likes(user_like_id,blog_id) VALUES('$userid','$post_id')";
$conn ->exec($sql);


}
//unlike 
if(isset($_POST['unliked'])){

    $post_id = $_POST['post_id'];
    $userid = $_POST['user_id'];
   
    //1 select post fetching
$stmt = $conn->prepare("SELECT * FROM blog WHERE blog_id='$post_id'");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$blog = $stmt->fetch();
$like = $blog['likes'];


$sql = "SELECT count(likes) FROM blog "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_blog = $result->fetchColumn();

if($number_of_blog >= 1){
    echo $_POST['post_id'];
}

//2 Delete like on likes table
$sql = "DELETE FROM likes WHERE blog_id='$post_id' AND user_like_id='$userid'";
$conn ->exec($sql);

//3 update post like decrement
$sql = "UPDATE blog SET likes=likes-1 WHERE blog_id='$post_id'";
$conn ->exec($sql);



}


?>

<?php include "include/navbar.php" ?>


<!-- ##### Single Blog Area Start ##### -->
    <div class="single-blog-wrapper section-padding-0-100">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="single-blog-area blog-style-2 mb-50">
                       <?php if(isset($_GET['blog_id'])){

                             $id = $_GET['blog_id'];
                             $stmt = $conn->prepare("SELECT * FROM blog WHERE blog_id = '$id' ORDER BY blog_id DESC  ");
                             $stmt->execute();
                             $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                             $bloger = $stmt->fetchAll();
                             foreach ($bloger as $bid) {
                                $userid = $bid['post_user_id'];
                             
                             addcomment($userid);
                             }
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
                          <hr>
                        <?php if(isset($_GET['blog_id'])){

$id = $_GET['blog_id'];    comment_select($id);  }?>
<hr>
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
<?php $userid = $_SESSION['id']; ?>
    <script>
    $(document).ready(function(){
        var post_id =  <?php echo $id; ?>;
        var user_id = <?php echo $userid; ?>;

        // like
        $('.like').click(function() {
            $.ajax({
               url:    "single.php?blogid=<?php echo $id; ?>",
               type:   "post",
               data: {
                        'liked': 1,
                        'post_id': post_id,
                        'user_id': user_id

                   }
            });
            window.location.reload();
        });

        //unlike
        $('.unlike').click(function() {
            $.ajax({
               url:    "single.php?blogid=<?php echo $id; ?>",
               type:   "post",
               data: {
                        'unliked': 1,
                        'post_id': post_id,
                        'user_id': user_id

                   }
            });
            window.location.reload();
        });
      
    });

    </script>


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

