<?php
session_start();

include('connection.php');


/*if(isset($_SESSION['fromMain']) && ($_SESSION['fromMain'] !== 'true'))			//_____PREVENT DIRECT ACCESS______	
{
	header('location:logout.php');
}*/

if(isset($_POST) & !empty($_POST))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$address=mysql_real_escape_string($_POST['address']);
	$doctor=$_POST['doctor'];
	$package=$_POST['package'];
	$amount=$_POST['amount'];
	$paid=$_POST['amountpaid'];
	$due=$_POST['amountdue'];
	$user=$_SESSION['username'];
	$_SESSION['mob']=$_POST['phone'];
	$dt= date("Y/m/d");
	#insert data starts
		$sql="INSERT INTO patient (firstname, lastname, phone, address, doctor, package, amount, paid, due, staff, date1)
		VALUES('".$fname."','".$lname."','".$phone."','".$address."','".$doctor."','".$package."','".$amount."','".$paid."','".$due."','".$user."','".$dt."')";

		if (!mysql_query($sql))
		{
		 die('Error: ' . mysql_error());
		}
		else
		{
			$_SESSION['fromMain']='home1';
			header('location: billed.php');
		}
	#insert data ends

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
		BILLING
	</header>
	<nav>
		<ul>
		  <li><a class= "active" href="home1.php">BILLING</a></li>
		  <li><a href="account.php">ACCOUNTS</a></li>
		  <li id="logout"><b><a href="logout.php">LOGOUT</a></b></li>
		  <li id="loggedin"><a>Logged in as : <u><?php echo $_SESSION['username'];?></u></a></li>
		</ul>
	</nav>
	<form action="" method="post">
	<table id="bill" align="center" cellpadding="7" cellspacing="5" style="min-width: 400px; margin: 10px auto 10% auto;">
		<th colspan="2">
			<h2>PATIENT DETAILS</h2>
		<th>
		<tr>
			<td>FIRST NAME :</td><td><input type="text" name="fname" required></td>
		</tr>
		<tr>
			<td>LAST NAME :</td><td><input type="text" name="lname" required></td>
		</tr>
		<tr>
			<td>PHONE NO. :</td><td><input type="text" name="phone" required></td>
		</tr>
		<tr>
			<td>ADDRESS :</td><td><input type="text" name="address" required></td>
		</tr>
		<tr>
    		<td>REFFERED BY :</td>
            <td>
                <select style="font-size:18px; font-family:arial;" name="doctor" id="doc">
                <option>Select Doctor</option>
                    <option value="DR. BASU" >DR. BASU</option>
                    <option value="DR. GHOSH" >DR. GHOSH</option>
                    <option value="DR. MALHOTRA" >DR. MALHOTRA</option>
                    <option value="DR. SINHA" >DR. SINHA</option>
                </select>
            </td>
        </tr>
		<tr>
    		<td>TEST NAME :</td>
            <td>
                <select style="font-size:18px; font-family:arial;" name="package" id="packages" onchange="showCost()">
                <option>Select package</option>
                    <option value="Package 1" >Package 1</option>
                    <option value="Package 2" >Package 2</option>
                    <option value="Package 3" >Package 3</option>
                    <option value="Package 4" >Package 4</option>
                </select>
            </td>
        </tr>
	    <tr>
	    	<td>AMOUNT :</td><td><input type="text" name="amount" id="cost" readonly="readonly"></td>
        </tr>
        <tr>
            <td>PAID :</td><td><input id="paid" type="text" name="amountpaid" onchange="showCost()"></td>
        </tr>
        <tr>
            <td>DUE :</td><td><input type="text" name="amountdue" id="due" readonly="readonly"></td>
        </tr>
		<tr><td></td>
			<td align="left"><input type="reset" value="Reset">
			<input type="submit" value="Submit"></td>
		</tr>
		
	</table>

</div>
<script>

      function showCost(){
	        var selectBox = document.getElementById('packages');

	        var packagecost = 0;
	        var userInput = selectBox.options[selectBox.selectedIndex].value;

	        if(userInput=='Package 1'){
	        	packagecost = 1000;
	            document.getElementById('cost').value='1000';
	        }
	        else if(userInput=='Package 2'){
	        	packagecost = 1500;
	            document.getElementById('cost').value='1500';
	        }
	        else if(userInput=='Package 3'){
	        	packagecost = 2000;
	            document.getElementById('cost').value='2000';
	        }
	        else if(userInput=='Package 4'){
	           	packagecost = 2500;
	            document.getElementById('cost').value='2500';
	        }
	        else{
	            document.getElementById('cost').style.visibility='hidden';
	        }
        var paid=document.getElementById('paid').value;              
        var dueLeft= packagecost - paid;
        document.getElementById('due').value=dueLeft;
      }
    </script>
</body>
</html>

