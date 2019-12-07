<?php

$servername ="localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=Do", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit']))
{
    $t= $_POST['title'];
    $e= $_POST['excerpt'];
    $c= $_POST['content'];
    $a= $_POST['comment'];
  
    if($t=="" || $e=="" || $c=="" || $a=="" ){
        $err = ' Fill All Form';
    }
    else{
    
    $sql = "INSERT INTO blog (title, excerpt, content, comment) VALUES ('$t','$e','$c','$a')";
    $conn->exec($sql);
    echo "New record created successfully";
    }
        }

} catch (PDOException $e) {
    echo "Connection fail". $e->getMessage(); 
}
  $conn = NULL;

session_start();
if(isset($_SESSION["username"]))  
    {  
        $sessioname = $_SESSION['username'];
    }  
    else  
    {  
        session_destroy();
         header("location: login.php");  
    }  

    ?>
<style>
.input{
    padding:10px;
}
.center_div{
    padding-top:50px;
    margin: 0 auto;
    width:600px;
    
}
.creat{
    padding:10px;
    margin-top:10px;
    width: 130px;
}

.btn{
    width:180px;
    padding:10px;
    margin-bottom:10px;
   

 }
 .loger{
    margin:0 auto;
    width:700px;
    padding-bottom:20px;
    margin-right:70px;
    font-family:bold ;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  rel="stylesheet">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  type="text/javascript"></script>
<div class="container-fluid">
<div class="col-md-12">

<div class="center_div">
<Form method="post" class="form-group">
<a href="log.php" class="btn btn-danger navbar-right">LOG-OUT</a>
<h3 class='loger'><?php echo "Welcome to home page: ". $sessioname; ?>

</h3>

<h2>CREATE BLOG</h2>
<div class="input form-group">
<label class="txt">Title :</label>
<input type="text" name='title' class="form-control ">
</div>

<div class="input">
<label class="txt">Excerpt :</label>
<input type="text" name='excerpt' class="form-control">
</div>
<div class="input">
<label class="txt">Content :</label>
<textarea name="content" class="form-control" id="area" col='80'  rows="5"></textarea>
</div>

<div class="input">
<label class="txt">Comment :</label>
<textarea name="comment" class="form-control" id="area" col='80'  rows="2"></textarea>
</div>
<div class="input">
<div class="navbar-right">
<button class='btn btn-danger' name="submit">Submit</button><br/>
<a  href="Bloglist.php" class="btn creat btn-primary"><h5>Blog List Here</h5></a>
</div>
<h2><?php if(isset($err)){ echo $err; }?></h2>
</div>
</form>
</div> 
</div>
</div>





