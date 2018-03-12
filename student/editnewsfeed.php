<?php

	include_once("../dbcon.php");
	session_start();
	if(!isset($_SESSION['uname'])) {
		header("location:../index.php");
	}
	else {
		$id=$_SESSION['uname'];
		
		$query = "SELECT * FROM `student` WHERE `id`='$id'";
		$run = mysqli_query($con,$query);
		
		$data_stu = mysqli_fetch_assoc($run);
		
		$roll = $data_stu['roll'];
		
		$query = "SELECT * FROM `newsfeed` WHERE `roll`='$roll'";
		$run = mysqli_query($con,$query);
	}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Student Management System</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<div class="admintitle">
			<h3><a href="studentdash.php" style="float:right; margin-right:30px; color:#fff;">Student Newsfeed</a></h3>
			<h1 align="center">Delete Status</h1>
		</div>
		
		<table border="4" align="center" style="margin-top:40px; width:70%;">
		<?php
			while($data=mysqli_fetch_assoc($run)) {
		?>
				<tr>
					<td><?php echo $data['id'];?></td>
					<td><?php echo $data['name'];?></td>
					<td><?php echo $data['status'];?></td>
					<td><a href="deletestatus.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
				</tr>
		<?php
			}
		?>
		</table>
	</body>
</html>
