<?php


session_start();
if(isset($_SESSION["username"]))  
    {  
        $sessioname = $_SESSION["username"];
    }  
    else  
    {  
        session_destroy();
         header("location: login.php");  
    }  

$servername = "localhost";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=Do", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $sql =("SELECT Blogid, title, excerpt, content, comment FROM blog");
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $stmt->fetchAll();
    
    if(isset($_POST['delete'])){
       
        $bid =$_POST['id'];
        $sql= "DELETE FROM blog WHERE Blogid = '$bid' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        header("location: Bloglist.php");
        
    }

    
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

<style>
.log{
    margin:0 auto;
    width:180px;
    padding:20px;

    font-family:bold ;
}
.count{
    margin:0 auto;
    width:300px;


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
</style>
<div class="container">
<div class='col-md-12'>

<table class="table">
<h3 class='loger'><?php echo "Welcome to home page: ". $sessioname; ?></h3>
<h3 class='log'>BLOG LIST</h3>
<h4 class='count'><?php echo "TOTAL NUMBER OF BLOGS ARE :  ". count($arr); ?></h4>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">EXCERPT</th>
      <th scope="col">Content</th>
      <th scope="col">Comment</th>
    </tr>
  </thead>
  <tbody>   <?php
    foreach( $arr as $data ) 
{
    echo "<tr><div class='col-md-2'><td>".$data['Blogid']."</td> </div>
 
    <div class='col-md-2'>  <td>".$data['excerpt']."</td>  </div>
    <div class='col-md-2'>       <td>".$data['title']."</td>   </div>

    <div class='col-md-2'>        <td>".$data['content']."</td></div>
    <div class='col-md-2'>    <td>".$data['comment']."</td> </div>
    <div class='col-md-1'>    <td><a href='editblog.php?Blogid=".$data['Blogid']."'>Edit</a></td> </div>
    <div class='col-md-1'>    <td><form method='post'>
    <input type='hidden' name='id' value=".$data['Blogid']." />
    <button class='btn btn-danger' name='delete' >delete</button>
    </form></td> </div>
           ";
           

}

?>
    </tr>
  </tbody>

 
</table>



<Form method="post">
<div class='creat navbar-right'>
<a  href="index.php" class="btn btn-primary"><h5>Back</h5></a>
</div>
</form>
</div>
</div> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  rel="stylesheet">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  type="text/javascript"></script>
