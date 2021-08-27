<?php
	include("Conn.php");
	$userid = $_POST['userid'];
	$isbn = $_POST['isbn'];
	$issue_date = date("Y-m-d");
	$return_date = $_POST['return_date'];

	$sql = "SELECT COPIES FROM `bookentry` WHERE ISBN_NO = '$isbn'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$copies = $row["COPIES"];
	$copies = ($copies-1);

	$update = "UPDATE `bookentry` SET `COPIES` = '$copies' WHERE `bookentry`.`ISBN_NO` = '$isbn'";
	mysqli_query($conn,$update);

	$check_query = "SELECT BOOKID FROM ISSUE WHERE ISBN_NO = '$isbn'";
	$result = mysqli_query($conn,$check_query);
	$row = mysqli_num_rows($result);
	if( $copies >= 0)
	{
		$add_query = "INSERT INTO issue VALUES('$userid','$isbn','$issue_date','$return_date')";
		mysqli_query($conn,$add_query);
		echo '<script>alert("Book issued successfully")</script>';
		header('location:adminViewIssue.php'); //modify link to view issued
	}
	else
	{
		echo '<script>alert("No copies available")</script>';
	} 

?>