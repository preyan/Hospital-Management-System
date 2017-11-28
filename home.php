<!--PHP-->

<?php
session_start();

include('connection.php');

$_SESSION['fromMain'] = 'false';				//_____PREVENT DIRECT ACCESS______//	

if(isset($_POST) & !empty($_POST))
{
	$username=mysql_real_escape_string($_POST['username'],$con);
	$pass=$_POST['password'];

	$sql="SELECT * from staff WHERE username='$username' AND password='$pass'";

	$result=mysql_query($sql,$con);

	$row=mysql_num_rows($result);
	if($row==1)
	{
		$_SESSION['username']=$username;
		$_SESSION['fromMain'] = 'true';
		header('location:home1.php');

	}
	else
	{
		$err_msg= "Invalid username or password !";
	}
}
if(isset($_SESSION['username']))
{
	$log_msg= "User already logged in !";
}
?>


<!--HTML-->
<!doctype html>
<html>
<head>
<title>M. K. GHOSH HOSPITAL</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<header>
		M. K. GHOSH HOSPITAL
	</header>
	<nav>
		<ul>
			<li><a class="active" href="home.php">LOGIN</a></li>
		 	<li><a href="register.php">REGISTER</a></li>
		</ul>
	</nav>
	<form  action="" method="post">
	<table id="login">
		<th colspan="2">
			<h2>STAFF LOGIN</h2>
		<th>
		<tr>
			<td>USERNAME :</td><td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>PASSWORD :</td><td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan ="2" align="center"><input type="reset" value="Reset"> &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" value="Login"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<?php if(isset($err_msg)){ echo $err_msg; }?>
				<?php if(isset($log_msg)){ header('location: home1.php'); }?>
			</td>
		</tr>
	</table>
	
	</form>


</div>
</body>
</html>
