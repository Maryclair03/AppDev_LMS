<?php
	session_start();
	
	if(!($_SESSION['borrower_id'])){
		header('location:user_login.php');
	}
	
?>