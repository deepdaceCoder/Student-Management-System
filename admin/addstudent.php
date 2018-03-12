<?php

	include_once("../dbcon.php");
	session_start();
	if(!isset($_SESSION['uid'])) {
		header("location:../adminlogin.php");
	}
	else {
		$id=$_SESSION['uid'];
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
			<h3><a href="../logout.php" style="float:right; margin-right:30px; color:#fff;">Log Out</a></h3>
			<h3><a href="admindash.php" style="float:right; margin-right:30px; color:#fff;">Admin Dashboard</a></h3>
			<h1 align="center">Add Student</h1>
		</div>
		
		<form method="post" enctype="multipart/form-data">
			<table border="1" align="center" style="width:70%; margin-top:40px;">
				<tr>
					<th>Enrollment no. </th>
					<td><input type="text" name="roll" required="required" placeholder="Enter enrollment number"/></td>
				</tr>
				
				<tr>
					<th>Name </th>
					<td><input type="text" name="name" required="required" placeholder="Enter Name"/></td>
				</tr>
				
				<tr>
					<th>Branch </th>
					<td>
						<select name="branch" required="required">
							<option value="ME">Mech</option>
							<option value="CSE">CSE</option>
							<option value="EEE">Electrical</option>
							<option value="ECE">Electronics</option>
							<option value="EIE">Instrumention</option>
							<option value="CE">Civil</option>
							<option value="CHE">Chemical</option>
							<option value="BE">Bio</option>
							<option value="PE">Production</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<th>Semester </th>
					<td><input type="number" name="sem" required="required" placeholder="Enter Semester Number"/></td>
				</tr>
				
				<tr>
					<th>Email id </th>
					<td><input type="text" name="email" required="required" placeholder="Enter email id"/></td>
				</tr>
				
				<tr>
					<th>Password </th>
					<td><input type="password" name="password" required="required" placeholder="Enter Password"/></td>
				</tr>
				
				<tr>
					<th>Phone </th>
					<td><input type="text" name="phone" required="required" placeholder="Enter phone number"/></td>
				</tr>
				
				<tr>
					<th>Image </th>
					<td><input type="file" name="image"/></td>
				</tr>
				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="add" value="Add" style="font-size:25px;"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['add'])) {
		$roll = $_POST['roll'];
		$name = $_POST['name'];
		$branch = $_POST['branch'];
		$sem = $_POST['sem'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$imagename = $_FILES['image']['name'];
		$tmpimgname = $_FILES['image']['tmp_name'];
		
		move_uploaded_file($tmpimgname,"../dataimg/$imagename");
		
		$query = "INSERT INTO `student`(`roll`, `name`, `branch`, `sem`, `email`, `password`, `phone`, `image`) VALUES ('$roll','$name','$branch','$sem','$email','$password','$phone','$imagename')";
		$run = mysqli_query($con,$query);
		
		if($run==TRUE)
			echo "<h2 align='center'>Student Data Added</h2>";
		else
			echo "<h2 align='center'>Error occured!!</h2>";
	}
?>