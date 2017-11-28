<?php
session_start();

include('connection.php');


/*if(isset($_SESSION['fromMain']) && ($_SESSION['fromMain'] !== 'true'))			//_____PREVENT DIRECT ACCESS______	
{
	header('location:logout.php');
}*/

$phone=$_SESSION['mob'];

$sql="SELECT * from patient WHERE phone='$phone'";

$result=mysql_query($sql,$con);
$row = mysql_fetch_array($result);
$_SESSION['fromMain'] = 'true';



?>

<!DOCTYPE html>
<html>
<head>
<title>M. K. GHOSH HOSPITAL</title>
</head>
<body>
<div id="print" style="width:1000px; min-width:960px; margin: 0 auto;">
	<header>
		<center><h1><b>M. K. GHOSH HOSPITAL</b></h1></center>
	</header>
	<hr>
	<center><h3><u>PATIENT BILL DETAILS</u></h3></center>
	<table style="font-size: 20px; font-family: helvetica;"border="5" cellspacing="2" cellpadding= "10" align="center" width="500px">
	<tr>
		<td>NAME : </td><td><?php echo $row['firstname']." ".$row['lastname'];?></td>
	</tr>
	<tr>
		<td>PHONE NO. : </td><td><?php echo $row['phone'];?></td>
	</tr>
	<tr>
		<td>ADDRESS : </td><td><?php echo $row['address'];?></td>
	</tr>
	<tr>
		<td>REFERRED BY : </td><td><?php echo $row['doctor'];?></td>
	</tr>
	<tr>
		<td>PACKAGE : </td><td><?php echo $row['package'];?></td>
	</tr>
	<tr>
		<td>TOTAL COST : </td><td><?php echo "Rs. ".$row['amount'];?></td>
	</tr>
	<tr>
		<td>AMOUNT PAID : </td><td><?php echo "Rs. ".$row['paid'];?></td>
	</tr>
	<tr>
		<td><b>AMOUNT DUE : </b></td><td><b><?php echo "Rs. ".$row['due'];?></b></td>
	</tr>
	<tr>
		<td>DATE : </td><td><?php echo date('d/m/Y');?></td>
	</tr>
	<tr>
		<td>TIME : </td><td><?php echo date('h:m:s');?></td>
	</tr>
	<tr>
		<td>BILLED BY : </td><td><?php echo $row['staff'];?></td>
	</tr>
	</table>
	<p>&nbsp;</p>
	<table style="font-size: 20px; font-family: helvetica;" border="5" cellspacing="2" cellpadding= "10" align="center" width="700px">
	<tr>
		<td><a href="package1.php">PACKAGE 1</a></td>
		<td><a href="package2.php">PACKAGE 2</a></td>
		<td><a href="package3.php">PACKAGE 3</a></td>
		<td><a href="package4.php">PACKAGE 4</a></td>
	</tr>
	</table>
</div>
</body>
</html>
