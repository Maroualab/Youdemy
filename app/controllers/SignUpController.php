<?php

require_once '../../config/database.php'; 
require_once '../models/User.php'; 

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    try {
        if (empty($username)) {
            throw new Exception("Username is required.");
        }
        if (empty($email)) {
            throw new Exception("Email is required.");
        }
        if (empty($password)) {
            throw new Exception("Password is required.");
        }
        if (empty($role)) {
            throw new Exception("Role is required.");
        }

        $user = new User($username, $email, $password, $role);
        $user->register();

    } catch (Exception $e) {
        echo $e->getMessage(); 
    }
}
