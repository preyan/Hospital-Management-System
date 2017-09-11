<?php
	
	$con=mysql_connect("localhost","root","");
	if(!$con)
	{
		die('Database Connection Failed !'. mysql_error());
	}
	mysql_select_db("hospital", $con) or die( mysql_error() );

	
?>