<!DOCTYPE HTML>
<html>
<head>
  <title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="cs.css">
	<script type="text/javascript">
		function valid()
		{
			var a = document.getElementById("password").value;
			var b = document.getElementById("confirmpassword").value;
			if(a!=b)
			{
				alert("Password and Confirm Password Field do not match  !!");
				document.getElementById("confirmpassword").focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
	
	<?php
		include("header.php");
	?><br>
	<section><br><br>
		<div class="box1">
		<div class="sfrm"><center>
			<h1 style="text-align: center; font-size: 45px;color: orangered">FACULTY SIGNUP FORM</h1>
 <form action="Facultydata.php" method="post" onsubmit="return valid();">
  <table>
   	 <tr>
    <td>User ID :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="userid" required></td>
   </tr>
 	 <tr>
    <td>Name :</td>
    <td><input  style="font-size:18pt;height:30px;width:200px;"  type="text" name="username" required></td>
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
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="date" name="bdayDate"></td>
   </tr>
  	 <tr>
    <td>Address :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="address" required></td>
   </tr>
	 <tr>
    <td>Pin Code :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="pinCode" required></td>
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
     <input style="font-size:18pt;height:30px;width:200px;"  type="phone" name="phone" required>
    </td>
   </tr>
	 <tr>
    <td>Email :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="email" name="email" required></td>
   </tr> 
	 <tr>
    <td>Branch :</td>
    <td>
     <select style="font-size:18pt;height:30px;width:200px;" name="school" required>
      <option selected hidden value="">Select Branch</option>
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
    <td>Designation :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text" name="designation" required></td>
   </tr>
          <tr>
    <td>Password :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="password" name="password" id="password" required></td>
   </tr> 
	 <tr>
    <td>Confirm Password :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="password" name="confirmpassword" id="confirmpassword" required></td>
   </tr>
	 <tr>
    <td>Verification Code :</td>
    <td><input style="font-size:18pt;height:30px;width:200px;"  type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width:150px; height: 25px;">&nbsp;<img src="captcha.php"></td>
   </tr>
   <tr>  
    <td><input type="submit" value="Register Now" style="font-size: 20px;"></td>
   </tr>
  </table>
	</section>
	<?php
		include("footer.php");
	?>
 </form>
</body>
</html>
