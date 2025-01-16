<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta name="description" content="Admin dashboard for managing accounts and users.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="../../../assets/css/bootstrap-5.0.5-alpha.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .sidebar {
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            margin-bottom: 15px;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            padding: 20px;
            flex-grow: 1;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        .footer-credit {
            background-color: #343a40;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <nav class="sidebar">
            <h2>LearnPlus</h2>
            <p>Admin</p>
            <a href="adminDashboard.php">Dashboard</a>
            <a href="teacherValidation.php">User Management</a>
            <a href="courseManagement.php">Course Management</a>
            <a href="#settings">Settings</a>
        </nav>

        <div class="main-content">
            <h1>User Management</h1>
            <div class="overflow-auto">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="userTable">
                        <!-- User data will be populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="footer-credit">
        <p>Designed and Developed by <a href="https://github.com/your-repo" style="color: white;">Your Name</a></p>
    </div>

    <script>
        let users = [
            { name: "John Doe", email: "john@example.com", role: "Instructor", status: "Active", createdAt: "2022-06-15" },
            { name: "Jane Smith", email: "jane@example.com", role: "Admin", status: "Suspended", createdAt: "2021-12-10" },
            // Add more user data as needed
        ];

        function populateUserTable() {
            const userTable = document.getElementById('userTable');
            users.forEach(user => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.role}</td>
                    <td>${user.status}</td>
                    <td>${user.createdAt}</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                `;
                userTable.appendChild(tr);
            });
        }

        document.addEventListener('DOMContentLoaded', populateUserTable);
    </script>
</body>

</html>
