<html>
<head>
<title>$_get </title>
</head>
<body>

<!--
Its one technique to hack info unknownly 
$first_name=real_escape_string($_REQUEST['firstname']);

This both function convert query into string than we avoid sql injection

-->

<form action="" method="post">      <?  // make form with action on $_GET function?>
<p>Name: <input type="text" name="name"/></p>
<p>Age: <input type="text"name="age"/></p>

<p><input type="submit" name="submit" value="Click"/></p>
</form>
<?php

$mysqli = new mysqli('localhost','root','','test');


if(isset($_POST['submit']))
{
	echo $firstname = $mysqli->real_escape_string($_POST['name']);
	
	// Escape special characters, if any
	echo $age = mysqli_real_escape_string($mysqli, $_POST['age']);
	
}

?>




</body>
</html>
