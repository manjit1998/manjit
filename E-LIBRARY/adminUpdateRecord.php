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
		#del
			{
				background-color: red;
				border: none;
				color: white;
				text-align: center;
			}
			#edit
			{
				background-color: green;
				border: none;
				color: white;
				text-align: center;
			}
		
		</style>
	<title>User Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<section>
<center>
<?php
				$results_per_page = 1;
				// find out the number of results stored in database
				$sql='SELECT * FROM register;';
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
					echo"<font size='6'></font>";
					echo"<br><br>";
					echo"<b><h3 style='text-align: center; height: 70px; width:600px;  background-color: white; opacity: .8;'><font face = 'Monotype Corsive'  size='9' color='orangered'>USER DATABASE</font></b><br></h2>";
					$sql='SELECT * FROM `register` ORDER BY NAME ASC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
					$result = mysqli_query($conn, $sql);
					echo "<table class='table table-bordered' style='width:90%'; bgcolor:'white' >";
        //Table header
        
						echo "<tr style='background-color: #6db6b9e6;'>";
						echo "<th>"; echo "ID";  echo "</th>";
						echo "<th>"; echo "Type";  echo "</th>";
						echo "<th>"; echo "Name";  echo "</th>";
						echo "<th>"; echo "Gender";  echo "</th>";
						echo "<th>"; echo "DOB";  echo "</th>";
						echo "<th>"; echo "Address";  echo "</th>";
						echo "<th>"; echo "PIN";  echo "</th>";
						echo "<th>"; echo "PhoneCode";  echo "</th>";
						echo "<th>"; echo "Contact";  echo "</th>";
						echo "<th>"; echo "Email";  echo "</th>";
						echo "<th>"; echo "School";  echo "</th>";
						echo "<th>"; echo "Course";  echo "</th>";
						echo "<th>"; echo "Designation";  echo "</th>";
						echo "<th>"; echo "JoinYear";  echo "</th>";
						echo "<th>"; echo "EndYear";  echo "</th>";
						echo "<th>"; echo "Action";  echo "</th>";

					  echo "</tr>"; 
					while($row = mysqli_fetch_array($result)) 
										{
											echo "<form action='deleteUser.php' method='post'>";
											echo"<font face='Rockwell' size='6'><tr><td align = 'center'>".$row["ID"];"<br></td>";
											echo"<td align = 'center'>".$row["USER_TYPE"];"<br></td>";
											echo"<td align = 'center'>".$row["NAME"];"</td><br>";
											echo"<td align = 'center'>".$row["GENDER"];"</td><br>";
											echo"<td align = 'center'>".$row["DOB"];"<br></td>";
											echo"<td align = 'center'>".$row["ADDRESS"];"</td><br>";
											echo"<td align = 'center'>".$row["PINCODE"];"<br></td>";
											echo"<td align = 'center'>".$row["PHONECODE"];"</td><br>";
											echo"<td align = 'center'>".$row["PHONE_NO"];"<br></td>";
											echo"<td align = 'center'>".$row["EMAIL"];"</td><br>";
											echo"<td align = 'center'>".$row["SCHOOL"];"<br></td>";
											echo"<td align = 'center'>".$row["COURSE"];"</td><br>";
											echo"<td align = 'center'>".$row["DESIGNATION"];"<br></td>";
											echo"<td align = 'center'>".$row["JOIN_YEAR"];"</td><br>";
											echo"<td align = 'center'>".$row["END_YEAR"];"</td><br>"; ?>
											<td align = 'center'> 
												<button id="edit"><input type="checkbox" name="edit" value="<?php echo $row['ID'];?>" required><a href="#"> EDIT   </a></button>
												 <button id="del"><input type="checkbox" name="delid" value="<?php echo $row['ID'];?>" required>DELETE</button>
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
  echo '<a style="padding-left:15px; font-size: 30px; color: white;" href="adminUpdateRecord.php?page=' . $page . '">' . $page . '</a> ';
	
}
echo"</center>";
?>
</section>
</body>
</html> 
<?php
 include("footer.php");
?>