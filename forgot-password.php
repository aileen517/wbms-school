<?php
	ob_start();
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
	error_reporting(0);
	if(isset($_POST['ForgotPass']))
	{
		//keep it inside
		$email=$_POST['email'];
		$code = $_POST['code'];
		$code2 = $_POST['code2'];
		echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
		if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) 
		{
			echo "<div></div><script>
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Invalid Email.',
				footer: '',
				showCloseButton: true
				}).then(function (result) {
				if (result.value) {
				window.history.back();
				}
				});
			</script>";
		}
		else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $code)) 
	    {
	    	echo "<div></div><script>
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Password must contain atleast one number, one letter.',
				footer: '',
				showCloseButton: true
				}).then(function (result) {
				if (result.value) {
				window.history.back();
				}
				});
			</script>";
	    }
		else if(strlen($code) < 8)
		{
			echo "<div></div><script>
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Password must be at least 8 characters.',
				footer: '',
				showCloseButton: true
				}).then(function (result) {
				if (result.value) {
				window.history.back();
				}
				});
			</script>";
		}
		else if($code<>$code2)
		{
			echo "<div></div><script>
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Password did not match.',
				footer: '',
				showCloseButton: true
				}).then(function (result) {
				if (result.value) {
				window.history.back();
				}
				});
			</script>";
		}
		else
		{
			include("cnhsadmin/db_connect.php");
			$query = mysqli_query($conn,"SELECT * FROM $student WHERE semail='$email'")or die(mysqli_error($conn)); 
			if(mysqli_num_rows($query)>0) {
			    while($row_query = mysqli_fetch_array($query)) {
			        $fname = $row_query['sfname'];
			        $lrnno = $row_query['lrnno'];
    			    $subject = 'Forgot_Password';
                    $from = 'CNHS';
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->SMTPDebug = false;
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'penjerry1986@gmail.com';                     //SMTP username
                        $mail->Password   = 'jtvlioymozhxnphk';                               //SMTP password
                        $mail->SMTPSecure = 'tls';           //Enable implicit TLS encryption
                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                        //Recipients
                        $mail->setFrom('penjerry1986@gmail.com', 'CNHSAurora');
                        $mail->addAddress($email, $fname);     //Add a recipient
                        //$mail->addAddress('ellen@example.com');               //Name is optional
                        //$mail->addReplyTo('info@example.com', 'Information');
                        //$mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');
                        //Attachments
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Enrollment Details';
                        //$mail->Body    = 'You have successfully registered.';
                        $mail->Body = "
                            <html>
                                <head>
                                    <title></title>
                                </head>
                                <body>                
                                    <div style='width:800px;background:#fff;border-style:groove;'>
                                        <h4 style='color:#ea6512;margin-top:-20px;'> Hello, " .$fname."</h4>
                                        <p>We have just recieved a request to reset your password at cnhsaurora.com and we are here to help you with that! </p>
                                        <p>Simpy click on the link to set up a new password for your account: </p>
                                        <p>https://cnhsaurora.com/resetpass?email=$email&&lrnno=$lrnno&&passw=$code </p>
                                        <hr/>
                                        <p>If you did not request a password reset, no worry! Your password is still safe with us, so you can just ignore this email and enjoy the rest of your day. </p>
                                        <hr/>
                                        <p>CNHS Aurora Team. </p>
                                    </div>              
                                </body>
                            </html>";
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        $mail->send();
                            echo "<div></div><script>Swal.fire({
                        		position: 'top-end',
                        		icon: 'success',
                        		title: 'Success',
                        		text: 'You have successfully sent request for password reset. Please check your email for confirmation.',
                        		showConfirmButton: false,
                        		timer: 1500
                        	})</script>";
                    } catch (Exception $e) {
                        echo "<div></div><script>Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error',
                            text: 'Email address provided not found.',
                            showConfirmButton: false,
                            timer: 1500
                        })</script>";
                    }
			    }
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					icon: 'error',
					title: 'Error',
					text: 'Email address provided not found.',
					showConfirmButton: false,
					timer: 3000
				})</script>";
			}
			mysqli_close($conn);
		}
	}
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
	function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Password do not match!");
    else
        $("#divCheckPasswordMatch").html("Password match.");
}

$(document).ready(function () {
   $("#txtConfirmPassword").keyup(checkPasswordMatch);
});
   
</script>
</head>
<body>
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
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
                                        <a class=" active dd-menu collapsed text-uppercase" href="login">Login</a>
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
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Forgot Password</h2>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <form method="post" action=""> 
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="lni lni-user"></i></span>
							<input type="email" name="email" class="form-control p-3" placeholder="Enter your email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="lni lni-key"></i></span>
							<input type="password" name="code" class="form-control p-3" id="txtNewPassword" placeholder="New Password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="lni lni-key"></i></span>
							<input type="password" name="code2" class="form-control p-3" id="txtConfirmPassword" placeholder="Confirm New Password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
						</div>
						<div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
						<div class="text-center">
							<button type="submit" name="ForgotPass" class="btn btn-primary mx-auto text-uppercase">Send Password Reset</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Items Grid Area -->
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