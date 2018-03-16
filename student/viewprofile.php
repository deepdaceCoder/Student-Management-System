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
		
		$data = mysqli_fetch_assoc($run);
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
			<h3><a href="updateform.php" style="float:right; margin-right:30px; color:#fff;">Update Profile</a></h3>
			<h1 align="center"><?php echo $data['name']; ?></h1>
		</div>
		
		<table border="4" align="center" style="margin-top:40px; width:70%;">
			<tr>
				<td rowspan="8"><img src="../dataimg/<?php echo $data['image'];?>" style="width:200px;"></td>
				<th>ID</th>
				<td><?php echo $data['id'];?></td>
			</tr>
						
			<tr>
				<th>Enrollment no. </th>
				<td><?php echo $data['roll'];?></td>
			</tr>
						
			<tr>
				<th>Name</th>
				<td><?php echo $data['name'];?></td>
			</tr>
						
			<tr>
				<th>Branch</th>
				<td><?php echo $data['branch'];?></td>
			</tr>
						
			<tr>
				<th>Semester</th>
				<td><?php echo $data['sem'];?></td>
			</tr>
						
			<tr>
				<th>Email id</th>
				<td><?php echo $data['email'];?></td>
			</tr>
						
			<tr>
				<th>Phone</th>
				<td><?php echo $data['phone'];?></td>
			</tr>
		</table>
	</body>
</html>
