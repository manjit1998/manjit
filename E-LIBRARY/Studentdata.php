<?php
session_start();
include("Conn.php");
error_reporting(0);
//code for captach verification
	if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='') 
		{
        	echo "<script>alert('Incorrect verification code');</script>" ;
    	} 
	else
	{
	$usertype = "Student";
	$userid = $_POST['userid'];
	$username = $_POST['username'];
	$gender = $_POST['gender'];
	$dob = $_POST['bdayDate'];
	$address = $_POST['address'];
	$pinCode = $_POST['pinCode'];
	$phoneCode = $_POST['phoneCode'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$school = $_POST['school'];
	$course = $_POST['course'];
	$join_year = $_POST['joinYear'];
	$end_year = $_POST['endYear'];
	$password = md5($_POST['password']);
	$check_query = "SELECT ID FROM register WHERE ID = '$userid'";
	$result = mysqli_query($conn,$check_query);
	$row = mysqli_num_rows($result);
	if( $row == 0)
	{
		$add_query = "INSERT INTO `register` VALUES ('Student','$userid','$username','$gender','$dob','$address','$pinCode','$phoneCode','$phone','$email','$school', '$course', NULL, '$join_year', '$end_year', '$password')";
		mysqli_query($conn,$add_query);
		echo '<script>alert("Your Registration is successfull")</script>';
		header('location:index.php');
	}
	else
	{
		echo "<script>alert('Something went wrong. Please try again');</script>";
	}
}
?>