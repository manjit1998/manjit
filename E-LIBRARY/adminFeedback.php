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
		th,td{
			padding:10px;
		}
		</style>
<meta charset="utf-8">
<title>FEEDBACK</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="dashboard.css">
	<link rel="stylesheet" type="text/css" href="cs.css">
</head>
<body>
<br>
<section>
<div class="box1">
		<div class="sfrm">
		<h1 style="text-align: center; font-size: 45px;color: orangered">FEEDBACK</h1>
		<h6 style="padding-left: 15px;">If you have any notice or reply please post below.</h6>
		<form style="padding-left: 15px;" action="adminFeedbackData.php" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Write something... " style="font-size: 20px; padding: 30px; width: 500px; height:60px"><br>	
			<input class="comment" type="submit" name="submit" value="Comment" style="width: 100px;height: 35px; font-size: 20px;">	
		</form>
			</div>
	<div>
		
			<?php
				$results_per_page = 1;
				// find out the number of results stored in database
				$sql='SELECT * FROM tblfeedback;';
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
					echo"
					<font size='6'><table border=0'></font>";
					echo"<br><br>";
					echo"<b><h2><font face = 'Monotype Corsive' size='6' style='padding-left:15px;'> Feedbacks </font></b><br></h2>";
					$sql='SELECT NAME, FEEDBACK, FDATE FROM `tblfeedback` ORDER BY tblfeedback.FDATE DESC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($result)) 
										{
											echo"<font face='Rockwell' size='6'><tr><td align = 'center'>".$row["NAME"];"<br></td>";
											echo"<td align = 'center'>".$row["FEEDBACK"];"<br></td>";
											echo"<td align = 'center'>".$row["FDATE"];"</td></tr><br></font>";
										}
										echo"</table>";
		echo"<br><br>";
		echo"< -";
					for ($page=1;$page<=$number_of_pages;$page++) {
						echo '<a style="padding-left:15px" href="adminFeedback.php?page=' . $page . '">' . $page . ' -</a> ';
				}
		echo">";
			?>
			
		</div>
		</div>
	</section>
</body>
</html>
<?php
 include("footer.php");
?>