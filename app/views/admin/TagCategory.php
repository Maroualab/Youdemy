<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/controllers/TagControllers.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/controllers/CategoryControllers.php';
global $tags;
global $categories;

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
            --white: #ffffff;
            --gray-light: #e9ecef;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .header {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            margin-bottom: 2rem;
        }

        .header-content {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--accent-color);
        }

        .card {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .form-section {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-section label {
            font-weight: 500;
            color: var(--text-primary);
            opacity: 0.8;
        }

        .form-section input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            transition: var(--transition);
        }

        .form-section input:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .btn {
            background-color: var(--accent-color);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
            align-self: flex-start;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .tag-table {
            border-radius: 12px;
            overflow: hidden;
            background-color: var(--white);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .tag-table th,
        .tag-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-light);
        }

        .tag-table th {
            background-color: var(--accent-color);
            color: var(--white);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            background: none;
            border: 1px solid var(--gray-light);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .action-btn:hover {
            background-color: var(--gray-light);
            color: var(--accent-color);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="header-content">
            <div class="logo">Youdemy</div>
        </div>
    </header>


    <section>
        <div class="container">
            <div class="card">
                <div class="form-grid">
                    <div class="form-section">
                        <h2>Add Tag</h2>
                        <form action="../../controllers/TagControllers.php" method="POST">
                            <label for="tagName">Tag Name</label>
                            <input type="text" id="tagName" name="tag" required>
                            <button type="submit" name="add_tag" class="btn">Add Tag</button>
                        </form>
                    </div>
                    <div class="form-section">
                        <h2>Add Category</h2>
                        <form action="../../controllers/CategoryControllers.php" method="POST">
                            <label for="categoryName">Category Name</label>
                            <input type="text" id="categoryName" name="category" required>
                            <button type="submit" name="add_category" class="btn">Add Category</button>
                        </form>
                    </div>

                </div>
            </div>

    </section>

    <section class="flex gap-2 m-4">
        <table class="tag-table w-1/2">
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
                        <td class='editable' data-id='{$tag['id']}' id='toBeEdited' >{$tag['name']}</td>
                        <td>
                            <div class='action-buttons'>
                                <button class='action-btn' onclick='openEditModal(`tag`, {$tag['id']}, `{$tag['name']}`)'>Edit</button>
                                 <a href='../../controllers/deleteTag.php?id=$tag[id]'><button class='action-btn'>Delete</button></a>
                            </div>
                        </td>
                    </tr>
                    ";
                } ?>
            </tbody>
        </table>
        <table class="tag-table w-1/2">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categories as $category) {
                    echo "
                    <tr>
                        <td>{$category['name']}</td>
                        <td>
                            <div class='action-buttons'>
                                <button class='action-btn' onclick='openEditModal(`category`, {$category['id']}, `{$category['name']}`)' >Edit</button></a>
                                <a href='../../controllers/deleteCategory.php?id=$category[id]'><button class='action-btn'>Delete</button>
                            </div>
                        </td>
                    </tr>
                    ";
                } ?>
            </tbody>
        </table>

    </section>
    <div id="editModal" class="modal hidden">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="editForm">
                <label for="itemName">Name:</label>
                <input type="text" id="itemName" name="name" required>
                <input type="hidden" id="itemId" name="id">
                <input type="hidden" id="itemType" name="type">
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(type, id, name) {
            document.getElementById('itemName').value = name;
            document.getElementById('itemId').value = id;
            document.getElementById('itemType').value = type;
            document.getElementById('editModal').style.display = 'block';
        }

        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const type = formData.get('type');
            const url = type === 'tag' ? '../../controllers/updateTag.php' : '../../controllers/updateCategory.php';

            fetch(url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Item updated successfully');
                    location.reload();
                } else {
                    alert('Failed to update item');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('editModal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('editModal')) {
                document.getElementById('editModal').style.display = 'none';
            }
        });
    </script>
</body>
</html>