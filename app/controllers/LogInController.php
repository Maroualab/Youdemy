<?php

require_once '../../config/Database.php'; 
require_once '../models/User.php';
include_once '../repositories/accountManager.php'; 

// session_start(); 

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        if (empty($email)) {
            throw new Exception("Email is required.");
        }
        if (empty($password)) {
            throw new Exception("Password is required.");
        }

        $userManager = new AccountManager();
        $userManager->login($email, $password);
    } catch (Exception $e) {
        echo $e->getMessage(); 
    }
}
?>
