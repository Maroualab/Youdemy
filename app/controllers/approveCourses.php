<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/courseManager.php'; 

if (isset($_GET['id']) && isset($_GET['status'])) {

    $id = $_GET['id'];
    $status = $_GET['status'];

    if (isset($_GET['approve'])) {
       
            $status = 'approved';  
        
    }

    // Reject action
    elseif (isset($_GET['reject'])) {
        
            $status = 'rejected';  
        
    }

    $updateStatus = new CourseManager();
    $updateStatus->updateStatus($id, $status);

    header("Location: ../views/admin/TeacherValidation.php");
    exit(); 
} else {
    header("Location: ../views/admin/TeacherValidation.php");
    exit();
}
