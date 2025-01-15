<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Teacher Dashboard - Course Management</title>
    <meta name="description" content="Teacher dashboard for managing courses, including adding, modifying, and viewing statistics.">
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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#add-course">Add Course</a></li>
                        <li class="nav-item"><a class="nav-link" href="#manage-courses">Manage Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="#course-stats">Course Statistics</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section id="add-course" class="container pt-4">
        <h2>Add New Course</h2>
        <form>
            <div class="mb-3">
                <label for="courseTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="courseTitle" required>
            </div>
            <div class="mb-3">
                <label for="courseDescription" class="form-label">Description</label>
                <textarea class="form-control" id="courseDescription" required></textarea>
            </div>
            <div class="mb-3">
                <label for="courseContent" class="form-label">Content (Video or Document)</label>
                <input type="file" class="form-control" id="courseContent" accept=".mp4,.pdf,.docx" required>
            </div>
            <div class="mb-3">
                <label for="courseTags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="courseTags" placeholder="e.g. Programming, JavaScript" required>
            </div>
            <div class="mb-3">
                <label for="courseCategory" class="form-label">Category</label>
                <select class="form-select" id="courseCategory" required>
                    <option value="" disabled selected>Select Category</option>
                    <option value="development">Development</option>
                    <option value="design">Design</option>
                    <option value="marketing">Marketing</option>
                    <option value="business">Business</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>
    </section>

    <section id="manage-courses" class="container pt-5">
        <h2>Manage Courses</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Course Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Full-stack Web Development</td>
                    <td>Learn how to build full-stack applications.</td>
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                        <button class="btn btn-info">View Enrollments</button>
                    </td>
                </tr>
                <!-- Add more courses as necessary -->
            </tbody>
        </table>
    </section>

    <section id="course-stats" class="container pt-5">
        <h2>Course Statistics</h2>
        <div class="stats">
            <p>Number of Students Enrolled: <strong>150</strong></p>
            <p>Total Number of Courses: <strong>20</strong></p>
            <!-- Include more stat metrics as needed -->
        </div>
    </section>

    <footer class="footer-area pt-4">
        <div class="container">
            <div class="copy-right text-center">
                <p>© 2025 Education & Online Course Template. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!--====== Bootstrap js ======-->
    <script src="../../../assets/js/bootstrap.bundle-5.0.0.alpha-min.js"></script>
</body>

</html>
