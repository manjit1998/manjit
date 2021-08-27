<?php
 include ("Conn.php");
 include ("adminNav.php");
 session_start();
 error_reporting(0);
 if(strlen($_SESSION['alogin'])==0)
			{   
				header('location:adminLogin.php'); //include redirect page if failed
			}
?>
<!doctype html>
<html>
<head>
	<style>
		table,th,td
		{
			border : 1px solid black;
			background-color: aliceblue;
			font-size: 30px;
			text-align: center;
		}
		</style>
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<br>
	<section>
	<?php
		if(isset($_SESSION['alogin']))
		  {
			$sql="SELECT * FROM admin where ID='$_SESSION[alogin]' ;";
			$res=mysqli_query($conn,$sql);
			 $row=mysqli_fetch_assoc($res);
			echo "<center>";
			echo "<font face = 'Monotype Corsive'  size='9' color='white'><b>";
					echo("<br>WELCOME<br>");
					echo("ADMIN ");
					echo $row['NAME'];
					echo "<br><br>";
					echo "</b></font>";
					echo "<table class='table table-bordered' style='width:40%'; bgcolor:'white' >";
					//Table header
					echo "<tr style='background-color: #6db6b9e6;'>";
					
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b>ID : </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['ID'];
	 					echo "</td>";
	 				echo "</tr>";


	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['NAME'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> DOB: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['DOB'];
	 					echo "</td>";
	 				echo "</tr>";


	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['EMAIL'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['PHONE_NO'];
	 					echo "</td>";
	 				echo "</tr>";

 				echo "</table>";
			echo "</center>";
		}
	?>
</section>
</body>
</html>
<?php
 include("footer.php");
?>		