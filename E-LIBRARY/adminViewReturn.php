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
<title>VIEW ISSUE</title>
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
</script>
<!-- SEARCH BAR -->
<div class="srch">
		<form class="navbar-form" method="post" name="form1" action="adminViewReturn.php">
				<input  style="font-size:18pt;height:40px;width:300px;" type="text" name="search" placeholder="Book name/User ID" size="25" required="">
				<input style="font-size:18pt; height:40px;width:100px;" type="submit" name="submit" value="Search">
		</form>
</div>
	
<?php
	
	//if book is searched
if(isset($_POST['submit']))
		{
			$search = $_POST['search'];
			$sql= "SELECT register.ID, register.NAME, bookentry.ISBN_NO, bookentry.B_NAME, returnbook.RETURN_DATE, returnbook.FINE FROM register inner join returnbook ON register.ID=returnbook.USERID inner join bookentry ON returnbook.ISBN_NO=bookentry.ISBN_NO where returnbook.USERID='$search' OR bookentry.B_NAME like '%$search%' ORDER BY returnbook.RETURN_DATE ASC";
			$result = mysqli_query($conn, $sql);
			echo"<center>";
			if(mysqli_num_rows($result)==0)
			{
				echo "<font face = 'Monotype Corsive'  size='9' color='white'><h1 style='text-align:center;'>Sorry! No book found with that name. </h1></font>";
			}
			else
			{
			echo "<table border=2 class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo"<b><br><font face = 'Monotype Corsive' size='9' color='white'>LIST OF RETURNED BOOKS </font></b><br><br>";
				echo"<tr>";
				echo"<th align = 'center'> ID <br> </th>";
				echo"<th align = 'center'> Username <br> </th>";
				echo"<th align = 'center'> ISBN Number<br> </th>";
				echo"<th align = 'center'> Book Name<br> </th>";
				echo"<th align = 'center'> Return Date<br> </th>";
				echo"<th align = 'center'> Fine<br> </th>";
				echo"</tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo"<font face='Rockwell'><tr>";
					echo"<td align = 'center'>".$row["ID"];"</td>";
					echo"<td align = 'center'>".$row["NAME"];"<br></td>";
					echo"<td align = 'center'>".$row["ISBN_NO"];"</td>";
					echo"<td align = 'center'>".$row["B_NAME"];"<br></td>";
					echo"<td align = 'center'>".$row["RETURN_DATE"];"<br></td>";
					echo"<td align = 'center'>".$row["FINE"];"<br></td>";
					echo"</tr></font>";

				}
			}
			
			echo "</table>";
			echo "</center>";
			}
	
	//working
	else
	{
		// define how many results you want per page
$results_per_page = 1;
// find out the number of results stored in database
$sql='SELECT register.ID, register.NAME, bookentry.ISBN_NO, bookentry.B_NAME, returnbook.RETURN_DATE, returnbook.FINE FROM register inner join returnbook ON register.ID=returnbook.USERID inner join bookentry ON returnbook.ISBN_NO=bookentry.ISBN_NO ORDER BY returnbook.RETURN_DATE ASC';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);
// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
//setting table format
	echo"<center>";
	echo"<b><br><font face = 'Monotype Corsive' size='9' color='white'>LIST OF RETURNED BOOKS </font></b><br><br>";
	
	echo"<table border=2>";
	echo"<tr>";
				echo"<th align = 'center'> ID <br> </th>";
				echo"<th align = 'center'> Username <br> </th>";
				echo"<th align = 'center'> ISBN Number<br> </th>";
				echo"<th align = 'center'> Book Name<br> </th>";
				echo"<th align = 'center'> Return Date<br> </th>";
				echo"<th align = 'center'> Fine<br> </th>";
	echo"</tr>";
// retrieve selected results from database and display them on page
$sql='SELECT register.ID, register.NAME, bookentry.ISBN_NO, bookentry.B_NAME, returnbook.RETURN_DATE, returnbook.FINE FROM register inner join returnbook ON register.ID=returnbook.USERID inner join bookentry ON returnbook.ISBN_NO=bookentry.ISBN_NO ORDER BY returnbook.RETURN_DATE ASC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) 
{
    echo"<font face='Rockwell'><tr>";
					echo"<td align = 'center'>".$row["ID"];"</td>";
					echo"<td align = 'center'>".$row["NAME"];"<br></td>";
					echo"<td align = 'center'>".$row["ISBN_NO"];"</td>";
					echo"<td align = 'center'>".$row["B_NAME"];"<br></td>";
					echo"<td align = 'center'>".$row["RETURN_DATE"];"<br></td>";
					echo"<td align = 'center'>".$row["FINE"];"<br></td>";
	echo"</tr></font>";
}
	echo"</table>";
// display the links to the pages
	echo"<br><br>";
echo "<font size='6' color='white'>Pages </font> ";
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a style="padding-left:15px; font-size: 30px; color: white;" href="adminViewReturn.php?page=' . $page . '">' . $page . '</a> ';
	
}
echo"</center>";
	}
?>
</section>
</body>
</html> 
<?php
 include("footer.php");
?>