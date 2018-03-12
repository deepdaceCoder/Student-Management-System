<?php
	include_once("../dbcon.php");
	
	$query = "SELECT * FROM `newsfeed`";
	$run = mysqli_query($con,$query);
		
	if($run==TRUE) {	
	?>
	<table border="10" width="60%" align="center">
		
	<?php
		while($data = mysqli_fetch_assoc($run)){
	?>
		<tr>
			<td><?php echo $data['id'];?></td>
			<td><?php echo $data['name'];?></td>
			<td><?php echo $data['status'];?></td>
		</tr>
	<?php
		}
	?>
	</table>
	<?php
	}
?>