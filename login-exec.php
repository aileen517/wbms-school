<?php
	session_start();
	include("cnhsadmin/db_connect.php");
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
	$qry=mysqli_query($conn, "SELECT * FROM $student WHERE semail='$login' AND password='$password'");
	//$result=mysql_query($qry);
	if($qry) 
	{
		if(mysqli_num_rows($qry)>0) 
		{
			session_regenerate_id();
			$student = mysqli_fetch_assoc($qry);
			$acc_in=$_SESSION['SESS_STUDENT_LRN'] = $student['lrnno'];
			$acc_user=$_SESSION['SESS_STUDENT_LOGIN'] = $student['semail'];
			$acc_pass=$_SESSION['SESS_STUDENT_PASSWD'] = $student['password'];
			session_write_close();
			//mysqli_query($conn, "update $tbl_admin set status='1' where aID='$acc_in'");
			header("location:parents/dashboard");
			exit();
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
			         window.location = 'login';
			     }
			     });
			 </script>";
			exit();
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
                window.location = 'login';
            }
            });
        </script>";
		exit();
	}
	mysqli_close($conn);
?>