<?php

	include_once("dbcon.php");
	session_start();
	if($con==FALSE) {
		echo "Connection error";
		exit();
	}

?>

<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Homepage</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<div class="admintitle">
			<h1 align="center">Welcome to Student Management System</h1>
		</div>
		
		<h3 align="right" style="margin-right:20px;"><a href="adminlogin.php">Admin Login</a></h3>
		<h1 align="center" style="margin-right:20px;">Student Login</h3>
		
		<form method="post">
			<table align="center">
				<tr>
					<td>Enrollment No. </td>
					<td><input type="text" name="roll" required="required"/></td>
				</tr>
				
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" required="required"/></td>
				</tr>
				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['submit'])) {
		$query = "SELECT * FROM `student`";
		$run = mysqli_query($con,$query);
		
		if($run==TRUE) {
			while($data=mysqli_fetch_assoc($run)) {
				if($data['roll']==$_POST['roll'] && $data['password']==$_POST['password']) {
					$_SESSION['uname'] = $data['id'];
					header("location:student/studentdash.php");
					exit();
				}
				else {
					echo "<h1 align='center'>Username or password incorrect!!</h1>";
				}
			}
		}
	}
?>