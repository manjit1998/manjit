<?php
 include ("Conn.php");
 include ("userNav.php");
 session_start();
 error_reporting(0);
 if(strlen($_SESSION['ulogin'])==0)
			{   
				header('location:index.php'); //include redirect page if failed
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
	<link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
	<br>
	<section>
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

				<div style="color: white; margin-left: 60px; font-size: 20px;">

				</div>
			<br>
	  <a href="UserViewBook.php">BOOKS</a>
	  <a href="userIssueBook.php">ISSUED BOOK</a>
	  <a href="feedback.php">FEEDBACK</a>
	<a href="userFine.php">FINE CALCULATION</a>
	</div>

	<div id="main">

	  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)" ;
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";
	}
	</script>
	<?php
		if(isset($_SESSION['ulogin']))
		  {
			$sql="SELECT * FROM register where ID='$_SESSION[ulogin]' ;";
			$res=mysqli_query($conn,$sql);
			 $row=mysqli_fetch_assoc($res);
			echo "<center>";
			echo "<font face = 'Monotype Corsive'  size='9' color='white'><b>";
					echo("<br>WELCOME<br>");
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
	 						echo "<b> Type: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['USER_TYPE'];
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
	 						echo "<b> Address: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['ADDRESS'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> PIN: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['PINCODE'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> School: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['SCHOOL'];
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
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Valid upto: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['END_YEAR'];
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