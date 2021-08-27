<?php
 include ("Conn.php");
 include ("adminNav.php");
 session_start();
 error_reporting(0);
 if(strlen($_SESSION['ulogin'])==0)
			{   
				header('location:userLogin.php'); //include redirect page if failed
			}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
	<body>
	<br>
	<section>
<!--______sidenav______-->
	
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
</script>
	</section>
	</body>
	</html>
<?php
 include("footer.php");
?>