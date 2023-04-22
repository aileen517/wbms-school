<?php
    ob_start(); 
?>
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
<script type="text/javascript">
      function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
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
                                            <li class="nav-item"><a href="history">History</a></li>
                                            <li class="nav-item"><a href="mission">Mission</a></li>
                                            <li class="nav-item"><a href="vision">Vision</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed text-uppercase" href="announcement">Announcement</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="active dd-menu collapsed text-uppercase" href="enrollment">Enrollment</a>
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
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Enrollment</h2>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-12">
                        <div class="single-grid wow fadeInUp" data-wow-delay=".2s">
                            <div class="content">
                                <div class="top-content">
                                    <p class="update-time h5">
                                        <div id="myRadioGroup">
                                            New Student/Transferee <input type="radio" name="cars" checked="checked" value="twoCarDiv"  />
                                            | Old Student <input type="radio" name="cars" value="threeCarDiv" title="This enrollment option is intended only if you are old student from Commonwealth National HighSchool" /><hr>
                                            <div id="twoCarDiv" class="desc">
                                                <form class="add-new-post h6 p-2" id="enrollmentform" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group row">
                                                    <label for="syear" class="col-sm-3 control-label col-form-label">School Year : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="syear" class="form-control h5 col-sm-6" id="syear" readonly value="<?php include("cnhsadmin/db_connect.php"); $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'"); while($row_syear = mysqli_fetch_array($q_syear)) {echo $row_syear['syear'];}mysqli_close($conn); ?>" />
                                                      <input type="hidden" name="syear1" class="form-control fs-5" id="syear1" readonly value="<?php include("cnhsadmin/db_connect.php"); $q_syear1 = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'"); while($row_syear1 = mysqli_fetch_array($q_syear1)) {echo $row_syear1['syID'];}mysqli_close($conn); ?>" />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="glevel" class="col-sm-3 control-label col-form-label">Grade level to Enroll : </label>
                                                    <div class="col-sm-6">
                                                      <select name="glevel" id="glevel" class="form-control col-sm-6 h5">
                                                        <option value="07">Grade 07</option>
                                                        <option value="08">Grade 08</option>
                                                        <option value="09">Grade 09</option>
                                                        <option value="10">Grade 10</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="etype" class="col-sm-3 control-label col-form-label">Select LRN Option : </label>
                                                    <div class="col-sm-6">
                                                      <select name="etype" id="etype" class="form-control col-sm-6 h5">
                                                        <option value="no">No LRN</option>
                                                        <option value="with">With LRN</option>
                                                        <option value="returning">Returning</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <h5 class="text-center fw-bold p-2 border-top border-bottom">STUDENT INFORMATION</h5>
                                                  <div class="form-group row">
                                                    <label for="psano" class="col-sm-3 control-label col-form-label">PSA Birth Certificate No. : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="psano" class="form-control col-sm-6 h5" id="psano" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="lrnno" class="col-sm-3 control-label col-form-label">Learner Reference No. (LRN). : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="lrnno" class="form-control col-sm-6 h5" id="lrnno" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="gpano" class="col-sm-3 control-label col-form-label">GPA : </label>
                                                    <div class="col-sm-9">
                                                      <input type="number" name="gpano" class="form-control col-sm-6 h5" id="gpano" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">First Name : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="sfname" class="form-control col-sm-6 h5" id="sfname" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 control-label col-form-label">Last Name : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="slname" class="form-control col-sm-6 h5" id="slname" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="mname" class="col-sm-3 control-label col-form-label">Middle Name : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="mname" class="form-control col-sm-6 h5" id="mname" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="bdate" class="col-sm-3 control-label col-form-label">Date of Birth : </label>
                                                    <div class="col-sm-9">
                                                      <input type="date" name="bdate" class="form-control col-sm-6 h5" id="bdate" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="gender" class="col-sm-3 control-label col-form-label">Sex : </label>
                                                    <div class="col-sm-6">
                                                      <select name="gender" id="gender" class="form-control col-sm-6 h5">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="pppp" class="col-sm-3 control-label col-form-label">Belonging to Indigenous Peoples (IP) Community/Indigenous Cultural Community? : </label>
                                                    <div class="col-sm-6">
                                                      <select name="pppp" id="pppp" class="form-control col-sm-6 h5">
                                                        <option value="no">No</option>
                                                        <option value="yes">Yes</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="ipconf" class="col-sm-3 control-label col-form-label">If Yes, please specify : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="ipconf" class="form-control col-sm-6 h5" id="ipconf" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="mton" class="col-sm-3 control-label col-form-label">Mother Tongue : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="mton" class="form-control col-sm-6 h5" id="mton" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="cpnum" class="col-sm-3 control-label col-form-label">Cellphone No. : </label>
                                                    <div class="col-sm-9">
                                                      <input class="form-control col-sm-6 h5 form-control-lg mb-3" type="text" name="cpnum" id="cpnum" required onkeypress="return onlyNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="email" class="col-sm-3 control-label col-form-label">Email Address. : </label>
                                                    <div class="col-sm-9">
                                                      <input class="form-control col-sm-6 h5 form-control-lg mb-3" type="email" name="semail" id="semail" />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="addr" class="col-sm-3 control-label col-form-label">Complete Address : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="saddr" class="form-control col-sm-6 h5" id="saddr" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="zip" class="col-sm-3 control-label col-form-label">Zip Code : </label>
                                                    <div class="col-sm-9">
                                                      <input type="number" name="zip" class="form-control col-sm-6 h5" id="zip" required />
                                                    </div>
                                                  </div>
                                                  <h5 class="text-center fw-bold p-2 border-top border-bottom">PARENTS/GUARDIANS INFORMATION</h5>
                                                  <div class="form-group row">
                                                    <label for="faname" class="col-sm-3 control-label col-form-label">Father's Name : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="faname" class="form-control col-sm-6 h5" id="faname" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="moname" class="col-sm-3 control-label col-form-label">Mother's Maiden Name : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="moname" class="form-control col-sm-6 h5" id="moname" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="mnum" class="col-sm-3 control-label col-form-label">Cellphone No. : </label>
                                                    <div class="col-sm-9">
                                                      <input class="form-control col-sm-6 h5 form-control-lg mb-3" type="text" name="mnum" id="mnum" required onkeypress="return onlyNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">
                                                    </div>
                                                  </div>
                                                  <h5 class="text-center fw-bold p-2 border-top border-bottom">FOR RETURNING LEARNERS (BALIK-ARAL) AND THOSE WHO SHALL TRANSFER/MOVE IN</h5>
                                                  <div class="form-group row">
                                                    <label for="lyear" class="col-sm-3 control-label col-form-label">Last School Year Completed : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="lyear" class="form-control col-sm-6 h5" id="lyear" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="scname" class="col-sm-3 control-label col-form-label">School Name : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="scname" class="form-control col-sm-6 h5" id="scname" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="scid" class="col-sm-3 control-label col-form-label">School ID : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="scid" class="form-control col-sm-6 h5" id="scid" />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="scaddr" class="col-sm-3 control-label col-form-label">School Address : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="scaddr" class="form-control col-sm-6 h5" id="scaddr" />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="dlearning" class="col-sm-3 control-label col-form-label">Preferred Distance Learning Modality/ies : </label>
                                                    <div class="col-sm-9">
                                                      <select name="dlearning" id="dlearning" class="form-control h5">
                                                        <option value="mprint">Modular (Print)</option>
                                                        <option value="mdigital">Modular (Digital)</option>
                                                        <option value="onl">Online</option>
                                                        <option value="etv">Educational TV</option>
                                                        <option value="radio">Radio-based instruction</option>
                                                        <option value="home">Homeschooling</option>
                                                        <option value="blended">Blended</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <h5 class="text-center fw-bold p-2 border-top border-bottom">REQUIREMENTS</h5>
                                                  <div class="form-group row">
                                                    <label for="scaddr" class="col-sm-3 control-label col-form-label">Report Card (Front Page): </label>
                                                    <div class="col-sm-9">
                                                        <input name="upload[]" type="file" class="form-control col-sm-6 h5" multiple="multiple" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="scaddr" class="col-sm-3 control-label col-form-label">Report Card (Back Page): </label>
                                                    <div class="col-sm-9">
                                                        <input name="upload[]" type="file" class="form-control col-sm-6 h5" multiple="multiple" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="scaddr" class="col-sm-3 control-label col-form-label">PSA Birth Certificate: </label>
                                                    <div class="col-sm-9">
                                                        <input name="upload[]" type="file" class="form-control col-sm-6 h5" multiple="multiple" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="scaddr" class="col-sm-3 control-label col-form-label">good Moral Certificate: </label>
                                                    <div class="col-sm-9">
                                                        <input name="upload[]" type="file" class="form-control col-sm-6 h5" multiple="multiple" required />
                                                    </div>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="agree" id="agree" value="agree" required>&nbsp;I hereby certify that the above information given are true and correct to the best of my knowledge and I allow the Department of Education to use my child's details to create and/or update his/her learner profile in the Learner Information System. The information herein shall be treated as confidential in compliance with the Data Privacy Act of 2012.
                                                  </div>
                                                  <div class="border-top">
                                                    <div class="card-body">
                                                      <button type="submit" id="AddStudent" name="SubmitEnroll" class="btn btn-primary"><i class="fa fa-check"></i> Submit Enrollment</button>
                                                    </div>
                                                  </div>
                                                </form>
                                            </div>
                                            <div id="threeCarDiv" class="desc">
                                                <form class="add-new-post h6 p-2" id="enrollmentform" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <label for="lrnno" class="col-sm-3 control-label col-form-label">Learner Reference No. (LRN). : </label>
                                                        <div class="col-sm-9">
                                                          <input type="text" name="lrnno" class="form-control col-sm-6 h5" id="lrnno" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 control-label col-form-label">First Name : </label>
                                                        <div class="col-sm-9">
                                                          <input type="text" name="sfname" class="form-control col-sm-6 h5" id="sfname" required />
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 control-label col-form-label">Last Name : </label>
                                                        <div class="col-sm-9">
                                                          <input type="text" name="slname" class="form-control col-sm-6 h5" id="slname" required />
                                                        </div>
                                                      </div>
                                                      <div class="border-top">
                                                    <div class="card-body">
                                                      <button type="submit" id="NexStudent" name="ProceedEnroll" class="btn btn-primary"><i class="fa fa-check"></i> Proceed Enrollment</button>
                                                    </div>
                                                  </div>
                                                </form>
                                            </div>
                                        </div>
                                    </p>
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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        $(document).ready(function() {
    $("#twoCarDiv").show();
    $("#threeCarDiv").hide();
    $("input[name$='cars']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#" + test).toggle('slow');
    });
});
    </script>
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
<?php
    include("enroll_function.php");
    ManageEnrollment();
?>
<?php
    ob_flush(); 
?>