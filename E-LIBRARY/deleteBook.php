<?php
session_start();
include("Conn.php");
error_reporting(0);
if(isset($_POST['delid']))
{
	$isbn = $_POST['isbn'];
	$check_query = "SELECT ISBN_NO FROM bookentry WHERE ISBN_NO = '$isbn'";
	$result = mysqli_query($conn,$check_query);
	$row = mysqli_num_rows($result);
	if( $row == 0)
	{
		echo "<script>alert('Book does not exist!');</script>";
		header('location:adminDeleteBookRecord.php');
	}
	else
	{
		
		$del_query = "DELETE FROM `bookentry` WHERE ISBN_NO = '$isbn'";
		mysqli_query($conn,$del_query);
		echo '<script>alert("Record deleted successfully")</script>';
		header('location:adminDeleteSTDRecord.php');
	}
}
?>