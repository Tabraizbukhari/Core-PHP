
<?php

$servername = "localhost";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=Do", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $bid = $_GET['Blogid'];
   
    $sql =("SELECT title, excerpt, content, comment FROM blog where Blogid= $bid");
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $stmt->fetch();
  
  

        if(isset($_POST['submit']))
{
    $t= $_POST['title'];
    $e= $_POST['excerpt'];
    $c= $_POST['content'];
    $a= $_POST['comment'];
    
    $sql =("UPDATE blog set title='$t', excerpt='$e', content='$c', comment='$a' where Blogid= $bid");
    $conn->exec($sql);
    echo "New record created successfully";
    
    
}
    
if(isset($_POST['delete'])){
    $sqla= ("DELETE FROM blog WHERE Blogid=$bid");
       $stmt = $conn->prepare($sqla);
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
.input{
    padding:10px;
}
.center_div{
    padding-top:20px;
    margin: 0 auto;
    width:700px;
    
}
.creat{
    margin: 0 auto;
    width: 160px;
}

.btn{
    width:200px;
    margin:10px;
 }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  rel="stylesheet">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  type="text/javascript"></script>
<div class="container-fluid">
<div class="col-md-12">
<div class="center_div">
<Form method="post" class="form-group" action="">
<h2>Edit your Blogs</h2>


<div class="input">
<label class="txt">Title :</label>
<input type="text" name='title' class="form-control" value=" <?php echo $arr['title']; ?>">
</div>

<div class="input">
<label class="txt">Excerpt :</label>
<input type="text" name='excerpt' class="form-control" value=" <?php echo $arr['excerpt']; ?> ">
</div>
<div class="input">
<label class="txt">Content :</label>
<textarea name="content" class="form-control" id="area" col='80'  rows="5" ><?php echo $arr['content']; ?></textarea>
</div>

<div class="input">
<label class="txt">Comment :</label>
<textarea name="comment" class="form-control" id="area" col='80'  rows="2"><?php echo $arr['comment']; ?></textarea>
</div>
<div class="input">
<button class='btn btn-danger' name="submit">Update</button>
<button class='btn btn-danger' name="delete">Delete</button>

<a href="Bloglist.php" class="btn btn-primary">BAck</a>

<br/>
</div>

<h2><?php if(isset($err)){ echo $err; }?></h2>
</div>
</form>

</div> 
</div>
</div>

