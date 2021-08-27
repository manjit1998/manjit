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
	;

		</style>
	<title>Book Entry</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<br>
	<section>
		<center>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	<center>
		<form action="adminBookdata.php" method="post" role="form" enctype="multipart/form-data">
  <table>
   	 <tr>
    <td>ISBN Number : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="isbn" required></td>
   </tr>
 	 <tr>
    <td>Book Name : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="b_name" required></td>
   </tr>
   <tr>
    <td>Author : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="author" required></td>
   </tr>
   <tr>
    <td>Publisher : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="publisher" required></td>
   </tr>
	<tr>
    <td>Category :</td>
    <td>
     <select style="font-size:18pt;height:30px;width:200px;" name="b_type" required>
      <option selected hidden value="">Select</option>
      	<option>Journals</option>
      	<option>Anthology</option>
	  	<option>Crime</option>
		<option>Novels</option>
      	<option>Cook Book</option>
	  	<option>Art</option>
		<option>Reference</option>
      	<option>Biblographies</option>
	  	<option>Textbook</option>
		<option>Dictionary</option>
      	<option>Guide</option>
	  	<option>Ecyclopedia</option>
		<option>History</option>
      	<option>Science</option>
	  	<option>Travel</option>
     </select>
    </td>
   </tr>
   <tr>
    <td>Subject : </td>
    <td><input  style="font-size:18pt;height:30px;width:200px;"type="text" name="subject"></td>
   </tr>
	<tr>
    <td>Copies : </td>
    <td><input  style="font-size:18pt;height:30px;width:200px;"type="text" name="copies" required></td>
   </tr>
	 <tr>
    <td>Price : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="price" required></td>
   </tr>
	 <tr>
    <td>Date of Purchase :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="date" name="date_of_purchase" required></td>
   </tr></table>
			<br><input style="font-size:18pt;height:50px;width:400px;" type="file" name="pdf_file" id="pdf_file" accept="application/pdf" />
    </center>
		<br>
		<div class="done"><input style="font-size:25pt;" type="submit" value="Done"></done>
 </form>
	<center>
	</section>
		<?php
		include("footer.php");
	?>
</body>
</html>