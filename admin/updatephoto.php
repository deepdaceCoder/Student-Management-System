<?php

	include_once("../dbcon.php");
	session_start();
	if(!isset($_SESSION['uid'])) {
		header("location:../adminlogin.php");
	}
	else {
		$id=$_SESSION['uid'];
		$sid = $_GET['sid'];
		
		$query = "SELECT * FROM `student` WHERE `id`='$sid'";
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
			<h3><a href="updateform.php?sid=<?php echo $data['id']; ?>" style="float:right; margin-right:30px; color:#fff;">Update Student</a></h3>
			<h3><a href="admindash.php" style="float:right; margin-right:30px; color:#fff;">Admin Dashboard</a></h3>
			<h1 align="center">Update Photo</h1>
		</div>
		
		<form method="post" enctype="multipart/form-data">
			<table border="1" align="center" style="width:70%; margin-top:40px;">
				<tr>
					<td><img src="../dataimg/<?php echo $data['image'];?>" style="width:200px;"></td>
					<td><input type="file" name="image"/></td>
					<td><input type="submit" name="update" value="Update" style="font-size:25px;"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['update'])) {
		$imagename = $_FILES['image']['name'];
		$tmpimgname = $_FILES['image']['tmp_name'];
		
		move_uploaded_file($tmpimgname,"../dataimg/$imagename");
		
		$query = "UPDATE `student` SET `image`='$imagename' WHERE `id`='$sid'";
		$run = mysqli_query($con,$query);
		
		if($run==TRUE){
			?>
			<script>
				alert('Data Updated Succesfully');
				window.open('updatephoto.php?sid=<?php echo $sid;?>');
			</script>
			<?php
		}
	}
?>
