<?php

	include_once("../dbcon.php");
	session_start();
	if(!isset($_SESSION['uname'])) {
		header("location:../index.php");
	}
	else {
		$id=$_SESSION['uname'];
		$sid = $_GET['sid'];
		
		$query = "DELETE FROM `newsfeed` WHERE `id`='$sid'";
		$run = mysqli_query($con,$query);
		
		if($run==TRUE)
			header("location:editnewsfeed.php");
		else
			echo "<h1 align='center'><a href='deletestudent.php'>Error deleting!!</a></h1>";
	}
?>