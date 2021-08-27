<?php
include("Conn.php");
session_start();
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
			{   
				header('location:adminLogin.php'); //include redirect page if failed
			}
		else
			{ 
				if($_POST)
				{
					$user = $_POST['id'];
							
					$usertype = $_POST['usertype'];
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
					$designation = $_POST['designation'];
					$join_year = $_POST['joinYear'];
					$end_year = $_POST['endYear'];
					
					$update_query = "UPDATE `register` SET `USER_TYPE` = '$usertype', `ID` = '$userid', `NAME` = '$username', `GENDER` = '$gender', `DOB` = '$dob', `ADDRESS` = '$address', `PINCODE` = '$phoneCode', `PHONECODE` = '$phoneCode', `PHONE_NO` = '$phone', `EMAIL` = '$email', `SCHOOL` = '$school', `COURSE` = '$course', `DESIGNATION` = '$designation', `JOIN_YEAR` = '$join_year', `END_YEAR` = '$end_year' WHERE `register`.`ID` = '$user'";
					mysqli_query($conn,$update_query);
					echo '<script>alert("Record updated successfully")</script>';
					header('location:adminModifyUserRecord.php');
				}
				else
				{
					echo "<script>alert('Something went wrong. Please try again');</script>";
					eader('location:adminModifyUserRecord.php');
				}
		}
?>					
					