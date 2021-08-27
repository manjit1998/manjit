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
	<title>Book Issued</title>
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
  <a href="userIssueBook.php">ISSUE BOOK</a>
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
	<div class="ibb">
<h3 style="text-align: center; color:beige; font-size: 55px;">Information of Borrowed Books</h3></div><br>
<?php

      if(isset($_SESSION['ulogin']))
      {
        $sql="SELECT bookentry.ISBN_NO, bookentry.B_NAME, issue.ISSUE_DATE, issue.RETURN_DATE FROM register inner join issue ON register.ID=issue.USERID inner join bookentry ON issue.ISBN_NO=bookentry.ISBN_NO where issue.USERID='$_SESSION[ulogin]' ORDER BY issue.RETURN_DATE ASC";
        $res=mysqli_query($conn,$sql);
        
        
        echo "<table class='table table-bordered' style='width:100%'; bgcolor:'white' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
		echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
      while($row=mysqli_fetch_assoc($res))
      {
       
        echo "<tr>";
		  echo "<td>"; echo $row['ISBN_NO']; echo "</td>";
          echo "<td>"; echo $row['B_NAME']; echo "</td>";
          echo "<td>"; echo $row['ISSUE_DATE']; echo "</td>";
          echo "<td>"; echo $row['RETURN_DATE']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";
       
      }
      else
      {
        ?>
          <h3 style="text-align: center; color: beige">Login to see information of Borrowed Books</h3>
        <?php
      }
    ?>
 </div>
</section>
</body>
</html>
<?php
 include("footer.php");
?>