<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Одјава</title>

	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
<?php	
	session_destroy();
	header("Location: login.php");
	exit;
?>
</body>
</html>