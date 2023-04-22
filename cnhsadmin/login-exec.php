<?php
	session_start();
	include("db_connect.php");
	$errmsg_arr = array();
	$errflag = false;
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		//return mysql_real_escape_string($str);
	}
	$login = $_POST['usern'];
	$password = $_POST['passw'];
	if($login == '') {
		echo "<script>alert('Username is Empty!'); window.history.back();</script>";
		exit();
		//$errmsg_arr[] = 'Login ID missing';
		//$errflag = true;
	}
	if($password == '') {
		echo "<script>alert('Password id Empty!'); window.history.back();</script>";
		exit();
		//$errmsg_arr[] = 'Password missing';
		//$errflag = true;
	}
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		echo "<script>alert('Erro Login! Try Again Later'); window.history.back();</script>";
		exit();
	}
	$qry=mysqli_query($conn, "SELECT * FROM $admin WHERE usern='$login' AND passw='$password'");
	//$result=mysql_query($qry);
	if($qry) 
	{
		if(mysqli_num_rows($qry)>0) 
		{
			session_regenerate_id();
			$admin = mysqli_fetch_assoc($qry);
			$acc_in=$_SESSION['SESS_ADMIN_ID'] = $admin['admID'];
			$acc_user=$_SESSION['SESS_ADMIN_LOGIN'] = $admin['usern'];
			$acc_pass=$_SESSION['SESS_ADMIN_PASSWD'] = $admin['passw'];
			session_write_close();
			//mysqli_query($conn, "update $tbl_admin set status='1' where aID='$acc_in'");
			header("location:dashboard");
			exit();
		}
		else
		{
			$qry2=mysqli_query($conn, "SELECT * FROM $faculty WHERE email='$login' AND password='$password'");
			//$result=mysql_query($qry);
			if($qry2) 
			{
				if(mysqli_num_rows($qry2)>0) 
				{
					session_regenerate_id();
					$fclty = mysqli_fetch_assoc($qry2);
					$acc_in=$_SESSION['SESS_FACULTY_ID'] = $fclty['facode'];
					$acc_user=$_SESSION['SESS_FACULTY_LOGIN'] = $fclty['email'];
					$acc_pass=$_SESSION['SESS_FACULTY_PASSWD'] = $fclty['password'];
					session_write_close();
					//mysqli_query($conn, "update $tbl_admin set status='1' where aID='$acc_in'");
					header("location:../faculty/dashboard");
					exit();
				}
				else
				{
					$qry3=mysqli_query($conn, "SELECT * FROM $registrar WHERE email='$login' AND password='$password'");
					//$result=mysql_query($qry);
					if($qry3) 
					{
						if(mysqli_num_rows($qry3)>0) 
						{
							session_regenerate_id();
							$rgstr = mysqli_fetch_assoc($qry3);
							$reg_in=$_SESSION['SESS_REGISTRAR_ID'] = $rgstr['regcode'];
							$reg_user=$_SESSION['SESS_REGISTRAR_LOGIN'] = $rgstr['email'];
							$reg_pass=$_SESSION['SESS_REGISTRAR_PASSWD'] = $rgstr['password'];
							session_write_close();
							//mysqli_query($conn, "update $tbl_admin set status='1' where aID='$acc_in'");
							header("location:../registrar/dashboard");
							exit();
						}
						else
						{
							//mysqli_query($conn, "update $tbl_admin set status='0' where usern='$login' and passw='$password'");
							echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
							echo "<div></div><script>
				                Swal.fire({
				                    icon: 'error',
				                    title: 'Error',
				                    text: 'Invalid Login.',
				                    footer: '',
				                    showCloseButton: true
				                    }).then(function (result) {
				                    if (result.value) {
				                        window.location = 'index';
				                    }
				                });
				            </script>";
							exit();
						}
					}
					else {
						//mysqli_query($conn, "update $tbl_admin set status='0' where usern='$login' and passw='$password'");
						echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
						echo "<div></div><script>
			                Swal.fire({
			                    icon: 'error',
			                    title: 'Error',
			                    text: 'Invalid Login.',
			                    footer: '',
			                    showCloseButton: true
			                    }).then(function (result) {
			                    if (result.value) {
			                        window.location = 'index';
			                    }
			                });
			            </script>";
						exit();
					}
				}
			}
		}
	}
	else 
	{
		//mysqli_query($conn, "update $tbl_admin set status='0' where usern='$login' and passw='$password");
		echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
		echo "<div></div><script>
            Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'Username or Password not found.',
            footer: '',
            showCloseButton: true
            }).then(function (result) {
            if (result.value) {
                window.location = 'index';
            }
            });
        </script>";
		exit();
	}
	mysqli_close($conn);
?>