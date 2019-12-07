<?php   session_start();
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Do", $username, $password); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 /*  $sql ="create table user(
        userid int Primary key  AUTO_INCREMENT,
        username varchar(50),
        email nvarchar(50),
        password nvarchar(50))";

        $sqla = "create table blog(
            Blogid int  AUTO_INCREMENT,
            title varchar(50),
            slug varchar(50),
            excerpt varchar(50),
            content varchar(50),
            comment varchar(50),
            userid int,
            Primary key (Blogid),
            FOREIGN KEY (userid) REFERENCES user(userid) )";
            
        $conn->exec($sql);
        $conn->exec($sqla);
*/



    
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
   
    $conn = null;

  
    

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  rel="stylesheet">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  type="text/javascript"></script>
<style>
.center_div{
    padding-top:350px;
    margin: 0 auto;
    width:350px;
}
.bot{
    margin:0 auto;
    width:100px;
}
.creat{
    margin: 0 auto;
    width: 160px;
}
</style>
<div class='container-fluid '>

<div class='col-md-12'>
<div class="center_div">
<form method="post">
<label>Username:</label>
<input class="form-control" type='text' name='username' placeholder="Name"> <br/>
<label>Email:</label>
<input class="form-control" type='text' name='email' placeholder="email"> <br/>
<label>Password:</label>
<input class="form-control" type='password' name='password' placeholder="Password"> <br/>
 <br/>
<div class="bot">
<button class='btn btn-danger' name="submit">Registeration</button>
</div>
<div class='creat'>
<a  href="login.php"><h3>LOGIN HERE! </h3></a>
</div>
</form>

<?php
try{
       $conn = new PDO("mysql:host=$servername;dbname=Do", $username, $password); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['submit']))
{
    $n= $_POST['username'];
    $e= $_POST['email'];
    $p= $_POST['password'];

    
    $sql = "INSERT INTO user (username, email, password) VALUES ('$n','$e','$p')";
    $conn->exec($sql);
    echo "New record created successfully";
    }
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
   
    $conn = null;
?>
</div>
</div>

