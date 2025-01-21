<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/userManager.php'; 

if(isset($_GET['approve'])){
    $id=$_GET['id'];

    if($status== 'pending'){
        $status = 'active';
    }
    
    $updateStatus = new UserManager();
    $updateStatus ->updateStatus($id,$status);


    header("Location: ../views/admin/adminDashboard.php");

}elseif(isset($_GET['id'])&&isset($_GET['role'])){
    $id=$_GET['id'];
    $role=$_GET['role'];

    $deleteUser = new UserManager();
    $deleteUser->deleteUser($id , $role);


    header("Location: ../views/admin/adminDashboard.php");

}