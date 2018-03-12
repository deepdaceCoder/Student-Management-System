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
			<h1 align="center">Change Password</h1>
		</div>
		
		<form method="post">
			<table border="1" align="center" style="width:70%; margin-top:40px;">
				<tr>
					<th>Enrollment no. </th>
					<td><input type="text" name="roll" required="required" value="<?php echo $data['roll']; ?>"/></td>
				</tr>
				
				<tr>
					<th>Old Password </th>
					<td><input type="password" name="old_password" required="required"/></td>
				</tr>
				
				<tr>
					<th>New Password </th>
					<td><input type="password" name="new_password" required="required"/></td>
				</tr>
				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="change" value="Change Password"/></td>
				</tr>
			</table>
		</form>
		
	</body>
</html>

<?php
	if(isset($_POST['change'])) {
		
		$roll = $_POST['roll'];
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		
		if($roll==$data['roll'] && $old_password==$data['password']) {
			$cquery = "UPDATE `student` SET `password`='$new_password' WHERE `id`='$id'";
			$run1 = mysqli_query($con,$cquery);
			
			if($run1==TRUE)
				echo "<h1 align='center'>Password change succesful!!</h1>";
			else
			echo "<h1 align='center'>Database update error!!</h1>";
		}
		else
			echo "<h1 align='center'>Username or password incorrect!!</h1>";
	}
?>