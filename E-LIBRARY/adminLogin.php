<?php
include("header.php");
session_start();
error_reporting(0);
include("Conn.php");
if($_SESSION['alogin']!=''){
//$_SESSION['alogin']='';
	echo "<script type='text/javascript'> document.location ='adminProfile.php'; </script>";
}
if(isset($_POST['login']))
{
 //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {

$userid=$_POST['userid'];
$password=md5($_POST['password']);
$sql ="SELECT `ID`,`PASSWORD` FROM `admin` WHERE `ID` LIKE '$userid' AND `PASSWORD` LIKE '$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_num_rows($result);
if( $row > 0)
{
$_SESSION['alogin']=$_POST['userid'];
echo "<script type='text/javascript'> document.location ='adminProfile.php'; </script>";
	echo "<script>alert('Successful login');</script>";
} else{
	echo "<script>alert('Invalid Details');</script>";
}
}
}
?>
<!DOCTYPE html>
<html></html>
<head>
    <meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="cs.css">
</head>
<body>
	<br>
<section>
<br><br>
	<center>
 <div class="box1">
	<div class="sfrm">
		<h1 style=" font-size: 45px;color: orangered">ADMIN LOGIN FORM</h1>
			<form role="form" method="post">
			<table>
			<tr><td>Enter UserID:</td>
			<td><input style="font-size:18pt;height:30px;width:200px;"class="form-control" type="text" name="userid" autocomplete="off" required /></td></tr>
			<tr><td>Password:</td>
			<td><input style="font-size:18pt;height:30px;width:200px;" class="form-control" type="password" name="password" autocomplete="off" required /></td></tr>
			<tr><td>Verification code : </td>
			<td><input style="font-size:18pt;height:30px;width:200px;" type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;</td>
			<td><img src="captcha.php"></td></tr>	
			</table>
<button type="submit" name="login" class="" style="font-size: 20px;">LOGIN </button>
</form>
</div></div></center>
</section>
</body>
<?php
include("footer.php");
?>
</html>
