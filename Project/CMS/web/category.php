<?php include "include/database.php" ?>
<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php 
// include "include/slider.php" 
?>
<?php
if(isset($_GET['category'])){
    $post_cat_id = $_GET['category'];
}

$stmts = $conn->prepare("SELECT * FROM blog ");
$stmts->execute();
$results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
$blogrs = $stmts->fetchAll();
foreach ($blogrs as $bs ) {

if($bs['post_status'] == "published" ){

$stmt = $conn->prepare("SELECT * FROM blog WHERE category_id ='$post_cat_id'");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$bloger = $stmt->fetchAll();

}

}
?>
    <!-- ##### Blog Wrapper Start ##### -->
    <!-- <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row align-items-end">
              
                <?php 
                // abt_select(); ?>
               
                <div class="col-12 col-md-6 col-lg-4">
                <?php  
                // latest_select(); ?>
                </div>
            </div>
        </div> -->
   <!-- ##### Blog Wrapper end ##### -->

   <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/b1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content text-center">
                        <h2> Category: <?php         foreach($bloger as $blog){ echo $blog['category_id']; break; } ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">

        <?php 
         $count = 0; 
         if($bloger > $count){
        foreach($bloger as $blog){
         $content=   substr($blog['content'],0,200);
           
                $count++;
                    echo  '          <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                        <div class="row align-items-center">
              
                   <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                <a href="single.php?blog_id='.$blog['blog_id'].'">    <img src="'.$blog['feature_img'].'" alt=""></a>
                                    <div class="post-date">
                                        <a href="single.php?blog_id='.$blog['blog_id'].'">'.$blog['blog_date'].'</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Blog Content -->
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="single.php?blog_id='.$blog['blog_id'].'" class="post-tag">'.$blog['tags'].'</a>
                                    <h4><a href="single.php?blog_id='.$blog['blog_id'].'" class="post-headline">'.$blog['head'].'</a></h4>
                                    <p>'.$content.'</p>
                                    <div class="post-meta">
                                        <p>By '.$blog['author_name'].'</p>
                                        <p>'.$blog['comment_count'].' comments</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
'; 

// echo'
//                     <!-- Single Blog Area  -->
//                     <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1000ms">
//                         <div class="row">
//                             <div class="col-12">
//                                 <div class="single-blog-thumbnail">
//                                     <img src="'.$blog['feature_img'].'" alt="">
//                                     <div class="post-date">
//                                         <a href="#">'.$blog['blog_date'].'</a>
//                                     </div>
//                                 </div>
//                             </div>
//                             <div class="col-12">
//                                 <!-- Blog Content -->
//                                 <div class="single-blog-content mt-50">
//                                     <div class="line"></div>
//                                     <a href="#" class="post-tag">'.$blog['tags'].'</a>
//                                     <h4><a href="#" class="post-headline">'.$blog['head'].'</a></h4>
//                                     <p>'.$blog['content'].'</p>
//                                     <div class="post-meta">
//                                         <p>By <a href="#">'.$blog['author_name'].'</a></p>
//                                         <p>'.$blog['comment_count'].' comments</p>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
 } 
                  
                   ; } 
                   
?>  
                    <!-- <div class="load-more-btn mt-100 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="1000ms">
                        <a href="#" class="btn original-btn">Read More</a>
                    </div>' -->
                </div>
                <?php include "include/sidebar.php" ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->
    <?php 
    // include "include/count_section.php";
    ?>

  
    <?php
    //  include "include/instagram.php"
     ?>
   <?php include "include/footer.php" ?>
