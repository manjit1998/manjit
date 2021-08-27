<?php
session_start();
include("Conn.php");
error_reporting(0);
if(isset($_POST['delid']))
{
	$userid = $_POST['id'];
	$check_query = "SELECT ID FROM register WHERE ID = '$userid'";
	$result = mysqli_query($conn,$check_query);
	$row = mysqli_num_rows($result);
	if( $row == 0)
	{
		echo "<script>alert('User does not exist!');</script>";
		header('location:adminDeleteSTDRecord.php');
	}
	else
	{
		
		$del_query = "DELETE FROM `register` WHERE ID = $userid";
		mysqli_query($conn,$del_query);
		echo '<script>alert("Record deleted successfully")</script>';
		header('location:adminDeleteSTDRecord.php');
	}
}
?>