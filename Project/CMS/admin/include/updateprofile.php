<?php include "header.php" ?>
<?php include "navbar.php" ?>


<?php

$sqls = "SELECT * FROM users where user_id = $userid";
$stmts = $conn->prepare($sqls);
$stmts->execute();
$results = $stmts->setFetchMode(PDO::FETCH_ASSOC);
$userdata = $stmts->fetch();


if(isset($_POST['update'])){
      
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = "male";
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pass = $_POST['pass'];
    $bios = $_POST['bios'];

    $date = date("d/M/Y");
  
    $uimg  = $_FILES['userimg']['name'];
    $userimg  = $_FILES['userimg']['tmp_name'];
    
    $target_dir = "../admin/img/";
    $user_tar = $target_dir . basename($uimg);
    move_uploaded_file(  $userimg , $user_tar);

    if($user_img !=""){
$sql = "UPDATE users SET user_first_name='$fname',user_last_name='$lname',user_age='$age',user_gender='$gender',user_email='$email',user_password='$pass',
user_date='$date',city='$city',user_address='$address',user_img='$user_tar',user_bio='$bios' WHERE user_id = '$userid' ";
  $conn ->exec($sql);

    }else{
        $sql = "UPDATE users SET user_first_name='$fname',user_last_name='$lname',user_age='$age',user_gender='$gender',user_email='$email',user_password='$pass',
user_date='$date',city='$city',user_address='$address',user_bio='$bios' WHERE user_id = '$userid' ";
  $conn ->exec($sql);

    }

 
    
header('location: profile.php');
  }


echo'

<form method="post">
<div class="container-fluid" style="background-color:white; padding-top:50px;">
<div class="container">


  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                     <img  src="'.$userdata['user_img'].'" width="140" height="140" >
                   
                     </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">'.$userdata['user_first_name'].' &nbsp; '.$userdata['user_last_name'].'</h4>
                    <p class="mb-0">'. $userdata['user_email'].' </p>
                   <div class="mt-2">
                  
            <input type="file" name="userimg" >
                 
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">'.$userdata['user_role'].'</span>
                    <div class="text-muted"><small>Joined '.$userdata['user_date'].'</small></div>
                  </div>
                </div>
              </div>
            
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>First Name</label>
                              <input class="form-control" type="text" name="fname" placeholder="First Name" value="'.$userdata['user_first_name'].'">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Last name</label>
                              <input class="form-control" type="text" name="lname" placeholder="Last name" value="'.$userdata['user_last_name'].'">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" name="email" value="'.$userdata['user_email'].'" type="text" placeholder="user@example.com">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="city" placeholder="City" value="'.$userdata['city'].'">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" placeholder="Address" value="'.$userdata['user_address'].'">
                          </div>
                        </div>
                      </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>About</label>
                              <textarea class="form-control" name="bios" rows="5" placeholder="Enter the your Bios !">'.$userdata['user_bio'].'</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
         
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Password</label>
                              <input class="form-control" value="'.$userdata['user_password'].'"name="pass" type="text" placeholder="Create a new Password ••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Date <span class="d-none d-xl-inline">OF</span> Birth</label>
                              <input name="age" class="form-control" type="date" value="'.$userdata['user_age'].'">
                            
                              </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" name="update">Save Changes</button>
                      </div>
                    </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    
    

  </div>
</div>
</div></div>
</form>
'; ?>


<?php include "footer.php" ?>

