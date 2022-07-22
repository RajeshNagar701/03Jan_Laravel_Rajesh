<html>
<head>
<title></title>
</head>
<body>

<!-- img upload / resume upload / file upload-->
<!-- first add ti form tag enctype="multipart/form-data" -->

<form action="" method="post" enctype="multipart/form-data">      <?  // make form with action on $_GET function?>
	<p>Name: <input type="text" name="username"/></p>
	<p>File: <input type="file"name="file1"/></p>

	<p><input type="submit" name="submit" value="Click"/></p>
</form>
<?php
if(isset($_POST['submit']))
{
	echo $username=$_POST['username']."<br>";
	
	echo $file1=$_FILES['file1']['name'];  // get only input type="file"
		 $path='img/upload/'.$file1;
		 $dup_file=$_FILES['file1']['tmp_name'];	
		 move_uploaded_file($dup_file,$path);
}


session_start();

echo $_SESSION['user'];

?>




</body>
</html>
