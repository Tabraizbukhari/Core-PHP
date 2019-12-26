



<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>
<style>
.slider{
    padding-top:60px;
}

.log{
    margin:0 auto;
    width:280px;
    padding:20px;

    font-family:bold ;
}
.creat{
    margin: 0 auto;
    width: 200px;
}
.btn{
    width:200px;
}
.loger{
    margin:0 auto;
    width:400px;
    padding-bottom:20px;
   padding-right:60px;
    font-family:bold ;
}
.ss{
    padding-top:50px;
}
</style>
<body>
   

     <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Concept</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                     
                     
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php if(isset($_SESSION['img'])){ echo $_SESSION['img'] ;} ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php if(isset($_SESSION['username'])){ echo $_SESSION['username'] ;} ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="editprofile.php"><i class="fas fa-user mr-2"></i>Edit Profile</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
 
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success"></span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">slider edit</a>
                                             <div id="submenu-1-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="blogedit.php">slider post</a>
                                                    </li>
                                                    
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="ecommerce-product-checkout.html">Product Checkout</a>
                                                    </li>
                                                </ul>
                                            </div> 
                                        </li>-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="slider.php" >slider</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="blog.php" >blogs</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="about.php">about page</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="adminmessage.php">Message</a>
                                            </li>
                           
                         
                           
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="newsletter.php">newsletter</a>
                                            <a class="nav-link" href="artical.php">pages header</a>
                                            <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Footer</a>
                                             <div id="submenu-1-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    
                                                    <li class="nav-item">
                                                    <a class="nav-link" href="footerabout.php">Section 1</a>
                                                    </li>
                                                    <li class="nav-item">
                                                    <a class="nav-link" href="helpinfo.php">Section 2</a>
                                                    </li>
                                                    <li class="nav-item">
                                                    <a class="nav-link" href="category.php">Section 3</a>
                                                    </li>
                                                    <li class="nav-item">
                                                    <a class="nav-link" href="pageinfo.php">Section 4</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div> 
                                      <li class="nav-item">
                                            <a class="nav-link" href="clientlist.php" >Client Contact List</a>
                              </li>
                              <li class="nav-item">
                                            <a class="nav-link" href="comment.php" >Blog Comment list</a>
                              </li><li class="nav-item">
                                            <a class="nav-link" href="subscriber.php" >Subscriber list</a>
                              </li>
                                    </ul>
                                </div>
                                
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>    



        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
        <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->

        
</body>

 
</html>
