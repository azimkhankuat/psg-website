<?php
session_start();
include_once 'db_connection/link.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}else{
    $user = $_SESSION['user'];	
    $bookid = $_POST["id"];

	$delete = "DELETE FROM bookings WHERE id = '$bookid'";
	if(mysqli_query($link,$delete)){
		 header("Location: cartshow.php");
	}else{
		echo "Error";
	}
}
?>