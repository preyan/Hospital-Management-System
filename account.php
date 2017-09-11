<?php
session_start();

include('connection.php');


/*if(isset($_SESSION['fromMain']) && ($_SESSION['fromMain'] !== 'true'))			//_____PREVENT DIRECT ACCESS______	
{
	header('location:logout.php');
}*/

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
		M. K. GHOSH HOSPITAL
	</header>
	<nav>
		<ul>
		  <li><a href="home1.php">BILLING</a></li>
		  <li><a class= "active" href="account.php">ACCOUNTS</a></li>
		  <li id="logout"><b><a href="logout.php">LOGOUT</a></b></li>
		  <li id="loggedin"><a>Logged in as : <u><?php echo $_SESSION['username'];?></u></a></li>
		</ul>
	</nav>
	<form method="post" action="search_package.php">
	<table id="acc" align="center" cellpadding="7">
		<td>SEARCH BY PACKAGE :</td>
            <td>
                <select style="font-size:18px; font-family:arial;" name="package">
                <option>Select Package</option>
                    <option value="Package 1" >Package 1</option>
                    <option value="Package 2" >Package 2</option>
                    <option value="Package 3" >Package 3</option>
                    <option value="Package 4" >Package 4</option>
                </select>
            </td>
            <td><input type="submit" name="search_package" value="SEARCH"></input></td>
	</table>
	
</body>
</html>
<?php
if(isset($_POST['search_package']))
{
	$_SESSION['var'] = $_POST['package'];
	echo $_SESSION['var'];
	header('location:search_package.php');
}
?>