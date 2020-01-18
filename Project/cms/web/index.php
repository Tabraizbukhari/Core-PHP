<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php 
 
  // $session = session_id(); 
  // $time = time();
  // $time_out_in_sec = 10;
  // $time_out =  $time - $time_out_in_sec;
  
  // $sql = "SELECT * FROM usersonline WHERE user_session = '$session' "; 
  // $result = $conn->prepare($sql); 
  // $result->execute(); 
  // $count_useronline = $result->fetchColumn();

  // if($count_useronline == NULL){
  //     $sql = "INSERT INTO usersonline(user_session,user_time) VALUES ('$session','$time')"; 
  //     $conn->exec($sql); 
  // }else {
  //   $sql = "UPDATE  usersonline SET user_time='$time' WHERE  user_session='$session'"; 
  //   $conn->exec($sql); 
  // }
  
  //   $sql = "SELECT count(*) FROM usersonline WHERE user_time > '$time_out' "; 
  //   $result = $conn->prepare($sql); 
  //   $result->execute(); 
  //  $number_useronline = $result->fetchColumn();

              
?>


<?php 



$sql = "SELECT count(*) FROM blog "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_blog = $result->fetchColumn();


$sql = "SELECT count(*) FROM comment "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_comment = $result->fetchColumn();

$sql = "SELECT count(*) FROM users "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_user = $result->fetchColumn();

$sql = "SELECT count(*) FROM category "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_sub = $result->fetchColumn();


?>
<?php $name = $_SERVER['PHP_SELF']; ?>
<?php addpost(); ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php if(isset($name)){ echo basename($name);}?></li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-newspaper-o"></i>
              </div>
              <div class="mr-5"> <?php echo $number_of_blog; ?> &nbsp; BLOG POST</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="post.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><?php echo $number_of_comment; ?> Comments</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="comment.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php echo $number_of_user; ?>&nbsp; All users</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="user.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5"><?php echo $number_of_comment; ?> Subscribers</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

  <div class="row">

      <div class="col-md-7">
      <div id="columnchart_material" style="width: auto; height: 600px;"></div>
     
    </div>
    <div class="col-md-5">
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
  </div>
   
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <!-- <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer> -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div> -->
                    <?php 


$sql = "SELECT count(*) FROM blog WHERE post_status= 'draft' "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_darft = $result->fetchColumn();

$sql = "SELECT count(*) FROM blog WHERE post_status= 'published' "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_publish = $result->fetchColumn();


$sqls = "SELECT count(*) FROM comment Where comment_status= 'unapproved' "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_comment_unapprove = $result->fetchColumn();

$sqls = "SELECT count(*) FROM users Where user_status= 'active' "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_user_active = $result->fetchColumn();

$sqls = "SELECT count(*) FROM users Where user_status= 'unctive' "; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_user_unactive = $result->fetchColumn();

                    ?>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'count'],
              <?php 
            $element_text = ['active post','unactive post', 'categories','comments','pending comments','users','unactive users'];
            $element_count = [$number_of_publish,$number_of_darft, $number_of_sub, $number_of_comment,$number_of_comment_unapprove, $number_of_user, $number_of_user_unactive];
            for ($i=0; $i < 7; $i++){ 
             echo "['{$element_text[$i]}'". ",". "{$element_count[$i]}]," ;
            }

          

              ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Data', 'Hours per Day'],
          <?php 
           $element_text = ['active post','unactive post', 'categories','comments','pending comments','users','unactive users'];
           $element_count = [$number_of_blog,$number_of_darft, $number_of_sub, $number_of_comment,$number_of_comment_unapprove, $number_of_user, $number_of_user_unactive];
           for ($i=0; $i < 7; $i++){ 
             echo "['{$element_text[$i]}'". ",". "{$element_count[$i]}]," ;
            }
            


              ?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <?php include "include/footer.php" ?>
