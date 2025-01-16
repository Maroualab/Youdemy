<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/controllers/tagControllers.php';
global $tags;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories & Tags - Youdemy</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        :root {
            --bg-primary: #f4f6f9;
            --text-primary: #2c3e50;
            --accent-color: #4a90e2;
            --sidebar-bg: #343a40;
            --sidebar-hover: #495057;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .admin-layout {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar-header h2 {
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .sidebar-nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar-nav a:hover {
            background-color: var(--sidebar-hover);
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: var(--bg-primary);
        }

        .header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 25px;
            margin-bottom: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-section {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-section input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-section input:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(74,144,226,0.1);
        }

        .btn {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .tag-tables {
            display: flex;
            gap: 20px;
        }

        .tag-table {
            flex: 1;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .tag-table th {
            background-color: var(--accent-color);
            color: white;
            text-transform: uppercase;
        }

        @media (max-width: 768px) {
            .admin-layout {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
            .tag-tables {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>LearnPlus</h2>
                <p class="text-gray-300 text-sm">Admin Dashboard</p>
            </div>
            <nav class="sidebar-nav">
                <a href="adminDashboard.php">Dashboard</a>
                <a href="teacherValidation.php">User Management</a>
                <a href="courseManagement.php">Course Management</a>
                <a href="#settings">Settings</a>
            </nav>
        </aside>
    <section>
    <div class="container">
        <div class="card">
            <div class="form-grid">
                <div class="form-section">
                    <h2>Add Category</h2>
                    <form action="../../controllers/CategoryControllers.php" method="POST">
                        <label for="categoryName">Category Name</label>
                        <input type="text" id="categoryName" name="category" required>
                        <button type="submit" name="add_category" class="btn">Add Category</button>
                    </form>
                </div>

                <div class="form-section">
                    <h2>Add Tag</h2>
                    <form action="../../controllers/TagControllers.php" method="POST">
                        <label for="tagName">Tag Name</label>
                        <input type="text" id="tagName" name="tag" required>
                        <button type="submit" name="add_tag" class="btn">Add Tag</button>
                    </form>
                </div>
            </div>
        </div>

        </section>

        <section class="flex gap-2 m-4">
        <table class="tag-table w-1/3">
            <thead>
                <tr>
                    <th>Tag</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tags as $tag) {
                    echo "
                    <tr>
                        <td>{$tag['name']}</td>
                        <td>
                            <div class='action-buttons'>
                                <button class='action-btn'>Edit</button>
                                <button class='action-btn'>Delete</button>
                            </div>
                        </td>
                    </tr>
                    ";
                } ?>
            </tbody>
        </table>
        <table class="tag-table w-1/3">
            <thead>
                <tr>
                    <th>Tag</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tags as $tag) {
                    echo "
                    <tr>
                        <td>{$tag['name']}</td>
                        <td>
                            <div class='action-buttons'>
                                <button class='action-btn'>Edit</button>
                                <button class='action-btn'>Delete</button>
                            </div>
                        </td>
                    </tr>
                    ";
                } ?>
            </tbody>
        </table>

        </section>
   
</body>
</html>
