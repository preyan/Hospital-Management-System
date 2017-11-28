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
<title>M. K. GHOSH HOSPITAL</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<header>
		ACCOUNTING 
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
	<table id="login" align="center" cellpadding="7">
		<tr><td>SEARCH BY PACKAGE :</td>
            <td>
                <select style="font-size:18px; font-family:arial;" name="package">
                <option>Select Package</option>
                    <option value="Package 1" >Package 1</option>
                    <option value="Package 2" >Package 2</option>
                    <option value="Package 3" >Package 3</option>
                    <option value="Package 4" >Package 4</option>
                </select>
            </td>
            <td><input type="submit" name="search_package" value="SEARCH"></input></td></tr>

            <tr><td>SEARCH BY DOCTOR :</td>
            <td>
                <select style="font-size:18px; font-family:arial;" name="doctor">
                <option>Select Doctor</option>
                    <option value="DR. BASU" >DR. BASU</option>
                    <option value="DR. GHOSH" >DR. GHOSH</option>
                    <option value="DR. MALHOTRA" >DR. MALHOTRA</option>
                    <option value="DR. SINHA" >DR. SINHA</option>
                </select>
            </td>
            <td><input type="submit" name="search_doctor" value="SEARCH"></input></td></tr>


            <td>DATE : </td>
            <td><input type="date" name="mydate" ></td> 
            <td><input type="submit" name="search_date" value="SEARCH" ></input></td></tr>


            <tr><td>&nbsp</td></tr>


            <tr> <td><input type="submit" name="sort_package" value="SORT BY PACKAGE"></input></td>
            	 <td><input type="submit" name="sort_doctor" value="SORT BY DOCTOR"></input></td>   
                 <td><input type="submit" name="sort_date" value="SORT BY DATE"></input></td>         	 
            </tr>
            <tr>
            <td><input type="submit" name="income_package" value="REVENUE BY PACKAGES"></input></td>
            <td><input type="submit" name="income_doctor" value="REVENUE BY DOCTORS"></input></td>
            <td><input type="submit" name="income_today" value="TODAY'S REVENUE"></input></td>
            </tr>
	</table>
	
</body>
</html>
<?php
if(isset($_POST['search_package']))
{
	$_SESSION['package'] = $_POST['package'];

	header('location:search_package.php');
}
if(isset($_POST['search_doctor']))
{
	$_SESSION['doctor'] = $_POST['doctor'];
	
	header('location:search_doctor.php');
}
if(isset($_POST['sort_package']))
{
	header('location:date_range.php');
}
if(isset($_POST['sort_doctor']))
{
	header('location:sort_doctor.php');
}
if(isset($_POST['income_package']))
{
	header('location:income_package.php');
}
if(isset($_POST['income_doctor']))
{
	header('location:income_doctor.php');
}
if(isset($_POST['search_date']))
{
    $dt = $_POST['mydate'];
    
    $_SESSION['result_date'] = $dt;
    header('location:search_date.php');
}
if(isset($_POST['back']))
{
	header('location:home1.php');
}
if(isset($_POST['sort_date']))
{
    header('location:date_range.php');
}
if(isset($_POST['income_today']))
{
    
    header('location:income_today.php');
}
?>