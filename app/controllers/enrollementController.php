<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/enrollementManager.php'; 

session_start();
$student_id = $_SESSION['student_id'];

if (isset($_GET['course_id']) && isset($student_id)) {
    $course_id = $_GET['course_id'];
    
    $enroll = new Enrollement();
    $enroll->enrollCourse($student_id, $course_id);  

    header("Location: ../views/student/courseDetails.php?course_id=$course_id");
    exit();
} 

