<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/tagManager.php'; 


if (isset($_GET['id'])) {
    $tagId = $_GET['id'];

    $tagManager = new TagManager();

    $deleteTag = $tagManager->deleteTag($tagId); 
    header("Location: ../views/admin/TagCategory.php");
    

}