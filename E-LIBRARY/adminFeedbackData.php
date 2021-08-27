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
					$sql="SELECT * FROM admin where ID='$_SESSION[alogin]' ;";
					$res=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($res);
					
					$userid = $_SESSION['alogin'];
					$name = $row['NAME'];
					$feedback = $_POST['comment'];
					$fdate = date("Y-m-d");
					$add_query = "INSERT INTO `tblfeedback` VALUES ('$userid','$name','$feedback','$fdate')";
					mysqli_query($conn,$add_query);
					echo '<script>alert("Feedback Posted")</script>';
					echo "<script type='text/javascript'> document.location ='adminFeedback.php'; </script>";
				}
				else
				{
					echo "<script>alert('Something went wrong. Please try again');</script>";
				}
		}
				
?>