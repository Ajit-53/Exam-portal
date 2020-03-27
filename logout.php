<?php
	session_start();
	if(isset($_SESSION['roll'])){
		setcookie('roll','',time()-1000,'/');
		session_destroy();
	}
	header("location: home.php");
?>