<?php
session_start();
if($_SESSION['fromMain'] == "true")
{
	header('location:home1.php');
}
/*if($_SESSION['fromMain'] == "true")
{
	header('location:home1.php');
}*/
else{
	die("ACCESS DENIED !");
	header('location:home.php');
}
?>