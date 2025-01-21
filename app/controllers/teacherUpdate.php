<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/userManager.php'; 

// Check if we are approving or rejecting a teacher
if (isset($_GET['id']) && isset($_GET['status'])) {

    // Retrieve teacher id and the current status
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Approve action
    if (isset($_GET['approve'])) {
       
            $status = 'active';  // Change status to active if approved
        
    }

    // Reject action
    elseif (isset($_GET['reject'])) {
        
            $status = 'suspended';  // Change status to suspended if rejected
        
    }

    // Instantiate UserManager and update the status
    $updateStatus = new UserManager();
    $updateStatus->updateStatus($id, $status);

    // Redirect to the Teacher Validation page after updating the status
    header("Location: ../views/admin/TeacherValidation.php");
    exit(); // Always use exit after header redirection to stop further script execution
} else {
    // If the necessary parameters are not passed, redirect to the validation page
    header("Location: ../views/admin/TeacherValidation.php");
    exit();
}
