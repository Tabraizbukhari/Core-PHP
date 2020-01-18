<?php include "include/database.php" ?>
<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>

<?php
error_reporting(0);
 $perpage =4;
if(isset($_GET['page'])){
    $pageination = $_GET['page'];
   
 }else{
     $pageination = "";
 }
 if($pageination == "" || $pageination == 1){
     $page_1=0;
 }else {
     $page_1= ($pageination * $perpage)-$perpage;
 }
 

$sql = "SELECT * FROM blog "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_count = $result->rowCount();
$number_count = ceil($number_count/$perpage);

$stmt = $conn->prepare("SELECT * FROM blog ORDER BY blog_id DESC LIMIT $page_1 , $perpage");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$bloger = $stmt->fetchAll();




?>
<?php if(isset($_GET['search'])){
    $search =  $_GET['search'];
}

if($search == ""){
?>
<?php 
// include "include/slider.php";
?>



    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                <?php  abt_select(); ?>
                <!-- Single Blog Area -->
            
                <?php  
                // latest_select(); 
                ?>
            </div>
        </div>
   <!-- ##### Blog Wrapper end ##### -->
<?php }   ?>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">

        <?php 
        if($search == ""){
            // echo $number_count;
        foreach($bloger as $blog){
            if($blog['post_status']=="published"){
         $content =   substr($blog['content'],0,200);
         $date = substr($blog['blog_date'],0,6);
                
                    echo  '          <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                        <div class="row align-items-center">
              
                   <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                <a href="single.php?blog_id='.$blog['blog_id'].'"> <img src="'.$blog['feature_img'].'" alt=""></a>
                                    <div class="post-date">
                                        <a href="single.php?blog_id='.$blog['blog_id'].'">'.$date.'</a>
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
            }
             }
             
                    $sql = "SELECT count(*) FROM blog WHERE post_status= 'published' "; 
                    $result = $conn->prepare($sql); 
                    $result->execute(); 
                    $number_of_blog = $result->fetchColumn();
                   
                if($number_of_blog > 4){
 echo'                    <div class="load-more-btn mt-100 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="1000ms">
                                            <a href="#" class="btn original-btn">Read More</a>
                                        </div>   ';}  }
                                //serach box content
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
                                            <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                                            <div class="row align-items-center">
                                  
                        <div class="col-12 col-md-6">
                        <div class="single-blog-thumbnail">
                        <a href="single.php?blog_id='.$blog['blog_id'].'"> <img src="'.$blog['feature_img'].'" alt=""></a>
                        <div class="post-date">
                        <a href="single.php?blog_id='.$blog['blog_id'].'">'.$date.'</a>
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
                     
            } 
        }
        
       
                                                              
            }  
                                                     
                   
?>

<?php    echo' 
    <hr> 
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">'; 
  
  for ($i=1; $i <= $number_count; $i++) {

   
        if($number_count!=1){
            
 
        if($i == $pageination){

            echo'
    <li class="page-item"><a class="page-link" style="background:darkblue; color: white;" href="index.php?page='.$i.'">'.$i.'</a></li>'; 

        }else {
            echo'  <li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>
  
                        ';
        }
        }
    
  

 }  echo'</ul>
            </nav>
            <hr>';?>
                </div>

                <?php include "include/sidebar.php" ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->
    <?php 
    // include "include/count_section.php"
    ?>

  
    <?php
    //  include "include/instagram.php"
     ?>
   <?php include "include/footer.php" ?>
