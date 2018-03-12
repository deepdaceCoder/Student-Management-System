<?php

	include_once("../dbcon.php");
	session_start();
	if(!isset($_SESSION['uid'])) {
		header("location:../adminlogin.php");
	}
	else {
		$id=$_SESSION['uid'];
		
		$query = "SELECT * FROM `admin` WHERE `id`='$id'";
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
			<h3><a href="admindash.php" style="float:right; margin-right:30px; color:#fff;">Admin Dashboard</a></h3>
			<h1 align="center">Change Password</h1>
		</div>
		
		<form method="post" enctype="multipart/form-data">
			<table border="1" align="center" style="width:70%; margin-top:40px;">
				<tr>
					<th>Username</th>
					<td><input type="text" name="username" required="required" value="<?php echo $data['username']; ?>"/></td>
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
		
		$username = $_POST['username'];
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		
		if($username==$data['username'] && $old_password==$data['password']) {
			$cquery = "UPDATE `admin` SET `password`='$new_password' WHERE `id`='$id'";
			$run1 = mysqli_query($con,$cquery);
			
			if($run1==TRUE)
				echo "<h1 align='center'>Password change succesfull!!</h1>";
			else
			echo "<h1 align='center'>Database update error!!</h1>";
		}
		else
			echo "<h1 align='center'>Username or password incorrect!!</h1>";
	}
?>