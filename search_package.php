<?php
session_start();

include('connection.php');


/*if(isset($_SESSION['fromMain']) && ($_SESSION['fromMain'] !== 'true'))			//_____PREVENT DIRECT ACCESS______	
{
	header('location:logout.php');
}*/	
	$package = $_SESSION['var'];
	$sql="SELECT * from patient WHERE package='$package'";
	$result=mysql_query($sql,$con);

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
	<form  action="" method="post">
	<table border="1" cellspacing="5" align="center" style="width: 95%; margin: 15px auto; font-size: 17.5px; text-align: center;">
		<tr>
		<th colspan="9">
			<h2>DETAILS</h2>
		</th>
		</tr>
		<th>Name</th> <th>Phone</th> <th>Address</th> <th>Referred by</th> <th>Package</th> <th>Amount</th> <th>Paid</th> <th>Due</th> <th>Billing Staff</th>
	<?php
	while($row = mysql_fetch_array($result))
	{
	echo '
		
		<tr>
		<td>'.$row['firstname'].' '.$row['lastname'].'</td>
		<td>'.$row['phone'].'</td>
		<td>'.$row['address'].'</td>
		<td>'.$row['doctor'].'</td>
		<td>'.$row['package'].'</td>
		<td>'.$row['amount'].'</td>
		<td>'.$row['paid'].'</td>
		<td>'.$row['due'].'</td>
		<td>'.$row['staff'].'</td>
		</tr>

		';
	}
	?>
	</table>
	</form>
</div>
</body>
</html>
