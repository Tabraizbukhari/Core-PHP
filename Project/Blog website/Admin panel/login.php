<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myWeb", $username, $password); 
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit'])){
        $user= $_POST['username'];
        $pass= $_POST['password'];
        if(empty($user) || empty($pass)) {
            $mg = 'All field are required';
        }else{
            $sql = ("SELECT * FROM user WHERE username='$user' AND userpassword='$pass' LIMIT 1 ");
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
            $user_data = $stmt->fetchAll()[0];
        
       if( $user == $user_data['username'] && $pass ==  $user_data['userpassword'] ){
        $_SESSION['username']=$user;
        $_SESSION['password']=$pass;
        $_SESSION['id'] =  $user_data['userid'];
        $_SESSION['passcom'] =  $user_data['passcom'];
        $_SESSION['img'] =  $user_data['userimage'];
        $_SESSION['mail'] =  $user_data['useremail'];
        $_SESSION['age'] =  $user_data['userage'];
        $_SESSION['address'] =  $user_data['useraddress'];
        $_SESSION['city'] =  $user_data['usercity'];
        $_SESSION['phone'] =  $user_data['userphone'];
        $_SESSION['about'] =  $user_data['userabout'];

        header('location: blog.php');
    }
       
       else{
          $msg2="Doesn't Match";
       }
            
    }
    }
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
   
    $conn = null;
    echo "</table>";

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
.log{
    margin:0 auto;
    width:180px;
    padding-bottom:20px;
    margin-right:70px;
    font-family:bold ;
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
    <h3 class='log'>LOGIN FORM</h3>
<label>Username:</label>
<input class="form-control" type='text' name='username' placeholder="email"> <br/>
<label>Password:</label>
<input class="form-control" type='password' name='password' placeholder="Password"> 
<br/>
 <br/>
<div class="bot">
<button class='btn btn-danger' name="submit">LOGIN</button><br/>
</div>
<div class='creat'>
<a  href="registration.php"><h5>Create New Account </h5></a>
</div>
</form>
<h3>

<?php 
 if(isset($mg, $msg2)){ echo  $mg; echo $msg2;} ?> </h3>
</div>
</div>

</div>
