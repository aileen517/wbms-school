<?php
	if(isset($_GET['action'])){
		include("db_connect.php");
		$action = $_GET['action'];
		if($action == 'delete_level'){
			$id = $_POST['id'];
			$output = array();
			$sql = "DELETE FROM $gradelevel WHERE glID = '$id'";
			if($conn->query($sql)){
				$output['status'] = 'success';
				$output['message'] = 'Member deleted successfully';
			}
			else{
				$output['status'] = 'error';
				$output['message'] = 'Something went wrong in deleting the member';
			}
	 		echo json_encode($output);
	 	}
	 	else if($action == 'delete_syear'){
			$syid = $_POST['id'];
			$output_c = array();
			$sy_sql = "DELETE FROM $schoolyear WHERE syID = '$syid'";
			if($conn->query($sy_sql)){
				$output_c['status'] = 'success';
				$output_c['message'] = 'Member deleted successfully';
			}
			else{
				$output_c['status'] = 'error';
				$output_c['message'] = 'Something went wrong in deleting the member';
			}
	 		echo json_encode($output_c);
	 	}
	 	else if($action == 'delete_section'){
			$secid = $_POST['id'];
			$output_e = array();
			$sec_sql = "DELETE FROM $section WHERE secID = '$secid'";
			if($conn->query($sec_sql)){
				$output_e['status'] = 'success';
				$output_e['message'] = 'Member deleted successfully';
			}
			else{
				$output_e['status'] = 'error';
				$output_e['message'] = 'Something went wrong in deleting the member';
			}
	 		echo json_encode($output_e);
	 	}
	 	else if($action == 'delete_subject'){
			$suid = $_POST['id'];
			$output_a = array();
			$subject_sql = "DELETE FROM $subject WHERE suID = '$suid'";
			if($conn->query($subject_sql)){
				$output_a['status'] = 'success';
				$output_a['message'] = 'Member deleted successfully';
			}
			else{
				$output_a['status'] = 'error';
				$output_a['message'] = 'Something went wrong in deleting the member';
			}
	 		echo json_encode($output_a);
	 	}
	 	else if($action == 'delete_faculty'){
			$facid = $_POST['id'];
			$output_a = array();
			$faculty_sql = "DELETE FROM $faculty WHERE facID = '$facid'";
			if($conn->query($faculty_sql)){
				$output_a['status'] = 'success';
				$output_a['message'] = 'Member deleted successfully';
			}
			else{
				$output_a['status'] = 'error';
				$output_a['message'] = 'Something went wrong in deleting the member';
			}
	 		echo json_encode($output_a);
	 	}
	}
?>