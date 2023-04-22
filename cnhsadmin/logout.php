<?php
	//Start session
	session_start();
	if(isset($_SESSION['SESS_ADMIN_ID']))
	{
		$aid=$_SESSION['SESS_ADMIN_ID'];
		include("db_connect.php");
		//mysqli_query($conn, "update $tbl_admin set status='0' where aID='$aid'") or die("not update");
		//Unset the variables stored in session
		unset($_SESSION['SESS_ADMIN_ID']);
		unset($_SESSION['SESS_ADMIN_LOGIN']);
		unset($_SESSION['SESS_ADMIN_PASSWD']);
		echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
";
		echo "<div></div><script>
	                    Swal.fire({
	                        icon: 'success',
	                        title: 'Success',
	                        text: 'You have successfully logout',
	                        footer: '',
	                        showCloseButton: true
	                    }).then(function (result) {
	                        if (result.value) {
	                            window.location = 'index';
	                        }
	                    });
	                </script>";
	}
	else
	{
	    echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
";
		echo "<div></div><script>
	                    Swal.fire({
	                        icon: 'warning',
	                        title: 'Invalid',
	                        text: 'Please provide your login details.',
	                        footer: '',
	                        showCloseButton: true
	                    }).then(function (result) {
	                        if (result.value) {
	                            window.location = 'index';
	                        }
	                    });
	                </script>";
	}
	
?>