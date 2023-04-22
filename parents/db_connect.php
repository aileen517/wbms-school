<?php
	$host="localhost";
	$user="root";
	$pass="";
	$conn=mysqli_connect("$host", "$user", "$pass");
	//$conn=mysqli_connect('$host', '$user', '$pass');
	if(!$conn)
	{
		die("Could not connect to server!");
	}
	$db="cnhsdb";
	$conn_db=mysqli_select_db($conn, "$db");
	if(!$conn_db)
	{
		die("Could not select database!");
	}
	$admin = "tbl_admin";
	$message = "tbl_message";
	$gradelevel = "tbl_grade_level";
	$schoolyear = "tbl_school_year";
	$section = "tbl_section";
	$subject = "tbl_subject";
	$faculty = "tbl_faculty";
	$student = "tbl_students";
	$schedule = "tbl_schedule";
	$payment = "tbl_payment";
	$grades = "tbl_grades";
	$temp = "tbl_temp_enrollment";
	$history = "tbl_history";
	$about = "tbl_about";
	$registrar = "tbl_registrar";
	$chatbx = "tbl_chatbox";
	$req = "tbl_requirements";
	$rank = "tbl_rank";
?>