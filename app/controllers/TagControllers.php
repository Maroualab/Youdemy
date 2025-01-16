<?php
require_once '../../config/database.php'; 
require_once '../models/Tag.php'; 


if( isset($_POST['add_tag'])){
    $tag=$_POST['tag'];

    $tag=new Tag($tag);
    $tag->insertTag();

}elseif (isset($_POST['delete_tag'])) {

    $tag->deleteTag($_POST['delete_tag']);
}



