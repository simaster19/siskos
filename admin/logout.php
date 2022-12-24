<?php  

	





	session_start();

	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['nama']);
	session_unset();

	session_destroy();

	header("Location:form_login.php");

?>