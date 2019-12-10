<?php
$name ="Aboutus";
$datetime = date("d-m-y-h.i.sa");
$visit = 'visit';
$visitor = 0;
setcookie($name, $datetime, time() +20 );
setcookie($visit, $visitor, time() +20);

  
?>



<html>
<body>

<?php
if(!isset($_COOKIE[$name], $_COOKIE[$visit])){

echo "Page name ". $name . "not set";
echo "welcome 1st time";
$count = 1;
setcookie($visit, $count , time() +20);

}else{
   
    echo "page name ". $name . "</br>";
    echo "Date and timer &nbsp;" . $datetime. "</br>";
    $count = ++ $_COOKIE[$visit];
    setcookie($visit,$count, time() +20);
    echo "Your page views is ". $_COOKIE[$visit] . "</br>"; 
}
 

?>
<a href="index.php" > Home page </a>
<a href="contact.php" > Contact page </a>
</html>
</body>



