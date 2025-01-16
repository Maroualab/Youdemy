<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/categoryManager.php';

if (isset($_POST['id']) && isset($_POST['name'])) {
    $categoryId = $_POST['id'];
    $name = $_POST['name'];

    $categoryManager = new CategoryManager();
    $updateCategory = $categoryManager->updateCategory($categoryId, $name);
    if ($updateCategory) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

