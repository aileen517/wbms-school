<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
	if(!empty($_POST)) {
		include("db_connect.php");
		
		date_default_timezone_set("Asia/Manila");
		$datenow = strtotime(date("m/d/Y"));
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$title = trim($_POST['title']);
		$educ = trim($_POST['educ']);
		$ofc = trim($_POST['ofc']);
		$email = trim($_POST['email']);
		$con = trim($_POST['con']);
		$addr = trim($_POST['addr']);
		if($fname=="" || $lname=="" || $title=="" || $educ=="" || $ofc=="" || $email=="" || $con=="" || $addr=="") {
		    echo "Please complete required fields";
		}  
		else {
		$user_code = substr(str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ0123456789'),0,5);
		$passw = substr(str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ0123456789'),0,15);
		//$photo = trim($_POST['photo']);
		$check_faculty = mysqli_query($conn, "SELECT * FROM $faculty WHERE fname='$fname' AND lname='$lname'");
		if(mysqli_num_rows($check_faculty)>0) {
			echo "<div></div><script>Swal.fire({
	  			position: 'top-end',
	  			icon: 'error',
	  			title: 'Error',
	  			text: 'Employee is already added',
	  			showConfirmButton: false,
	  			timer: 1500
			})</script>";
		}
		else {
			$insert_faculty = mysqli_query($conn, "INSERT INTO $faculty(facode,dateentry,fname,lname,title,educ,ofc,email,password,con,addr,status)VALUES('$user_code', '$datenow', '$fname', '$lname', '$title', '$educ', '$ofc', '$email', '$passw', '$con', '$addr', 'active')");
	    	if($insert_faculty) {
	    		$subject = 'Account_Information';
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
                    $mail->Subject = 'Account Confirmation';
                    //$mail->Body    = 'You have successfully registered.';
                    
                    $mail->Body = "
                        <html>
                        <head>
                        <title></title>
                        </head>
                        <body>                
                            <div style='width:800px;background:#fff;border-style:groove;'>
                                <h4 style='color:#ea6512;margin-top:-20px;'> Hello, " .$fname."</h4>
                                <p>You are now successfully registered to CNHS Portal. Please use your account details below to access your account. </p>
                                <hr/>
                                <div style='height:210px;'>
                                    <table cellspacing='0' width='100%' >
                                        <thead>
                                            <col width='80px' />
                                            <col width='40px' />
                                            <col width='40px' />
                                            <tr>          
                                                <th style='color:#0A903B;text-align:left;'>Email Address</th>
                                                <th style='color:#0A903B;text-align:left;'>Password </th>                                                                            
                                            </tr>
                                        </thead>
                                        <tbody>   
                                            <tr>
                                                <td style='text-align:left;'>" .$email." 
                                                <td style='text-align:left;'>" .$passw."</td>
                                            </tr>   
                                        </tbody> 
                                    </table>                        
                                    <hr width='100%' size='1' color='black' style='margin-top:10px;'>
                                    <p>Thank you. </p>
                                    <p>Best regards, CNHS Team. </p>
                                </div> 
                            </div>              
                        </body>
                        </html>";
                    
                    
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    $mail->send();
                        echo "<div></div><script>Swal.fire({
    		  				position: 'top-end',
    		  				icon: 'success',
    		  				title: 'Success',
    		  				text: 'New faculty was successfully added',
    		  				showConfirmButton: false,
    		  				timer: 1500
    					})</script>";
                        } catch (Exception $e) {
                            echo "<div></div><script>Swal.fire({
	  				position: 'top-end',
	  				icon: 'error',
	  				title: 'Error',
	  				text: 'New faculty was not successfully added',
	  				showConfirmButton: false,
	  				timer: 1500
				})</script>";
                        }
				
			}
	    	else {
	    		echo "<div></div><script>Swal.fire({
	  				position: 'top-end',
	  				icon: 'error',
	  				title: 'Error',
	  				text: 'New faculty was not successfully added',
	  				showConfirmButton: false,
	  				timer: 1500
				})</script>";
	    	}
	    }
		}
	    mysqli_close($conn);
	}
?>