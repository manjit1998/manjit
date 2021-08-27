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
			.srch
		{
			padding-left: 1780px;
		}
		</style>
<meta charset="utf-8">
<title>ISSUE ENTRY</title>
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
  <a href="adminIssueBook.php">ISSUE BOOKS</a>
	<br>
  <a href="adminViewIssue.php">VIEW ISSUED BOOKS</a>
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
</script><br><br><br><br><br><br><br><br><br><br><br>
	<center>
	<form action="adminIssueData.php" method="post">
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
    <td>Date of return :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="date" name="return_date" required></td>
   </tr>
   <tr>
    <td><input  style="font-size:25pt;" type="submit" value="Issue"></td>
   </tr>
  </table>
 </form>
		</center>

	</section>
</body>
</html>
<?php
 include("footer.php");
?>