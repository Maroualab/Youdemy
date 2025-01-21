<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/userManager.php'; 

if(isset($_GET['id'])&&isset($_GET['status'])){
    $id=$_GET['id'];
    $status=$_GET['status'];

    if($status== 'active'){
        $status = 'suspended';
    }else{
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