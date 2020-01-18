<?php 
 function useronline(){
   if(isset($_GET['onlineuser'])){
     
  global $conn;
  if(!$conn){
    include("../include/database.php");
 
  $session = session_id(); 
  $time = time();
  $time_out_in_sec = 0.5;
  $time_out =  $time - $time_out_in_sec;
  
  $sql = "SELECT * FROM usersonline WHERE user_session = '$session' "; 
  $result = $conn->prepare($sql); 
  $result->execute(); 
  $count_useronline = $result->fetchColumn();

        if($count_useronline == NULL){
          $sql = "INSERT INTO usersonline(user_session,user_time) VALUES ('$session','$time')"; 
          $conn->exec($sql); 
            }else {
              $sql = "UPDATE  usersonline SET user_time='$time' WHERE  user_session='$session'"; 
              $conn->exec($sql); 
              }
  
    $sql = "SELECT count(*) FROM usersonline WHERE user_time > '$time_out' "; 
    $result = $conn->prepare($sql); 
    $result->execute(); 
    echo $number_useronline = $result->fetchColumn();

            } 
      }// get request onlineuser
            
                  
      }
useronline();
  
function category_select(){
    global $conn;
$stmt = $conn->prepare("SELECT * FROM category ORDER BY cat_id DESC");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$cate = $stmt->fetchAll();

foreach($cate as $c){
echo 
'
 <option value="'.$c['cat_name'].'">'.$c['cat_name'].'</option>
  
  
       
  ';

}
}

function add_cate(){
  global $conn;
  
if(isset($_POST['add_cate'])){
  $cate = $_POST['title'];
  if($cate == ""){
     echo "<span style='color:red;' > This field should not be empty ..!!  </span>";
  }else{
      $sql = "INSERT INTO category(cat_name) VALUES ('$cate') ";
      $conn->exec($sql);
     
  header('location: post.php?source=category');
  }
}


}

function delete_cat(){
  global $conn;

  if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $sql= "DELETE FROM category WHERE cat_id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   
  header('location: post.php?source=category');
   }
}

function update_cat(){
  global $conn;

  if(isset($_POST['update_cat'])){
    $cate = $_POST['update_title'];
    $id = $_POST['updateid'];
    if($cate == ""){
        echo "This field should not be empty !";
    }else{
        $sql = "UPDATE category SET cat_name=('$cate') WHERE cat_id = '$id' ";
        $conn->exec($sql);
     
  header('location: post.php?source=category');
    }
}

}

function allpost(){


  global $conn;
  $sessionuserid  =  $_SESSION['id'];
  $userrole       =  $_SESSION['role'];

if($userrole != "admin"){
$stmt = $conn->prepare("SELECT * FROM blog WHERE post_user_id = '$sessionuserid' ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$blog = $stmt->fetchAll(); 

foreach ($blog as $bs ) {
  echo'  <tr>
  <td><input class="checkboxes" type="checkbox" name="checkboxarray[]" value="'.$bs['blog_id'].'" ></td>
           <td>'.$bs['blog_id'].'</td>  
           <td>'.$bs['head'].'</td>  
         <td> '.$bs['content'].' </td> 
         <td>  <img src="'.$bs['blog_img'].'" alt="notfound" class="img-thumbnail"> </td>
          <td>  <img src="'.$bs['feature_img'].'" alt="notfound" class="img-thumbnail"> </td>
           <td>'.$bs['author_name'].'</td> 
           <td>'.$bs['author_img'].'</td>  
           <td>'.$bs['author_msg'].'</td>
           <td>'.$bs['category_id'].'</td>  
           <td>'.$bs['tags'].'</td>  
           <td>'.$bs['comment_count'].'</td> 
           <td>'.$bs['views_count'].'</td>  
           <td>'.$bs['post_status'].'</td>
           <td>'.$bs['blog_date'].'</td>
           
          <td> <a href="../web/single.php?blog_id='.$bs['blog_id'].'">view post</a></td>  
           '; 
           if($bs['post_status'] != "published"){
            echo'   <td><a name="published" href="post.php?publish='.$bs['blog_id'].'">published</a></td>';}
            else{ echo'
              <td><a name="draft" href="post.php?draft='.$bs['blog_id'].'">draft</a></td>  
            ';}
            echo'
            <td> <a href="post.php?source=editpost&blog_id='.$bs['blog_id'].'" name="update" >edit</a></td>
          
           <td><a onClick=\'javascript: return confirm("are you sure you want to delete");\' name="delete" href="post.php?blog_id='.$bs['blog_id'].'">delete </a></td>  
      </tr>
      
      ';
     
          }
        }else {
          $stmt = $conn->prepare("SELECT * FROM blog ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$blog = $stmt->fetchAll(); 

foreach ($blog as $bs ) {
  $content = substr($bs['content'],4,80);
  $msg = substr($bs['author_msg'],0,20);
  echo'  <tr>
  <td><input class="checkboxes" type="checkbox" name="checkboxarray[]" value="'.$bs['blog_id'].'" ></td>
           <td>'.$bs['blog_id'].'</td>  
           <td>'.$bs['head'].'</td>  
         <td> '.$content.' </td> 
         <td>  <img src="'.$bs['blog_img'].'" alt="notfound" class="img-thumbnail"> </td>
          <td>  <img src="'.$bs['feature_img'].'" alt="notfound" class="img-thumbnail"> </td>
           <td>'.$bs['author_name'].'</td> 
           <td>'.$bs['author_img'].'</td>  
           <td>'.$msg.'</td>
           <td>'.$bs['category_id'].'</td>  
           <td>'.$bs['tags'].'</td>  
           <td><a href="comment.php?comment='.$bs['blog_id'].'">'.$bs['comment_count'].'</a></td> 
           <td>'.$bs['views_count'].'</td>  
           <td>'.$bs['post_status'].'</td>
           <td>'.$bs['blog_date'].'</td>
           
          <td> <a href="../web/single.php?blog_id='.$bs['blog_id'].'">view post</a></td>  
           '; 
           if($bs['post_status'] != "published"){
            echo'   <td><a name="published" href="post.php?publish='.$bs['blog_id'].'">published</a></td>';}
            else{ echo'
              <td><a name="draft" href="post.php?draft='.$bs['blog_id'].'">draft</a></td>  
            ';}
            echo'
            <td> <a href="post.php?source=editpost&blog_id='.$bs['blog_id'].'" name="update" >edit</a></td>
          
           <td><a onClick=\'javascript: return confirm("are you sure you want to delete");\' name="delete" href="post.php?blog_id='.$bs['blog_id'].'">delete </a></td>  
      </tr>
      
      ';
        }
      }


    }

function addpost(){
  global $conn;
  if(isset($_POST['addpost'])){
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $bimg  = $_FILES['blog_img']['name'];
    $blogimg  = $_FILES['blog_img']['tmp_name'];
    $fimg  = $_FILES['feature_img']['name'];
    $featureimg  = $_FILES['feature_img']['tmp_name'];
    $tag = $_POST['tags'];
    $category = $_POST['categor'];
    $date = date("d/M/Y");
    $status =$_POST['status'];
  
    $author = $_POST['aname'];
    $authormsg = $_POST['amsg'];
   
    $author_img = $_FILES['author_img']['name'];
    $authortemp = $_FILES['author_img']['tmp_name'];
    $a_img = $_POST['a_img'];

    $target_dir = "../web/img/";
    $blog_tar = $target_dir . basename($bimg);
    if($fimg == ""){
      $fimg = $bimg;
    }
    if($author_img == ""){
      $author_img = $a_img;
    }

  
  $content=  trim($content); //remove white space here

    $target_dirs = "../web/img/";
    $feature_tar = $target_dir . basename($fimg);

    $target_dir = "../web/img/";
    $author_tar = $target_dir . basename($author_img);
 
  

    
    move_uploaded_file(  $blogimg , $blog_tar);
    move_uploaded_file(  $featureimg , $feature_tar);
    move_uploaded_file(  $authortemp , $author_tar);
  
$sql = "INSERT INTO blog(head,content,blog_img,feature_img,tags,blog_date,post_status,
author_name,author_msg,views_count,category_id,author_img) VALUES ('$title','$content','$blog_tar','$feature_tar','$tag','$date','$status','$author','$authormsg','$view','$category','$author_tar') ";
 $conn ->exec($sql);
 
   }
    
}




function updatepost(){
  global $conn;
  if(isset($_POST['update'])){
      
    $id = $_GET['blog_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $bimg  = $_FILES['blog_img']['name'];
    $blogimg  = $_FILES['blog_img']['tmp_name'];
    $fimg  = $_FILES['feature_img']['name'];
    $featureimg  = $_FILES['feature_img']['tmp_name'];
    $tag = $_POST['tags'];
    $date = date("d/M/Y");
    $status =$_POST['status'];
  
    $author_img = $_FILES['author_img']['name'];
    $authortemp = $_FILES['author_img']['tmp_name'];
    $author = $_POST['aname'];
    $authormsg = $_POST['amsg'];
    $view = 51;
    $category = $_POST['categor'];
    $selectedcategory = $_POST['selected_cat'];
    
    $target_dir = "../web/img/";
    $blog_tar = $target_dir . basename($bimg);
    

    $target_dirs = "../web/img/";
    $feature_tar = $target_dir . basename($fimg);
  
    $target_dir = "../web/img/";
    $author_tar = $target_dir . basename($author_img);

   if($category == ""){
     $category = $selectedcategory;
   }

    if($bimg != "" && $fimg !="" && $author_img !=""){
      move_uploaded_file(  $blogimg , $blog_tar);
      move_uploaded_file(  $featureimg , $feature_tar);
      move_uploaded_file(  $authortemp , $author_tar);

      $sql = "UPDATE blog SET head='$title',content='$content',blog_img='$blog_tar',feature_img='$feature_tar',tags='$tag',blog_date='$date',post_status='$status',
    author_name='$author',author_msg='$authormsg',author_img='$author_tar',views_count='$view',category_id='$category' WHERE blog_id = '$id' ";
      $conn ->exec($sql);
    }elseif($bimg != "" && $fimg !="")
    {
      move_uploaded_file(  $blogimg , $blog_tar);
      move_uploaded_file(  $featureimg , $feature_tar);
    
    $sql = "UPDATE blog SET head='$title',content='$content',blog_img='$blog_tar',feature_img='$feature_tar',tags='$tag',blog_date='$date',post_status='$status',
        author_name='$author',author_msg='$authormsg',views_count='$view',category_id='$category' WHERE blog_id = '$id' ";
          $conn ->exec($sql);
    }elseif($bimg != "" && $author_img !="")
    {
      move_uploaded_file(  $blogimg , $blog_tar);
    move_uploaded_file(  $authortemp , $author_tar);
    
    $sql = "UPDATE blog SET head='$title',content='$content',blog_img='$blog_tar',feature_img='$feature_tar',tags='$tag',blog_date='$date',post_status='$status',
        author_name='$author',author_msg='$authormsg',author_img='$author_tar',views_count='$view',category_id='$category' WHERE blog_id = '$id' ";
          $conn ->exec($sql);
    }
    elseif($fimg != "" && $author_img !="")
    {
      
      move_uploaded_file(  $featureimg , $feature_tar);
    move_uploaded_file(  $authortemp , $author_tar);
    
    $sql = "UPDATE blog SET head='$title',content='$content',feature_img='$feature_tar',tags='$tag',blog_date='$date',post_status='$status',
        author_name='$author',author_msg='$authormsg',author_img='$author_tar',views_count='$view',category_id='$category' WHERE blog_id = '$id' ";
          $conn ->exec($sql);
    }
    
    elseif($bimg != "")
    {
    move_uploaded_file(  $blogimg , $blog_tar);
  
$sql = "UPDATE blog SET head='$title',content='$content',blog_img='$blog_tar',tags='$tag',blog_date='$date',post_status='$status',
author_name='$author',author_msg='$authormsg',views_count='$view',category_id='$category' WHERE blog_id = '$id' ";
  $conn ->exec($sql);
    
}elseif($fimg != ""){
  move_uploaded_file(  $featureimg , $feature_tar);
  $sql = "UPDATE blog SET head='$title',content='$content',feature_img='$feature_tar',tags='$tag',blog_date='$date',post_status='$status',
author_name='$author',author_msg='$authormsg',views_count='$view',category_id='$category' WHERE blog_id = '$id' ";
  $conn ->exec($sql);
}
elseif($author_img != ""){
  move_uploaded_file(  $featureimg , $feature_tar);
  $sql = "UPDATE blog SET head='$title',content='$content',tags='$tag',blog_date='$date',post_status='$status',
author_name='$author',author_msg='$authormsg',author_img='$author_tar',category_id='$category',views_count='$view' WHERE blog_id = '$id' ";
  $conn ->exec($sql);
}


else {
  $sql = "UPDATE blog SET head='$title',content='$content',tags='$tag',blog_date='$date',post_status='$status',
  author_name='$author',author_msg='$authormsg',views_count='$view',category_id='$category' WHERE blog_id = '$id' ";
    $conn ->exec($sql);
}
    
   header("location: post.php?source=editpost&blog_id=$id");


}


}

function viewallcomment(){

  global $conn;
  if(isset($_GET['comment'])){
    $commnetgetid =  $_GET['comment'];
  
$stmt = $conn->prepare("SELECT * FROM comment WHERE comment_post_id = '$commnetgetid' ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$comment = $stmt->fetchAll(); 


// <td>'.$bs['comment_post_id'].'</td>  
foreach ($comment as $bs ) {
  echo'  <tr>
           <td>'.$bs['comment_id'].'</td>  
          <td> '.$bs['comment_name'].' </td> 
         <td>'.$bs['comment_subject'].'</td> 
           <td>'.$bs['comment_content'].'</td>  
           <td>'.$bs['comment_email'].'</td>
           <td>'.$bs['comment_status'].'</td>
           <td>'.$bs['comment_date'].'</td>    
           ';  
           $post_id = $bs['comment_post_id'];
           $stmt = $conn->prepare("SELECT * FROM blog where blog_id='$post_id'");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $blog = $stmt->fetchAll(); 
                foreach ($blog as $b) {
                echo '<td><a href="../web/single.php?blog_id='.$b['blog_id'].'" > '.$b['head'].' </a></td>'; 
                
               }
           if($bs['comment_status'] != "approved"){
         echo'  <td> <a href="comment.php?approve='.$bs['comment_id'].'&blog_id='.$b['blog_id'].'" name="apprve" >approved</a> </td>';}
         else{ echo'
           <td><a name="unapprove" href="comment.php?unapprove='.$bs['comment_id'].'&blog_id='.$b['blog_id'].'">unapprove</a></td>  
         ';}
           echo'
          <td> <a href="post.php?source=edit&comment_id='.$bs['comment_id'].'" name="update" >edit</a> </td>
          <td><a onClick=\'javascript: return confirm("are you sure you want to delete");\' name="delete" href="comment.php?comment_id='.$bs['comment_id'].'&comment_post_id='.$bs['comment_post_id'].'">delete </a></td>  
               
          </tr>
      
      ';
     
     
    } 
  }else{
    $stmt = $conn->prepare("SELECT * FROM comment");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$comment = $stmt->fetchAll(); 


// <td>'.$bs['comment_post_id'].'</td>  
foreach ($comment as $bs ) {
  echo'  <tr>
           <td>'.$bs['comment_id'].'</td>  
          <td> '.$bs['comment_name'].' </td> 
         <td>'.$bs['comment_subject'].'</td> 
           <td>'.$bs['comment_content'].'</td>  
           <td>'.$bs['comment_email'].'</td>
           <td>'.$bs['comment_status'].'</td>
           <td>'.$bs['comment_date'].'</td>    
           ';  
           $post_id = $bs['comment_post_id'];
           $stmt = $conn->prepare("SELECT * FROM blog where blog_id='$post_id'");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $blog = $stmt->fetchAll(); 
                foreach ($blog as $b) {
                echo '<td><a href="../web/single.php?blog_id='.$b['blog_id'].'" > '.$b['head'].' </a></td>'; 
                
               
           if($bs['comment_status'] != "approved"){
         echo'  <td> <a href="comment.php?approve='.$bs['comment_id'].'&blog_id='.$b['blog_id'].'&check=1" name="apprve" >approved</a> </td>';}
         else{ echo'
           <td><a name="unapprove" href="comment.php?unapprove='.$bs['comment_id'].'&blog_id='.$b['blog_id'].'&check=1">unapprove</a></td>  
         ';}}
           echo'
          <td> <a href="post.php?source=edit&comment_id='.$bs['comment_id'].'" name="update" >edit</a> </td>
          <td><a onClick=\'javascript: return confirm("are you sure you want to delete");\' name="delete" href="comment.php?comment_id='.$bs['comment_id'].'&comment_post_id='.$bs['comment_post_id'].'">delete </a></td>  
               
          </tr>
      
      ';
     
     
    } 
  }

}




function viewallusers(){

  global $conn;
  
$stmt = $conn->prepare("SELECT * FROM users ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmt->fetchAll(); 

// <td>'.$bs['user_post_id'].'</td>  
foreach ($user as $bs ) {
  echo'  <tr>
  <td><input class="checkboxes" type="checkbox" name="checkboxarray[]" value="'.$bs['user_id'].'" ></td>
           <td>'.$bs['user_id'].'</td>  
          <td> '.$bs['user_first_name'].' </td> 
         <td>'.$bs['user_last_name'].'</td> 
         <td>'.$bs['user_email'].'</td>  
         <td>'.$bs['user_age'].'</td>  
           
           <td>'.$bs['user_password'].'</td>
                 
           <td>'.$bs['user_role'].'</td>
           <td>'.$bs['user_date'].'</td>
           <td>'.$bs['user_status'].'</td>
           
           <td>'.$bs['user_img'].'</td>  
               
           ';
           if($bs['user_status'] != "active"){
           echo' <td> <a href="user.php?active='.$bs['user_id'].'" name="active" >active</a> </td>';
          
           }     else{  
     echo' <td><a name="unactive" href="user.php?unactive='.$bs['user_id'].'">unactive</a></td>  ';
           }
           
       echo'   <td> <a href="user.php?source=edituser&user_id='.$bs['user_id'].'" name="update" >edit</a> </td>
          <td><a onClick=\'javascript: return confirm("are you sure you want to delete");\' name="delete" href="user.php?user_id='.$bs['user_id'].'&user_post_id='.$bs['user_id'].'">delete </a></td>  
               
          </tr>
      
      ';
     
}

}


function adduser(){
  global $conn;
  if(isset($_POST['adduser'])){
      
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $pass = $_POST['pass'];
    $date = date("d/M/Y");
    $status = "unactive";
   
    $uimg  = $_FILES['userimg']['name'];
    $userimg  = $_FILES['userimg']['tmp_name'];
     $compass = $_POST['compass'];

    // $slat = "2sdsfaerdvhsfsdasheyyw";
    // $pass = crypt($pass, $slat);

    $pass = password_hash($pass, PASSWORD_BCRYPT, array('cost'=> 10));
  $compass = password_hash($compass, PASSWORD_BCRYPT, array('cost'=> 10));

   
        if($pass != $compass){
          echo "passwords doesn't match";
        }else{

    
    $target_dir = "../web/img/";
    $user_tar = $target_dir . basename($uimg);

  
    move_uploaded_file(  $userimg , $user_tar);
   
$sql = "INSERT INTO users (user_first_name,user_last_name,user_age,user_gender,user_email,user_password,
user_role,user_status,user_date,city,user_address,user_img,randsalt) VALUES ('$fname','$lname','$age','$gender','$email','$pass',
'$role','$status','$date','$city','$address','$user_tar','$slat')
 ";
  $conn ->exec($sql);
    
}

}

if(isset($_POST['create'])){
      
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];

  $email = $_POST['email'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $pass = $_POST['pass'];
  $date = date("d/M/Y");
  $status = "unactive";
 $compass = $_POST['compass'];
  // $slat = "2sdsfaerdvhsfsdasheyyw";
  // $pass = crypt($pass, $slat);

  $pass = password_hash($pass, PASSWORD_BCRYPT, array('cost'=> 2));
  $compass = password_hash($compass, PASSWORD_BCRYPT, array('cost'=> 2));
  echo $pass. "</br>";
  echo $compass;
 
      if($pass != $compass){
        echo "passwords doesn't match";
      }else{

  
  $target_dir = "../web/img/images.jpg";
  

$sql = "INSERT INTO users (user_first_name,user_last_name,user_age,user_gender,user_email,
user_password,user_status,user_date,city,user_address,user_img,randsalt) VALUES ('$fname','$lname','$age','$gender','$email','$pass','$status','$date','$city','$address','$target_dir','$slat')
";
$conn ->exec($sql);
  
}

}
}




function updateuser(){
  global $conn;
  if(isset($_POST['update'])){
      
    $id = $_GET['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    if(isset($_POST['gender'])){
    $gender = $_POST['gender'];
  }
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $pass = $_POST['pass'];
    $date = date("d/M/Y");
  
    $uimg  = $_FILES['userimg']['name'];
    $userimg  = $_FILES['userimg']['tmp_name'];
    
    $target_dir = "../web/img/";
    $user_tar = $target_dir . basename($uimg);
    move_uploaded_file(  $userimg , $user_tar);
   $fixedgender = $_POST['fixedgender'];
      if($gender == ""){
        $gender =  $fixedgender; }
    if($uimg != ""){
$sql = "UPDATE users SET user_first_name='$fname',user_last_name='$lname',user_age='$age',user_gender='$gender',user_email='$email',user_password='$pass',
user_role='$role',user_date='$date',city='$city',user_address='$address',user_img='$user_tar' WHERE user_id = '$id' ";
  $conn ->exec($sql);
    }
    else{
      $sql = "UPDATE users SET user_first_name='$fname',user_last_name='$lname',user_age='$age',user_gender='$gender',user_email='$email',user_password='$pass',
user_role='$role',user_date='$date',city='$city',user_address='$address' WHERE user_id = '$id' ";
  $conn ->exec($sql);
    } 

//       $userid = $_SESSION['uid'];
// $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = '$userid' ");
// $stmt->execute();
// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $user = $stmt->fetchAll(); 
// foreach ($user as $u) {

// $username   =       =  $_SESSION['username'] = $u['user_email']   
// $firstname  =  $u['user_first_name']   =  $_SESSION['fname']; 
// $lastname   =  $u['user_last_name']    =  $_SESSION['lname']; 
// $userage        =  $u['user_age']      =  $_SESSION['age'];
// $userpassword   =  $u['user_password'] =  $_SESSION['pass']; 
// $userrole       = $u['user_role'] =  $_SESSION['role'];
// $userdate       = $u['user_date']     =  $_SESSION['date']; 
// $userimage      = $u['user_img']     =  $_SESSION['img']; 
// $useraddress    = $u['user_address']  = $_SESSION['address'];
// $usercity       = $u['city'] = $_SESSION['city'];
// $userbio        = $u['user_bio']  = $_SESSION['bio'];

    header("location: user.php?source=edituser&user_id=$id");

  }
 
}
function updateprofile(){

  global $conn;
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
    
    $target_dir = "../web/img/";
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

}



function viewallsubscriber(){

  global $conn;
  if(isset($_POST['savechanges'])){
    $id = $_POST['myid'];
      $email = $_POST['email'];
      $sql = "UPDATE newsletter SET subscriber= '$email' WHERE id = $id" ;
      $conn ->exec($sql);
      header('location subscribe.php');
    }
$stmt = $conn->prepare("SELECT * FROM newsletter ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$subscribe = $stmt->fetchAll(); 



// <td>'.$bs['comment_post_id'].'</td>  
foreach ($subscribe as $bs ) {
  echo'  <tr>
           <td>'.$bs['id'].'</td>  
          <td> '.$bs['subscriber'].' </td> 
        
          <td> <button type="button" class="btn btn-link" data-toggle="modal" data-target="#'.$bs['id'].'">
edit
        </button></td>
          <td><a class="btn btn-link" name="delete" href="subscribe.php?subid='.$bs['id'].'">delete </a></td>  
             <td>
             
             <!-- Modal -->
             <div class="modal fade" id="'.$bs['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle"> <h5 class="title">Subscribe to my newsletter</h5>
                     </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <form action="#"  method="post">
                   
                   <div class="modal-body">
                   <input type="email" value="'.$bs['subscriber'].'" name="email" class="form-control" placeholder="Your e-mail here">
                     
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                     <input name="myid" type="hidden" value="'.$bs['id'].'" >
                     <button  name="savechanges" class="btn btn-primary">Save changes</button>
                   </div>
                </form>
                 </div>
               </div>
             </div></td>  
          </tr>
      
      ';
     
     
}


}



function viewallcontact(){


  global $conn;

  if(isset($_POST['savechanges'])){

    $id = $_POST['myid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $sub = $_POST['sub'];
    $sql = "UPDATE contact SET c_name='$name',email='$email',msg='$msg',c_subject='$sub' WHERE id = $id" ;
    $conn ->exec($sql);
    header('location contact.php');
  }
$stmt = $conn->prepare("SELECT * FROM contact ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$contact = $stmt->fetchAll(); 



foreach ($contact as $bs ) {

      
  echo'  <tr>
  <td><input class="checkboxes" type="checkbox" name="checkboxarray[]" value="'.$bs['id'].'" ></td>
           <td>'.$bs['id'].'</td>  
           <td>'.$bs['c_name'].'</td>  
         <td> '.$bs['email'].' </td> 
          <td>'.$bs['c_subject'].'</td> 
           <td>'.$bs['msg'].'</td>  
           <td>'.$bs['c_date'].'</td>
           <td> <button type="button" class="btn btn-link" data-toggle="modal" data-target="#'.$bs['id'].'">
           edit
                   </button></td>
                  
                        
                        
                        <!-- Modal -->
                        <div class="modal fade" id="'.$bs['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> <h5 class="title">Subscribe to my newsletter</h5>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="#"  method="post">
                              
                              <div class="modal-body">
                             <div class="form-group">
                             <input type="text" value="'.$bs['c_name'].'" name="name" class="form-control" placeholder="Your e-mail here">
                             </div>  
                             <div class="form-group">
                             <input type="text" value="'.$bs['email'].'" name="email" class="form-control" placeholder="Your e-mail here">
                             </div>  
                             <div class="form-group">
                             <textarea col="2"   name="msg" class="form-control" > '.$bs['msg'].' </textarea>
                            
                             </div>  
                             <div class="form-group">
                             <input type="text" value="'.$bs['c_subject'].'" name="sub" class="form-control" placeholder="Your e-mail here">
                             </div>  
                             
                             </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
                                <input name="myid" type="hidden" value="'.$bs['id'].'" >
                                <button  name="savechanges" class="btn btn-primary">Save changes</button>
                              </div>
                           </form>
                            </div>
                          </div>
                        </div> 
          <td><a onClick=\'javascript: return confirm("are you sure you want to delete");\' class="btn btn-link" name="delete" href="contact.php?contact='.$bs['id'].'">delete </a></td>          
           
      </tr>
      
      ';

          }


    }

    
function addabout(){
  global $conn;
  if(isset($_POST['addabout'])){
    
    $head = $_POST['head'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $abtimg  = $_FILES['abt_img']['name'];
    $abttmp  = $_FILES['abt_img']['tmp_name'];
    $tag = $_POST['tags'];
    $date = date("d/M/Y");
  
    

    $target_dir = "../web/img/";
    $abt_tar = $target_dir . basename($abtimg);
    move_uploaded_file(  $abttmp , $abt_tar);


  
$sql = "INSERT INTO about(abt_head,abt_tag,abt_content,abt_img,abt_img_title,abt_date) VALUES ('$head','$tag','$content','$abt_tar','$title','$date') ";
 $conn ->exec($sql);
 
   }
    
}


function viewallabout(){


  global $conn;
  $sessionuserid  =  $_SESSION['id'];
  $userrole       =  $_SESSION['role'];
$stmt = $conn->prepare("SELECT * FROM about ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$about = $stmt->fetchAll(); 

foreach ($about as $bs ) {
  $content = substr($bs['abt_content'],0,100);
  echo'  <tr>
  <td><input class="checkboxes" type="checkbox" name="checkboxarray[]" value="'.$bs['abt_id'].'" ></td>
           <td>'.$bs['abt_id'].'</td>  
           <td>'.$bs['abt_head'].'</td>  
         <td> '.$content .' </td> 
         <td>  <img src="'.$bs['abt_img'].'" alt="notfound" class="img-thumbnail" width="100px" height="100px"> </td>
           <td>'.$bs['abt_img_title'].'</td> 
           <td>'.$bs['abt_date'].'</td>  
           <td>'.$bs['abt_tag'].'</td>
     
           '; 
            echo'
            <td> <a href="pages.php?source=editabout&abt_id='.$bs['abt_id'].'" name="update" >edit</a></td>
          
           <td><a  name="delete" href="pages.php?abt_id='.$bs['abt_id'].'">delete </a></td>  
      </tr>
      
      ';
     
          }

      }


    


?>
