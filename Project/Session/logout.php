<?php 
session_start();
 header('Refresh: 4'); 
$log = $_SERVER["PHP_SELF"];;
date_default_timezone_set("Asia/karachi");
$date = date("d/m/Y - h.i.s.A");

    $_SESSION['logname'] = $log;
    $_SESSION['logdate'] = $date;
if(isset($_SESSION['user'])){
    $a = $_SESSION['user'];

    
  
    array_push($_SESSION['table'], array("name"=> $_SESSION['user'], "action"=> $_SESSION['logname'], "date"=> $_SESSION['logdate']));
    

              
                // $dates =  $_SESSION['homedate'];
                // $hpage =$_SESSION['pagename'];
// var_dump($_SESSION['table']);

  /// about 


//  $_SESSION['table'] = array(
//   array("name"=>$_SESSION['user'], "action"=> $_SESSION['logaction'], "date"=>  $_SESSION['logdate'], "count"=> $_SESSION['logcount']),
//   array("name"=>$_SESSION['user'], "action"=> $_SESSION['homename'], "date"=>$_SESSION['homedate'], "count"=>$_SESSION['home']),
//   array( "name"=>$_SESSION['user'], "action"=> $_SESSION['abtname'], "date"=>  $_SESSION['abtdate'], "count"=> $_SESSION['abtc']),
//  array( "name"=> $_SESSION['user'], "action"=> $_SESSION['pagename'], "date"=> $_SESSION['cntdate'], "count"=> $_SESSION['count']),
//  );



//  array_multisort($_SESSION[0][2], SORT_ASC, SORT_STRING,
//                 $_SESSION[0], SORT_NUMERIC, SORT_DESC);
//                 var_dump($_SESSION['table']);

}

$expireAfter = 0.8;

if(isset($_SESSION['last_action'])){
    

    $secondsInactive = time() - $_SESSION['last_action'];
    
    $expireAfterSeconds = $expireAfter * 0.2;
    
    $url=$_SERVER['REQUEST_URI'];
    header("Refresh: 4; URL=$url");

    if($secondsInactive >= $expireAfterSeconds){
  
        session_unset();
        session_destroy();
        header("Refresh: 4; url='index.php'");
        header("location: index.php");
        
    }
    else{
      ("location: index.php");
    }
    
}
 
$_SESSION['last_action'] = time();


?>


<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">Visiter name</th>
      <th scope="col">Action</th>
      <th scope="col">Datetime</th>
    </tr>
  </thead>
  <tbody>

  <?php  
//  array_push($_SESSION['table']);
foreach ($_SESSION['table'] as $row ) {

 
   
echo
  "  <tr> <td>" . $row['name'] . "</td>
   <td>". $row['action'] ."</td>
   <td>". $row['date'] ."</td>
    </tr>"; 
}

?>
    
  </tbody>
</table>





<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
