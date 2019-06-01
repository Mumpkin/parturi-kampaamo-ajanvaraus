<?php
	include "includer.php";

	$name=$_POST["name"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$pwd1=$_POST["pwd1"];
	$pwd2=$_POST["pwd2"];

	if($pwd1===$pwd2){
		$hash=crypt($pwd1,"nowthisissalt");
		$sql="INSERT INTO users(name, email, phone, password) VALUES('$name', '$email', '$phone', '$hash')";

		if($connect->query($sql)===true){
			echo "<div class='error'>Register successful.</div>";
			header("refresh:2;url=../home.php");
		}
		else{
			echo $connect->error;
		}
	}
	else{
		echo "<div class='error'>The information you tried to enter does not match.</div>";
		header("refresh:2;url=../index.php");
	}
?>
