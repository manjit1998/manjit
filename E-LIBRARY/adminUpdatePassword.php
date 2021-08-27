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
		</style>
	<title>Change Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body><br>
	<section>
	<center>
		<br><br><br>
	<div class="wrapper">
		<div style="text-align: center;">
			<h1><font face = 'Monotype Corsive'  size='9' color='white'> Change your Password </font></h1><br><br>
		</div>
		<div style="padding-left: 30px; ">
		<form action="" method="post" >
			<input  style="font-size:18pt;height:50px;width:400px;" type="text" name="id" placeholder="ID" required=""><br><br>
			<input  style="font-size:18pt;height:50px;width:400px;" type="text" name="email" placeholder="Email" required=""><br><br>
			<input  style="font-size:18pt;height:50px;width:400px;" type="text" name="oldpassword" placeholder="Old Password" required=""><br><br>
			<input  style="font-size:18pt;height:50px;width:400px;" type="text" name="newpassword" placeholder="New Password" required=""><br><br><br><br>
			<button style="font-size:18pt; height:50px;width:120px;" type="submit" name="submit" >Update</button>
		</form>

	</div>
	<?php
		$usreid = $_POST['id'];
		$email = $_POST['email'];
		$oldpassword = md5($_POST['oldpassword']);
		$newpassword = md5($_POST['newpassword']);
		if(isset($_POST['submit']))
		{
			$check_query = "UPDATE admin SET password='$newpassword' WHERE id='$usreid'
			AND email='$email' AND password='$oldpassword';";
			if(mysqli_query($conn,$check_query))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
              </script> 

				<?php
			}
			else
			{
				?>
				<script type="text/javascript">
                alert("Invalid Details!");
              	</script>
		
				<?php
			}
			
		}
	?>
</center>
</section>
</body>
</html> 
<?php
 include("footer.php");
?>