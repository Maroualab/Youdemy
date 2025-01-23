<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/repositories/courseManager.php';
$coursecatalog = new CourseManager();

$offset = isset($_GET['page']) && is_numeric($_GET['page'])? ((int)$_GET['page'] * 6) : 0;


$coursecatalog = $coursecatalog->fetchAllCourses($offset);


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Course Catalog - Education & Online Course Website</title>
    <meta name="description" content="Browse our wide range of online courses.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../../assets/css/animate.css">
    <link rel="stylesheet" href="../../../assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-5.0.5-alpha.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link href="../../../public/src/output.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"> -->


    <style>
        .search-bar {
            margin-bottom: 20px;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
   
	<header class="header_area">
		<div id="header_navbar" class="header_navbar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-12">
						<nav class="navbar navbar-expand-lg">
							<a class="navbar-brand" href="/website/public/index.php">
								<img id="logo" src="../../../assets/images/logo.svg" alt="Logo">
							</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse"
								data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
								<ul id="nav" class="navbar-nav ml-auto">
									<li class="nav-item">
										<a class="page-scroll" href="#home">Home</a>
									</li>
									<li class="nav-item">
										<a class="page-scroll" href="#courses">Courses</a>
									</li>
									<li class="nav-item">
										<a class="page-scroll" href="#categories">Categories</a>
									</li>
									<li class="nav-item">
										<a class="page-scroll" href="#blog">Blog</a>
									</li>
									<li class="nav-item">
										<a class="page-scroll" href="#contact">Contact</a>
									</li>

									<ul class="navbar-nav ml-auto">
										<?php if (isset($_SESSION['student_id'])): ?>
											<li class="nav-item">
												<a class="header-btn btn-hover"
													href="/website/app/controllers/logout.php">Log Out</a>
											</li>
										<?php else: ?>
											<li class="nav-item" style="display:flex;gap:10px;">
												<a class="header-btn btn-hover"
													href="/website/app/Views/auth/sign-up.php">Sign Up</a>
												<a class="header-btn btn-hover" href="/website/app/Views/auth/login.php">Log
													In</a>
											</li>
										<?php endif; ?>
									</ul>
								</ul>
							</div> <!-- navbar collapse -->
						</nav> <!-- navbar -->
					</div>
				</div> <!-- row -->
			</div> <!-- container -->
		</div> <!-- header navbar -->
	</header>

    <!--====== CATALOG PART START ======-->
    <section id="catalog" class="course-area pt-140 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-10 mx-auto">
                    <div class="section-title text-center mb-50">
                        <h2 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Course Catalog</h2>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Explore our comprehensive range of free online courses designed to help you succeed.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="search-bar text-center">
                        <input type="text" id="search" placeholder="Search courses by keywords..." class="form-control" onkeyup="filterCourses()">
                    </div>
                </div>
            </div>

            <div id="course-list" class="row mb-30">
				  <!-- Existing Course -->
                  <?php
                    // print_r($coursecatalog);
                    foreach ($coursecatalog as $displaycourse) {
                        echo "
                    <div class='col-xl-4 col-lg-4 col-md-6'>
                        <div class='single-course wow fadeInUp' data-wow-delay='.2s'>
                            <div class='course-img'>
                                <a href=''>
                                    <img src='/website/assets/images/courseBanners/". htmlspecialchars($displaycourse['course_img']) . "' alt='course_picture'>
                                </a>
                            </div>
                            <div class='course-info'>
                                <h4><a href=''>$displaycourse[course_title]</a></h4>
                            </div>
                        </div>
                    </div>
               ";
                    } 
                    ?>

               



            <!-- Pagination -->
            <div class="row">
                <div class="col-xl-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php $pages= isset($coursecatalog[0]['total_courses'])? ceil($coursecatalog[0]['total_courses']/6):0;
                            for($i=0;$i<$pages;$i++){
                               echo "<li class='page-item'><a class='page-link' href='/website/app/views/courses/coursesCatalog.php?page=".($i)."'>".($i+1)."</a></li>";
                            }
                            ?>
                            
                       </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--====== CATALOG PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <a href="../../../public/index.php" class="logo d-blok">
                            <img src="../../../assets/images/logo.svg" alt="">
                        </a>
                        <p>Lorem ipsum dolor sit amco nsetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 offset-xl-1 offset-lg-1 col-md-6">
                    <div class="footer-widget">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="../../../public/index.php">Home</a></li>
                            <li><a href="./coursesCatalog.php">Courses</a></li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h5>Contact Us</h5>
                        <ul>
                            <li><p>Phone: +884-9273-3867</p></li>
                            <li><p>Email: hello@gmail.com</p></li>
                            <li><p>Address: Random Road<br> USA</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-credit">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="copy-right text-center text-md-left">
                            <p class="text-center">Designed and Developed by <a href="https://github.com/Maroualab/Youdemy">Maroua Labballi</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== Bootstrap js ======-->
    <script src="../../../assets/js/bootstrap.bundle-5.0.0.alpha-min.js"></script>
    <script src="../../../assets/js/main.js"></script>
    <!--====== wow js ======-->
<script src="../../../assets/js/wow.min.js"></script>

    <script>
   
    // Get the navbar

    // for menu scroll 
    var pageLink = document.querySelectorAll('.page-scroll');

    pageLink.forEach(elem => {
        elem.addEventListener('click', e => {
            e.preventDefault();
            document.querySelector(elem.getAttribute('href')).scrollIntoView({
                behavior: 'smooth',
                offsetTop: 1 - 60,
            });
        });
    });

    // section menu active
    function onScroll(event) {
        var sections = document.querySelectorAll('.page-scroll');
        var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

        for (var i = 0; i < sections.length; i++) {
            var currLink = sections[i];
            var val = currLink.getAttribute('href');
            var refElement = document.querySelector(val);
            var scrollTopMinus = scrollPos + 73;
            if (refElement.offsetTop <= scrollTopMinus && (refElement.offsetTop + refElement.offsetHeight > scrollTopMinus)) {
                document.querySelector('.page-scroll').classList.remove('active');
                currLink.classList.add('active');
            } else {
                currLink.classList.remove('active');
            }
        }
    };

    window.document.addEventListener('scroll', onScroll);


    //===== close navbar-collapse when a  clicked
    let navbarToggler = document.querySelector(".navbar-toggler");
    var navbarCollapse = document.querySelector(".navbar-collapse");

    document.querySelectorAll(".page-scroll").forEach(e =>
        e.addEventListener("click", () => {
            navbarToggler.classList.remove("active");
            navbarCollapse.classList.remove('show')
        })
    );
    navbarToggler.addEventListener('click', function () {
        navbarToggler.classList.toggle("active");
    });

</script>
</body>

</html>




