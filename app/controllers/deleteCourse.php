<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/courseManager.php';

// session_start();

if(isset($_GET['DeleteId'])){
    $id=$_GET['DeleteId'];


    $deleteCourse=new CourseManager();
    $deleteCourse->deleteCourse($id);

    header("Location: ../views/teacher/teacherDashboard.php");


}