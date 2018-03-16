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
			<h3><a href="cadmin.php" style="float:right; margin-right:30px; color:#fff;">Change Password</a></h3>
			<h1 align="center">Welcome to Admin Dashboard</h1>
		</div>
		
		<div class="dashboard">
			<table border="1" align="center" style="width:50%; margin-top:40px;">
				<tr>
					<td>1. </td>
					<td><a href="addstudent.php" style="font-size:25px;">Insert Student Details</a></td>
				</tr>
				
				<tr>
					<td>2. </td>
					<td><a href="updatestudent.php" style="font-size:25px;">Update Student Details</a></td>
				</tr>
				
				<tr>
					<td>3. </td>
					<td><a href="deletestudent.php" style="font-size:25px;">Delete Student Details</a></td>
				</tr>
			</table>
		</div>
		
		<form method="post">
		<table style="width:50%;" align="center" border="1">
			<tr>
				<td colspan="2" align="center"><h2>Student Information</h2></td>
			</tr>
			
			<tr>
				<td>Choose branch</td>
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
			</tr>
			
			<tr>
				<td>Choose sem</td>
				<td>
					<select name="sem">
						<option value=1>1st</option>
						<option value=2>2nd</option>
						<option value=3>3rd</option>
						<option value=4>4th</option>
						<option value=5>5th</option>
						<option value=6>6th</option>
						<option value=7>7th</option>
						<option value=8>8th</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>Enter enrollment no</td>
				<td><input type="text" name="roll" required="required"></td>
			</tr>
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
		</form>
		
		<?php
			if(isset($_POST['submit'])) {
				$roll = $_POST['roll'];
				$branch = $_POST['branch'];
				$sem = $_POST['sem'];
				
				$query = "SELECT * FROM `student` WHERE `roll`='$roll' AND `branch`='$branch' AND `sem`='$sem'";
				$run = mysqli_query($con,$query);
				
				if(mysqli_num_rows($run)<1) {
					echo "<tr><td colspan='9'>No records found!!</td></tr>";
				}
				else {
					while($data=mysqli_fetch_assoc($run)){
						?>
						<table border="4" align="center" style="margin-top:40px; width:70%;">
						<tr>
							<th colspan="3">Student Details</th>
						</tr>
						
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
							<th>Password</th>
							<td><?php echo $data['password'];?></td>
						</tr>
						
						<tr>
							<th>Phone</th>
							<td><?php echo $data['phone'];?></td>
						</tr>
						</table>
						<?php
					}
				}
			}
		?>
	</body>
</html>
