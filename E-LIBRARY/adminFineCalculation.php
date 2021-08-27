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
		.srch
		{
			padding-left: 1780px;
		}
		
		</style>
	<title>Fines</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<body>
	<br>
	<section><br><br>
		
		<form action="adminFineCalculation.php" method="post">
			<div class="srch">
			<table>
				<tr><td> Enter User ID: </td>
					<td> <input style="font-size:18pt;height:30px;width:200px;" type="text" name="id" required></td></tr>
			</table>
			<input style="font-size:22pt;" type="submit" value="CALCULATE"></div>
		</form>
	<center><h3 style="text-align: center; height: 60px; width:800px;  background-color: white; opacity: .8;"><font face = 'Monotype Corsive'  size='9' color='orangered'>FINES TO BE CALCULATED</h3></font><br></center>
		
<?php
if(isset($_SESSION['alogin']))
{
$userid = $_POST['id'];
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
	echo("<br><br><h3 style='text-align: center; height: 70px; width:1000px;  background-color: white; opacity: .8;'><font face = 'Monotype Corsive'  size='9' color='orangered'><b>TOTAL FINE TO BE COLLECTED = $total</b></font></h3>");
	echo("</center>");
}
?>
</section>
</body>
</html>
<?php
 include ("footer.php");
?>