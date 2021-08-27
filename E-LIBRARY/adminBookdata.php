<?php
	include("Conn.php");
	$isbn = $_POST['isbn'];
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

	$check_query = "SELECT BOOKID FROM BOOKENTRY WHERE ISBN_NO = '$isbn'";
	$result = mysqli_query($conn,$check_query);
	$row = mysqli_num_rows($result);
	if( $row == 0)
	{
		$add_query = "INSERT INTO bookentry VALUES('$isbn','$b_name','$author','$publisher','$b_type','$subject','$copies','$price','$date_of_purchase','".$upload_pdf."')";
		mysqli_query($conn,$add_query);
		echo '<script>alert("Book Entry successfull")</script>';
			header('location:adminBookEntry.php');//redirect should be to view
	}
	else
	{
		echo '<script>alert("Something went wrong!")</script>';
		header('location:adminBookEntry.php');
			
	}

?>