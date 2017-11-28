<?php
session_start();

include('connection.php');


/*if(isset($_SESSION['fromMain']) && ($_SESSION['fromMain'] !== 'true'))			//_____PREVENT DIRECT ACCESS______	
{
	header('location:logout.php');
}*/	
	$dt_from = $_SESSION['result_date'] ;
    $dt_to = $_SESSION['result_to'] ;

	$sql="SELECT * from patient WHERE date1 >= '$dt_from' AND date1 <= '$dt_to' ORDER BY date1";
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
		<th colspan="10">
			<h2>DETAILS</h2>
		</th>
		</tr>
		<th>Date</th> <th>Patient Name</th> <th>Phone</th> <th>Address</th> <th>Package</th> <th>Referred by</th> <th>Amount</th> <th>Paid</th> <th>Due</th> <th>Billing Staff</th>
	<?php
	while($row=mysql_fetch_array($result))
	{
	echo '
		
		<tr height="50">
		<td>'.$row['date1'].'</td>
		<td>'.$row['firstname'].' '.$row['lastname'].'</td>
		<td>'.$row['phone'].'</td>
		<td>'.$row['address'].'</td>
		<td>'.$row['package'].'</td>
		<td>'.$row['doctor'].'</td>
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
