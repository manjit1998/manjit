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
<!DOCTYPE html>
<html lang="en">
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
  <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="dashboard.css">
  <title>Book Records</title>
</head>
<body><br>
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
<!-- SEARCH BAR -->
<div class="srch">
		<form class="navbar-form" method="post" name="form1">
				<input  style="font-size:18pt;height:40px;width:300px;" type="text" name="search" placeholder="Book name.." size="25" required="">
				<input style="font-size:18pt; height:40px;width:100px;" type="submit" name="submit" value="Search">
		</form>
</div><br><br><br><br><br><br>
	<center><p><font face = "Monotype Corsive" size="12" color="white">LIST OF BOOKS</font></p></center>
	
<?php
	$search = $_POST['search'];
	//if book is searched
if(isset($_POST['submit']))
		{
			$sql= "SELECT * FROM `bookentry` where B_NAME like '%$search%' ORDER BY B_NAME ASC";
			$result = mysqli_query($conn, $sql);
			echo"<center>";
			if(mysqli_num_rows($result)==0)
			{
				echo "<font face = 'Monotype Corsive'  size='9' color='white'><b>Sorry! No book found with that name. Try searching again.</b></font>";
			}
			else
			{
			echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				
				echo"<table border=2>";
				
				echo"<tr><th align = 'center'> ISBN Number<br> </th>";
				echo"<th align = 'center'> Name<br> </th>";
				echo"<th align = 'center'> Author<br> </th>";
				echo"<th align = 'center'> Publisher<br> </th>";
				echo"<th align = 'center'> Category<br> </th>";
				echo"<th align = 'center'> Subject<br> </th>";
				echo"<th align = 'center'> Copies Available<br> </th>";
				echo"<th align = 'center'> Price<br> </th>";
				echo"<th align = 'center'> Date of Purchase<br></th>";
				echo"<th align = 'center'> E-Book<br> </th></tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo"<font face='Rockwell'><tr><td align = 'center'>".$row["ISBN_NO"];"</td>";
					echo"<td align = 'center'>".$row["B_NAME"];"<br></td>";
					echo"<td align = 'center'>".$row["AUTHOR"];"<br></td>";
					echo"<td align = 'center'>".$row["PUBLISHER"];"<br></td>";
					echo"<td align = 'center'>".$row["B_TYPE"];"</td>";
					echo"<td align = 'center'>".$row["SUBJECT"];"</td>";
					echo"<td align = 'center'>".$row["COPIES"];"</td>";
					echo"<td align = 'center'>".$row["PRICE"];"</td>";
					echo"<td align = 'center'>".$row["DATE_OF_PURCHASE"];"</td>";
					?>
						<td align = 'center'><a href="uploads/<?php echo $row["pdf_file"]?>"><?php echo $row["pdf_file"] ?></a><br></td>";
					<?php
					echo"</tr><br>";

				}
			}
			
			echo "</table>";
			echo "</center>";
			}
	
	//working
	else
	{
		// define how many results you want per page
$results_per_page = 5;
// find out the number of results stored in database
$sql='SELECT * FROM bookentry order by B_NAME asc';
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
			;
	echo"<table border=2>";

	echo"<tr><th align = 'center'> ISBN Number<br> </th>";
	echo"<th align = 'center'> Name<br> </th>";
	echo"<th align = 'center'> Author<br> </th>";
	echo"<th align = 'center'> Publisher<br> </th>";
	echo"<th align = 'center'> Category<br> </th>";
	echo"<th align = 'center'> Subject<br> </th>";
	echo"<th align = 'center'> Copies Available<br> </th>";
	echo"<th align = 'center'> Price<br> </th>";
	echo"<th align = 'center'> Date of Purchase<br> </th>";
	echo"<th align = 'center'> E-Book<br> </th></tr>";
// retrieve selected results from database and display them on page
$sql='SELECT * FROM bookentry order by B_NAME asc LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
    echo"<font face='Rockwell'><tr><td align = 'center'>".$row["ISBN_NO"];"</td>";
 	echo"<td align = 'center'>".$row["B_NAME"];"<br></td>";
	echo"<td align = 'center'>".$row["AUTHOR"];"<br></td>";
	echo"<td align = 'center'>".$row["PUBLISHER"];"<br></td>";
	echo"<td align = 'center'>".$row["B_TYPE"];"</td>";
	echo"<td align = 'center'>".$row["SUBJECT"];"</td>";
	echo"<td align = 'center'>".$row["COPIES"];"</td>";
	echo"<td align = 'center'>".$row["PRICE"];"</td>";
	echo"<td align = 'center'>".$row["DATE_OF_PURCHASE"];"</td>";
	?>
		<td align = 'center'><a href="uploads/<?php echo $row["pdf_file"]?>"><?php echo $row["pdf_file"] ?></a><br></td>";
	<?php
	echo"</tr><br>";
	$a++;
}
	echo"</table>";
// display the links to the pages
	echo"<br><br>";
echo "<font size='6' color='white'>Pages </font> ";
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a style="padding-left:15px; font-size: 30px; color: white;" href="userViewBook.php?page=' . $page . '">' . $page . '</a> ';
	
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