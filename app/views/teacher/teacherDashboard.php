<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Youdemy</title>
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

        /* Navbar styles */
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

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #3498db;
            background-color: #f8f9fa;
        }

        .logout-btn {
            color: #e74c3c !important;
        }

        /* Main content area */
        .dashboard-main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Section styles */
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
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Form styles */
        .course-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        label {
            font-weight: 500;
            color: #2c3e50;
        }

        input,
        select,
        textarea {
            padding: 0.8rem;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        /* Upload content styles */
        .content-upload {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .upload-box {
            border: 2px dashed #e9ecef;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-box:hover {
            border-color: #3498db;
            background-color: #f8f9fa;
        }

        .upload-box i {
            font-size: 2rem;
            color: #3498db;
            margin-bottom: 1rem;
        }

        .upload-box input[type="file"] {
            display: none;
        }

        /* Button styles */
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

        /* Statistics grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: #ffffff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-card i {
            font-size: 2rem;
            color: #3498db;
        }

        .stat-info h3 {
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-bottom: 0.5rem;
        }

        .stat-info p {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
        }

        /* Course grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        /* Search bar */
        .search-bar {
            margin-bottom: 2rem;
        }

        .search-bar input {
            width: 100%;
            max-width: 400px;
            padding: 0.8rem;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 1rem;
        }

        /* Chart container */
        .chart-container {
            margin-top: 2rem;
            padding: 1rem;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #ffffff;
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                display: flex;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Simpler tag styles */
        .tags-wrapper {
            background: #fff;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .tags-search {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .tags-search input {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 200px;
        }

        .selected-count {
            color: #666;
            font-size: 0.9rem;
        }

        .tags-container {
            max-height: 400px;
            overflow-y: auto;
        }

        .tags-group {
            margin-bottom: 1.5rem;
        }

        .tags-group h4 {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .tags-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag {
            display: inline-block;
            cursor: pointer;
        }

        .tag input[type="checkbox"] {
            display: none;
        }

        .tag span {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .tag input[type="checkbox"]:checked+span {
            background: #3498db;
            color: white;
            border-color: #3498db;
        }

        /* Scrollbar styling */
        .tags-container::-webkit-scrollbar {
            width: 6px;
        }

        .tags-container::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .tags-container::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>Youdemy</h1>
            </div>
            <div class="nav-links">
                <a href="#add-course" class="active"><i class="fas fa-plus-circle"></i> Add Course</a>
                <a href="#manage-courses"><i class="fas fa-tasks"></i> Manage Courses</a>
                <a href="#statistics"><i class="fas fa-chart-bar"></i> Statistics</a>
                <a href="#logout" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </nav>
    </header>
    <main class="dashboard-main">
        <section id="add-course" class="dashboard-section">
            <h2><i class="fas fa-plus-circle"></i> Add New Course</h2>
            <form id="newCourseForm" class="course-form">
                <div class="form-group">
                    <label for="courseTitle">Course Title</label>
                    <input type="text" id="courseTitle" name="title" required>
                </div>
                <div class="form-group">
                    <label for="courseDescription">Course Description</label>
                    <textarea id="courseDescription" name="description" rows="4" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="courseCategory">Category</label>
                        <select id="courseCategory" name="category" required>
                            <option value="">Select Category</option>
                            <option value="development">Development</option>
                            <option value="design">Design</option>
                            <option value="business">Business</option>
                            <option value="marketing">Marketing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="courseType">Course Type</label>
                        <select id="courseType" name="type" required>
                            <option value="">Select Type</option>
                            <option value="video">Video Course</option>
                            <option value="document">Document Based</option>
                            <option value="mixed">Mixed Content</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Course Tags</label>
                    <div class="tags-wrapper">
                        <div class="tags-search">
                            <input type="text" id="tagSearch" placeholder="Search tags...">
                            <span class="selected-count">0 selected</span>
                        </div>
                        <div class="tags-container">
                            <div class="tags-group">
                                <h4>Programming</h4>
                                <div class="tags-list">
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="javascript">
                                        <span>JavaScript</span>
                                    </label>
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="python">
                                        <span>Python</span>
                                    </label>
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="java">
                                        <span>Java</span>
                                    </label>
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="php">
                                        <span>PHP</span>
                                    </label>
                                </div>
                            </div>
                            <div class="tags-group">
                                <h4>Web Development</h4>
                                <div class="tags-list">
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="html">
                                        <span>HTML</span>
                                    </label>
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="css">
                                        <span>CSS</span>
                                    </label>
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="react">
                                        <span>React</span>
                                    </label>
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="angular">
                                        <span>Angular</span>
                                    </label>
                                </div>
                            </div>
                            <div class="tags-group">
                                <h4>Tools</h4>
                                <div class="tags-list">
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="git">
                                        <span>Git</span>
                                    </label>
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="docker">
                                        <span>Docker</span>
                                    </label>
                                    <label class="tag">
                                        <input type="checkbox" name="tags[]" value="vscode">
                                        <span>VS Code</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group content-upload-section" style="display: none;">
                    <label>Course Content</label>
                    <div class="content-upload">
                        <div class="upload-box">
                            <i class="fas fa-video"></i>
                            <p>Upload Video</p>
                            <input type="file" accept="video/*" name="video" id="videoUpload">
                        </div>
                        <div class="upload-box">
                            <i class="fas fa-file-pdf"></i>
                            <p>Upload Document</p>
                            <input type="file" accept=".pdf,.doc,.docx" name="document" id="documentUpload">
                        </div>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Create Course</button>
            </form>
        </section>
        <section id="manage-courses" class="dashboard-section" style="display: none;">
            <h2><i class="fas fa-tasks"></i> Manage Courses</h2>
            <div class="search-bar">
                <input type="text" id="courseSearch" placeholder="Search courses...">
            </div>
            <div class="courses-grid">
            </div>
        </section>
        <section id="statistics" class="dashboard-section" style="display: none;">
            <h2><i class="fas fa-chart-bar"></i> Course Statistics</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <i class="fas fa-book-open"></i>
                    <div class="stat-info">
                        <h3>Total Courses</h3>
                        <p id="totalCourses">0</p>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <div class="stat-info">
                        <h3>Total Students</h3>
                        <p id="totalStudents">0</p>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-star"></i>
                    <div class="stat-info">
                        <h3>Average Rating</h3>
                        <p id="averageRating">0.0</p>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-certificate"></i>
                    <div class="stat-info">
                        <h3>Course Completions</h3>
                        <p id="courseCompletions">0</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>