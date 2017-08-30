<?php
include('conn.php');
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
			<td>USER-ID :</td><td><input type="text" name="f_userid"></td>
		</tr>
		<tr>
			<td>PASSWORD :</td><td><input type="password" name="f_pass"></td>
		</tr>
		<tr>
			<td align="center"><input type="reset" value="Reset"></td>
			<td align="center"><input type="submit" name="loginbtn" value="Login"></td>
		</tr>
		<th><?php echo $error; ?></th>
	</table>
	</form>
</div>
</body>
</html>

<?php
if(isset($_POST['loginbtn']))
{
	$result=mysql_query("SELECT * FROM staff WHERE id = '".$_POST['f_userid']."' AND pass = '".$_POST['f_pass']."'");
	$n=mysql_num_rows($result);
	if($n==1)
	{
		header('location:home1.php');
	}
	else
	{
		$error = "Your User-Id or Password is invalid !";
	}
}
?>
