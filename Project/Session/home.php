<?php session_start();
    $home = $_SERVER["PHP_SELF"];
     date_default_timezone_set("Asia/karachi");
    $date= date("d/m/Y - h.i.s.A");
    
   
    


if(isset($_SESSION['user'])){
    $a = $_SESSION['user'];
    $_SESSION['homename'] = $home;
$_SESSION['homedate'] = $date;
if(isset($_SESSION['home'])){
        $_SESSION['home']  += 1;
     }
     else{
        $_SESSION['home'] = 1;
     }

  
   array_push($_SESSION['table'], array("name"=>$_SESSION['user'], "action"=> $_SESSION['homename'], "date"=>$_SESSION['homedate'], "count"=>$_SESSION['home']));


}
else{
    header("location: index.php");
}
 
