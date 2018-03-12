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
			<h1 align="center">Update Profile</h1>
		</div>
		
		<form method="post" enctype="multipart/form-data">
			<table border="1" align="center" style="width:70%; margin-top:40px;">
				<tr>
					<th>Enrollment no. </th>
					<td><input type="text" name="roll" required="required" value="<?php echo $data['roll']; ?>"/></td>
				</tr>
				
				<tr>
					<th>Name </th>
					<td><input type="text" name="name" required="required" value="<?php echo $data['name']; ?>"/></td>
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
					<td><input type="number" name="sem" required="required" value="<?php echo $data['sem']; ?>"/></td>
				</tr>
				
				<tr>
					<th>Email id </th>
					<td><input type="text" name="email" required="required" value="<?php echo $data['email']; ?>"/></td>
				</tr>
				
				<tr>
					<th>Phone </th>
					<td><input type="text" name="phone" required="required" value="<?php echo $data['phone']; ?>"/></td>
				</tr>
				
				<tr>
					<td colspan="2" align="center"><a href="updatephoto.php">Change Photo</a></td>
				</tr>
				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="update" value="Update" style="font-size:25px;"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
	
	if(isset($_POST['update'])) {
		$roll = $_POST['roll'];
		$name = $_POST['name'];
		$branch = $_POST['branch'];
		$sem = $_POST['sem'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		
		$query_update = "UPDATE `student` SET `roll`='$roll',`name`='$name',`branch`='$branch',`sem`='$sem',`email`='$email', `phone`='$phone' WHERE `id`='$id'";
		$run = mysqli_query($con,$query_update);
		
		if($run==TRUE){
			?>
			<script>
				alert('Data Updated Succesfully');
			</script>
			<?php
		}
	}
?>