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
			<h3><a href="cstudent.php" style="float:right; margin-right:30px; color:#fff;">Change Password</a></h3>
			<h3><a href="viewprofile.php" style="float:right; margin-right:30px; color:#fff;">View Profile</a></h3>
			<h1 align="center">Student Newsfeed</h1>
		</div>
		<div class="dashboard">
			<form method="post">
				<table border="1" width="40%" align="center">
					<tr>
						<td><textarea name="status" placeholder="Write something here"></textarea></td>
						<td><input type="submit" name="send" value="Post"/></td>
						<td><a href="editnewsfeed.php">Delete previous posts</a></td>
					</tr>
				</table>
			</form>
		</div>
		<?php
			include_once("newsfeed.php");
		?>
	</body>
</html>

<?php

	if(isset($_POST['send'])) {
		$status = $_POST['status'];
		$roll = $data_stu['roll'];
		$name = $data_stu['name'];
		
		$query = "INSERT INTO `newsfeed`(`status`, `name`, `roll`) VALUES ('$status','$name','$roll')";
		$run = mysqli_query($con,$query);
		
		if($run==TRUE)
			header("location:studentdash.php");
		else
			echo "<h2 align='center'>Error occured!!</h2>";
	}

?>