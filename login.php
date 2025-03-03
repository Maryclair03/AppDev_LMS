<?php
	require_once'class.php';
	session_start();
	
	if(ISSET($_POST['login'])){
	
		$db=new db_class();
		$username=$_POST['username'];
		$password=$_POST['password'];
		$get_id=$db->login($username, $password);
		
		if($get_id['count'] > 0){
			
			$_SESSION['user_id']=$get_id['user_id'];
			unset($_SESSION['message']);
			echo"<script>alert('Login Successful')</script>";
			echo"<script>window.location='home.php'</script>";
		}else{
			$_SESSION['message']="Invalid Username or Password";

			echo"<script>window.location='index.php'</script>";
		}
	}
	if(ISSET($_POST['login_user'])){
		$db=new db_class();
		$email=$_POST['email'];
		$ref_no=$_POST['ref_number'];
		$get_id=$db->userLogin($email, $ref_no);
		
		if($get_id['count'] > 0){
			
			$_SESSION['borrower_id']=$get_id['borrower_id'];
			unset($_SESSION['message']);
			echo"<script>alert('Login Successful')</script>";
			echo"<script>window.location='userhomepage.php'</script>";
		}else{
			$_SESSION['message']="Invalid Username or Password";

			echo"<script>window.location='user_login.php'</script>";
		}
	}
?>