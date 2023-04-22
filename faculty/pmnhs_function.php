<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
	///////////////////////////////////////////////////// Temporary Enrollment
	function ManageTempEnrollment() {
		if(isset($_POST['SubmitEnroll'])) {
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
								$stsection = $row_prev['section'];
								$stlyear = $row_prev['lyear'];
								$stgpa = $row_prev['gpa'];
								$stscname = $row_prev['scname'];
								$stscid = $row_prev['scid'];
								$stscaddr = $row_prev['scaddr'];
								$stmethod = $row_prev['method'];
								$new_levelid = $row_prev['glevel']+1;
								$insert_old = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$styear', '$lrnno', '$stlevel', '$stsection', '$stgpa', '$stmethod', '$stlyear', '$stscname', '$stscid', '$stscaddr')");
								if($insert_old) {
									$update_student = mysqli_query($conn, "UPDATE $student SET glevel='$new_levelid', section='$secname', syear='$syear1', lyear='".$row_prev['syear']."', gpa='$gpano', scname='$scname', scid='$scid', scaddr='$scaddr', method='$dlearning', status='pending', remarks='pending' WHERE lrnno='$lrnno'");
									if($update_student) {
										mysqli_query($conn, "UPDATE $section SET limitavail=limitavail-'1' WHERE secID='$secname'");
										$total = count($_FILES['upload']['name']);
                                        for( $i=0 ; $i < $total ; $i++ ) {
                                            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                                            if ($tmpFilePath != ""){
                                                $info1 = pathinfo($_FILES['upload']['name'][$i]);
                                                $ext = $info1['extension'];
                                                $newname1 = "CNHS_" . rand(10000,99999) . "." . $ext; 
                                                //$imagename = $_FILES['upload']['name'][$i];
                                                $newFilePath = "../cnhsadmin/uploads/".$newname1;
                                                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                                                    $insert_req = mysqli_query($conn, "INSERT INTO $req(lrnno,req)VALUES('$lrnno', '$newname1')");
                                                    if($insert_req) {
                                                        echo "<div></div><script>Swal.fire({
                    						  				position: 'top-end',
                    						  				icon: 'success',
                    						  				title: 'Success',
                    						  				text: 'New Student was successfully added',
                    						  				showConfirmButton: false,
                    						  				timer: 1500
                    									})</script>";
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
							$insert_student = mysqli_query($conn, "INSERT INTO $student(dentry,stcode,syear,glevel,etype,psano,lrnno,gpa,section,sfname,slname, mname,dbirth,gender,indigent,ind_details,mtongue,cpno,semail,password,staddr,zcode,faname,moname,pacon,lyear,scname,scid,scaddr,method,certify,status,remarks)VALUES('$datenow', '$user_code', '$syear1', '$glevel', '$etype', '$psano', '$lrnno', '$gpano', '$secname', '$fname', '$lname', '$mname', '$bdate', '$gender', '$pppp', '$ipconf', '$mton', '$cpnum', '$email', '$passw', '$addr', '$zip', '$faname', '$moname', '$mnum', '$lyear', '$scname', '$scid', '$scaddr', '$dlearning', '$agree', 'pending', 'pending')");
					    	if($insert_student) {
					    		mysqli_query($conn, "UPDATE $section SET limitavail=limitavail-'1' WHERE secID='$secname'");
					    		$insert_old1 = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$syear1', '$lrnno', '$glevel', '$secname', '$gpano', '$dlearning', '$lyear', '$scname', '$scid', '$scaddr')")or die(mysqli_error());
								if($insert_old1) {
								    $total = count($_FILES['upload']['name']);
                                    for( $i=0 ; $i < $total ; $i++ ) {
                                        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                                        if ($tmpFilePath != ""){
                                            $info1 = pathinfo($_FILES['upload']['name'][$i]);
                                            $ext = $info1['extension'];
                                            $newname1 = "CNHS_" . rand(10000,99999) . "." . $ext; 
                                            //$imagename = $_FILES['upload']['name'][$i];
                                            $newFilePath = "../cnhsadmin/uploads/".$newname1;
                                            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                                                $insert_req = mysqli_query($conn, "INSERT INTO $req(lrnno,req)VALUES('$lrnno', '$newname1')");
                                                if($insert_req) {
                                                    echo "<div></div><script>Swal.fire({
                						  				position: 'top-end',
                						  				icon: 'success',
                						  				title: 'Success',
                						  				text: 'New Student was successfully added',
                						  				showConfirmButton: false,
                						  				timer: 1500
                									})</script>";
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
		else if(isset($_POST['ProceedEnroll'])) {
		    include("../cnhsadmin/db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$datenow = strtotime(date("m/d/Y"));
		    $lrnno = trim($_POST['lrnno']);
			$fname = trim($_POST['sfname']);
			$lname = trim($_POST['slname']);
			$check_student = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='$lrnno' AND sfname='$fname' AND slname='$lname' AND status='accepted'");
			if(mysqli_num_rows($check_student)<1) {
			    echo "<div></div><script>Swal.fire({
		  			position: 'top-end',
		  			icon: 'error',
		  			title: 'Error',
		  			text: 'No record found.',
		  			showConfirmButton: true
		  			}).then(function (result) {
				    if (result.value) {
				        window.location = 'new-enrollment';
				    }
				});</script>";
			}
			else {
			    while($row_stud = mysqli_fetch_array($check_student)) {
			        $stlevel = $row_prev['glevel'];
    				$styear = $row_prev['syear'];
    				$stsection = $row_prev['section'];
    				$stlyear = $row_prev['lyear'];
    				$stgpa = $row_prev['gpa'];
    				$stscname = $row_prev['scname'];
    				$stscid = $row_prev['scid'];
    				$stscaddr = $row_prev['scaddr'];
    				$stmethod = $row_prev['method'];
			        $new_levelid = $row_stud['glevel']+01;
			        $email = $row_prev['semail'];
			        $passw = $row_prev['password'];
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
        				        window.location = 'new-enrollment';
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
                    				text: 'No grades found on your previous record. Please contact your class adviser.',
                    				showConfirmButton: true
                    				}).then(function (result) {
                                    if (result.value) {
                                        window.location = 'new-enrollment';
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
                    				        window.location = 'new-enrollment';
                    				    }
                    				});</script>";
                				}
                				else {
                					while($row_section = mysqli_fetch_array($q_Section)) {
                						$secname = $row_section['secID'];
                						$insert_old = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$styear', '$lrnno', '$stlevel', '$stsection', '$stgpa', '$stmethod', '$stlyear', '$stscname', '$stscid', '$stscaddr')");
            							if($insert_old) {
            								$update_student = mysqli_query($conn, "UPDATE $student SET glevel='$new_levelid', section='$secname', syear='$syear1', lyear='".$row_stud['syear']."', gpa='$gpano', scname='$scname', status='pending', remarks='pending' WHERE lrnno='$lrnno'");
            								if($insert_student) {
            								    echo "<div></div><script>Swal.fire({
                                                	position: 'top-end',
                                                	icon: 'success',
                                                	title: 'Success',
                                                	text: 'New Student was successfully added',
                                                	showConfirmButton: false,
                                            		timer: 2000
                                            		}).then(function() {
                                            			window.location = 'new-enrollment';
                                            		});
                                            	</script>";
                        					}
                        					else {
                            				    echo "<div></div><script>Swal.fire({
                            						position: 'top-end',
                            						icon: 'error',
                            						title: 'Error',
                            						text: 'Enrollment failed',
                            						showConfirmButton: false,
                                            		timer: 2000
                                            		}).then(function() {
                                            			window.history.back();
                                            		});
                                            	</script>";
                    						}
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
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////////////////// MANAGE MESSAGE
	function ManageMessage() {
		if(isset($_POST['SendMessage'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$msgdate = strtotime(date("m/d/Y"));
			$msgtime = strtotime(date("h:i A"));
			$title = trim($_POST['title']);
			$sendto = trim($_POST['sendto']);
			$msg = trim($_POST['msg']);
			$check_title = mysqli_query($conn, "SELECT * FROM $message WHERE title='$title' AND touser='$sendto'");
			if(mysqli_num_rows($check_title)>0) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'This title has been sent already to the same recepient.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'new-message';
					});
				</script>";
			}
			else {
				$insert_msg = mysqli_query($conn, "INSERT INTO $message(title,mdate,mtime,tofrom,touser,details,toread,fromread,type)VALUES('$title', '$msgdate', '$msgtime', '".$_SESSION['SESS_FACULTY_ID']."', '$sendto', '$msg', 'unread', 'read', 'msg')");
				if($insert_msg) {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Success',
						text: 'Successfully sent.',
						icon: 'success',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'new-message';
						});
					</script>";
				}
				else {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Error',
						text: 'Message send failed',
						icon: 'error',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'new-message';
						});
					</script>";
				}
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['ReplyMessage'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$msgdate = strtotime(date("m/d/Y"));
			$msgtime = strtotime(date("h:i A"));
			$msgid = trim($_POST['repid']);
			$msg = trim($_POST['msg']);
			$check_msgid = mysqli_query($conn, "SELECT * FROM $message WHERE msgID='$msgid'");
			while($row_msgid = mysqli_fetch_array($check_msgid)) {
				$touser = $row_msgid['touser'];
				$tofrom = $row_msgid['tofrom'];
				$insert_reply = mysqli_query($conn, "INSERT INTO $message(mid,mdate,mtime,tofrom,touser,details,toread,fromread,type)VALUES('$msgid', '$msgdate', '$msgtime', '".$_SESSION['SESS_FACULTY_ID']."', '$touser', '$msg', 'unread', 'read', 'msg')");
				if($insert_reply) {
					header("location:message?msgid=$msgid");
				}
				else {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Message sending failed.',
						footer: '',
						showCloseButton: true
						}).then(function (result) {
						if (result.value) {
						window.history.back();
						}
						});
					</script>";
				}
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['delete_msg'])) {
			include("db_connect.php");
			$del_msg = mysqli_query($conn, "DELETE FROM $message WHERE msgID='".$_GET['delete_msg']."'");
			if($del_msg) {
				$del_reply = mysqli_query($conn, "DELETE FROM $message WHERE mid='".$_GET['delete_msg']."'");
				if($del_reply) {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Success',
						text: 'Successfully deleted',
						icon: 'success',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'message';
						});
					</script>";
				}
				else {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Error',
						text: 'Unable to delete message.',
						icon: 'error',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'message';
						});
					</script>";
				}
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////// Manage Grades
	function ManageGrades() {
		if(isset($_POST['SubmitGrades'])) {
			include("db_connect.php");
			$first = trim($_POST['first']);
			$second = trim($_POST['second']);
			$third = trim($_POST['third']);
			$fourth = trim($_POST['fourth']);
			$grid = trim($_POST['grid']);
			$stid = trim($_POST['stid']);
			$lrn = trim($_POST['lrn']);
			$sec = trim($_POST['sec']);
			$subj = trim($_POST['subj']);
			if($first=="" || $second=="" || $third=="" || $fourth=="") {
				$update_grades = mysqli_query($conn, "UPDATE $grades SET first='$first', second='$second', third='$third', fourth='$fourth' WHERE grID='$grid'");
				if($update_grades) {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Success',
						text: 'Successfully updated',
						icon: 'success',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'schedule-students?section=$sec&&subject=$subj';
						});
					</script>";
				}
				else {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Error',
						text: 'Modify failed.',
						icon: 'error',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'schedule-students?section=$sec&&subject=$subj';
						});
					</script>";
				}
			}
			else {
				$total_grades = $first+$second+$third+$fourth;
				$final_grades = $total_grades/4;
				$update_grades1 = mysqli_query($conn, "UPDATE $grades SET first='$first', second='$second', third='$third', fourth='$fourth', final='$final_grades' WHERE grID='$grid'");
				if($update_grades1) {
				    $q_student = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='$lrn'");
				    while($row_stud = mysqli_fetch_array($q_student)) {
    				    $rank_grade = mysqli_query($conn, "SELECT * FROM $grades WHERE student_id='$lrn' AND syear='".$row_stud['syear']."'");
    				    while($row_rank = mysqli_fetch_array($rank_grade))
    				    {
    				        $final += $row_rank['final'];
    				    }
    				    $new_gpa = $final/4;
    				    mysqli_query($conn, "UPDATE $rank SET gpa='$new_gpa' WHERE lrnno='$lrn' AND syear='".$row_stud['syear']."' AND glevel='".$row_stud['glevel']."'");
    				    echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Success',
						text: 'Successfully updated ".$new_gpa."',
						icon: 'success',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'schedule-students?section=$sec&&subject=$subj';
						});
					</script>";
				    }
				}
				else {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Error',
						text: 'Modify failed.',
						icon: 'error',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'schedule-students?section=$sec&&subject=$subj';
						});
					</script>";
				}
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateGrades'])) {
			include("db_connect.php");
			$first = trim($_POST['first']);
			$second = trim($_POST['second']);
			$third = trim($_POST['third']);
			$fourth = trim($_POST['fourth']);
			$grid = trim($_POST['grid']);
			$stid = trim($_POST['stid']);
			$lrn = trim($_POST['lrn']);
			if($first=="" || $second=="" || $third=="" || $fourth=="") {
				$update_grades = mysqli_query($conn, "UPDATE $grades SET first='$first', second='$second', third='$third', fourth='$fourth' WHERE grID='$grid'");
				if($update_grades) {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Success',
						text: 'Successfully updated',
						icon: 'success',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'student-details?student_id=$stid&&lrnno=$lrn';
						});
					</script>";
				}
				else {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Error',
						text: 'Modify failed.',
						icon: 'error',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'student-details?student_id=$stid&&lrnno=$lrn';
						});
					</script>";
				}
			}
			else {
				$total_grades = $first+$second+$third+$fourth;
				$final_grades = $total_grades/4;
				$update_grades1 = mysqli_query($conn, "UPDATE $grades SET first='$first', second='$second', third='$third', fourth='$fourth', final='$final_grades' WHERE grID='$grid'");
				if($update_grades1) {
				    $q_student = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='$lrn'");
				    while($row_stud = mysqli_fetch_array($q_student)) {
    				    $rank_grade = mysqli_query($conn, "SELECT * FROM $grades WHERE student_id='$lrn' AND syear='".$row_stud['syear']."'");
    				    while($row_rank = mysqli_fetch_array($rank_grade))
    				    {
    				        $final += $row_rank['final'];
    				    }
    				    $new_gpa = $final/4;
    				    mysqli_query($conn, "UPDATE $rank SET gpa='$new_gpa' WHERE lrnno='$lrn' AND syear='".$row_stud['syear']."' AND glevel='".$row_stud['glevel']."'");
    					echo "<div></div><script>Swal.fire({
    						position: 'top-end',
    						title: 'Success',
    						text: 'Successfully updated',
    						icon: 'success',
    						showConfirmButton: false,
    						timer: 2000
    						}).then(function() {
    							window.location = 'student-details?student_id=$stid&&lrnno=$lrn';
    						});
    					</script>";
				    }
				}
				else {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Error',
						text: 'Modify failed.',
						icon: 'error',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'student-details?student_id=$stid&&lrnno=$lrn';
						});
					</script>";
				}
			}
			mysqli_close($conn);
		}
	}
	/////////////////////////////////////////////////// Manage Profile
	function ManageProfile() {
		if(isset($_POST['UpdateProfile'])) {
			include("db_connect.php");
			$pass = trim($_POST['passw']);
			$update_pofile = mysqli_query($conn, "UPDATE $faculty SET password='$pass' WHERE facode='".$_SESSION['SESS_FACULTY_ID']."'");
			if($update_pofile) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated your password.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'profile';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Updating your password failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'profile';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////////////////// MANAGE MESSAGE
	function ManageChatBox() {
		if(isset($_POST['SendMessage'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$msgdate = strtotime(date("m/d/Y"));
			$msgtime = strtotime(date("h:i A"));
			$title = trim($_POST['title']);
			$sendto = trim($_POST['sendto']);
			$msg = trim($_POST['msgchat']);
			$check_title = mysqli_query($conn, "SELECT * FROM $chatbx WHERE title='$title'");
			if(mysqli_num_rows($check_title)>0) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'This title has been sent already to the same recepient.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'new-message';
					});
				</script>";
			}
			else {
				$insert_msg = mysqli_query($conn, "INSERT INTO $chatbx(title,details,mdate,mtime,tofrom,touser,toread,fromread,remarks,scode)VALUES('$title', '$msg', '$msgdate', '$msgtime', '".$_SESSION['SESS_FACULTY_ID']."', '$sendto', 'unread', 'read', 'msg', '0')");
				if($insert_msg) {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Success',
						text: 'Successfully sent.',
						icon: 'success',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'new-message';
						});
					</script>";
				}
				else {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Error',
						text: 'Message send failed',
						icon: 'error',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'new-message';
						});
					</script>";
				}
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['ReplyMessage'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$msgdate = strtotime(date("m/d/Y"));
			$msgtime = strtotime(date("h:i A"));
			$msgid = trim($_POST['repid']);
			$msg = trim($_POST['msg']);
			$check_msgid = mysqli_query($conn, "SELECT * FROM $chatbx WHERE chatID='$msgid'");
			while($row_msgid = mysqli_fetch_array($check_msgid)) {
				$touser = $row_msgid['touser'];
				$tofrom = $row_msgid['tofrom'];
				$insert_reply = mysqli_query($conn, "INSERT INTO $chatbx(title,mdate,mtime,tofrom,touser,details,toread,fromread,remarks,scode)VALUES('$title', '$msgdate', '$msgtime', '".$_SESSION['SESS_FACULTY_ID']."', '$touser', '$msg', 'unread', 'read', 'msg', '$msgid')");
				//$insert_reply = mysqli_query($conn, "INSERT INTO $chatbx(scode,mdate,mtime,tofrom,touser,details,toread,fromread,remarks)VALUES('$msgid', '$msgdate', '$msgtime', '".$_SESSION['SESS_FACULTY_ID']."', '$touser', '$msg', 'unread', 'read', 'msg')");
				if($insert_reply) {
					header("location:message?msgid=$msgid");
				}
				else {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Message sending failed.',
						footer: '',
						showCloseButton: true
						}).then(function (result) {
						if (result.value) {
						window.history.back();
						}
						});
					</script>";
				}
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['delete_msg'])) {
			include("db_connect.php");
			$del_msg = mysqli_query($conn, "DELETE FROM $chatbx WHERE chatID='".$_GET['delete_msg']."'");
			if($del_msg) {
				$del_reply = mysqli_query($conn, "DELETE FROM $chatbx WHERE scode='".$_GET['delete_msg']."'");
				if($del_reply) {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Success',
						text: 'Successfully deleted',
						icon: 'success',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'message';
						});
					</script>";
				}
				else {
					echo "<div></div><script>Swal.fire({
						position: 'top-end',
						title: 'Error',
						text: 'Unable to delete message.',
						icon: 'error',
						showConfirmButton: false,
						timer: 2000
						}).then(function() {
							window.location = 'message';
						});
					</script>";
				}
			}
			mysqli_close($conn);
		}
	}
?>