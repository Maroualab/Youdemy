<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/courseManager.php'; 

session_start();

if( isset($_POST['submit'])){

    if (!isset($_SESSION['teacher_id'])) {
        header('Location: ../auth/login.php');
        exit();
    }
    $teacher_id = $_SESSION['teacher_id'];
    $title =$_POST['title'];
    $description =$_POST['description'];
    $content=$_POST['content'];
    $category_id=$_POST ['category'];
    $tags = $_POST['tags'];
    $image = $_FILES['img'];

    if (empty($_POST['content']) || empty($_POST['tags'])) {

        $_SESSION['error'] = 'No course content or tags provided!';
        header("Location: ../views/teacher/teacherDashboard.php");
    exit();
    } 
    

    $target = '../../assets/images/courseBanners/'.$image['name'];
    move_uploaded_file($image['tmp_name'],$target);



    $courseInsert=new CourseManager();
    $courseInsert->insertCourse($title, $description, $content, $teacher_id, $category_id, $tags,$image['name']);

    header("Location: ../views/teacher/teacherDashboard.php");
    

}



