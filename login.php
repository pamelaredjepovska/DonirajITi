<?php 
	session_start();
	//Da ne se popolneti polinjata na pocetokot
	if(!isset($username))
		$username="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Најава</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styleslogin.css">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
	if (isset($_SESSION['id'])) //Ako e logiran prethodno
	{
		header("Location:homepage.php");
	}
	
	require('database.php'); 

	$error="";
	
	if(isset($_POST['submit']))
	{
		$username=mysql_real_escape_string($_POST['username']);
		$password=mysql_real_escape_string($_POST['password']);
		$salt1="qm&h*";
		$salt2="pg!@";
		$pass=hash('sha256', "$salt1$password$salt2");
		
		$sql="SELECT * FROM korisnik WHERE (Username='$username' OR Email='$username') AND Password='$pass'";
		$result=mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result)==1)
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['Korisnik_ID'];
			$_SESSION["ime"]=$row['Ime'];
			$_SESSION["prezime"]=$row['Prezime'];
			header("Location: homepage.php");
		}
		else
		{
			$error="Погрешно корисничко име/email адреса или лозинка.";
		}		
	}	
?>

<div class="container h-100">
	<div class="d-flex justify-content-center h-100">
		<div class="user_card">
			<div class="d-flex justify-content-center">
				<!--Logo-->
				<div class="brand_logo_container">
					<img src="images/logo1.png" class="brand_logo" alt="DonirajITi logo">
				</div>
			</div>	
			
			<div class="d-flex justify-content-center form_container">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div class="input-group mb-3">
						<div class="input-group mb-1" >
							<span class="input-group-text" style="border-radius: 0px">Корисничко име или email:</span>					
						</div>
						<input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($username)?>" required>
					</div>
					
					<div class="input-group mb-3">
						<div class="input-group mb-1">
							<span class="input-group-text">Лозинка:</span>					
						</div>
						<input type="password" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($password)?>" required>
					</div>
					<div class="err-msg" align="center">
						<p><?php if (isset($error)) echo $error;?></p>
					</div>					  
			</div>
			
			<div class="d-flex justify-content-center mt-3 login_container">
				<button type="submit" name="submit" id="login" class="btn login_btn">Најави се</button> 
			</div>
			</form>
			
			<div class="mt-4">
				<div class="d-flex justify-content-center links">
					Немаш профил? <a href="registration.php" class="ml-2">Регистрирај се</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>