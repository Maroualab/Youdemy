<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/userManager.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/models/User.php'; 



$userManagement = new UserManager();
$users = $userManagement ->fetchUsers();


$teacherDisplay = Teacher::getPendingTeachers();