<script src="dist/js/sweetalert2.js"></script>
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
		$syear1 = trim($_POST['syear1']);
		$glevel = trim($_POST['glevel']);
		$etype = trim($_POST['etype']);
		$psano = trim($_POST['psano']);
		$lrnno = trim($_POST['lrnno']);
		$gpano = trim($_POST['gpano']);
		$fname = trim($_POST['sfname']);
		$lname = trim($_POST['slname']);
		$mname = trim($_POST['mname']);
		$bdate = trim($_POST['bdate']);
		$gender = trim($_POST['gender']);
		$pppp = trim($_POST['pppp']);
		$ipconf = trim($_POST['ipconf']);
		$mton = trim($_POST['mton']);
		$cpnum = trim($_POST['cpnum']);
		$email = trim($_POST['semail']);
		$addr = trim($_POST['saddr']);
		$zip = trim($_POST['zip']);
		$faname = trim($_POST['faname']);
		$moname = trim($_POST['moname']);
		$mnum = trim($_POST['mnum']);
		$lyear = trim($_POST['lyear']);
		$scname = trim($_POST['scname']);
		$scid = trim($_POST['scid']);
		$scaddr = trim($_POST['scaddr']);
		$dlearning = trim($_POST['dlearning']);
		$agree = trim($_POST['agree']);
		$user_code = substr(str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ0123456789'),0,5);
		$passw = substr(str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ0123456789'),0,15);
		$active_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
		if(mysqli_num_rows($active_syear)<1) {
			echo "<div></div><script>Swal.fire({
	  			position: 'top-end',
	  			icon: 'error',
	  			title: 'Error',
	  			text: 'Sorry school year is not yet available.',
	  			showConfirmButton: false,
	  			timer: 1500
			})</script>";
		}
		else {
			$q_Section = mysqli_query($conn, "SELECT * FROM $section WHERE gpafrom<=$gpano AND gpato>=$gpano AND limitavail>0 AND remarks='open' AND glevel='$glevel' ORDER BY secID ASC LIMIT 1");
			if(mysqli_num_rows($q_Section)<1) {
				echo "<div></div><script>Swal.fire({
		  			position: 'top-end',
		  			icon: 'error',
		  			title: 'Error',
		  			text: 'Sorry No section available for now.',
		  			showConfirmButton: false,
		  			timer: 1500
				})</script>";
			}
			else {
				while($row_section = mysqli_fetch_array($q_Section)) {
					$secname = $row_section['secID'];
					$check_student = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='$lrnno'");
					if(mysqli_num_rows($check_student)>0) {
						while($row_prev = mysqli_fetch_array($check_student)) {
							$stlevel = $row_prev['glevel'];
							$styear = $row_prev['syear'];
							$semail = $row_prev['semail'];
							$passww = $row_prev['password'];
							$stsection = $row_prev['section'];
							$stlyear = $row_prev['lyear'];
							$stgpa = $row_prev['gpa'];
							$stscname = $row_prev['scname'];
							$stscid = $row_prev['scid'];
							$stscaddr = $row_prev['scaddr'];
							$stmethod = $row_prev['method'];
							$new_levelid = $stlevel+1;
							$insert_old = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$styear', '$lrnno', '$stlevel', '$stsection', '$stgpa', '$stmethod', '$stlyear', '$stscname', '$stscid', '$stscaddr')");
							if($insert_old) {
								$update_student = mysqli_query($conn, "UPDATE $student SET glevel='$new_levelid', section='$secname', syear='$syear1', lyear='".$row_prev['syear']."', gpa='$gpano', scname='$scname', scid='$scid', scaddr='$scaddr', method='$dlearning' WHERE lrnno='$lrnno'");
								if($update_student) {
									mysqli_query($conn, "UPDATE $section SET limitavail=limitavail-'1' WHERE secID='$secname'");
									$q_sched = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='$secname'");
									while($row_sched = mysqli_fetch_array($q_sched)) {
										$insert_grade = mysqli_query($conn, "INSERT INTO $grades(student_id,syear,glevel,section,schname,schid,district,division,region,teacher,subject,first,second,third,fourth,final)VALUES('$lrnno', '$syear1', '$new_levelid', '$secname', '$scname', '$scid', '', '', '', '".$row_sched['faculty']."', '".$row_sched['subj']."', '0', '0', '0', '0', '0')");
										if($insert_grade) {
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
                                                                            <td style='text-align:left;'>" .$semail." 
                                                                            <td style='text-align:left;'>" .$passww."</td>
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
        										icon: 'info',
        										title: 'Info',
        										text: 'Enrollment was successfull but failed to retrieve old record.',
        										showConfirmButton: false,
        										timer: 3000
        									})</script>";
										}
									}
								}
								else {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										icon: 'info',
										title: 'Info',
										text: 'Enrollment was successfull but failed to retrieve old record.',
										showConfirmButton: false,
										timer: 3000
									})</script>";
								}
							}
							else {
								echo "<div></div><script>Swal.fire({
									position: 'top-end',
									icon: 'info',
									title: 'Info',
									text: 'Unable to add school history.',
									showConfirmButton: false,
									timer: 3000
								})</script>";
							}
						}
					}
					else {
						$insert_student = mysqli_query($conn, "INSERT INTO $student(dentry,stcode,syear,glevel,etype,psano,lrnno,gpa,section,sfname,slname, mname,dbirth,gender,indigent,ind_details,mtongue,cpno,semail,password,staddr,zcode,faname,moname,pacon,lyear,scname,scid,scaddr,method,certify,status,remarks)VALUES('$datenow', '$user_code', '$syear1', '$glevel', '$etype', '$psano', '$lrnno', '$gpano', '$secname', '$fname', '$lname', '$mname', '$bdate', '$gender', '$pppp', '$ipconf', '$mton', '$cpnum', '$email', '$passw', '$addr', '$zip', '$faname', '$moname', '$mnum', '$lyear', '$scname', '$scid', '$scaddr', '$dlearning', '$agree', 'active', 'accepted')");
				    	if($insert_student) {
				    		mysqli_query($conn, "UPDATE $section SET limitavail=limitavail-'1' WHERE secID='$secname'");
				    		$insert_old1 = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$syear1', '$lrnno', '$glevel', '$secname', '$gpano', '$dlearning', '$lyear', '$scname', '$scid', '$scaddr')");
							if($insert_old1) {
					    		$q_sched1 = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='$secname'");
								while($row_sched1 = mysqli_fetch_array($q_sched1)) {
								    $insert_grade1 = mysqli_query($conn, "INSERT INTO $grades(student_id,syear,glevel,section,schname,schid,district,division,region,teacher,subject,first,second,third,fourth,final)VALUES('$lrnno', '$syear1', '$glevel', '$secname', '$scname', '$scid', '', '', '', '".$row_sched1['faculty']."', '".$row_sched1['subj']."', '0', '0', '0', '0', '0')");
									//$insert_grade1 = mysqli_query($conn, "INSERT INTO $grades(student_id,syear,glevel,section,schname,schid,teacher,subject)VALUES('$lrnno', '$syear1', '$glevel', '$secname', '$scname', '$scid', '".$row_sched1['faculty']."', '".$row_sched1['subj']."')");
									if($insert_grade1) {
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
											text: 'Enrollment failed',
											showConfirmButton: false,
											timer: 3000
										})</script>";
									}
								}
							}
				    	}
				    	else {
				    		echo "<div></div><script>Swal.fire({
				  				position: 'top-end',
				  				icon: 'error',
				  				title: 'Error',
				  				text: 'New Student was not successfully added',
				  				showConfirmButton: false,
				  				timer: 1500
							})</script>";
				    	}
				    }
				}
			}
		}
	    mysqli_close($conn);
	}
?>