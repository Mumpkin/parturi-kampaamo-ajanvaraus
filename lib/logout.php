<?php
	if(isset($_SESSION["sessionid"])){
		$_SESSION = array();
		session_destroy();
	}
	header("location:../index.php");
?>
