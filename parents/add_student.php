<script src="dist/js/sweetalert2.js"></script>
<?php
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
							$q_level = mysqli_query($conn, "SELECT * FROM $gradelevel WHERE glID='".$row_prev['glevel']."'");
							if(mysqli_num_rows($q_level)<1) {
								echo "<div></div><script>Swal.fire({
									position: 'top-end',
									icon: 'error',
									title: 'Error',
									text: 'Error on grade level settings',
									showConfirmButton: false,
									timer: 3000
								})</script>";
							}
							else {
								while($row_qlevel = mysqli_fetch_array($q_level))  {
									$grlevel = $row_qlevel['level']+1;
									$new_level = mysqli_query($conn, "SELECT * FROM $gradelevel WHERE level='$grlevel'");
									if(mysqli_num_rows($new_level)<1) {
										echo "<div></div><script>Swal.fire({
											position: 'top-end',
											icon: 'error',
											title: 'Error',
											text: 'Error found on grade level settings',
											showConfirmButton: false,
											timer: 3000
										})</script>";
									}
									else {
										while($row_newlevel = mysqli_fetch_array($new_level))  {
											$new_levelid = $row_newlevel['glID'];
											$insert_old = mysqli_query($conn, "INSERT INTO $history(syear,lrnno,glevel,section,gpa,method,lyear,scname,scid,scaddr)VALUES('$styear', '$lrnno', '$stlevel', '$stsection', '$stgpa', '$stmethod', '$stlyear', '$stscname', '$stscid', '$stscaddr')");
											if($insert_old) {
												$update_student = mysqli_query($conn, "UPDATE $student SET glevel='$new_levelid', section='$secname', syear='$syear1', lyear='".$row_prev['syear']."', gpa='$gpano', scname='$scname', scid='$scid', scaddr='$scaddr', method='$dlearning' WHERE lrnno='$lrnno'");
												if($update_student) {
													mysqli_query($conn, "UPDATE $section SET limitavail=limitavail-'1' WHERE secID='$secname'");
										    		echo "<div></div><script>Swal.fire({
										  				position: 'top-end',
										  				icon: 'success',
										  				title: 'Success',
										  				text: 'New Student was successfully added',
										  				showConfirmButton: false,
										  				timer: 3000
													})</script>";
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
								}
							}
						}
					}
					else {
						$insert_student = mysqli_query($conn, "INSERT INTO $student(dentry,stcode,syear,glevel,etype,psano,lrnno,gpa,section,sfname,slname, mname,dbirth,gender,indigent,ind_details,mtongue,cpno,semail,staddr,zcode,faname,moname,pacon,lyear,scname,scid,scaddr,method,certify,status,remarks)VALUES('$datenow', '$user_code', '$syear1', '$glevel', '$etype', '$psano', '$lrnno', '$gpano', '$secname', '$fname', '$lname', '$mname', '$bdate', '$gender', '$pppp', '$ipconf', '$mton', '$cpnum', '$email', '$addr', '$zip', '$faname', '$moname', '$mnum', '$lyear', '$scname', '$scid', '$scaddr', '$dlearning', '$agree', 'active', 'accepted')");
				    	if($insert_student) {
				    		mysqli_query($conn, "UPDATE $section SET limitavail=limitavail-'1' WHERE secID='$secname'");
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
	    mysqli_close($conn);
	}
?>