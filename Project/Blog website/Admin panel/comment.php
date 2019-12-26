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
    $conn = new PDO("mysql:host=$servername;dbname=myweb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql =("SELECT * FROM usercomment ");
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $commentdata = $stmt->fetchAll();

    if(isset($_POST['delete'])){
        $id =$_POST['uid'];
        $sql= "DELETE FROM usercomment WHERE userid = '$id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        header("location: comment.php");
       }

       
       if(isset($_POST['update']))
    {
    
        $id = $_POST['myid'];
        $n = $_POST['name'];
        $e = $_POST['email'];
        $s = $_POST['web'];
        $t = $_POST['txt'];
        date_timestamp_set("Asia/Karachi");
$date = date("y-m-d");
$time = date('h:i:sa');
       
        
            $sql =("UPDATE usercomment set uname = '$n', uemail='$e' ,uweb='$s',utext='$t',udate= '$date', utime='$time' where userid= $id");
            $conn->exec($sql);
    
            header('location: comment.php');
        }




        $sql =("SELECT * FROM adminreply ");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $admindata = $stmt->fetchAll();
    
        if(isset($_POST['admindelete'])){
            $id =$_POST['id'];
            $sql= "DELETE FROM adminreply WHERE adminid = '$id' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            header("location: comment.php");
           }
    
           
           if(isset($_POST['adminupdate']))
        {
        
            $id = $_POST['myid'];
            $n = $_POST['name'];
            $e = $_POST['email'];
        $t = $_POST['txt'];
            date_timestamp_set("Asia/Karachi");
    $date = date("y-m-d");
    $time = date('h:i:sa');
           
            
                $sql =("UPDATE adminreply set aname = '$n', aemail='$e' ,atext='$t',adate= '$date', atime='$time' where adminid= $id");
                $conn->exec($sql);
        
                header('location: comment.php');
            }
    
    
    
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>
<?php include 'navbar.php'; ?>
<div class="container">
<div class="col-md-12">
<div class="ss" style="margin-bottom:100px;">
<table class="table">
<h3 class='log'>User comment list</h3>
  <thead>
    <tr>
      <th scope="col">User id</th>
      <th scope="col">User Name</th>
      <th scope="col">User email</th>
      <th scope="col"> User web</th>
        <th scope="col">User Comment</th>
        <th scope="col">Comment Date</th>
        <th scope="col">Comment time</th>
        <th scope="col">blog id</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($commentdata as $c) {
echo'    <tr>

 <td>'.$c['userid'].' </td>

 <td>'.$c['uname'].' </td><td>'.$c['uemail'].' </td><td>'.$c['uweb'].' </td><td>'.$c['utext'].' </td>
 <td>'.$c['udate'].' </td>  <td>'.$c['utime'].' </td> <td>'.$c['blogid'].' </td>

 
 
<td>
<button type="button" class="btn-link" data-toggle="modal" data-target="#'.$c['userid'].'">
 edit
</button>
<div class="modal" id="'.$c['userid'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ADMIN MESSAGE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="name"  placeholder="Heading" value="'.$c['uname'].'">
    </div>
    <div class="form-group col-md-10">
    <input type="text" class="form-control" name="email"  placeholder="Heading" value="'.$c['uemail'].'">
  </div> 
    <div class="form-group col-md-10">
  <input type="text" class="form-control"  name="web"  placeholder="Heading" value="'.$c['uweb'].'">
</div>

  
<div class="form-group col-md-10">
<textarea class="form-control" rows="5"  name="txt"  placeholder="text" >'.$c['utext'].'</textarea>

</div>


    <div class="form-group col-md-10">
    <input  name="myid" type="hidden" value="'.$c['userid'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
</td>
    
    
<td><form method="post">
    <input type="hidden" name="id" value='.$c['userid'].' />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>

    
 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div></div></div>


<?php include 'navbar.php'; ?>
<div class="container">
<div class="col-md-12">
<div class="ss" style="margin-bottom:100px;">
<table class="table">
<h3 class='log'>Admin comment list</h3>
  <thead>
    <tr>
      <th scope="col">Admin id</th>
      <th scope="col">Admin Name</th>
      <th scope="col">Admin email</th>
        <th scope="col">Admin Comment</th>
        <th scope="col">Comment Date</th>
        <th scope="col">Comment time</th>
        <th scope="col">blog id</th>
    </tr>
  </thead>
   <tbody>  
 <?php foreach ($admindata as $a) {
echo'    <tr>

 <td>'.$a['adminid'].' </td>

 <td>'.$a['aname'].' </td><td>'.$a['aemail'].' </td><td>'.$a['atext'].' </td>
 <td>'.$a['adate'].' </td>  <td>'.$a['atime'].' </td> <td>'.$a['blogid'].' </td>

 
 <td>
<button type="button" class="btn-link" data-toggle="modal" data-target="#'.$a['adminid'].'">
 edit
</button>
<div class="modal" id="'.$a['adminid'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ADMIN MESSAGE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">

    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="name"  placeholder="Heading" value="'.$a['aname'].'">
    </div>
    <div class="form-group col-md-10">
    <input type="text" class="form-control" name="email"  placeholder="Heading" value="'.$a['aemail'].'">
  </div> 
    

  
<div class="form-group col-md-10">
<textarea class="form-control" rows="5"  name="txt"  placeholder="text" >'.$a['atext'].'</textarea>

</div>


    <div class="form-group col-md-10">
    <input  name="myid" type="hidden" value="'.$a['adminid'].'" >
    <button  name="adminupdate" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
</td>
    
<td><form method="post">
    <input type="hidden" name="id" value='.$a['adminid'].' />
    <button class="btn-link" name="admindelete" >delete</button>
    </form></td>

    
 
      </tr>';}?>
  </tbody>

  <!-- <td><a href="adminmessage.php?id='.$masg['id'].'">Edit</a></td> </div> -->
</table>
</div></div></div>
