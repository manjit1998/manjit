<?php
	include("Conn.php");
	$userid = $_POST['userid'];
	$isbn = $_POST['isbn'];
	$return_date = date("Y-m-d");
	$fine = $_POST['fine'];

		
	$sql = "SELECT COPIES FROM `bookentry` WHERE ISBN_NO = '$isbn'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$copies = $row["COPIES"];
	$copies = ($copies+1);

	$update = "UPDATE `bookentry` SET `COPIES` = '$copies' WHERE `bookentry`.`ISBN_NO` = '$isbn'";
	mysqli_query($conn,$update);


	
		$add_query = "INSERT INTO returnbook VALUES('$userid','$isbn','$return_date','$fine')";
		mysqli_query($conn,$add_query);
		$del_query = "DELETE FROM `issue` WHERE USERID = '$userid' AND ISBN_NO = '$isbn';";
		mysqli_query($conn,$del_query);
		echo '<script>alert("Book returned successfully")</script>';
		header('location:adminViewReturn.php'); //modify link to view returned


?>