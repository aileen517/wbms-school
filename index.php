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
                                        <a class=" active dd-menu text-uppercase" href="index">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed text-uppercase" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">About Us</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item"><a href="history">History</a></li>
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
    <!-- End Header Area -->

    <!-- Start Hero Area -->
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
    <!-- End Hero Area -->

    <!-- Start Categories Area -->
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
    <!-- /End Categories Area -->

    <!-- Start Items Grid Area -->
    <section class="items-grid section custom-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">School Events</h2>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <?php
                        include("cnhsadmin/db_connect.php");
                        $q_events = mysqli_query($conn, "SELECT * FROM $about WHERE type='event' AND status='posted'");
                        if(mysqli_num_rows($q_events)<1) {
                    ?>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-grid wow fadeInUp" data-wow-delay=".2s">
                                    <div class="content">
                                        <div class="top-content">
                                            <p class="update-time">No event found.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                        else {
                            while($row_events = mysqli_fetch_array($q_events)) {
                    ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-grid wow fadeInUp" data-wow-delay=".2s">
                                        <div class="image">
                                            <a href="#" class="thumbnail"><img src="cnhsadmin/uploads/<?php echo $row_events['photo'];?>" alt="<?php echo $row_events['title'];?>"></a>
                                        </div>
                                        <div class="content">
                                            <div class="top-content">
                                                <p class="update-time"><h4><?php echo $row_events['title'];?></h4></p>
                                                <p class="update-time"><?php echo $row_events['details'];?></p>
                                            </div>
                                            <div class="bottom-content p-2 border-top">
                                                <p class="price"><i class="lni lni-pointer-right"></i>&nbsp; <?php echo date("F d, Y", $row_events['abtdate']);?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } 
                        mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Items Grid Area -->

    <!-- Start Why Choose Area -->
    <section class="why-choose section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Grade Level</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="choose-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <img src="cnhsadmin/img/logo.png" width="150">
                                    <h4 class="text-uppercase"><a href="grade-procedure?level=07">Grade 07</a></h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <img src="cnhsadmin/img/logo.png" width="150">
                                    <h4 class="text-uppercase"><a href="grade-procedure?level=08">Grade 08</a></h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <img src="cnhsadmin/img/logo.png" width="150">
                                    <h4 class="text-uppercase"><a href="grade-procedure?level=09">Grade 09</a></h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <img src="cnhsadmin/img/logo.png" width="150">
                                    <h4 class="text-uppercase"><a href="grade-procedure?level=10">Grade 10</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <p class="copyright-text">Developed by <a href="https://graygrids.com/"rel="nofollow" target="_blank">WMSU Aurora BSCS IV 2022</a></p>
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