<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/tagManager.php';

if (isset($_POST['id']) && isset($_POST['name'])) {
    $tagId = $_POST['id'];
    $name = $_POST['name'];

    $tagManager = new TagManager();
    $updateTag = $tagManager->updateTag($tagId, $name);
    if ($updateTag) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

