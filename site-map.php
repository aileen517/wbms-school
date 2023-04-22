<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Commonwealth National High School</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="cnhsadmin/img/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main4.css" />

</head>
<body>
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index">
                                <img src="cnhsadmin/img/banner.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="dd-menu text-uppercase" href="index">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed text-uppercase" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">About Us</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item active"><a href="history">History</a></li>
                                            <li class="nav-item"><a href="mission">Mission</a></li>
                                            <li class="nav-item"><a href="vision">Vision</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed text-uppercase" href="announcement">Announcement</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed text-uppercase" href="enrollment">Enrollment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed text-uppercase" href="events">Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed text-uppercase" href="grade-level">Grade Level</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed text-uppercase" href="login">Login</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <section class="hero-area overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="hero-text text-center">
                        <!-- Start Hero Text -->
                        <div class="section-heading">
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">Welcome to Commonwealth National High School</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Supreme Student Government</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="categories">
        <div class="container">
            <div class="cat-inner bg-danger">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="category-slider">
                            <?php
                                include("cnhsadmin/db_connect.php");
                                $q_about = mysqli_query($conn, "SELECT * FROM $about WHERE type='announce' OR type='event'");
                                while($row_about = mysqli_fetch_array($q_about)) {
                                    if($row_about['type']=="announce") {
                                        echo "<a href='announcement' class='single-cat border'>";
                                            echo "<div class='icon'>";
                                                echo "<img src='cnhsadmin/uploads/".$row_about['photo']."' alt='Announcement'>";
                                            echo "</div>"; 
                                            echo "<h3>".$row_about['title']."</h3>";
                                        echo "</a>";
                                    }
                                    else {
                                        echo "<a href='events' class='single-cat border m-1'>";
                                            echo "<div class='icon'>";
                                                echo "<img src='cnhsadmin/uploads/".$row_about['photo']."' alt='Event'>";
                                            echo "</div>";
                                            echo "<h3>".$row_about['title']."</h3>";
                                        echo "</a>";
                                    }
                                }
                                mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="items-grid section custom-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp text-uppercase" data-wow-delay=".4s">Site Map</h2>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 bg-white p-4">
                    <p>
                        <?php
                            $addr = "National Highway Commonwealth Aurora Zamboanga del Sur";
                            $address = str_replace(" ", "+",$addr);
                            echo "<iframe width='100%' height='480' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.it/maps?q=".$address."&output=embed'></iframe>";
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="content">
                                <ul class="footer-bottom-links">
                                    <li><a href="terms">Terms of use</a></li>
                                    <li><a href="privacy-policy">Privacy Policy</a></li>
                                    <li><a href="contact-us">Contact Us</a></li>
                                    <li><a href="site-map">Site Map</a></li>
                                </ul>
                                <p class="copyright-text">Developed by <a href="https://graygrids.com/"
                                        rel="nofollow" target="_blank">WMSU Aurora BSCS IV 2022</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        //========= Category Slider 
        tns({
            container: '.category-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 5,
                },
                1170: {
                    items: 6,
                }
            }
        });
    </script>
</body>

</html>