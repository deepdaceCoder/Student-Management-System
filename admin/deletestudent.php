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
			<h1 align="center">Delete Student Details</h1>
		</div>
		
		<form method="post">
			<table align="center" style="margin-top:40px;">
				<tr>
					<th>Enrollment no. </th>
					<td><input type="text" name="roll" placeholder="Enter enrollment number"/></td>
					
					<th>Name </th>
					<td><input type="text" name="name" placeholder="Enter name"/></td>
					
					<th>Branch </th>
					<td>
						<select name="branch">
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
						
					<th>Semester </th>
					<td><input type="number" name="sem" placeholder="Enter Semester Number"/></td>
					
					<td align="center"><input type="submit" name="search" value="Search"/></td>
					
				</tr>
			</table>
		</form>
		
		<table border="4" align="center" style="margin-top:40px; width:70%;">
			<tr>
				<th>ID</th>
				<th>Enrollment no. </th>
				<th>Name</th>
				<th>Branch</th>
				<th>Semester</th>
				<th>Email id</th>
				<th>Password</th>
				<th>Phone</th>
				<th>Edit</th>
			</tr>
		<?php
			if(isset($_POST['search'])) {
				$roll = $_POST['roll'];
				$name = $_POST['name'];
				$branch = $_POST['branch'];
				$sem = $_POST['sem'];
				
				$query = "SELECT * FROM `student` WHERE `roll`='$roll' OR `name`='$name' OR `branch`='$branch' OR `sem`='$sem'";
				$run = mysqli_query($con,$query);
				
				if(mysqli_num_rows($run)<1) {
					echo "<tr><td colspan='8'>No records found!!</td></tr>";
				}
				else {
					while($data=mysqli_fetch_assoc($run)){
						?>
						<tr>
							<td><?php echo $data['id'];?></td>
							<td><?php echo $data['roll'];?></td>
							<td><?php echo $data['name'];?></td>
							<td><?php echo $data['branch'];?></td>
							<td><?php echo $data['sem'];?></td>
							<td><?php echo $data['email'];?></td>
							<td><?php echo $data['password'];?></td>
							<td><?php echo $data['phone'];?></td>
							<td><a href="deleteform.php?sid=<?php echo $data['id']; ?>&roll=<?php echo $data['roll']?>">Delete</a></td>
						</tr>
						<?php
					}
				}
			}
		?>
		</table>
	</body>
</html>
