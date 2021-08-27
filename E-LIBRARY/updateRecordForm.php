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
		</style>
	<title>Update Record</title>
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
		$userid = $_POST['id'];
		$sql="SELECT * FROM register where ID='$userid' ;";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
	}
?>
  <form action="UpdateRecordData.php" method="post" onsubmit="return valid();">
  <table>
	  <tr>
    <td>User Type :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="usertype" value="<?php echo $row['USER_TYPE'];?>"></td>
   </tr>
   	 <tr>
    <td>User ID :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="userid" value="<?php echo $row['ID'];?>"></td>
   </tr>
 	 <tr>
    <td>Name :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="username" value="<?php echo $row['NAME'];?>"></td>
   </tr>
	 <tr>
    <td>Gender :</td>
    <td>
     <input type="radio" name="gender" value="M" required>Male
     <input type="radio" name="gender" value="F" required>Female
    </td>
   </tr>
	 <tr>
    <td>Date of Birth :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="date" name="bdayDate" value="<?php echo $row['DOB'];?>" ></td>
   </tr>
  	 <tr>
    <td>Address :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="address" value="<?php echo $row['ADDRESS'];?>"></td>
   </tr>
	 <tr>
    <td>Pin Code :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="pinCode" value="<?php echo $row['PINCODE'];?>"></td>
   </tr>  
	 <tr>
    <td>Phone no :</td>
    <td>
     <select style="font-size:18pt;height:30px;width:200px;"  name="phoneCode" required>
      <option selected hidden value="">Select Code</option>
      <option value="+91">+91</option>
      <option value="+44">+44</option>
      <option value="+1">+1</option>
     </select>
     <input style="font-size:18pt;height:30px;width:200px;"  type="phone" name="phone" value="<?php echo $row['PHONE_NO'];?>">
    </td>
   </tr>
	 <tr>
    <td>Email :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="email" name="email" value="<?php echo $row['EMAIL'];?>"></td>
   </tr> 
	 <tr>
    <td>Branch :</td>
    <td>
     <select style="font-size:18pt;height:30px;width:200px;"  name="school" required>
      <option selected hidden value="">Select School</option>
      	<option value="RSET">Royal School of Engineering and Technology (RSET)</option>
      	<option value="RSB">Royal School of Business (RSB)</option>
	  	<option value="RSC">Royal School of Commerce (RSC)</option>
	  	<option value="RSA">Royal School of Architecture (RSA)</option>
	  	<option value="RSD">Royal School of Design (RSD)</option>
	  	<option value="RSFA">Royal School of Fine Arts (RSFA)</option>
	  	<option value="RSFT">Royal School of Fashion Design and Technology (RSFT)</option>
	  	<option value="RSAPS">Royal School of Applied and Pure Sciences (RSAPS)</option>
	  	<option value="RSIT">Royal School of Information Technology (RSIT)</option>
	  	<option value="RSLS">Royal School of Life Sciences (RSLS)</option>
	  	<option value="RSBSC">Royal School of Bio-Sciences(RSBSC)</option>
	  	<option value="RSEES">Royal School of Environmental and Earth Sciences (RSEES)</option>
	    <option value="RSCOM">Royal School of Communications and Media (RSCOM)</option>
		<option value="RSBAS">Royal School of Behavioral and Allied Sciences (RSBAS)</option>
		<option value="RSL">Royal School of Languages (RSL)</option>
		<option value="RSHSS">Royal School of Humanities and Social Sciences (RSHSS)</option>
		<option value="RSLIA">Royal School of Liberal Arts (RSLIA)</option>
		<option value="RSLIS">Royal School of Library Science(RSLIS)</option>
		<option value="RSLA">Royal School of Law and Administration (RSLA)</option>
		<option value="RSHM">Royal School of Hotel Management(RSHM)</option>
		<option value="RSTTM">Royal School of Travel and Tourism Management (RSTTM)</option>
		<option value="RSP">Royal School of Pharmacy (RSP)</option>
		<option value="RSN">Royal School of Nursing (RSN)</option>
		<option value="RSMAS">Royal School of Medical and Allied Sciences (RSMAS)</option>
		<option value="PhD">Ph.D.@RGU</option>
     </select>
    </td>
   </tr>
	 <tr>
    <td>Course :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="course" value="<?php echo $row['COURSE'];?>"></td>
   </tr>
	  <tr>
    <td>Designation :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="designation" value="<?php echo $row['DESIGNATION'];?>"></td>
   </tr>
	 <tr>
    <td>Batch :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="joinYear" value="<?php echo $row['JOIN_YEAR'];?>"> to <input style="font-size:18pt;height:30px;width:200px;"  type="text" name="endYear" value="<?php echo $row['END_YEAR'];?>"></td>
    </tr>
	 <tr>
   <tr>  
    <td>
		<input type="checkbox" name="id" value="<?php echo $row['ID'];?>" required>
		<input type="submit" value="Update" style="font-size: 20px;"></td>
   </tr>
  </table></center>
	</section>
	<?php
		include("footer.php");
	?>
 </form>
</section>
</body>
</html>
