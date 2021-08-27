<?php
    $conn=mysqli_connect("localhost", "root", "1234","registration");
	if(!$conn)
	{
		mysqli_select_db("registration",$conn);
	}
?>