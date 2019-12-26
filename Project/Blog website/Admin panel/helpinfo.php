
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
    if(isset($_POST["insert"])) {
    
        $h = $_POST['head'];
        $cname = $_POST['name'];
        $clink = $_POST['link'];     
        $sql= "INSERT INTO helpinfo (head, page_name, page_link) VALUES ('$h','$cname','$clink')";
         $conn->exec($sql);
          header("location: helpinfo.php");
    }
 
    
  
    
 
    

       

        
            $sqla =("SELECT * FROM helpinfo");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $infor = $stmt->fetchAll();

            $sqla =("SELECT * FROM helpinfo ORDER BY id DESC limit 1");
            $stmt = $conn->prepare($sqla);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $info = $stmt->fetch();
    
   if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM helpinfo WHERE id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("location: helpinfo.php");
   }

   if(isset($_POST['update']))
   {
   
       $id = $_POST['myid'];
       $head = $_POST['head'];
       $name = $_POST['name'];
       $link = $_POST['link'];

    

 $sql ="UPDATE helpinfo set head='$head',page_name='$name',page_link='$link'where id= $id";
         $conn->exec($sql);
 

      header('location: helpinfo.php');
       
 }
    
       

    


}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>


<?php include 'navbar.php'; ?>


  <div class="container">
        <div class="col-md-12">
        <h3 class='log' style="text-align:center;">Section 2</h3>
            <div class="slider">
        <form method="post" enctype="multipart/form-data">
        <div class="form-group col-md-10">
   <label>Section name:</label> </div>
        <div class="form-group col-md-10">
      <input type="text" class="form-control"  name="head" value="<?php echo $info['head']; ?>"  placeholder="Section heading">
      
      

    </div>
    
    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="name"  placeholder="Page name">
    </div>
    <div class="form-group col-md-10">
      <input type="url" class="form-control" name="link" placeholder="Page link">
    </div>
 


    <div class="form-group col-md-10">
    <button  name="insert" class="float-right btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>


<div class="ss">
  <table class="table">
<h3 class="log">Help information list</h3>
   <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Page name</th>
      <th scope="col">Page link</th>
    
    </tr>
  </thead>
 <?php foreach ($infor as $s) {
echo'  <tbody>  
  <tr>

 <td>'.$s['id'].' </td>

 <td>'.$s['page_name'].' </td><td>'.$s['page_link'].' </td>
 <td>
 <button type="button" class="btn-link" data-toggle="modal" data-target="#'.$s['id'].'">
 edit
</button>
<div class="modal" id="'.$s['id'].'">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">'.$s['head'].'</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data">
        <div class="form-group col-md-10">
        <input type="text" class="form-control"  name="head"  placeholder="Heading" value="'.$s['head'].'">
      </div>
    <div class="form-group col-md-10">
      <input type="text" class="form-control" name="name"  placeholder="page address" value="'.$s['page_name'].'">
    </div>
    <div class="form-group col-md-10">
   <input type="text" class="form-control"  name="link"  placeholder="Page link" value="'.$s['page_link'].'">
    </div>
    
 
    <div class="form-group col-md-10">
    <input name="myid" type="hidden" value="'.$s['id'].'" >
    <button  name="update" class="float-right btn btn-primary">update</button> 
</div>
</form> 
      </div>

    
    </div>
  </div>
</div>
  </td> 
    
<td><form method="post">
    <input type="hidden" name="id" value="'.$s['id'].'" />
    <button class="btn-link" name="delete" >delete</button>
    </form></td>

 
      </tr>
  </tbody>';}?>
</table>
</div>

