<?php
//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_FACULTY_ID']) || (trim($_SESSION['SESS_FACULTY_ID']) == '')) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    				window.alert('Page not found.')
    				window.location.href='../cnhsadmin';
    				</SCRIPT>");
		exit();
	}
?>