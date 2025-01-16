<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/models/Tag.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/tagManager.php'; 

if( isset($_POST['add_tag'])){

    $tag=$_POST['tag'];

    $tag=new Tag($tag);

    $tag->insertTag();

    header("Location: ../views/admin/TagCategory.php");

}

$tagManager = new TagManager();

$tags = TagManager::fetchAllTags(); 






