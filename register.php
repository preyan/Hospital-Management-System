<?php
session_start();

include('connection.php');


/*if(isset($_SESSION['fromMain']) && ($_SESSION['fromMain'] !== 'true'))			//_____PREVENT DIRECT ACCESS______	
{
	header('location:logout.php');
}*/
if(isset($_POST) & !empty($_POST))
{
	if(isset($_POST['register']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql="INSERT INTO staff (username, password)
			VALUES('".$username."','".$password."')";

			if (!mysql_query($sql))
			{
			 $error=mysql_error();
			}
			else 
			{
				$msg= "REGISTRATION SUCCESSFUL !";
			}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>BILLING</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<header>
		REGISTRATION
	</header>
	<nav>
		<ul>
			<li><a href="home.php">LOGIN</a></li>
		 	<li><a class="active" href="register.php">REGISTER</a></li>
		</ul>
	</nav>
	<form action="" method="post">
	<table id="login" align="center" cellpadding="10">
		<th colspan="2">
			<h2>STAFF REGISTRATION</h2>
		<th>
		<tr>
			<td>USERNAME :</td><td><input type="text" name="username" required></td>
		</tr>
		<tr>
			<td>PASSWORD :</td><td><input type="password" name="password" required></td>
		</tr>
			<td colspan ="2" align="center"><input type="reset" value="RESET">
				&nbsp;&nbsp;&nbsp;&nbsp; 
			<input type="submit" name="register" value="REGISTER"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<?php if(isset($error)){ echo "Error : ".$error; }  ?>
				<?php if(isset($msg)){ echo $msg; }  ?>
			</td>
		</tr>
		
	</table>

</div>

</body>
</html>

<?php

?>
