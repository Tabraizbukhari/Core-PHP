<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
try {
   
    $conn = new PDO("mysql:host=$servername;dbname=mine", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $sql = "CREATE TABLE blog(
    // blog_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // category_id INT(11) NOT NULL,
    // head VARCHAR(60) NOT NULL,
    // tags VARCHAR(60) NOT NULL,
    // blog_img nvarchar(1000) NOT NULL,
    // content Text NOT NULL,
    // author_name nvarchar(1000) NOT NULL,
    // author_img nvarchar(1000) NOT NULL,
    // author_msg nvarchar(1000) NOT NULL,
    // comment_count INT  NOT NULL,
    // views_count INT NOT NULL,
    // post_status nvarchar(200) NOT NULL ,
    // blog_date  Date ,
    // post_type nvarchar(100) NOT NULL ,
    // feature_img nvarchar(1000) NOT NULL
    //     )";
    
    
    // $conn->exec($sql);

    // $sql = "CREATE TABLE about(
    // abt_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // abt_tag varchar(200),
    // abt_head varchar(500),
    // abt_content varchar(1000),
    // abt_img varchar(1000),
    // abt_img_title varchar(100)
    //         )";

    
    // $sql = "CREATE TABLE newsletter(
    // id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // subscriber nvarchar(400)
    //      )";

    
    
    // $sql = "CREATE TABLE navbar(
    // nav_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // nav_name varchar(200),
    // nav_link varchar(500)
    //         )";

    // $sql = "CREATE TABLE latest_post(
    // id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // head varchar(200),
    // img nvarchar(1000)
    //         )";
    //     $conn->exec($sql);
     
    // $sql = "CREATE TABLE sidebar_ads(
    // id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // head varchar(200),
    // img nvarchar(1000),
    // img_link nvarchar(1000)
    //         )";
    //     $conn->exec($sql);

    // $sql = "CREATE TABLE comment(
    // comment_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // comment_post_id int(100),
    // comment_name nvarchar(200),
    // comment_email nvarchar(200),
    // comment_content nvarchar(1000),
    // comment_subject nvarchar(200),
    // comment_status nvarchar(200),
    // comment_date nvarchar(200)
    
    //         )";
    //     $conn->exec($sql);
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
