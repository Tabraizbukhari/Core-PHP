<?php include "include/database.php" ?>
<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php if(isset($_GET['search'])){
    $search =  $_GET['search'];
}
error_reporting(0);

if($search == ""){
    echo'
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/b1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content text-center">
                        <h2>about us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
';
?>
<?php 


$stmt = $conn->prepare("SELECT * FROM about  ORDER BY abt_id DESC Limit 1");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$abt = $stmt->fetch();

   $content1 = substr($abt['abt_content'],0,290);
   $content2 = substr($abt['abt_content'],260,360);

echo'
    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100-0 clearfix">
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">'.$abt['abt_tag'].'</a>
                            <h4><a href="#" class="post-headline">'.$abt['abt_head'].'</a></h4>
                            <p class="mb-3">'.$content1.'</p>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <p class="mb-3">'.$content2.'</p>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="'.$abt['abt_img'].'" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="#">'.$abt['abt_img_title'].'</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->
'; 
echo'
<!-- ##### Blog Wrapper Start ##### -->
<div class="blog-wrapper section-padding-100-0 clearfix">
<div class="container">
<div class="row">
    <!-- Single Blog Area  -->';
    
$sqlss="SELECT * FROM blog ORDER BY blog_id DESC";
$stmts=$conn->prepare($sqlss);
$stmts->execute();
$results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
$bloger = $stmts->fetchAll();

    foreach($bloger as $blog){

        if($blog['post_status'] == "published"){
    
                         $content =   substr($blog['content'],0,200);
                         $date = substr($blog['blog_date'],0,6);
echo'
    <div class="col-12 col-md-6 col-lg-4">
        <div class="single-blog-area blog-style-2 mb-100">
            <div class="single-blog-thumbnail">
            <a href="single.php?blog_id='.$blog['blog_id'].'"> <img src="'.$blog['feature_img'].'" alt=""></a>
                <div class="post-date">
                <a href="single.php?blog_id='.$blog['blog_id'].'">'.$date.'</a>
                </div>
            </div>
            <!-- Blog Content -->
            <div class="single-blog-content mt-50">
                <div class="line"></div>
                <a href="single.php?blog_id='.$blog['blog_id'].'" class="post-tag">'.$blog['tags'].'</a>
                <h4><a href="single.php?blog_id='.$blog['blog_id'].'" class="post-headline">'.$blog['head'].'</a></h4>
                <p>'.$content.'</p>
                <div class="post-meta">
                    <p>By <a href="#">'.$blog['author_name'].'</a></p>
                    <p>'.$blog['comment_count'].' comments</p>
                </div>
            </div>
        </div>
    </div>
  ';} }
  echo'
</div>
</div>
</div>   
';                 
        
?>

    <?php 
    // include "include/count_section.php" 
} 
    else{
                                          
        $sqlss="SELECT * FROM blog WHERE head LIKE '%$search%' Or tags LIKE '%$search%' Or category_id LIKE '%$search%'";
        $stmts=$conn->prepare($sqlss);
        $stmts->bindValue(':keyword','%'.$search.'%');
        $stmts->execute();
        $results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
        $bloger = $stmts->fetchAll();
    
            foreach($bloger as $blog){

                if($blog['post_status'] == "published"){
            
                                 $content =   substr($blog['content'],0,200);
                                 $date = substr($blog['blog_date'],0,6);
echo'
<!-- ##### Blog Wrapper Start ##### -->
<div class="blog-wrapper section-padding-100-0 clearfix">
    <div class="container">
        <div class="row">
            <!-- Single Blog Area  -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-area blog-style-2 mb-100">
                    <div class="single-blog-thumbnail">
                    <a href="single.php?blog_id='.$blog['blog_id'].'"> <img src="'.$blog['feature_img'].'" alt=""></a>
                        <div class="post-date">
                        <a href="single.php?blog_id='.$blog['blog_id'].'">'.$date.'</a>
                        </div>
                    </div>
                    <!-- Blog Content -->
                    <div class="single-blog-content mt-50">
                        <div class="line"></div>
                        <a href="single.php?blog_id='.$blog['blog_id'].'" class="post-tag">'.$blog['tags'].'</a>
                        <h4><a href="single.php?blog_id='.$blog['blog_id'].'" class="post-headline">'.$blog['head'].'</a></h4>
                        <p>'.$content.'</p>
                        <div class="post-meta">
                            <p>By <a href="#">'.$blog['author_name'].'</a></p>
                            <p>'.$blog['comment_count'].' comments</p>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>
<!-- ##### Blog Wrapper End ##### -->
                               
            ';  
}
    }  if($blog['post_status'] != "published"){
    echo "<h1 class='text-center label-danger'>POST NOT FOUND </h1>";

    }                                                     

                                         
}


    ?>


  

   <?php include "include/footer.php" ?>
