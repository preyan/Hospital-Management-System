<?php
session_start();

if(!isset($_SESSION['fromMain']))						//_____PREVENT DIRECT ACCESS______	
{
	header('location:home.php');
}


session_destroy();

header('location:home.php');

?>
