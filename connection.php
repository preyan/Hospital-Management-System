<?php
	
	$con = mysqli_connect('localhost','root','','hospital');
	if(!$con)
	{
		die('Database Connection Failed !'.mysqli_error($con));
	}
?>