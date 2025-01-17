<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 



if( isset($_POST['submit'])){

    $teacher_id = $_SESSION['teacher_id'];
    $title =$_POST['title'];
    $description =$_POST['description'];
    $content=$_POST['content'];
    $category_id=$_POST ['category'];
    $tags = isset($_POST['tags']) ? $_POST['tags'] : [];

    
    
}
