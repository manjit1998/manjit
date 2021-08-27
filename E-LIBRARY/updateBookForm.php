<?php
include("Conn.php");
include("adminNav.php");
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
	<title>Update Book Record</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<br>
	<section>
	<center>
	<div class="wrapper">
		<div style="text-align: center;">
			<h1><font face = 'Monotype Corsive'  size='9' color='white'> Change Details </font></h1><br><br>
		</div>
		<div style="padding-left: 30px; ">
<?php

	if(isset($_POST['edit']))
	{
		$isbnNO = $_POST['isbn'];
		$sql="SELECT * FROM bookentry where ISBN_NO='$isbnNO' ;";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
	}
?>
  <form action="UpdateBookData.php" method="post" enctype="multipart/form-data" onsubmit="return valid();">
  <table>
	  <tr>
    <td>ISBN Number : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="newisbn" value="<?php echo $row['ISBN_NO'];?>" required></td>
   </tr>
 	 <tr>
    <td>Book Name : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="b_name" value="<?php echo $row['B_NAME'];?>" required></td>
   </tr>
   <tr>
    <td>Author : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="author" value="<?php echo $row['AUTHOR'];?>" required></td>
   </tr>
   <tr>
    <td>Publisher : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="publisher" value="<?php echo $row['PUBLISHER'];?>" required></td>
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
    <td><input  style="font-size:18pt;height:30px;width:200px;"type="text" name="subject" value="<?php echo $row['SUBJECT'];?>"></td>
   </tr>
	<tr>
   <td>Copies : </td>
    <td><input  style="font-size:18pt;height:30px;width:200px;"type="text" name="copies" value="<?php echo $row['COPIES'];?>"></td>
   </tr>
	 <tr>
    <td>Price : </td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="text" name="price" value="<?php echo $row['PRICE'];?>" required></td>
   </tr>
	 <tr>
    <td>Date of Purchase :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;" type="date" name="date_of_purchase" value="<?php echo $row['DATE_OF_PURCHASE'];?>" required></td>
   </tr>
	  </table>
	  
		<br><input style="font-size:18pt;height:50px;width:400px;" type="file" name="pdf_file" id="pdf_file" accept="application/pdf" /><br><br> 
	  
		<input type="checkbox" name="isbn" value="<?php echo $row['ISBN_NO'];?>" required>
		<input type="submit" value="Update" style="font-size: 20px;"></td>
</form>
  </center>
 
</section>
</body>
</html>
	<?php
		include("footer.php");
	?>

