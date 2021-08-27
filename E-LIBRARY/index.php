<?php
include("header.php");
session_start();
error_reporting(0);
include("Conn.php");
if($_SESSION['ulogin']!=''){
$_SESSION['ulogin']='';
	//echo "<script type='text/javascript'> document.location ='userProfile.php'; </script>";
}
if(isset($_POST['login']))
{
 //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {

$userid=$_POST['userid'];
$_SESSION['ulogin']=$userid;
$password=md5($_POST['password']);
$sql ="SELECT `ID`,`PASSWORD` FROM `register` WHERE `ID` LIKE '$userid' AND `PASSWORD` LIKE '$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_num_rows($result);
if( $row > 0)
{
$_SESSION['ulogin']=$userid;
echo "<script type='text/javascript'> document.location ='userProfile.php'; </script>";
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
	<link rel="stylesheet" type="text/css" href="tools/cs.css">
</head>
<body>
	<br>
<section><br><br>
	<center>
	<div class="box1">
	<div class="sfrm">
		<h1 style=" font-size: 45px;color: orangered">USER LOGIN FORM</h1>
<form role="form" method="post">
<table>
<tr><td> Enter UserID :</td>
<td><input style="font-size:18pt;height:30px;width:200px;"  class="form-control" type="text" name="userid" autocomplete="off" required /></td></tr>

<tr><td>Password :</td>
<td><input style="font-size:18pt;height:30px;width:200px;"  class="form-control" type="password" name="password" autocomplete="off" required /></td></tr>


<tr><td>Verification code : </td>
<td><input style="font-size:18pt;height:30px;width:200px;" type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" >&nbsp;</td><td><img src="captcha.php"></td></tr>

</table>
 <button type="submit" name="login" style="font-size: 20px;">LOGIN </button>
</form></center>
	</section>
</body>
<?php
include("footer.php");
?>
</html>
