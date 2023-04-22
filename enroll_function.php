<script src="cnhsadmin/dist/js/sweetalert2.js"></script>
<?php
    function ManageEnrollment() {
		if(isset($_POST['SubmitEnroll'])) {
			include("cnhsadmin/db_connect.php");
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
			$check_email = mysqli_query($conn, "SELECT * FROM $student WHERE semail='$email'");
			if(mysqli_num_rows($check_email)>0) {
			    echo "<div></div><script>Swal.fire({
		  			position: 'top-end',
		  			icon: 'error',
		  			title: 'Error',
		  			text: 'Email address is being used many times already. Please provide another email to continue.',
		  			showConfirmButton: true
		  			}).then(function (result) {
				    if (result.value) {
				        window.history.back();
				    }
				});</script>";
			}
			else {
    			$active_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
    			if(mysqli_num_rows($active_syear)<1) {
    				echo "<div></div><script>Swal.fire({
    		  			position: 'top-end',
    		  			icon: 'error',
    		  			title: 'Error',
    		  			text: 'Sorry school year is not yet available.',
    		  			showConfirmButton: true
    		  			}).then(function (result) {
    				    if (result.value) {
    				        window.history.back();
    				    }
    				});</script>";
    			}
    			else {
    				$q_Section = mysqli_query($conn, "SELECT * FROM $section WHERE gpafrom<=$gpano AND gpato>=$gpano AND limitavail>0 AND remarks='open' AND glevel='$glevel' ORDER BY secID ASC LIMIT 1");
    				if(mysqli_num_rows($q_Section)<1) {
    					echo "<div></div><script>Swal.fire({
    			  			position: 'top-end',
    			  			icon: 'error',
    			  			title: 'Error',
    			  			text: 'Sorry No section available for now.',
    			  			showConfirmButton: true
        		  			}).then(function (result) {
        				    if (result.value) {
        				        window.history.back();
        				    }
        				});</script>";
    				}
    				else {
    					while($row_section = mysqli_fetch_array($q_Section)) {
    						$secname = $row_section['secID'];
    						$check_student = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='$lrnno'");
    						if(mysqli_num_rows($check_student)>0) {
    							while($row_prev = mysqli_fetch_array($check_student)) {
    								$stlevel = $row_prev['glevel'];
    								$styear = $row_prev['syear'];
    								$stsection = $row_prev['section'];
    								$stlyear = $row_prev['lyear'];
    								$stgpa = $row_prev['gpa'];
    								$stscname = $row_prev['scname'];
    								$stscid = $row_prev['scid'];
    								$stscaddr = $row_prev['scaddr'];
    								$stmethod = $row_prev['method'];
    								$new_levelid = $row_prev['glevel']+01;
    								$insert_old = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$styear', '$lrnno', '$stlevel', '$stsection', '$stgpa', '$stmethod', '$stlyear', '$stscname', '$stscid', '$stscaddr')");
    								if($insert_old) {
    									$update_student = mysqli_query($conn, "UPDATE $student SET glevel='$new_levelid', section='$secname', syear='$syear1', lyear='".$row_prev['syear']."', gpa='$gpano', scname='$scname', scid='$scid', scaddr='$scaddr', method='$dlearning', status='pending', remarks='pending' WHERE lrnno='$lrnno'");
    									if($insert_student) {
    									    $total = count($_FILES['upload']['name']);
                                            for( $i=0 ; $i < $total ; $i++ ) {
                                                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                                                if ($tmpFilePath != ""){
                                                    $info1 = pathinfo($_FILES['upload']['name'][$i]);
                                                    $ext = $info1['extension'];
                                                    $newname1 = "CNHS_" . rand(10000,99999) . "." . $ext; 
                                                    //$imagename = $_FILES['upload']['name'][$i];
                                                    $newFilePath = "cnhsadmin/uploads/".$newname1;
                                                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                                                        $insert_req = mysqli_query($conn, "INSERT INTO $req(lrnno,req)VALUES('$lrnno', '$newname1')");
                                                        if($insert_req) {
                                                            $x=0;
                                                        }
                										else {
                											$x=1;
                										}  
                                                    }
                                                }
                                            }
                                            echo "<div></div><script>Swal.fire({
                                        		  position: 'top-end',
                                        		  				icon: 'success',
                                        		  				title: 'Success',
                                        		  				text: 'You have successfully submit your application. An email confirmation will be sent to your email. Thank you.',
                                        		  				showConfirmButton: false,
                                        		  				timer: 1500
                                        					})</script>";
                                        }
                                        else {
                                            echo "<div></div><script>Swal.fire({
                												position: 'top-end',
                												icon: 'error',
                												title: 'Error',
                												text: 'Enrollment failed',
                												showConfirmButton: true
                											    }).then(function (result) {
                                            				    if (result.value) {
                                            				        window.history.back();
                                            				    }
                                            				});</script>";
                                        }
    										
    								}
    							}
    						}
    						else {
    							$insert_student = mysqli_query($conn, "INSERT INTO $student(dentry,stcode,syear,glevel,etype,psano,lrnno,gpa,section,sfname,slname, mname,dbirth,gender,indigent,ind_details,mtongue,cpno,semail,password,staddr,zcode,faname,moname,pacon,lyear,scname,scid,scaddr,method,certify,status,remarks)VALUES('$datenow', '$user_code', '$syear1', '$glevel', '$etype', '$psano', '$lrnno', '$gpano', '$secname', '$fname', '$lname', '$mname', '$bdate', '$gender', '$pppp', '$ipconf', '$mton', '$cpnum', '$email', '$passw', '$addr', '$zip', '$faname', '$moname', '$mnum', '$lyear', '$scname', '$scid', '$scaddr', '$dlearning', '$agree', 'pending', 'pending')");
    					    	if($insert_student) {
    								//$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.
                                            $total = count($_FILES['upload']['name']);
                                            for( $i=0 ; $i < $total ; $i++ ) {
                                                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                                                if ($tmpFilePath != ""){
                                                    $info1 = pathinfo($_FILES['upload']['name'][$i]);
                                                    $ext = $info1['extension'];
                                                    $newname1 = "CNHS_" . rand(10000,99999) . "." . $ext; 
                                                    //$imagename = $_FILES['upload']['name'][$i];
                                                    $newFilePath = "cnhsadmin/uploads/".$newname1;
                                                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                                                        $insert_req = mysqli_query($conn, "INSERT INTO $req(lrnno,req)VALUES('$lrnno', '$newname1')");
                                                        if($insert_req) {
                                                            $x=0;
                                                        }
                										else {
                											$x=1;
                										}  
                                                    }
                                                }
                                            }
                                            echo "<div></div><script>Swal.fire({
                                        		  				position: 'top-end',
                                        		  				icon: 'success',
                                        		  				title: 'Success',
                                        		  				text: 'You have successfully submit your application. An email confirmation will be sent to your email. Thank you.',
                                        		  				showConfirmButton: false,
                                        		  				timer: 1500
                                        					})</script>";
                                }
    							else {
    								echo "<div></div><script>Swal.fire({
    									position: 'top-end',
    								    icon: 'error',
    									title: 'Error',
    									text: 'Enrollment failed',
    									showConfirmButton: true
    									}).then(function (result) {
                                		if (result.value) {
                                			 window.history.back();
                                		}
                                	});</script>";
    							}
    					    }
    					}
    				}
    			}
			}
		    mysqli_close($conn);
		}
		else if(isset($_POST['ProceedEnroll'])) {
		    include("cnhsadmin/db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$datenow = strtotime(date("m/d/Y"));
		    $lrnno = trim($_POST['lrnno']);
			$fname = trim($_POST['sfname']);
			$lname = trim($_POST['slname']);
			$check_student = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='$lrnno' AND sfname='$fname' AND slname='$lname'");
			if(mysqli_num_rows($check_student)<1) {
			    echo "<div></div><script>Swal.fire({
		  			position: 'top-end',
		  			icon: 'error',
		  			title: 'Error',
		  			text: 'No record found.',
		  			showConfirmButton: true
		  			}).then(function (result) {
				    if (result.value) {
				        window.location = 'enrollment';
				    }
				});</script>";
			}
			else {
			    while($row_stud = mysqli_fetch_array($check_student)) {
			        $stlevel = $row_stud['glevel'];
    				$styear = $row_stud['syear'];
    				$stsection = $row_stud['section'];
    				$stlyear = $row_stud['lyear'];
    				$stgpa = $row_stud['gpa'];
    				$stscname = $row_stud['scname'];
    				$stscid = $row_stud['scid'];
    				$stscaddr = $row_stud['scaddr'];
    				$stmethod = $row_stud['method'];
			        $new_levelid1 = $row_stud['glevel']+1;
			        $new_levelid = "0".$new_levelid1;
			        //$gpano = $row_stud['gpa'];
    			    $active_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
        			if(mysqli_num_rows($active_syear)<1) {
        				echo "<div></div><script>Swal.fire({
        		  			position: 'top-end',
        		  			icon: 'error',
        		  			title: 'Error',
        		  			text: 'Sorry school year is not yet available.',
        		  			showConfirmButton: true
        		  			}).then(function (result) {
        				    if (result.value) {
        				        window.location = 'enrollment';
        				    }
        				});</script>";
        			}
        			else {
        			    while($row_year = mysqli_fetch_array($active_syear)) {
        			        $syear1 = $row_year['syID'];
        			        $q_grades = mysqli_query($conn, "SELECT * FROM $grades WHERE student_id='$lrnno' AND syear='$styear'")or die(mysqli_error());
        			        $numg = mysqli_num_rows($q_grades);
        			        if(mysqli_num_rows($q_grades)<1) {
        			            echo "<div></div><script>Swal.fire({
                    				position: 'top-end',
                    				icon: 'error',
                    				title: 'Error',
                    				text: 'No grades found on your previous record. Please contact your class adviser ".$styear.".',
                    				showConfirmButton: true
                    				}).then(function (result) {
                                    if (result.value) {
                                        window.location = 'enrollment';
                                    }
                                });</script>";
        			        }
        			        else {
            			        while($row_grades = mysqli_fetch_array($q_grades)) {
            			            $total_gpa += $row_grades['final'];
            			        }
            			        $gpafinal = $total_gpa/$numg;
                				$q_Section = mysqli_query($conn, "SELECT * FROM $section WHERE gpafrom<=$gpafinal AND gpato>=$gpafinal AND limitavail>0 AND remarks='open' AND glevel='$new_levelid' ORDER BY secID ASC LIMIT 1");
                				if(mysqli_num_rows($q_Section)<1) {
                					echo "<div></div><script>Swal.fire({
                			  			position: 'top-end',
                			  			icon: 'error',
                			  			title: 'Error',
                			  			text: 'Sorry No section available for now.',
                			  			showConfirmButton: true
                    		  			}).then(function (result) {
                    				    if (result.value) {
                    				        window.location = 'enrollment';
                    				    }
                    				});</script>";
                				}
                				else {
                					while($row_section = mysqli_fetch_array($q_Section)) {
                						$secname = $row_section['secID'];
                						$insert_old = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$styear', '$lrnno', '$stlevel', '$stsection', '$stgpa', '$stmethod', '$stlyear', '$stscname', '$stscid', '$stscaddr')");
            							if($insert_old) {
            								$update_student = mysqli_query($conn, "UPDATE $student SET glevel='$new_levelid', section='$secname', syear='$syear1', lyear='".$row_stud['syear']."', gpa='$stgpa', scname='$stscname', status='pending', remarks='pending' WHERE lrnno='$lrnno'");
            								if($update_student) {
            								     echo "<div></div><script>Swal.fire({
                                            		position: 'top-end',
                                            	    icon: 'success',
                                            		title: 'Success',
                                            		text: 'You have successfully submit your application. An email confirmation will be sent to your email. Thank you.',
                                            		showConfirmButton: true
            								        }).then(function (result) {
                                                	if (result.value) {
                                                		window.location = 'enrollment';
                                                	}
                                                });</script>";
            								}
            								else {
            								    echo "<div></div><script>Swal.fire({
                    								position: 'top-end',
                    								icon: 'error',
                    								title: 'Error',
                    								text: 'Enrollment failed',
                    								showConfirmButton: true
                    								}).then(function (result) {
                                                	if (result.value) {
                                                		window.location = 'enrollment';
                                                	}
                                                });</script>";
            								}
            							}
                					}
                				}
        			        }
        			    }
        			}
			    }
			}
			mysqli_close($conn);
		}
	} 
?>