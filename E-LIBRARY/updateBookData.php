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
					$isbnNO = $_POST['isbn'];
							
					$isbn = $_POST['newisbn'];
					$b_name = $_POST['b_name'];
					$author = $_POST['author'];
					$publisher = $_POST['publisher'];
					$b_type = $_POST['b_type'];
					$subject = $_POST['subject'];
					$copies = $_POST['copies'];
					$price = $_POST['price'];
					$date_of_purchase = $_POST['date_of_purchase'];
					
					$allowedExts = array("pdf");
					$temp = explode(".", $_FILES["pdf_file"]["name"]);
					$extension = end($temp);
					$upload_pdf=$_FILES["pdf_file"]["name"];
					move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploads/" . $_FILES["pdf_file"]["name"]);
					
					$update_query = "UPDATE `bookentry` SET `ISBN_NO` = '$isbn', `B_NAME` = '$b_name', `AUTHOR` = '$author', `PUBLISHER` = '$publisher', `B_TYPE` = '$b_type', `SUBJECT` = '$subject', `COPIES` = '$copies', `PRICE` = '$price', `DATE_OF_PURCHASE` = '$date_of_purchase', `pdf_file` = '$upload_pdf' WHERE `bookentry`.`ISBN_NO` = '$isbn' ";
					mysqli_query($conn,$update_query);

					echo '<script>alert("Record updated successfully")</script>';
					header('location:adminModifyBookRecord.php');  
				}
				else
				{
					echo "<script>alert('Something went wrong. Please try again');</script>";
					header('location:adminModifyBookRecord.php');
				}
		}
?>					
					