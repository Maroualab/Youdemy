<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/categoryManager.php'; 


if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];



    $categoryManager = new CategoryManager();

    $deleteCategory = $categoryManager->deleteCategory($categoryId); 
    header("Location: ../views/admin/TagCategory.php");
    

}