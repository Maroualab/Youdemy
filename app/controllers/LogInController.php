<?php

require_once '../../config/Database.php'; 
require_once '../controllers/User.php'; 

session_start(); 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        if (empty($email)) {
            throw new Exception("Email is required.");
        }
        if (empty($password)) {
            throw new Exception("Password is required.");
        }

        // Create an instance of User class
        $user = new User(null, $email, $password);
        $user->login();

    } catch (Exception $e) {
        echo $e->getMessage(); 
    }
}
