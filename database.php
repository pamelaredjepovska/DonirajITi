<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
<?php

	$hostname     = "localhost"; // enter your hostname
	$un     = "root";  // enter your table username
	$password     = "";   // enter your password
	$databasename = "donirajiti";  // enter your database
	
	// Create connection 
	$conn = mysqli_connect($hostname, $un, $password, $databasename);
	mysqli_set_charset($conn,"utf8");
	 // Check connection 
	if (!$conn) 
	{ 
		die("Не може да се воспостави конекција со базата на податоци: " . mysqli_connect_error());
	}
?>

</body>
</html>