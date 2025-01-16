<?php
require_once '../../config/database.php'; 
require_once '../models/Category.php'; 


if( isset($_POST['add_category'])){

    $category=$_POST['category'];

    $category=new Category($category);

    $category->insertCategory();
}



