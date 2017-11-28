<?php
session_start();

include('connection.php');


/*if(isset($_SESSION['fromMain']) && ($_SESSION['fromMain'] !== 'true'))            //_____PREVENT DIRECT ACCESS______  
{
    header('location:logout.php');
}*/ 
  
    $sql="SELECT count(package) as count,doctor, sum(amount) as totalamount, sum(paid) as totalpaid, sum(due) as totaldue FROM patient GROUP BY doctor";
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
            <h2>INCOME DETAILS</h2>
        </th>
        </tr>
        <th>Doctor</th> <th>Package Count</th> <th>Total Amount</th> <th>Total Paid</th> <th>Total Due</th>  
    <?php
    while($row = mysql_fetch_array($result))
    {
    echo '
        
        <tr height="50">
        <td>'.$row['doctor'].'</td>
  	   	<td>'.$row['count'].'</td>
        <td>'.$row['totalamount'].'</td>
        <td>'.$row['totalpaid'].'</td>
        <td>'.$row['totaldue'].'</td>
        </tr>

        ';
    }
    ?>
    </table>
    </form>
</div>
</body>
</html>
