<?php

	include_once("dbcon.php");
	session_start();
	if(isset($_SESSION['uid'])) {
		header("location:admin/admindash.php");
		exit();
	}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Admin Log In</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<div class="admintitle">
			<h1 align="center" style="margin-top=200px;">Admin Log In</h1>
		</div>
		<form method="post">
			<table align="center">
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" required="required"/></td>
				</tr>
				
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" required="required"/></td>
				</tr>
				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="login" value="Log In"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['login'])) {
		
		$query = "SELECT * FROM `admin`";
		$run = mysqli_query($con,$query);
		
		if($run==TRUE) {
			while($data=mysqli_fetch_assoc($run)) {
				if($data['username']==$_POST['username'] && $data['password']==$_POST['password']) {
					$_SESSION['uid'] = $data['id'];
					header("location:admin/admindash.php");
					exit();
				}
				else {
					echo "<h1 align='center'>Username or password incorrect!!</h1>";
				}
			}
		}
	}
?>