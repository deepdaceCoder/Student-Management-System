<?php

	include_once("../dbcon.php");
	session_start();
	if(!isset($_SESSION['uid'])) {
		header("location:../adminlogin.php");
	}
	else {
		$id=$_SESSION['uid'];
		$sid = $_GET['sid'];
		
		$query = "DELETE FROM `student` WHERE `id`='$sid'";
		$run = mysqli_query($con,$query);
		
		if($run==TRUE)
			header("location:deletestudent.php");
		else
			echo "<h1 align='center'><a href='deletestudent.php'>Error deleting!!</a></h1>";
	}
?>