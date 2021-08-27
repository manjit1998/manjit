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
			border : 2px solid black;
			background-color: aliceblue;
			font-size: 30px;
			text-align: center;
			padding: 10px;
		}
		.done{
			padding-left:896px;
		}
		</style>
<meta charset="utf-8">
<title>RETURN ENTRY</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="dashboard.css">
	<link rel="stylesheet" type="text/css" href="cs.css">
</head>
<body>
<br>
<section>
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

            </div>
		<br>
	<br><br>
  <a href="adminReturnBook.php">RETURN BOOKS</a>
	<br>
  <a href="adminViewReturn.php">VIEW RETURNED BOOKS</a>
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
</script><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><center>
	<form action="adminReturnData.php" method="post">
  <table>
   	 <tr>
    <td>User ID : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="userid" required></td>
   </tr>
 	 <tr>
    <td>ISBN Number : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="isbn" required></td>
   </tr>
	  <tr>
    <td>Fine paid :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="fine" required></td>
   </tr>
   
   
  </table><br>
		<input style="font-size:25pt;" type="submit" value="Return">
 </form>
	</center>
</div>
	</section>
</body>
</html>
<?php
 include("footer.php");
?>