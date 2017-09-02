<?php
session_start();

require_once('connection.php');

$_SESSION['fromMain'] = "false";				//_____PREVENT DIRECT ACCESS______		


if(isset($_POST) & !empty($_POST))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$pass=$_POST['password'];

	$sql="SELECT * from staff WHERE username='$username' AND password='$pass'";

	$result=mysqli_query($con,$sql);

	$row=mysqli_num_rows($result);
	if($row==1)
	{
		$_SESSION['username']=$username;
		$_SESSION['fromMain'] = "true";
		header('location:home1.php');

	}
	else
	{
		include('logout.php');
		echo "Invalid username or password";
	}
}
if(isset($_SESSION['username']))
{
	echo "User already logged in !";
}
?>




<html>
<head>
<title>M.K.Ghosh Hospital</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<header>
		M. K. GHOSH HOSPITAL
	</header>
	<nav>
		<ul>
		  <li><a href="#home">HOME</a></li>
		  <li><a href="#packages">PACKAGES</a></li>
		  <li id="admin"><a href="#admin">ADMIN</a></li>
		</ul>
	</nav>
	<form  action="" method="post">
	<table id="login">
		<tr>
			<td>USERNAME :</td><td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>PASSWORD :</td><td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td align="center"><input type="reset" value="Reset"></td>
			<td align="center"><input type="submit" value="Login"></td>
		</tr>
	</table>
	<!-- <div id="alrt" role="alert"></div> -->
	</form>
</div>
</body>
</html>
