<?php


	$con=mysqli_connect("localhost","root","","project");
	if(isset($_GET['city']))
	{
		$city=$_GET['city'];

		$q="SELECT * FROM hospital WHERE city='$city'";
		$r=mysqli_query($con,$q);
		while($row=mysqli_fetch_assoc($r))
		{$w=$row['hospital_reg'];
			echo "<a href=\" rihan1.php?h_id=$w\"><li class=\"list-group-item\" >".$row['hospital_name']."</li></a>";
		}
	}
?>