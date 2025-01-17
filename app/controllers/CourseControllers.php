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
    $tags = isset($_POST['tags']) ? $_POST['tags'] : [];


    $courseInsert=new CourseManager();
    $courseInsert->insertCourse($title, $description, $content, $teacher_id, $category_id, $tags);

    header("Location: ../views/teacher/teacherDashboard.php");
    
}


