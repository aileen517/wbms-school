<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
	//////////////////////////////////////////////////////////// Manage Grade Level
	function ManageGradeLevel() {
		if(isset($_POST['SubmitgLevel'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$glevel = trim($_POST['glevel']);
			$glpmt = trim($_POST['glpmt']);
			$check_level = mysqli_query($conn, "SELECT * FROM $gradelevel WHERE level='$glevel'");
			if(mysqli_num_rows($check_level)>0) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Grade Level ".$glevel." is already added.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
					}
					});
				</script>";
			}
			else {
				$insert_glevel = mysqli_query($conn, "INSERT INTO $gradelevel(level,tuition)VALUES('$glevel', '$glpmt')");
				if($insert_glevel) {
					echo "<div></div><script>Swal.fire({
	  					position: 'top-end',
	  					title: 'Success',
	  					text: 'Grade Level ".$glevel." was successfully added.',
	  					icon: 'success',
	  					showConfirmButton: false,
	  					timer: 2000
	  					}).then(function() {
							window.location = 'grade-level';
						});
					</script>";
				}
				else {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Adding failed',
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
		else if(isset($_POST['UpdategLevel'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$glevel = trim($_POST['glevel']);
			$glpmt = trim($_POST['glpmt']);
			$glid = trim($_POST['glid']);
			$check_level = mysqli_query($conn, "SELECT * FROM $gradelevel WHERE level='$glevel' AND glID!=$glid");
			if(mysqli_num_rows($check_level)>0) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Grade Level ".$glevel." is already added.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
					}
					});
				</script>";
			}
			else {
				$update_glevel = mysqli_query($conn, "UPDATE $gradelevel SET level='$glevel', tuition='$glpmt' WHERE glID='$glid'");
				if($update_glevel) {
					echo "<div></div><script>Swal.fire({
		  				position: 'top-end',
		  				title: 'Success.',
		  				text: 'Successfully updated.',
		  				icon: 'success',
		  				showConfirmButton: false,
		  				timer: 2000
		  				}).then(function() {
							   window.location = 'grade-level';
						});
					</script>";
				}
				else {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Update failed',
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
	}
	//////////////////////////////////////////////////////////// Manage School Year
	function ManageSchoolYear() {
		if(isset($_POST['Submitsyear'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$syear = trim($_POST['syear']);
			$check_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syear='$syear'");
			if(mysqli_num_rows($check_syear)>0) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'School Year ".$syear." is already added.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
					}
					});
				</script>";
			}
			else {
				$insert_syear = mysqli_query($conn, "INSERT INTO $schoolyear(syear,status)VALUES('$syear', 'deactivated')");
				if($insert_syear) {
					echo "<div></div><script>Swal.fire({
	  					position: 'top-end',
	  					title: 'Success',
	  					text: 'School Year ".$syear." was successfully added.',
	  					icon: 'success',
	  					showConfirmButton: false,
	  					timer: 2000
	  					}).then(function() {
							window.location = 'school-year';
						});
					</script>";
				}
				else {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Adding failed',
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
		else if(isset($_POST['Updatesyear'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$syear = trim($_POST['syear']);
			$syid = trim($_POST['syid']);
			$check_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syear='$syear' AND syID!=$syid");
			if(mysqli_num_rows($check_syear)>0) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'School Year ".$syear." is already added.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
					}
					});
				</script>";
			}
			else {
				$update_syear = mysqli_query($conn, "UPDATE $schoolyear SET syear='$syear' WHERE syID='$syid'");
				if($update_syear) {
					echo "<div></div><script>Swal.fire({
		  				position: 'top-end',
		  				title: 'Success.',
		  				text: 'Successfully updated.',
		  				icon: 'success',
		  				showConfirmButton: false,
		  				timer: 2000
		  				}).then(function() {
							   window.location = 'school-year';
						});
					</script>";
				}
				else {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Update failed',
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
		else if(isset($_GET['activate'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$yearnow = date("Y");
			$nyear = date('Y', strtotime('+1 years'));
			$pyear = date('Y', strtotime('-1 years'));
			$q_schyear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE syID='".$_GET['activate']."'");
			while($row_schyear = mysqli_fetch_array($q_schyear)) {
				$systart = $row_schyear['syear'];
				$fsyear = mb_substr($systart, 0, 4);
				$lsyear = mb_substr($systart, -4);
				if($fsyear<$yearnow  AND $lsyear<$nyear) {
					echo "<div></div><script>Swal.fire({
		  				position: 'top-end',
		  				title: 'Error.',
		  				text: 'You cannot activate previous school year.',
		  				icon: 'error',
		  				showConfirmButton: false,
		  				timer: 2000
		  				}).then(function() {
							   window.location = 'school-year';
						});
					</script>";
				}
				else {
					$q_activate = mysqli_query($conn, "UPDATE $schoolyear SET status='deactivated' WHERE status='activated'");
					if($q_activate) {
						$sy_activate = mysqli_query($conn, "UPDATE $schoolyear SET status='activated' WHERE syID='".$_GET['activate']."'");
						if($sy_activate) {
						    mysqli_query($conn, "UPDATE $student SET status='inactive' WHERE syear!='".$_GET['activate']."'");
						    mysqli_query($conn, "UPDATE $student SET status='active' WHERE syear='".$_GET['activate']."'");
							echo "<div></div><script>Swal.fire({
				  				position: 'top-end',
				  				title: 'Success.',
				  				text: 'Successfully activated.',
				  				icon: 'success',
				  				showConfirmButton: false,
				  				timer: 2000
				  				}).then(function() {
									   window.location = 'school-year';
								});
							</script>";
						}
						else {
							echo "<div></div><script>Swal.fire({
				  				position: 'top-end',
				  				title: 'Error.',
				  				text: 'Activation failed.',
				  				icon: 'error',
				  				showConfirmButton: false,
				  				timer: 2000
				  				}).then(function() {
									   window.location = 'school-year';
								});
							</script>";
						}
					}
				}
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['deactivate'])) {
			include("db_connect.php");
			$sy_deactivate = mysqli_query($conn, "UPDATE $schoolyear SET status='deactivated' WHERE syID='".$_GET['deactivate']."'");
			if($sy_deactivate) {
			    mysqli_query($conn, "UPDATE $student SET status='inactive' WHERE syear='".$_GET['deactivate']."'");
				echo "<div></div><script>Swal.fire({
		  			position: 'top-end',
		  			title: 'Success.',
		  			text: 'Successfully deactivated.',
		  			icon: 'success',
		  			showConfirmButton: false,
		  			timer: 2000
		  			}).then(function() {
						window.location = 'school-year';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
		  			position: 'top-end',
		  			title: 'Error.',
		  			text: 'Deactivation failed.',
		  			icon: 'error',
		  			showConfirmButton: false,
		  			timer: 2000
		  			}).then(function() {
						window.location = 'school-year';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	//////////////////////////////////////////////////////////// Manage Section
	function ManageSection() {
		if(isset($_POST['SubmitSection'])) {
			include("db_connect.php");
			$scode = trim($_POST['scode']);
			$scname = trim($_POST['scname']);
			$gpa_f = trim($_POST['gpa_f']);
			$gpa_t = trim($_POST['gpa_t']);
			$slimit = trim($_POST['slimit']);
			$teacher = trim($_POST['teacher']);
			$glid = trim($_POST['glid']);
			$check_section = mysqli_query($conn, "SELECT * FROM $section WHERE scode='$scode' AND secname='$scname' AND gpafrom='$gpa_f' AND gpato='$gpa_t' AND glevel='$glid'");
			if(mysqli_num_rows($check_section)>0) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Section ".$scode." is already added.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
					}
					});
				</script>";
			}
			else {
				$check_section2 = mysqli_query($conn, "SELECT * FROM $section WHERE (gpafrom BETWEEN $gpa_f AND $gpa_t AND glevel='$glid' AND  scode='$scode' AND secname='$scname') OR (gpato BETWEEN $gpa_f AND $gpa_t AND glevel='$glid' AND  scode='$scode' AND secname='$scname')");
				if(mysqli_num_rows($check_section2)>0) {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'GPA is already added.',
						footer: '',
						showCloseButton: true
						}).then(function (result) {
						if (result.value) {
						window.history.back();
						}
						});
					</script>";
				}
				else {
					if($gpa_f>$gpa_t) {
						echo "<div></div><script>
							Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Invalid GPA.',
							footer: '',
							showCloseButton: true
							}).then(function (result) {
							if (result.value) {
							window.history.back();
							}
							});
						</script>";
					}
					else {
						$insert_section = mysqli_query($conn, "INSERT INTO $section(glevel,scode,secname,gpafrom,gpato,studlimit,limitavail,teacher,remarks)VALUES('$glid', '$scode', '$scname', '$gpa_f', '$gpa_t', '$slimit', '$slimit', '$teacher', 'open')");
						if($insert_section) {
							echo "<div></div><script>Swal.fire({
					  			position: 'top-end',
					  			title: 'Success.',
					  			text: 'Successfully added.',
					  			icon: 'success',
					  			showConfirmButton: false,
					  			timer: 2000
					  			}).then(function() {
									window.location = 'section?g_level_id=$glid';
								});
							</script>";
						}
						else {
							echo "<div></div><script>
								Swal.fire({
								icon: 'error',
								title: 'Error',
								text: 'Adding failed.',
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
				}
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateSection'])) {
			include("db_connect.php");
			$scode = trim($_POST['scode']);
			$scname = trim($_POST['scname']);
			$gpa_f = trim($_POST['gpa_f']);
			$gpa_t = trim($_POST['gpa_t']);
			$slimit = trim($_POST['slimit']);
			$teacher = trim($_POST['teacher']);
			$secid = trim($_POST['secid']);
			$glid = trim($_POST['glid']);
			$check_section3 = mysqli_query($conn, "SELECT * FROM $section WHERE scode='$scode' AND secname='$scname' AND secID!='$secid'");
			if(mysqli_num_rows($check_section3)>0) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Section is already added.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
					}
					});
				</script>";
			}
			else {
				$check_gpa = mysqli_query($conn, "SELECT * FROM $section WHERE (gpafrom BETWEEN $gpa_f AND $gpa_t AND secID!='$secid' AND glevel='".$_GET['g_level_id']."') OR (gpato BETWEEN $gpa_f AND $gpa_t AND secID!='$secid' AND glevel='".$_GET['g_level_id']."')");
				if(mysqli_num_rows($check_gpa)>0) {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'GPA is already added.',
						footer: '',
						showCloseButton: true
						}).then(function (result) {
						if (result.value) {
						window.history.back();
						}
						});
					</script>";
				}
				else {
					$q_section = mysqli_query($conn, "SELECT * FROM $section WHERE secID='$secid'");
					while($row_section = mysqli_fetch_array($q_section)) {
						$stlimit = $row_section['studlimit'];
						if($stlimit>$slimit) {
							$update_section = mysqli_query($conn, "UPDATE $section SET scode='$scode', secname='$scname', gpafrom='$gpa_f', gpato='$gpa_t', studlimit=studlimit-'$slimit', limitavail=limitavail-'$slimit', teacher='$teacher' WHERE secID='$secid'");
							if($update_section) {
								echo "<div></div><script>Swal.fire({
						  			position: 'top-end',
						  			title: 'Success.',
						  			text: 'Successfully updated.',
						  			icon: 'success',
						  			showConfirmButton: false,
						  			timer: 2000
						  			}).then(function() {
										window.location = 'section?g_level_id=$glid';
									});
								</script>";
							}
							else {
								echo "<div></div><script>
									Swal.fire({
									icon: 'error',
									title: 'Error',
									text: 'Updating failed.',
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
						else if($stlimit<$slimit) {
							$update_section = mysqli_query($conn, "UPDATE $section SET scode='$scode', secname='$scname', gpafrom='$gpa_f', gpato='$gpa_t', studlimit=studlimit+'$slimit', limitavail=limitavail+'$slimit', teacher='$teacher' WHERE secID='$secid'");
							if($update_section) {
								echo "<div></div><script>Swal.fire({
						  			position: 'top-end',
						  			title: 'Success.',
						  			text: 'Successfully updated.',
						  			icon: 'success',
						  			showConfirmButton: false,
						  			timer: 2000
						  			}).then(function() {
										window.location = 'section?g_level_id=$glid';
									});
								</script>";
							}
							else {
								echo "<div></div><script>
									Swal.fire({
									icon: 'error',
									title: 'Error',
									text: 'Updating failed.',
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
						else if($stlimit==$slimit) {
							$update_section = mysqli_query($conn, "UPDATE $section SET scode='$scode', secname='$scname', gpafrom='$gpa_f', gpato='$gpa_t', teacher='$teacher' WHERE secID='$secid'");
							if($update_section) {
								echo "<div></div><script>Swal.fire({
						  			position: 'top-end',
						  			title: 'Success.',
						  			text: 'Successfully updated.',
						  			icon: 'success',
						  			showConfirmButton: false,
						  			timer: 2000
						  			}).then(function() {
										window.location = 'section?g_level_id=$glid';
									});
								</script>";
							}
							else {
								echo "<div></div><script>
									Swal.fire({
									icon: 'error',
									title: 'Error',
									text: 'Updating failed.',
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
					}
				}
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['close'])) {
			include("db_connect.php");
			$glid = $_GET['g_level_id'];
			$close_section = mysqli_query($conn, "UPDATE $section SET remarks='close' WHERE secID='".$_GET['close']."'");
			if($close_section) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success.',
					text: 'Successfully closed section.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'section?g_level_id=$glid';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error.',
					text: 'Closed section failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'section?g_level_id=$glid';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['open'])) {
			include("db_connect.php");
			$glid = $_GET['g_level_id'];
			$open_section = mysqli_query($conn, "UPDATE $section SET remarks='open' WHERE secID='".$_GET['open']."'");
			if($open_section) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success.',
					text: 'Successfully open section.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'section?g_level_id=$glid';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error.',
					text: 'Open section failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'section?g_level_id=$glid';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	//////////////////////////////////////////////////////////// Manage Subject
	function ManageSubject() {
		if(isset($_POST['SubmitSubject'])) {
			include("db_connect.php");
			$sucode = trim($_POST['sucode']);
			$descr = trim($_POST['descr']);
			$suid = trim($_POST['suid']);
			$check_subject = mysqli_query($conn, "SELECT * FROM $subject WHERE sucode='$sucode' AND descr='$descr' AND glevel='$suid'");
			if(mysqli_num_rows($check_subject)>0) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Subject is already added.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
						}
					});
				</script>";
			}
			else {
				$insert_subject = mysqli_query($conn, "INSERT INTO $subject(glevel,sucode,descr)VALUES('$suid', '$sucode', '$descr')");
				if($insert_subject) {
					echo "<div></div><script>Swal.fire({
				  		position: 'top-end',
				  		title: 'Success.',
				  		text: 'Successfully added.',
				  		icon: 'success',
				  		showConfirmButton: false,
				  		timer: 2000
				  		}).then(function() {
							window.location = 'subject?level=$suid';
						});
					</script>";
				}
				else {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Adding failed.',
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
		else if(isset($_POST['UpdateSubject'])) {
			include("db_connect.php");
			$sucode = trim($_POST['sucode']);
			$descr = trim($_POST['descr']);
			$suid = trim($_POST['suid']);
			$check_subject2 = mysqli_query($conn, "SELECT * FROM $subject WHERE sucode='$sucode' AND descr='$descr' AND suID!='$suid'");
			if(mysqli_num_rows($check_subject2)>0) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Subject is already added.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
						}
					});
				</script>";
			}
			else {
				$update_subject = mysqli_query($conn, "UPDATE $subject SET sucode='$sucode', descr='$descr' WHERE suID='$suid'");
				if($update_subject) {
					echo "<div></div><script>Swal.fire({
				  		position: 'top-end',
				  		title: 'Success.',
				  		text: 'Successfully updated.',
				  		icon: 'success',
				  		showConfirmButton: false,
				  		timer: 2000
				  		}).then(function() {
							window.location = 'subject';
						});
					</script>";
				}
				else {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Updating failed',
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
	}
	//////////////////////////////////////////////////////////// Manage Faculty
	function ManageFaculty() {
		if(isset($_POST['UpdateFaculty'])) {
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
			$fid = trim($_POST['fid']);
			$update_faculty = mysqli_query($conn, "UPDATE $faculty SET fname='$fname', lname='$lname', title='$title', educ='$educ', ofc='$ofc', email='$email', con='$con', addr='$addr' WHERE facID='$fid'");
			if($update_faculty) {
				echo "<div></div><script>Swal.fire({
				  	position: 'top-end',
				  	title: 'Success.',
				  	text: 'Successfully updated.',
				  	icon: 'success',
				  	showConfirmButton: false,
				  	timer: 2000
				  	}).then(function() {
						window.location = 'faculty';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
				  	position: 'top-end',
				  	title: 'Error.',
				  	text: 'Updating failed.',
				  	icon: 'error',
				  	showConfirmButton: false,
				  	timer: 2000
				  	}).then(function() {
						window.location = 'faculty';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['activate_faculty'])) {
			include("db_connect.php");
			$ac_faculty = mysqli_query($conn, "UPDATE $faculty SET status='active' WHERE facID='".$_GET['activate_faculty']."'");
			if($ac_faculty) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success.',
					text: 'Successfully activated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'faculty';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error.',
					text: 'Activation failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'faculty';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['deactivate_faculty'])) {
			include("db_connect.php");
			$deac_faculty = mysqli_query($conn, "UPDATE $faculty SET status='inactive' WHERE facID='".$_GET['deactivate_faculty']."'");
			if($deac_faculty) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success.',
					text: 'Successfully deactivated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'faculty';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error.',
					text: 'Deactivation failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'faculty';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////////// Manage Schedule
	function ManageSchedule() {
		if(isset($_POST['SubmitSchedule'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$subj = trim($_POST['subj']);
			$stime = strtotime($_POST['stime']);
			$etime = strtotime($_POST['etime']);
			$schday = trim($_POST['schday']);
			$teacher = trim($_POST['teacher']);
			$secid = trim($_POST['secid']);
			$gid = trim($_POST['gid']);
			if($etime<$stime) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Invalid Schedule time.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
						}
					});
				</script>";
			}
			else {
				$check_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='$secid' AND subj='$subj'");
				if(mysqli_num_rows($check_schedule)>0) {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Schedule for the subject selected is already added.',
						footer: '',
						showCloseButton: true
						}).then(function (result) {
						if (result.value) {
						window.history.back();
							}
						});
					</script>";
				}
				else {
					$check_teacher = mysqli_query($conn, "SELECT * FROM $schedule WHERE (faculty='$teacher' AND time_start BETWEEN $stime AND $etime) OR (faculty='$teacher' AND time_end BETWEEN $stime AND $etime)");
					if(mysqli_num_rows($check_teacher)>0) {
						echo "<div></div><script>
							Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Selected teacher is having conflict of the scheduled time.',
							footer: '',
							showCloseButton: true
							}).then(function (result) {
							if (result.value) {
							window.history.back();
								}
							});
						</script>";
					}
					else {
						$check_schedule2 = mysqli_query($conn, "SELECT * FROM $schedule WHERE (section_id='$secid' AND time_start BETWEEN $stime AND $etime AND sch_day LIKE '%$schday%') OR (section_id='$secid' AND time_end BETWEEN $stime AND $etime AND sch_day LIKE '%$schday%')");
						if(mysqli_num_rows($check_schedule2)>0) {
							echo "<div></div><script>
								Swal.fire({
								icon: 'error',
								title: 'Error',
								text: 'Conflict schedule.',
								footer: '',
								showCloseButton: true
								}).then(function (result) {
								if (result.value) {
								window.history.back();
									}
								});
							</script>";
						}
						else {
							$insert_schedule = mysqli_query($conn, "INSERT INTO $schedule(section_id,subj,time_start,time_end,sch_day,faculty,status)VALUES('$secid', '$subj', '$stime', '$etime', '$schday', '$teacher', 'open')");
							if($insert_schedule) {
								echo "<div></div><script>Swal.fire({
									position: 'top-end',
									title: 'Success.',
									text: 'Successfully added.',
									icon: 'success',
									showConfirmButton: false,
									timer: 2000
									}).then(function() {
										window.location = 'create-schedule?section_id=$secid&&g_level_id=$gid';
									});
								</script>";
							}
							else {
								echo "<div></div><script>
									Swal.fire({
									icon: 'error',
									title: 'Error',
									text: 'Adding failed.',
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
					}
				}
				mysqli_close($conn);
			}
		}
		else if(isset($_POST['UpdateSchedule'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$subj = trim($_POST['subj']);
			$stime = strtotime($_POST['stime']);
			$etime = strtotime($_POST['etime']);
			$schday = trim($_POST['schday']);
			$secid = trim($_POST['secid']);
			$gid = trim($_POST['gid']);
			$schid = trim($_POST['schid']);
			if($etime<$stime) {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Invalid Schedule time.',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
						}
					});
				</script>";
			}
			else {
				$check_schedule3 = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='$secid' AND subj='$subj' AND time_start='$stime' AND time_end='$etime' AND sch_day='$schday'");
				if(mysqli_num_rows($check_schedule3)>0) {
					echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Duplicate schedule.',
						footer: '',
						showCloseButton: true
						}).then(function (result) {
						if (result.value) {
						window.history.back();
							}
						});
					</script>";
				}
				else {
					$check_teacher = mysqli_query($conn, "SELECT * FROM $schedule WHERE (faculty='$teacher' AND time_start BETWEEN $stime AND $etime) OR (faculty='$teacher' AND time_end BETWEEN $stime AND $etime)");
					if(mysqli_num_rows($check_teacher)>0) {
						echo "<div></div><script>
							Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Selected teacher is having conflict of the scheduled time.',
							footer: '',
							showCloseButton: true
							}).then(function (result) {
							if (result.value) {
							window.history.back();
								}
							});
						</script>";
					}
					else {
						$check_schedule4 = mysqli_query($conn, "SELECT * FROM $schedule WHERE (section_id='$secid' AND time_start BETWEEN $stime AND $etime AND sch_day LIKE '%$schday%') OR (section_id='$secid' AND time_end BETWEEN $stime AND $etime AND sch_day LIKE '%$schday%')");
						if(mysqli_num_rows($check_schedule4)>0) {
							echo "<div></div><script>
								Swal.fire({
								icon: 'error',
								title: 'Error',
								text: 'Conflict schedule.',
								footer: '',
								showCloseButton: true
								}).then(function (result) {
								if (result.value) {
								window.history.back();
									}
								});
							</script>";
						}
						else {
							$update_schedule = mysqli_query($conn, "UPDATE $schedule SET section_id='$secid', subj='$subj', time_start='$stime', time_end='$etime', sch_day='$schday', faculty='$teacher' WHERE schID='$schid'");
							if($update_schedule) {
								echo "<div></div><script>Swal.fire({
									position: 'top-end',
									title: 'Success.',
									text: 'Successfully updated.',
									icon: 'success',
									showConfirmButton: false,
									timer: 2000
									}).then(function() {
										window.location = 'create-schedule?section_id=$secid&&g_level_id=$gid';
									});
								</script>";
							}
							else {
								echo "<div></div><script>Swal.fire({
									position: 'top-end',
									title: 'Error.',
									text: 'Update failed.',
									icon: 'error',
									showConfirmButton: false,
									timer: 2000
									}).then(function() {
										window.location = 'create-schedule?section_id=$secid&&g_level_id=$gid';
									});
								</script>";
							}
						}
					}
				}
				mysqli_close($conn);
			}
		}
		else if(isset($_GET['delete_schedule'])) {
			include("db_connect.php");
			$secid = trim($_GET['section_id']);
			$gid = trim($_GET['g_level_id']);
			$del_schedule = mysqli_query($conn, "DELETE FROM $schedule WHERE schID='".$_GET['delete_schedule']."'");
			if($del_schedule) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success.',
					text: 'Successfully deleted.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'create-schedule?section_id=$secid&&g_level_id=$gid';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error.',
					text: 'Deleting failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'create-schedule?section_id=$secid&&g_level_id=$gid';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	//////////////////////////////////////////////////Manage Payment
	function ManagePayment() {
		if(isset($_POST['SubmitPayment'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$dnow = strtotime(date("m/d/Y"));
			$pmt = trim($_POST['pmt']);
			$sid = trim($_POST['sid']);
			$pmt_code = substr(str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ0123456789'),0,5);
			$q_stud = mysqli_query($conn, "SELECT * FROM $student WHERE studID='$sid'");
			while($row_stud = mysqli_fetch_array($q_stud)) {
				$q_glevel = mysqli_query($conn, "SELECT * FROM $gradelevel WHERE glID='".$row_stud['glevel']."'");
				while($row_glevel = mysqli_fetch_array($q_glevel)) {
					$tuition = $row_glevel['tuition'];
					$q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'");
					while($row_syear = mysqli_fetch_array($q_syear)) {
						$q_payment = mysqli_query($conn, "SELECT * FROM $payment WHERE stud_id='$sid' AND syear='".$row_syear['syID']."'");
						if(mysqli_num_rows($q_payment)>0) {
							while($row_payment = mysqli_fetch_array($q_payment)) {
								$total_pmt += $row_payment['amount'];
							}
							$new_total = $pmt + $total_pmt;
							if($new_total>$tuition) {
								$pmt_change = $new_total-$tuition;
								$insert_payment = mysqli_query($conn, "INSERT INTO $payment(pmtcode,student_id,syear,amount,pchange,balance,pmtdate)VALUES('$pmt_code', '$sid', '".$row_syear['syID']."', '$pmt', '$pmt_change', '0', '$dnow')");
								if($insert_payment) {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Success',
										text: 'Successfully added.',
										icon: 'success',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment-receipt?pmt_code=$pmt_code&&pmt_change=$pmt_change';
										});
									</script>";
								}
								else {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Error',
										text: 'Adding payment failed.',
										icon: 'error',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment';
										});
									</script>";
								}
							}
							else if($new_total<$tuition) {
								$pmt_balance = $tuition-$new_total;
								$insert_payment1 = mysqli_query($conn, "INSERT INTO $payment(pmtcode,student_id,syear,amount,balance,pmtdate)VALUES('$pmt_code', '$sid', '".$row_syear['syID']."', '$pmt', '$pmt_balance', '$dnow')");
								if($insert_payment1) {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Success',
										text: 'Successfully added.',
										icon: 'success',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment-receipt?pmt_code=$pmt_code&&pmt_change=0';
										});
									</script>";
								}
								else {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Error',
										text: 'Adding payment failed.',
										icon: 'error',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment';
										});
									</script>";
								}
							}
							else if($new_total==$tuition) {
								$insert_payment2 = mysqli_query($conn, "INSERT INTO $payment(pmtcode,student_id,syear,amount,balance,pmtdate)VALUES('$pmt_code', '$sid', '".$row_syear['syID']."', '$pmt', '0', '$dnow')");
								if($insert_payment2) {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Success',
										text: 'Successfully added.',
										icon: 'success',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment-receipt?pmt_code=$pmt_code&&pmt_change=0';
										});
									</script>";
								}
								else {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Error',
										text: 'Adding payment failed.',
										icon: 'error',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment';
										});
									</script>";
								}
							}
						}
						else {
							if($pmt>$tuition) {
								$pmt_change = $pmt-$tuition;
								$insert_payment3 = mysqli_query($conn, "INSERT INTO $payment(pmtcode,student_id,syear,amount,pchange,balance,pmtdate)VALUES('$pmt_code', '$sid', '".$row_syear['syID']."', '$pmt', '$pmt_change', '0', '$dnow')");
								if($insert_payment3) {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Success',
										text: 'Successfully added.',
										icon: 'success',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment-receipt?pmt_code=$pmt_code&&pmt_change=$pmt_change';
										});
									</script>";
								}
								else {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Error',
										text: 'Adding payment failed.',
										icon: 'error',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment';
										});
									</script>";
								}
							}
							else if($pmt<$tuition) {
								$pmt_balance = $tuition-$pmt;
								$insert_payment4 = mysqli_query($conn, "INSERT INTO $payment(pmtcode,student_id,syear,amount,balance,pmtdate)VALUES('$pmt_code', '$sid', '".$row_syear['syID']."', '$pmt', '$pmt_balance', '$dnow')");
								if($insert_payment4) {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Success',
										text: 'Successfully added.',
										icon: 'success',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment-receipt?pmt_code=$pmt_code&&pmt_change=0';
										});
									</script>";
								}
								else {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Error',
										text: 'Adding payment failed.',
										icon: 'error',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment';
										});
									</script>";
								}
							}
							else if($pmt==$tuition) {
								$insert_payment5 = mysqli_query($conn, "INSERT INTO $payment(pmtcode,student_id,syear,amount,balance,pmtdate)VALUES('$pmt_code', '$sid', '".$row_syear['syID']."', '$pmt', '0', '$dnow')");
								if($insert_payment5) {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Success',
										text: 'Successfully added.',
										icon: 'success',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment-receipt?pmt_code=$pmt_code&&pmt_change=0';
										});
									</script>";
								}
								else {
									echo "<div></div><script>Swal.fire({
										position: 'top-end',
										title: 'Error',
										text: 'Adding payment failed.',
										icon: 'error',
										showConfirmButton: false,
										timer: 2000
										}).then(function() {
											window.location = 'payment';
										});
									</script>";
								}
							}
						}
					}
				}
			}
			mysqli_close($conn);
		}
	}
	///////////////////////////////////////////////////// Temporary Enrollment
	function ManageTempEnrollment() {
	    if(isset($_GET['accept'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$sydate = strtotime(date("m/d/Y"));
			$sytime = strtotime(date("h:i A"));
			$q_student_details = mysqli_query($conn, "SELECT * FROM $student WHERE studID='".$_GET['accept']."'");
			while($row_student_details = mysqli_fetch_array($q_student_details)) {
				$sfname = $row_student_details['sfname'];
				$passw = $row_student_details['password'];
				$sendto = $row_student_details['semail'];
				$lrnno = $row_student_details['lrnno'];
				$syear = $row_student_details['syear'];
				$glevel = $row_student_details['glevel'];
				$secname = $row_student_details['section'];
				//$subject = 'Enrollment Confirmation';
				//$from = 'Commonwealth National High School';
                $accept_student = mysqli_query($conn, "UPDATE $student SET status='active', remarks='accepted' WHERE studID='".$_GET['accept']."'");
				if($accept_student) {
					$symsg = "Accepted online enrollment application.";
					mysqli_query($conn, "INSERT INTO $rank(lrnno,syear,glevel,section,gpa)VALUES('$lrnno', '$syear', '$glevel', '$secname', '0')")or die("error");
					mysqli_query($conn, "INSERT INTO $chatbx(title,details,mdate,mtime,tofrom,touser,toread,fromread,remarks,scode)VALUES('', '$symsg', '$sydate', '$sytime', '".$_SESSION['SESS_ADMIN_ID']."', 'All', 'unread', 'unread',  'logs' , '0')");
					//Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = "localhost";
                    $mail->SMTPAutoTLS = false;
                    $mail->Port = 25;
                    $mail->Subject = "Account Confirmation";
                    $mail->setFrom("auroracnhs@cnhsaurora.com");
                    $mail->Body = "
                        <html>
                            <head>
                                <title></title>
                            </head>
                            <body>                
                                <div style='width:800px;background:#fff;border-style:groove;'>
                                    <h4 style='color:#ea6512;margin-top:-20px;'> Hello, " .$sfname."</h4>
                                    <p>You are now successfully enrolled to CNHS Portal. Please use your account details below to access your account. </p>
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
                                                    <td style='text-align:left;'>" .$sendto." 
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
                    $mail->addAddress($sendto, $sfname);
                    if ($mail->send()) {
					    $q_sched1 = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='$secname'");
                		while($row_sched1 = mysqli_fetch_array($q_sched1)) {
                			$insert_grade1 = mysqli_query($conn, "INSERT INTO $grades(student_id,syear,glevel,section,schname,schid,district,division,region,teacher,subject,first,second,third,fourth,final)VALUES('".$row_student_details['lrnno']."', '".$row_student_details['syear']."', '".$row_student_details['glevel']."', '".$row_student_details['section']."', '".$row_student_details['scname']."', '".$row_student_details['scid']."', '', '', '', '".$row_sched1['faculty']."', '".$row_sched1['subj']."', '0', '0', '0', '0', '0')");
                			//$insert_grade1 = mysqli_query($conn, "INSERT INTO $grades(student_id,syear,glevel,section,schname,schid,district,division,region,teacher,subject,first,second,third,fourth,final)VALUES('".$row_student_details['lrnno']."', '".$row_student_details['syear']."', '".$row_student_details['glevel']."', '".$row_student_details['section']."', '".$row_student_details['scname']."', '".$row_student_details['scid']."', '', '', '', '".$row_sched1['faculty']."', '".$row_sched1['subj']."', '0', '0', '0', '0', '0')");
						    if($insert_grade1) {
                                echo "<div></div><script>Swal.fire({
                                    position: 'top-end',
                                	icon: 'success',
                                	title: 'Success',
                                	text: 'New student was successfully accepted',
                                	showConfirmButton: false,
                                	timer: 2000
                                    }).then(function() {
                                		window.location = 'enrollment';
                                	});
                                </script>";
                    		}
                		}
                    }
                    else {
                        echo "<div></div><script>Swal.fire({
    						position: 'top-end',
    						icon: 'error',
    						title: 'Error',
    						text: 'Unable to send email',
    						showConfirmButton: false,
    						timer: 3000
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
			mysqli_close($conn);
		}
		else if(isset($_GET['reject'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$rsysmsg = "Rejected enrollment application.";
			$sydate = strtotime(date("m/d/Y"));
			$sytime = strtotime(date("h:i A"));
			$reject_student_details = mysqli_query($conn, "SELECT * FROM $student WHERE studID='".$_GET['reject']."'");
			while($row_reject = mysqli_fetch_array($reject_student_details)) {
				$sfname = $row_reject['sfname'];
				$passw = $row_reject['password'];
				$sendto = $row_reject['semail'];
				$subject = 'Enrollment Confirmation';
				$mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = "localhost";
                $mail->SMTPAutoTLS = false;
                $mail->Port = 25;
                $mail->Subject = "Account Confirmation";
                $mail->setFrom("auroracnhs@cnhsaurora.com");
                $mail->Body = "
                    <html>
                        <head>
                            <title></title>
                        </head>
                        <body>                
                            <div style='width:800px;background:#fff;border-style:groove;'>
                                <h4 style='color:#ea6512;margin-top:-20px;'> Hello, " .$sfname."</h4>
                                <p>This is to inform you that your enrollment application at Commonwealth National High School has been rejected. To know more about the reason of rejection please directly our school. </p>
                                <hr/>
                            </div>              
                        </body>
                    </html>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->addAddress($sendto, $sfname);
                if ($mail->send()) {
                    $reject_student = mysqli_query($conn, "UPDATE $student SET status='rejected', remarks='rejected' WHERE studID='".$_GET['accept']."'");
					if($reject_student) {
					    mysqli_query($conn, "INSERT INTO $chatbx(title,mdate,mtime,tofrom,touser,details,toread,fromread,remarks,scode)VALUES('', '$sydate', '$sytime', '".$_SESSION['SESS_ADMIN_ID']."', '', '$rsymsg', 'unread', 'read', 'logs', '')");
						//mysqli_query($conn, "INSERT INTO $message(mdate,mtime,tofrom,details,type)VALUES('$sydate', '$sytime', '".$_SESSION['SESS_ADMIN_ID']."', '$symsg', 'logs')");
                        echo "<div></div><script>Swal.fire({
        					position: 'top-end',
        					title: 'Success',
        					text: 'Successfully rejected.',
        					icon: 'success',
        					showConfirmButton: false,
        					timer: 2000
        					}).then(function() {
        						window.location = 'enrollment';
        					});
        				</script>";
					 }
					 else {
        				echo "<div></div><script>Swal.fire({
        					position: 'top-end',
        					title: 'Error',
        					text: 'Enrollment was not successfully rejected.',
        					icon: 'error',
        					showConfirmButton: false,
        					timer: 2000
        					}).then(function() {
        						window.location = 'enrollment';
        					});
        				</script>";
        			}
                }
                else {
                    echo "<div></div><script>Swal.fire({
        					position: 'top-end',
        					title: 'Error',
        					text: 'Unable to send emial.',
        					icon: 'error',
        					showConfirmButton: false,
        					timer: 2000
        					}).then(function() {
        						window.location = 'enrollment';
        					});
        				</script>";
                }
                
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['SubmitEnroll'])) {
		    include("db_connect.php");
    		date_default_timezone_set("Asia/Manila");
    		$datenow = strtotime(date("m/d/Y"));
    		$sytime = strtotime(date("h:i A"));
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
    		$asymsg = "Added new student.";
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
    			$q_Section = mysqli_query($conn, "SELECT * FROM $section WHERE glevel='$glevel' AND gpafrom<=$gpano AND gpato>=$gpano AND limitavail>0 AND remarks='open' ORDER BY secID ASC LIMIT 1");
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
    							$semail = $row_prev['semail'];
    							$passww = $row_prev['password'];
    							$stscname = $row_prev['scname'];
    							$stscid = $row_prev['scid'];
    							$stscaddr = $row_prev['scaddr'];
    							$stmethod = $row_prev['method'];
    							$new_levelid = $stlevel+1;
    							$insert_old = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$styear', '$lrnno', '$stlevel', '$stsection', '$stgpa', '$stmethod', '$stlyear', '$stscname', '$stscid', '$stscaddr')");
    							if($insert_old) {
    								$update_student = mysqli_query($conn, "UPDATE $student SET glevel='$new_levelid', section='$secname', syear='$syear1', lyear='".$row_prev['syear']."', gpa='$gpano', scname='$scname', scid='$scid', scaddr='$scaddr', method='$dlearning' WHERE lrnno='$lrnno'");
    								if($update_student) {
    								    mysqli_query($conn, "INSERT INTO $chatbx(title,details,mdate,mtime,tofrom,touser,toread,fromread,remarks,scode)VALUES('', '$asymsg', '$datenow', '$sytime', '".$_SESSION['SESS_ADMIN_ID']."', 'All', 'read', 'read',  'logs' , '0')");
    								    mysqli_query($conn, "INSERT INTO $rank(lrnno,syear,glevel,section,gpa)VALUES('$lrnno', '$syear1', '$new_levelid', '$secname', '0')");
    									mysqli_query($conn, "UPDATE $section SET limitavail=limitavail-'1' WHERE secID='$secname'");
    									$subject = 'Account_Information';
                            			$from = 'CNHS';
                                        //Create an instance; passing `true` enables exceptions
                                        $mail = new PHPMailer();
                                        $mail->isSMTP();
                                        $mail->Host = "localhost";
                                        $mail->SMTPAutoTLS = false;
                                        $mail->Port = 25;
                                        $mail->Subject = "Account Confirmation";
                                        $mail->setFrom("auroracnhs@cnhsaurora.com");
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
                                        $mail->addAddress($semail, $fname);
                                        if ($mail->send()) {
                                            $total = count($_FILES['upload']['name']);
                                            for( $i=0 ; $i < $total ; $i++ ) {
                                                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                                                if ($tmpFilePath != ""){
                                                    $info1 = pathinfo($_FILES['upload']['name'][$i]);
                                                    $ext = $info1['extension'];
                                                    $newname1 = "CNHS_" . rand(10000,99999) . "." . $ext; 
                                                    //$imagename = $_FILES['upload']['name'][$i];
                                                    $newFilePath = "uploads/".$newname1;
                                                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                                                        $insert_req = mysqli_query($conn, "INSERT INTO $req(lrnno,req)VALUES('$lrnno', '$newname1')");
                                                        if($insert_req) {
                                                            $xx=0;
                                                        }
                    									else {
                    									    $xx=1;
                    									}  
                                                    }
                                                }
                                            }
                                            $q_sched = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='$secname'");
    									    while($row_sched = mysqli_fetch_array($q_sched)) {
    									        $insert_grade = mysqli_query($conn, "INSERT INTO $grades(student_id,syear,glevel,section,schname,schid,district,division,region,teacher,subject,first,second,third,fourth,final)VALUES('$lrnno', '$syear1', '$new_levelid', '$secname', '$scname', '$scid', '', '', '', '".$row_sched['faculty']."', '".$row_sched['subj']."', '0', '0', '0', '0', '0')");
    										    //$insert_grade = mysqli_query($conn, "INSERT INTO $grades(student_id,syear,glevel,section,schname,schid,teacher,subject)VALUES('$lrnno', '$syear1', '$new_levelid', '$secname', '$scname', '$scid', '".$row_sched['faculty']."', '".$row_sched['subj']."')");
    										    if($insert_grade) {
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
                                        }
                                        else {
                                            echo "<div></div><script>Swal.fire({
                										position: 'top-end',
                										icon: 'error',
                										title: 'Error',
                										text: 'Unable to send email',
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
                            							timer: 2000
                            							}).then(function() {
                            								window.history.back();
                            							});
                            						</script>";
    							}
    						}
    					}
    					else {
    						$insert_student = mysqli_query($conn, "INSERT INTO $student(dentry,stcode,syear,glevel,etype,psano,lrnno,gpa,section,sfname,slname, mname,dbirth,gender,indigent,ind_details,mtongue,cpno,semail,password,staddr,zcode,faname,moname,pacon,lyear,scname,scid,scaddr,method,certify,status,remarks)VALUES('$datenow', '$user_code', '$syear1', '$glevel', '$etype', '$psano', '$lrnno', '$gpano', '$secname', '$fname', '$lname', '$mname', '$bdate', '$gender', '$pppp', '$ipconf', '$mton', '$cpnum', '$email', '$passw', '$addr', '$zip', '$faname', '$moname', '$mnum', '$lyear', '$scname', '$scid', '$scaddr', '$dlearning', '$agree', 'active', 'accepted')");
    				    	if($insert_student) {
    				    	    mysqli_query($conn, "INSERT INTO $chatbx(title,details,mdate,mtime,tofrom,touser,toread,fromread,remarks,scode)VALUES('', '$asymsg', '$datenow', '$sytime', '".$_SESSION['SESS_ADMIN_ID']."', 'All', 'read', 'read',  'logs' , '0')");
    				    	    mysqli_query($conn, "INSERT INTO $rank(lrnno,syear,glevel,section,gpa)VALUES('$lrnno', '$syear1', '$glevel', '$secname', '0')");
    				    		mysqli_query($conn, "UPDATE $section SET limitavail=limitavail-'1' WHERE secID='$secname'");
    				    		$insert_old1 = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$syear1', '$lrnno', '$glevel', '$secname', '$gpano', '$dlearning', '$lyear', '$scname', '$scid', '$scaddr')");
    							if($insert_old1) {
    					    	    //$subject = 'Account_Information';
                            		//$from = 'CNHS';
                                    //Create an instance; passing `true` enables exceptions
                                    $mail = new PHPMailer();
                                    $mail->isSMTP();
                                    $mail->Host = "localhost";
                                    $mail->SMTPAutoTLS = false;
                                    $mail->Port = 25;
                                    $mail->Subject = "Account Confirmation";
                                    $mail->setFrom("auroracnhs@cnhsaurora.com");
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
                                    $mail->addAddress($email, $fname);
                                    if ($mail->send()) {
                                        $total = count($_FILES['upload']['name']);
                                        for( $i=0 ; $i < $total ; $i++ ) {
                                            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                                            if ($tmpFilePath != ""){
                                                $info1 = pathinfo($_FILES['upload']['name'][$i]);
                                                $ext = $info1['extension'];
                                                $newname1 = "CNHS_" . rand(10000,99999) . "." . $ext; 
                                                //$imagename = $_FILES['upload']['name'][$i];
                                                $newFilePath = "uploads/".$newname1;
                                                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                                                    $insert_req = mysqli_query($conn, "INSERT INTO $req(lrnno,req)VALUES('$lrnno', '$newname1')");
                                                    if($insert_req) {
                                                        $xx=0;
                                                    }
                    								else {
                    									$xx=1;
                    								}  
                                                }
                                            }
                                        }
                                        $q_sched1 = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='$secname'");
                						while($row_sched1 = mysqli_fetch_array($q_sched1)) {
                							//$qsubject = mysqli_query($conn, "SELECT * FROM $subject WHERE suID='".$row_sched1['subj']."'");
                    			            //while($rowsubj = mysqli_fetch_array($qsubject)) {
                							$insert_grade1 = mysqli_query($conn, "INSERT INTO $grades(student_id,syear,glevel,section,schname,schid,district,division,region,teacher,subject,first,second,third,fourth,final)VALUES('$lrnno', '$syear1', '$glevel', '$secname', '$scname', '$scid', '', '', '', '".$row_sched1['faculty']."', '".$row_sched1['subj']."', '0', '0', '0', '0', '0')");
                							if($insert_grade1) {
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
                    			    }
                    			    else {
                    			        echo "<div></div><script>Swal.fire({
                    								position: 'top-end',
                    								icon: 'error',
                    								title: 'Error',
                    								text: 'Unable to send email',
                    								showConfirmButton: false,
                            						timer: 2000
                            							}).then(function() {
                            							window.history.back();
                            						});
                            					</script>";
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
                            							timer: 2000
                            							}).then(function() {
                            								window.history.back();
                            							});
                            						</script>";
    				    	}
    				    }
    				}
    			}
    		}
    	    mysqli_close($conn);
		}
		else if(isset($_POST['ProceedEnroll'])) {
		    include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$datenow = strtotime(date("m/d/Y"));
			$sytime = strtotime(date("h:i A"));
		    $lrnno = trim($_POST['lrnno']);
			$fname = trim($_POST['sfname']);
			$lname = trim($_POST['slname']);
			$asymsg = "Added new student.";
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
        			        if($numg<1) {
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
            								$update_student = mysqli_query($conn, "UPDATE $student SET glevel='$new_levelid', section='$secname', syear='$syear1', lyear='".$row_stud['syear']."', gpa='$gpano', scname='$scname', status='active', remarks='accepted' WHERE lrnno='$lrnno'");
            								if($insert_student) {
            								    mysqli_query($conn, "INSERT INTO $chatbx(title,details,mdate,mtime,tofrom,touser,toread,fromread,remarks,scode)VALUES('', '$asymsg', '$datenow', '$sytime', '".$_SESSION['SESS_ADMIN_ID']."', 'All', 'read', 'read',  'logs' , '0')");
            								    mysqli_query($conn, "INSERT INTO $rank(lrnno,syear,glevel,section,gpa)VALUES('$lrnno', '$syear1', '$new_levelid', '$secname', '0')");
            								    $subject = 'Account_Information';
                            		            $from = 'CNHS';
                                                //Create an instance; passing `true` enables exceptions
                                                $mail = new PHPMailer();
                                                $mail->isSMTP();
                                                $mail->Host = "localhost";
                                                $mail->SMTPAutoTLS = false;
                                                $mail->Port = 25;
                                                $mail->Subject = "Account Confirmation";
                                                $mail->setFrom("auroracnhs@cnhsaurora.com");
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
                                                $mail->addAddress($email, $fname);
                                                if ($mail->send()) {
                                                    $q_sched1 = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='$secname'");
                								    while($row_sched1 = mysqli_fetch_array($q_sched1)) {
                    								    $insert_grade1 = mysqli_query($conn, "INSERT INTO $grades(student_id,syear,glevel,section,schname,schid,district,division,region,teacher,subject,first,second,third,fourth,final)VALUES('$lrnno', '$syear1', '$new_levelid', '$secname', '$stscname', '$stscid', '', '', '', '".$row_sched1['faculty']."', '".$row_sched1['subj']."', '0', '0', '0', '0', '0')");
                            							if($insert_grade1) {
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
                    			                }
                                                else {
                                                    echo "<div></div><script>Swal.fire({
                                								position: 'top-end',
                                								icon: 'error',
                                								title: 'Error',
                                								text: 'Unable to send email',
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
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['deactivate'])) {
		    include("db_connect.php");
		    $deact = mysqli_query($conn, "UPDATE $student SET status='inactive' WHERE lrnno='".$_GET['deactivate']."'");
		    if($deact) {
		        echo "<div></div><script>Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    text: 'Successfully deactivated',
                    showConfirmButton: false,
                    timer: 2000
                    }).then(function() {
                        window.location = 'students';
                    });
               </script>";
		    }
		    else {
		        echo "<div></div><script>Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error',
                    text: 'Deactivation failed',
                    showConfirmButton: false,
                    timer: 2000
                    }).then(function() {
                        window.location = 'students';
                    });
               </script>";
		    }
		    mysqli_close($conn);
		}
		else if(isset($_GET['download'])) {
		    $name= $_GET['download'];
            header('Content-Description: File Transfer');
            header('Content-Type: application/force-download');
            header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($name));
            ob_clean();
            flush();
            readfile("uploads/".$name); //showing the path to the server where the file is to be download
            exit;
		}
	}
	////////////////////////////////////////////// Manage Announcement
	function ManageAnnouncement() {
		if(isset($_POST['SubmitAnnounce'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			define ("MAX_SIZE","4096000"); 
			function getExtension($str) 
			{
         		$i = strrpos($str,".");
         		if (!$i) { return ""; }
         		$l = strlen($str) - $i;
         		$ext = substr($str,$i+1,$l);
         		return $ext;
 			}
			$errors=0;
			if(isset($_POST['SubmitAnnounce'])) 
 			{
    			$image=$_FILES['photo']['name'];
    			if ($image) 
    			{
    				$filename = stripslashes($_FILES['photo']['name']);
    				$extension = getExtension($filename);
        			$extension = strtolower($extension);
 					if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
        			{
        				echo "<script>alert('Unknown extension.');window.history.back();</script>";
        				$errors=1;
        			}
        			else
        			{
						$size=filesize($_FILES['photo']['tmp_name']);
						if ($size > MAX_SIZE*1024)
						{
    						echo '<h1>You have exceeded the size limit!</h1>';
    						$errors=1;
						}
						$image_name=time().'.'.$extension;
						$newname="uploads/".$image_name;
						$copied = copy($_FILES['photo']['tmp_name'], $newname);
						if (!$copied) 
						{
							echo "<script>alert('Copy unsuccessfull.'); window.history.back();</script>";
    						$errors=1;
						}
					}
				}
			}
			if(isset($_POST['SubmitAnnounce']) && !$errors) 
 			{
				$daten = strtotime(date("m/d/Y"));
				$adate = strtotime($_POST['adate']);
				$details = $_POST['details'];
				$title = $_POST['title'];
				if($daten<$adate) {
					$insert_announce = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$adate', '$title', '$details', 'announce', '$image_name', 'unpost')");
					if($insert_announce) {
						echo "<div></div><script>Swal.fire({
							position: 'top-end',
							title: 'Success',
							text: 'Successfully added.',
							icon: 'success',
							showConfirmButton: false,
							timer: 2000
							}).then(function() {
								window.location = 'announcement';
							});
						</script>";
					}
					else {
						echo "<div></div><script>Swal.fire({
							position: 'top-end',
							title: 'Error',
							text: 'Adding failed.',
							icon: 'error',
							showConfirmButton: false,
							timer: 2000
							}).then(function() {
								window.location = 'announcement';
							});
						</script>";
					}
				}
				else {
					$insert_announce1 = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$adate', '$title', '$details', 'announce', '$image_name', 'post')");
					if($insert_announce1) {
						echo "<div></div><script>Swal.fire({
							position: 'top-end',
							title: 'Success',
							text: 'Successfully added.',
							icon: 'success',
							showConfirmButton: false,
							timer: 2000
							}).then(function() {
								window.location = 'announcement';
							});
						</script>";
					}
					else {
						echo "<div></div><script>Swal.fire({
							position: 'top-end',
							title: 'Error',
							text: 'Adding failed.',
							icon: 'error',
							showConfirmButton: false,
							timer: 2000
							}).then(function() {
								window.location = 'announcement';
							});
						</script>";
					}
				}
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateAnnounce'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$adate = strtotime($_POST['adate']);
			$abid = $_POST['abid'];
			$details = $_POST['details'];
			$update_announce = mysqli_query($conn, "UPDATE $about SET abtdate='$adate', details='$details' WHERE abID='$abid'");
			if($update_announce) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'announcement';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Update failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'announcement';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['delete_announcement'])) {
			include("db_connect.php");
			$delete_ann = mysqli_query($conn, "DELETE FROM $about WHERE abID='".$_GET['delete_announcement']."'");
			if($delete_ann) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully deleted.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'announcement';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Deleting failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'announcement';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////// Manage Event
	function ManageEvent() {
		if(isset($_POST['SubmitEvent'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			define ("MAX_SIZE","4096000"); 
			function getExtension($str) 
			{
         		$i = strrpos($str,".");
         		if (!$i) { return ""; }
         		$l = strlen($str) - $i;
         		$ext = substr($str,$i+1,$l);
         		return $ext;
 			}
			$errors=0;
			if(isset($_POST['SubmitEvent'])) 
 			{
    			$image=$_FILES['photo']['name'];
    			if ($image) 
    			{
    				$filename = stripslashes($_FILES['photo']['name']);
    				$extension = getExtension($filename);
        			$extension = strtolower($extension);
 					if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
        			{
        				echo "<script>alert('Unknown extension.');window.history.back();</script>";
        				$errors=1;
        			}
        			else
        			{
						$size=filesize($_FILES['photo']['tmp_name']);
						if ($size > MAX_SIZE*1024)
						{
    						echo '<h1>You have exceeded the size limit!</h1>';
    						$errors=1;
						}
						$image_name=time().'.'.$extension;
						$newname="uploads/".$image_name;
						$copied = copy($_FILES['photo']['tmp_name'], $newname);
						if (!$copied) 
						{
							echo "<script>alert('Copy unsuccessfull.'); window.history.back();</script>";
    						$errors=1;
						}
					}
				}
			}
			if(isset($_POST['SubmitEvent']) && !$errors) 
 			{
				$daten = strtotime(date("m/d/Y"));
				$adate = strtotime($_POST['adate']);
				$details = $_POST['details'];
				$title = $_POST['title'];
				if($daten<$adate) {
					$insert_announce = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$adate', '$title', '$details', 'event', '$image_name', 'posted')");
					if($insert_announce) {
						echo "<div></div><script>Swal.fire({
							position: 'top-end',
							title: 'Success',
							text: 'Successfully added.',
							icon: 'success',
							showConfirmButton: false,
							timer: 2000
							}).then(function() {
								window.location = 'events';
							});
						</script>";
					}
					else {
						echo "<div></div><script>
    						Swal.fire({
    						icon: 'error',
    						title: 'Error',
    						text: 'Adding failed.',
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
				else {
					$insert_announce1 = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$adate', '$title', '$details', 'event', '$image_name', 'not posted')");
					if($insert_announce1) {
						echo "<div></div><script>Swal.fire({
							position: 'top-end',
							title: 'Success',
							text: 'Successfully added.',
							icon: 'success',
							showConfirmButton: false,
							timer: 2000
							}).then(function() {
								window.location = 'events';
							});
						</script>";
					}
					else {
						echo "<div></div><script>
    						Swal.fire({
    						icon: 'error',
    						title: 'Error',
    						text: 'Adding failed.',
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
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['delete_event'])) {
			include("db_connect.php");
			$delete_event = mysqli_query($conn, "DELETE FROM $about WHERE abID='".$_GET['delete_event']."'");
			if($delete_event) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully deleted.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'events';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Deleting failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'events';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateAnnounce'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$adate = strtotime($_POST['adate']);
			$abid = $_POST['abid'];
			$details = $_POST['details'];
			$update_announce = mysqli_query($conn, "UPDATE $about SET abtdate='$adate', details='$details' WHERE abID='$abid'");
			if($update_announce) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'announcement';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Update failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'announcement';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['delete_announcement'])) {
			include("db_connect.php");
			$delete_ann = mysqli_query($conn, "DELETE FROM $about WHERE abID='".$_GET['delete_announcement']."'");
			if($delete_ann) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully deleted.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'announcement';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Deleting failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'announcement';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////// Manage History
	function ManageHistory() {
		if(isset($_POST['SubmitHistory'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$details = $_POST['details'];
			$insert_his = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$daten', '', '$details', 'his', '', 'post')") or die(mysqli_error());
			if($insert_his) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully added.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'history';
					});
				</script>";
			}
			else {
				echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Adding failed.',
						footer: '',
						showCloseButton: true
						}).then(function (result) {
						if (result.value) {
						window.history.back();
							}
						});
					</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateHistory'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$abid = $_POST['abid'];
			$details = $_POST['details'];
			$update_his = mysqli_query($conn, "UPDATE $about SET details='$details' WHERE abID='$abid'");
			if($update_his) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'history';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Update failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'history';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////// Manage Mission
	function ManageMission() {
		if(isset($_POST['SubmitMission'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$details = $_POST['details'];
			$insert_mis = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$daten', '', '$details', 'mis', '', 'post')") or die(mysqli_error());
			if($insert_mis) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully added.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'mission';
					});
				</script>";
			}
			else {
				echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Adding failed.',
						footer: '',
						showCloseButton: true
						}).then(function (result) {
						if (result.value) {
						window.history.back();
							}
						});
					</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateMission'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$abid = $_POST['abid'];
			$details = $_POST['details'];
			$update_mis = mysqli_query($conn, "UPDATE $about SET details='$details' WHERE abID='$abid'");
			if($update_mis) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'mission';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Update failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'mission';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////// Manage Vision
	function ManageVision() {
		if(isset($_POST['SubmitVision'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$details = $_POST['details'];
			$insert_vis = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$daten', '', '$details', 'vis', '', 'post')") or die(mysqli_error());
			if($insert_vis) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully added.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'vision';
					});
				</script>";
			}
			else {
				echo "<div></div><script>
						Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Adding failed.',
						footer: '',
						showCloseButton: true
						}).then(function (result) {
						if (result.value) {
						window.history.back();
							}
						});
					</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateVision'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$abid = $_POST['abid'];
			$details = $_POST['details'];
			$update_vis = mysqli_query($conn, "UPDATE $about SET details='$details' WHERE abID='$abid'");
			if($update_vis) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'vision';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Update failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'vision';
					});
				</script>";
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
				$insert_msg = mysqli_query($conn, "INSERT INTO $message(title,mdate,mtime,tofrom,touser,details,toread,fromread,type)VALUES('$title', '$msgdate', '$msgtime', '".$_SESSION['SESS_ADMIN_ID']."', '$sendto', '$msg', 'unread', 'read', 'msg')");
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
				$insert_reply = mysqli_query($conn, "INSERT INTO $message(mid,mdate,mtime,tofrom,touser,details,toread,fromread,type)VALUES('$msgid', '$msgdate', '$msgtime', '".$_SESSION['SESS_ADMIN_ID']."', '$touser', '$msg', 'unread', 'read', 'msg')");
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
	//////////////////////////////////////////////////////////// Manage Registrar
	function ManageRegistrar() {
		if(isset($_POST['UpdateRegistrar'])) {
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
			$fid = trim($_POST['fid']);
			$update_registrar = mysqli_query($conn, "UPDATE $registrar SET fname='$fname', lname='$lname', title='$title', educ='$educ', ofc='$ofc', email='$email', con='$con', addr='$addr' WHERE regID='$fid'");
			if($update_registrar) {
				echo "<div></div><script>Swal.fire({
				  	position: 'top-end',
				  	title: 'Success.',
				  	text: 'Successfully updated.',
				  	icon: 'success',
				  	showConfirmButton: false,
				  	timer: 2000
				  	}).then(function() {
						window.location = 'registrar';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
				  	position: 'top-end',
				  	title: 'Error.',
				  	text: 'Updating failed.',
				  	icon: 'error',
				  	showConfirmButton: false,
				  	timer: 2000
				  	}).then(function() {
						window.location = 'registrar';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['activate_registrar'])) {
			include("db_connect.php");
			$ac_registrar = mysqli_query($conn, "UPDATE $registrar SET status='active' WHERE regID='".$_GET['activate_registrar']."'");
			if($ac_registrar) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success.',
					text: 'Successfully activated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'registrar';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error.',
					text: 'Activation failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'registrar';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_GET['deactivate_registrar'])) {
			include("db_connect.php");
			$deac_registrar = mysqli_query($conn, "UPDATE $registrar SET status='inactive' WHERE regID='".$_GET['deactivate_registrar']."'");
			if($deac_registrar) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success.',
					text: 'Successfully deactivated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'registrar';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error.',
					text: 'Deactivation failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'registrar';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////// Manage Contact Us
	function ManageContactUs() {
		if(isset($_POST['SubmitContact'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$details = $_POST['details'];
			//$long = $_POST['long'];
			//$lat = $_POST['lat'];
			$insert_contact = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$adate', '', '$details', 'contact', '', 'show')");
			if($insert_contact) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully added.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'contact-us';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Adding failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'contact-us';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateContact'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$details = $_POST['details'];
			//$long = $_POST['long'];
			//$lat = $_POST['lat'];
			$abid = $_POST['abid'];
			$update_contact = mysqli_query($conn, "UPDATE $about SET details='$details' WHERE abID='$abid'");
			if($update_contact) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'contact-us';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Update failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'contact-us';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////// Manage Terms
	function ManageTerms() {
		if(isset($_POST['SubmitTerms'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$details = $_POST['details'];
			$insert_terms = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$adate', '', '$details', 'term', '', 'show')");
			if($insert_terms) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully added.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'site-terms';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Adding failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'site-terms';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateTerms'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$details = $_POST['details'];
			$abid = $_POST['abid'];
			$update_term = mysqli_query($conn, "UPDATE $about SET details='$details' WHERE abID='$abid'");
			if($update_term) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'site-terms';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Update failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'site-terms';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	////////////////////////////////////////////// Manage Terms
	function ManagePrivacy() {
		if(isset($_POST['SubmitPolicy'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$details = $_POST['details'];
			$insert_policy = mysqli_query($conn, "INSERT INTO $about(abtdate,title,details,type,photo,status)VALUES('$adate', '', '$details', 'privacy', '', 'show')");
			if($insert_policy) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully added.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'privacy-policy';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Adding failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'privacy-policy';
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdatePolicy'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$daten = strtotime(date("m/d/Y"));
			$details = $_POST['details'];
			$abid = $_POST['abid'];
			$update_policy = mysqli_query($conn, "UPDATE $about SET details='$details' WHERE abID='$abid'");
			if($update_policy) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'privacy-policy';
					});
				</script>";
			}
			else {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Update failed.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'privacy-policy';
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
	/////////////////////////////////////////////////// Manage Profile
	function ManageProfile() {
		if(isset($_POST['UpdateProfile'])) {
			include("db_connect.php");
			$fname = trim($_POST['fname']);
			$fname = trim($_POST['fname']);
			$con = trim($_POST['con']);
			$email = trim($_POST['email']);
			$addr = trim($_POST['addr']);
			$aid = trim($_POST['aid']);
			$update_pofile = mysqli_query($conn, "UPDATE $admin SET fname='$fname', lname='$fname', contact='$con', email='$email', addr='$addr' WHERE admID='".$_SESSION['SESS_ADMIN_ID']."'");
			if($update_pofile) {
				echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Success',
					text: 'Successfully updated your profile.',
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
					text: 'Updating your profile failed.',
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
		if(isset($_POST['UpdatePassword'])) {
			include("db_connect.php");
			$oldpassw = trim($_POST['oldpassw']);
			$newpassw = trim($_POST['newpassw']);
			$newpassw2 = trim($_POST['newpassw2']);
			if($newpassw<>$newpassw2) {
			    echo "<div></div><script>Swal.fire({
					position: 'top-end',
					title: 'Error',
					text: 'Password did not match.',
					icon: 'error',
					showConfirmButton: false,
					timer: 2000
					}).then(function() {
						window.location = 'profile';
					});
				</script>";
			}
			else {
    			$update_pasw = mysqli_query($conn, "UPDATE $admin SET passw='$newpassw' WHERE admID='".$_SESSION['SESS_ADMIN_ID']."'");
    			if($update_pasw) {
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
				$insert_msg = mysqli_query($conn, "INSERT INTO $chatbx(title,details,mdate,mtime,tofrom,touser,toread,fromread,remarks,scode)VALUES('$title', '$msg', '$msgdate', '$msgtime', '".$_SESSION['SESS_ADMIN_ID']."', '$sendto', 'unread', 'read', 'msg', '0')");
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
				$title = $row_msgid['title'];
				$insert_reply = mysqli_query($conn, "INSERT INTO $chatbx(title,mdate,mtime,tofrom,touser,details,toread,fromread,remarks,scode)VALUES('$title', '$msgdate', '$msgtime', '".$_SESSION['SESS_ADMIN_ID']."', '$touser', '$msg', 'unread', 'read', 'msg', '$msgid')");
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
	//////////////////////////////////////////////////////////// Manage Procedure
	function ManageProcedure() {
		if(isset($_POST['SubmitProcedure'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$details = trim($_POST['details']);
			$gid = trim($_POST['gid']);
			$insert_proced = mysqli_query($conn, "INSERT INTO $message(details,type)VALUES('$details', '$gid')");
			if($insert_proced) {
				echo "<div></div><script>Swal.fire({
	  				position: 'top-end',
	  				title: 'Success',
	  				text: 'Successfully added.',
	  				icon: 'success',
	  				showConfirmButton: false,
	  				timer: 2000
	  				}).then(function() {
						window.location = 'grade-details?level=$gid';
					});
				</script>";
			}
			else {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Adding failed',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
					}
					});
				</script>";
			}
			mysqli_close($conn);
		}
		else if(isset($_POST['UpdateProcedure'])) {
			include("db_connect.php");
			date_default_timezone_set("Asia/Manila");
			$details = trim($_POST['details']);
			$gid = trim($_POST['gid']);
			$update_proced = mysqli_query($conn, "UPDATE $message SET details='$details' WHERE type='$gid'");
			if($update_proced) {
				echo "<div></div><script>Swal.fire({
		  			position: 'top-end',
		  			title: 'Success.',
		  			text: 'Successfully updated.',
		  			icon: 'success',
		  			showConfirmButton: false,
		  			timer: 2000
		  			}).then(function() {
						window.location = 'grade-details?level=$gid';
					});
				</script>";
			}
			else {
				echo "<div></div><script>
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Update failed',
					footer: '',
					showCloseButton: true
					}).then(function (result) {
					if (result.value) {
					window.history.back();
					}
					});
				</script>";
			}
			mysqli_close($conn);
		}
	}
?>