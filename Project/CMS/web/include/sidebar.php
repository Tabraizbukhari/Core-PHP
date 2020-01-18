<?php
$stmt = $conn->prepare("SELECT * FROM latest_post ORDER BY id DESC Limit 1");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$lates = $stmt->fetch();


$stmts = $conn->prepare("SELECT * FROM category ");
$stmts->execute();
$result = $stmts->setFetchMode(PDO::FETCH_ASSOC);
$cate = $stmts->fetchAll();



  ?>
  <!-- ##### Sidebar Area ##### -->
  <div class="col-12 col-md-4 col-lg-3">
                    <div class="post-sidebar-area">

                        <!-- Widget Area -->
                        <!-- <div class="sidebar-widget-area">
                            <form action="#" class="search-form">
                                <input type="search" name="search" id="searchForm" placeholder="Search">
                                <input type="submit" value="submit">
                            </form>
                        </div> -->

                        <!-- Widget Area -->
                        <!-- <div class="sidebar-widget-area">
                            <h5 class="title subscribe-title">Subscribe to my newsletter</h5>
                            <div class="widget-content">
                                <form action="#" class="newsletterForm">
                                    <input type="email" name="email" id="subscribesForm" placeholder="Your e-mail here">
                                    <button type="submit" class="btn original-btn">Subscribe</button>
                                </form>
                            </div>
                        </div> -->

                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <?php advertisment_select(); ?>
                        </div>

                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title text-uppercase"><?php echo $lates['head']; ?></h5>

                            <div class="widget-content">

                        <?php sidebar_latestpost(); ?>
                                
                               
                            </div>
                        </div>

                      
                   <div class="sidebar-widget-area">
                            <h5 class="title">Tags</h5>
                            <div class="widget-content">
                                <?php  
                                        $stmt = $conn->prepare("SELECT tags FROM blog WHERE post_status = 'published' ");
                                        $stmt->execute();
                                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        $blog = $stmt->fetchAll(); 
                                        
                                   
                            
                            echo'    <ul class="tags">';
                            foreach ($blog  as $tags) { 
                                $t = explode(" ",$tags['tags']);
                               for ($i=0; $i < count($t); $i++) { 
                                 echo'   <li><a href="index.php?search='.$t[$i].'">'.$t[$i].'</a></li>';
                               }
                              
                            }
                            

?>                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget-area">
                            <h5 class="title">Categories</h5>
                            <div class="widget-content">
                            <ul class="list-group">
                                <?php 
                                 $stmt = $conn->prepare("SELECT * FROM blog ");
                                 $stmt->execute();
                                 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                 $bloger = $stmt->fetchAll();
 foreach ($cate as $c ) {
                               foreach ($bloger as $blog ) {
                                
                                     if($c['cat_name']== $blog['category_id']){
                                         $catego =$c['cat_name'];
                                        $sql = "SELECT count(*) FROM blog WHERE category_id='$catego'"; 
                                        $result = $conn->prepare($sql); 
                                        $result->execute(); 
                                        $number_of_blog = $result->fetchColumn();

                                        if($blog['post_status'] == "published"){
                                          
                                         
                                 echo'  
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                               <a href="category.php?category='.$c['cat_name'].'" >'.$c['cat_name'].' </a>
                            <span class="badge badge-primary badge-pill">'.$number_of_blog.'</span>
                              </li>
                               ';  } break; } 
                             } }?>
                            </ul>
                                            </div>
                        </div>
                       
              
