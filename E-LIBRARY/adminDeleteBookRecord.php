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
		#del
			{
				background-color: red;
				border: none;
				color: white;
				text-align: center;
			}
			.srch
		{
			padding-left: 1880px;
		}
		
		</style>
	<title>Book Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body><br>
<section><br>
	<div class="srch">
		<form class="navbar-form" method="post" name="form1" action="adminDeleteBookRecord.php">
				<input  style="font-size:18pt;height:40px;width:300px;" type="text" name="search" placeholder="ISBN NO/Book name" size="25" required="">
				<input style="font-size:18pt; height:40px;width:100px;" type="submit" name="submit" value="Search">
		</form>
</div>
<center>
<?php
			if(isset($_POST['submit']))
		{
			$search = $_POST['search'];
			$sql= "SELECT * FROM `bookentry`  where bookentry.ISBN_NO='$search' OR bookentry.B_NAME like '%$search%' ORDER BY B_NAME ASC";
			$result = mysqli_query($conn, $sql);
			echo"<center>";
			if(mysqli_num_rows($result)==0)
			{
				echo "<font face = 'Monotype Corsive'  size='9' color='white'><b>Sorry! No book found. Try searching again.</b></font>";
			}
			else
			{
				echo "<table class='table table-bordered' style='width:90%'; bgcolor:'white' >";
        //Table header
        
						echo "<tr style='background-color: #6db6b9e6;'>";
						echo "<th>"; echo "ISBN Number";  echo "</th>";
						echo "<th>"; echo "Name";  echo "</th>";
						echo "<th>"; echo "Author";  echo "</th>";
						echo "<th>"; echo "Publisher";  echo "</th>";
						echo "<th>"; echo "Category";  echo "</th>";
						echo "<th>"; echo "Subject";  echo "</th>";
						echo "<th>"; echo "Price";  echo "</th>";
						echo "<th>"; echo "Date of Purchase";  echo "</th>";
						echo "<th>"; echo "Select";  echo "</th>";
						echo "<th>"; echo "Action";  echo "</th>";

					  echo "</tr>"; 
					while($row = mysqli_fetch_array($result)) 
										{
											echo "<form action='deleteBook.php' method='post'>";
											echo"<font face='Rockwell' size='6'><tr><td align = 'center'>".$row["ISBN_NO"];"<br></td>";
											echo"<td align = 'center'>".$row["B_NAME"];"<br></td>";
											echo"<td align = 'center'>".$row["AUTHOR"];"</td><br>";
											echo"<td align = 'center'>".$row["PUBLISHER"];"</td><br>";
											echo"<td align = 'center'>".$row["B_TYPE"];"<br></td>";
											echo"<td align = 'center'>".$row["SUBJECT"];"</td><br>";
											echo"<td align = 'center'>".$row["PRICE"];"<br></td>";
											echo"<td align = 'center'>".$row["DATE_OF_PURCHASE"];"</td><br>";
											 ?>
											<td align = 'center'>
												<input type="checkbox" name="isbn" value="<?php echo $row['ISBN_NO'];?>" required> </td><br>
											<td align = 'center'> 
												 <input id="del" type="submit" value="DELETE" name="delid">
											</td><br>
											<?php
											echo "</font></tr>";
											echo"</form>";
										}
										echo"</table>";
								}
						}
					else
					{
				$results_per_page = 1;
				// find out the number of results stored in database
				$sql='SELECT * FROM bookentry;';
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
					echo"<font size='6'><table border=0'></font>";
					echo"<br><br>";
					echo"<b><h2 style='text-align: center; color:beige; font-size: 55px;'> User Database </font></b><br></h2>";
					$sql='SELECT * FROM `bookentry` ORDER BY B_NAME ASC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
					$result = mysqli_query($conn, $sql);
					echo "<table class='table table-bordered' style='width:90%'; bgcolor:'white' >";
        //Table header
        
						echo "<tr style='background-color: #6db6b9e6;'>";
						echo "<th>"; echo "ISBN Number";  echo "</th>";
						echo "<th>"; echo "Name";  echo "</th>";
						echo "<th>"; echo "Author";  echo "</th>";
						echo "<th>"; echo "Publisher";  echo "</th>";
						echo "<th>"; echo "Category";  echo "</th>";
						echo "<th>"; echo "Subject";  echo "</th>";
						echo "<th>"; echo "Price";  echo "</th>";
						echo "<th>"; echo "Date of Purchase";  echo "</th>";
						echo "<th>"; echo "Select";  echo "</th>";
						echo "<th>"; echo "Action";  echo "</th>";

					  echo "</tr>"; 
					while($row = mysqli_fetch_array($result)) 
										{
											echo "<form action='deleteBook.php' method='post'>";
											echo"<font face='Rockwell' size='6'><tr><td align = 'center'>".$row["ISBN_NO"];"<br></td>";
											echo"<td align = 'center'>".$row["B_NAME"];"<br></td>";
											echo"<td align = 'center'>".$row["AUTHOR"];"</td><br>";
											echo"<td align = 'center'>".$row["PUBLISHER"];"</td><br>";
											echo"<td align = 'center'>".$row["B_TYPE"];"<br></td>";
											echo"<td align = 'center'>".$row["SUBJECT"];"</td><br>";
											echo"<td align = 'center'>".$row["PRICE"];"<br></td>";
											echo"<td align = 'center'>".$row["DATE_OF_PURCHASE"];"</td><br>";
											 ?>
											<td align = 'center'>
												<input type="checkbox" name="isbn" value="<?php echo $row['ISBN_NO'];?>" required> </td><br>
											<td align = 'center'> 
												 <input id="del" type="submit" value="DELETE" name="delid">
											</td><br>
											<?php
											echo "</font></tr>";
											echo"</form>";
										}
										echo"</table>";
// display the links to the pages
	echo"<br><br>";
echo "<font size='6' color='white'>Pages </font> ";
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a style="padding-left:15px; font-size: 30px; color: white;" href="adminDeleteBookRecord.php?page=' . $page . '">' . $page . '</a> ';
	
}
		}
?>
</center>
</section>
</body>
</html> 
<?php
 include("footer.php");
?>