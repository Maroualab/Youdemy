<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/models/Category.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/categoryManager.php'; 

if( isset($_POST['add_category'])){

    $category=$_POST['category'];

    $category=new Category($category);

    $category->insertCategory();

    header("Location: ../views/admin/TagCategory.php");

}



$categoryManager = new CategoryManager();

$categories = CategoryManager::fetchAllCategories(); 




