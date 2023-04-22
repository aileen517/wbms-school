<?php
//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_ADMIN_ID']) || (trim($_SESSION['SESS_ADMIN_ID']) == '')) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    				window.alert('Page not found.')
    				window.location.href='index';
    				</SCRIPT>");
		exit();
	}
?>