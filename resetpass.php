<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if(isset($_GET['passw'])) 
{
	$passw = $_GET['passw'];
	$email = $_GET['email'];
	$lrn = $_GET['lrnno'];
	include("cnhsadmin/db_connect.php");
	$query3 = mysqli_query($conn,"UPDATE $student SET password='$passw' WHERE semail='$email' AND lrnno='$lrn'")
or die(mysqli_error($conn));
	if ($query3) 
	{
		echo "<div></div><script>
			Swal.fire({
			icon: 'success',
			title: 'Success',
			text: 'Your account is now successfully updated.',
			footer: '',
			showCloseButton: true
			}).then(function (result) {
			if (result.value) {
			window.location = 'login';
			}
			});
		</script>";
	} 
	else
	{
		echo "<div></div><script>
			Swal.fire({
			icon: 'error',
			title: 'Error',
			text: 'Your account failed to update.',
			footer: '',
			showCloseButton: true
			}).then(function (result) {
			if (result.value) {
			window.location = 'login';
			}
			});
		</script>";
	}
	mysqli_close($conn);
}
?>