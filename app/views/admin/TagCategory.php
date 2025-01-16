<?php


include_once '../../repositories/tagManager.php';

global $tags;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Categories and Tags - Youdemy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            line-height: 1.6;
        }

        .navbar {
            background-color: #ffffff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo h1 {
            color: #3498db;
            margin: 0;
            font-size: 1.8rem;
        }

        .dashboard-main {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .dashboard-section {
            background: #ffffff;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dashboard-section h2 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        label {
            font-weight: 500;
            color: #2c3e50;
        }

        input {
            padding: 0.8rem;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #3498db;
        }

        .submit-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>Youdemy</h1>
            </div>
        </nav>
    </header>
    <main class="dashboard-main">
        <section class="dashboard-section">
            <h2> Add Categories and Tags</h2>
            <form id="categoryForm" action="../../controllers/CategoryControllers.php" method="POST">
                <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" id="categoryName" name="category" required>
                    <button type="submit" name="add_category" class="submit-btn">Add Category</button>
                </div>
            </form>

            <form id="tagForm" action="../../controllers/TagControllers.php" method="POST">
                <div class="form-group">
                    <label for="tagName">Tag Name</label>
                    <input type="text" id="tagName" name="tag" required>
                    <button type="submit" name="add_tag" class="submit-btn">Add Tag</button>
                </div>
            </form>

        </section>

        
<!-- Tags Table -->
<h2>Tags</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($tags as $tag): 
        echo"
        <tr>
        <td><?php echo $tag[name]; ?></td>
        <td>
            <form action='../../controllers/TagControllers.php' method='POST' style='display:inline;'>

                <input type='hidden' name='delete_tag' value='<?php echo $tag[id]; ?>'>
                <a href='../../controllers/TagControllers.php?'><button type='submit' onclick='return confirm('Are you sure you want to delete this tag?');'>Delete</button></a>
            </form>
        </td>
    </tr>";
 ?>
</table>

    </main>
</body>

</html>