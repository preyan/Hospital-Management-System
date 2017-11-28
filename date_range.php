<?php
session_start();

include('connection.php');


/*if(isset($_SESSION['fromMain']) && ($_SESSION['fromMain'] !== 'true'))			//_____PREVENT DIRECT ACCESS______	
{
	header('location:logout.php');
}*/	
?>
<!--HTML-->
<!doctype html>
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
		  <li><a href="home1.php">BILLING</a></li>
		  <li><a class= "active" href="account.php">ACCOUNTS</a></li>
		  <li id="logout"><b><a href="logout.php">LOGOUT</a></b></li>
		  <li id="loggedin"><a>Logged in as : <u><?php echo $_SESSION['username'];?></u></a></li>
		</ul>
	</nav>
	<form method="post" action="">
	<table align="center">
		<tr>
			<tr>
			<td> FROM : <input type="date" name="datefrom"> </td>	<td>&nbsp;</td>
			<td> TO : <input type="date" name="dateto"> </td>	<td>&nbsp;</td>
			<td> <input type="submit" name="range_sort" value="SORT"> </td>
		</tr>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
<?php
	/*echo $_POST['range_sort'];*/
if(isset($_POST['range_sort']))
{  
	$dt_from = $_POST['datefrom'];
    $dt_to = $_POST['dateto'];

	$dt_from = str_replace( '-' , '/' , $dt_from );
	$dt_to = str_replace( '-' , '/' , $dt_to );

    $_SESSION['result_date'] = $dt_from;
    $_SESSION['result_to'] = $dt_to;

    $_SESSION['result_date'];
    header('location:sort_date.php');
}
?>