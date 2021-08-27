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
	<title>Fines</title>
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
	<h3 style="text-align: center;"><font face = 'Monotype Corsive'  size='9' color='white'>Fines To be Paid</h3></font><br>
		
<?php
if(isset($_SESSION['ulogin']))
{
$userid = $_SESSION['ulogin'];
// Initialising variable
$_fine = 0;
 
		

// Defining Function
function calculateFine($actualDate, $returnDate) 
    { 

        // Checking various conditions

        if ($actualDate[2] <= $returnDate[2] && $actualDate[1] == $returnDate[1] && $actualDate[0] == $returnDate[0])  
            {
                $_fine = 0;
			 return($_fine);
                
            }
        elseif($actualDate[2] > $returnDate[2] && $actualDate[1] == $returnDate[1] && $actualDate[0] == $returnDate[0])
            {
                $_late = $actualDate[2] - $returnDate[2];
                $_fine = 15*$_late;
                return($_fine);
            }
        elseif($actualDate[1] > $returnDate[1] && $actualDate[0] == $returnDate[0])
            {
                $_late = $actualDate[1] - $returnDate[1];
                $_fine += 500*$_late; 
                return($_fine);
            }
        elseif($actualDate[0] > $returnDate[0])     
            {
                $_fine = 10000;
                return($_fine);
            }
        else 
            { 
                $_fine = 0;
                return($_fine);  // Updated (This is the undefined variable causing error )
            }
    }
$check_query = "SELECT bookentry.ISBN_NO, bookentry.B_NAME, issue.ISSUE_DATE, issue.RETURN_DATE FROM register inner join issue ON register.ID=issue.USERID inner join bookentry ON issue.ISBN_NO=bookentry.ISBN_NO where issue.USERID='$userid'";
$res = mysqli_query($conn,$check_query);
echo("<center>");
echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
		echo "<th>"; echo "ISBN Number";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";
		echo "<th>"; echo "Fine";  echo "</th>";

      echo "</tr>"; 
while($row=mysqli_fetch_assoc($res))
{
$rdate = $row['RETURN_DATE'];
$adate = date("Y-m-d");


$_a = explode("-",$adate);
$_b = explode("-",$rdate);
	// Calling Function
	
$fine = calculateFine($_a,$_b);
$total = $total + $fine;
 echo "<tr>";
		  echo "<td>"; echo $row['ISBN_NO']; echo "</td>";
          echo "<td>"; echo $row['B_NAME']; echo "</td>";
          echo "<td>"; echo $row['ISSUE_DATE']; echo "</td>";
          echo "<td>"; echo $row['RETURN_DATE']; echo "</td>";
		  echo "<td>"; echo $fine; echo "</td>";
        echo "</tr>";
}
	echo "</table>";
	echo("<br><br><font face = 'Monotype Corsive'  size='9' color='white'><b>Total fine to be paid = $total</b></font>");
	echo("</center>");
}
?>
</section>
</body>
</html>
<?php
 include ("footer.php");
?>