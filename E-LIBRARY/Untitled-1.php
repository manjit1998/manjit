<?php
  include ("Conn.php");
 include ("userNav.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<form method="post" role="form" enctype="multipart/form-data"> 
	<input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" />
	<button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
</body>
</html>
<?php
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["pdf_file"]["name"]);
$extension = end($temp);
$upload_pdf=$_FILES["pdf_file"]["name"];
move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploads/pdf/" . $_FILES["pdf_file"]["name"]);
$sql=mysqli_query($conn,"INSERT INTO `upload_pdf`(`pdf_file`)VALUES($upload_pdf')");
if($sql){
	echo "Data Submit Successful";
}
else{
	echo "Data Submit Error!!";
}
?>