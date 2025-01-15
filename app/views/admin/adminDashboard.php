<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta name="description" content="Admin dashboard for managing teacher accounts, users, content, and statistics.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="../../../assets/css/bootstrap-5.0.5-alpha.min.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="../../../assets/css/style.css">
</head>

<body>
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img id="logo" src="../../../assets/images/logo.svg" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                </button>
            </nav>
        </div>
    </header>

    <main class="container pt-5">
        <h1 class="text-center mb-4">Admin Dashboard</h1>

        <!-- Validate Teacher Accounts -->
        <section id="validate-accounts" class="mb-5">
            <h2>Validate Teacher Accounts</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>
                            <button class="btn btn-success">Validate</button>
                            <button class="btn btn-danger">Reject</button>
                        </td>
                    </tr>
                    <!-- Add more accounts as necessary -->
                </tbody>
            </table>
        </section>

        <!-- Manage Users -->
        <section id="manage-users" class="mb-5">
            <h2>Manage Users</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jane Smith</td>
                        <td>jane@example.com</td>
                        <td>Active</td>
                        <td>
                            <button class="btn btn-warning">Suspend</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more users as necessary -->
                </tbody>
            </table>
        </section>

        <!-- Manage Content -->
        <section id="manage-content" class="mb-5">
            <h2>Manage Content</h2>
            <div class="mb-3">
                <button class="btn btn-primary">Add Course</button>
                <button class="btn btn-secondary">Manage Categories</button>
                <button class="btn btn-info">Manage Tags</button>
            </div>
        </section>

        <!-- Bulk Tag Insertion -->
        <section id="bulk-tag-insertion" class="mb-5">
            <h2>Bulk Tag Insertion</h2>
            <form>
                <div class="mb-3">
                    <label for="tags" class="form-label">Enter Tags (separated by commas):</label>
                    <textarea class="form-control" id="tags" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Insert Tags</button>
            </form>
        </section>

        <!-- Global Statistics -->
        <section id="global-statistics">
            <h2>Global Statistics</h2>
            <ul class="list-group">
                <li class="list-group-item">Total Number of Courses: <strong>150</strong></li>
                <li class="list-group-item">Courses by Category:
                    <ul>
                        <li>Development: <strong>50</strong></li>
                        <li>Design: <strong>40</strong></li>
                        <li>Marketing: <strong>30</strong></li>
                        <li>Business: <strong>30</strong></li>
                    </ul>
                </li>
                <li class="list-group-item">Course with the Most Students: <strong>Full-stack Web Development (200 students)</strong></li>
                <li class="list-group-item">Top 3 Teachers:
                    <ul>
                        <li>John Doe - 150 courses</li>
                        <li>Jane Smith - 120 courses</li>
                        <li>Michael Brown - 100 courses</li>
                    </ul>
                </li>
            </ul>
        </section>
    </main>

    <footer class="footer-area pt-4">
        <div class="container">
            <div class="copy-right text-center">
                <p>© 2025 Education & Online Course Template. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
