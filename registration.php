<?php
	header('Content-Type: text/html; charset=utf-8');
	
	//Da ne se popolneti polinjata na pocetokot
	if(!isset($ime))
		$ime="";
	if(!isset($prezime))
		$prezime="";
	if(!isset($telbroj))
		$telbroj="";
	if(!isset($email))
		$email="";
	if(!isset($username))
		$username="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрација</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
	require('database.php'); 
	mysql_query("SET NAMES utf8");
	
	$errors=array();
	
	if(isset($_POST['submit']))
	{
		$ime=mysql_real_escape_string($_POST['ime']);
		$prezime=mysql_real_escape_string($_POST['prezime']);
		$email=mysql_real_escape_string($_POST['email']);
		$telbroj=mysql_real_escape_string($_POST['telbroj']);
		$username=mysql_real_escape_string($_POST['username']);
		$password=mysql_real_escape_string($_POST['password']);
		
		
	   //validacija na vleznite polinja so ovie izrazi
	   $validName="/^[a-zA-Z\p{Cyrillic}]+$/u";
	   $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
	   $validPhone="/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/";
	   $validUserName="/^[A-Za-z0-9]/";
	   $minEightUserName = "/.{8,}/";
	   $uppercasePassword = "/(?=.*?[A-Z])/";
	   $lowercasePassword = "/(?=.*?[a-z])/";
	   $digitPassword = "/(?=.*?[0-9])/";
	   $spacesPassword = "/^$|\s+/";
	   $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
	   $minEightPassword = "/.{8,}/";
	
	//Validacija na ime
	if (!preg_match($validName, $ime) || !preg_match($validName, $prezime)) 
	{
	   array_push($errors, "Не се дозволени броеви во името и презимето. Името и презимето треба да бидат внесени со латинично писмо.");
	}
	
	//Validacija na email adresa
	if (!preg_match($validEmail, $email)) 
	{
	   array_push($errors, "Невалидна email адреса.");
	}

	//Validacija na tel.broj
	if (!preg_match($validPhone, $telbroj)) 
	{
	   array_push($errors, "Телефонскиот број треба да биде во следниот формат: ххх-ххх-ххх.");
	}

	//Validacija na korisnicko ime
	if (!preg_match($validUserName, $username) || !preg_match($minEightUserName, $username)) 
	{
		array_push($errors, "Корисничкото име треба да содржи букви, броеви и да има повеќе од 8 карактери.");
	}

	//Validacija na lozinka
	if (!preg_match($uppercasePassword, $password) || !preg_match($lowercasePassword, $password) || 
		!preg_match($digitPassword, $password) || !preg_match($symbolPassword, $password) || 
		!preg_match($minEightPassword, $password) || preg_match($spacesPassword, $password)) 
	{
		array_push($errors, "Лозинката мора да содржи барем една голема буква, мала буква, цифра, специјален карактер (без празно место) и да има повеќе од 8 карактери.");
	}
	
	
		$sql="SELECT * FROM korisnik as k1 WHERE k1.Username='$username' OR k1.Email='$email'";
		$result=mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result)>0)
		{
			while($user=mysqli_fetch_assoc($result))
			{
				if($user['Username']===$username)
				{
					array_push($errors, "Корисничкото име веќе постои.");
				}
				if($user['Email']===$email)
				{
					array_push($errors, "Веќе постои запис со внесената email адреса.");
				}
			}
		}
		
		if(count($errors)==0)
		{
			$salt1="qm&h*";
			$salt2="pg!@";
			$pass=hash('sha256', "$salt1$password$salt2");
			$query="INSERT INTO korisnik(Ime, Prezime, Email, Telefon, Username, Password, Uloga)
					VALUES('$ime', '$prezime', '$email', '$telbroj', '$username', '$pass', '2')";
					
			if(mysqli_query($conn, $query))
			{
				header("Location: success.php");
			}
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
						<div class="input-group-append">
							<span class="input-group-text">Име:</span>					
						</div><br>
						<input type="text" name="ime" id="ime" class="form-control" value="<?php echo htmlspecialchars($ime)?>" required> <!--Da gi zapamete vrednostite-->
					</div>
					
					
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text">Презиме:</span>					
						</div>
						<input type="text" name="prezime" id="prezime" class="form-control" value="<?php echo htmlspecialchars($prezime)?>" required>
					</div>
					
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text">Email:</span>					
						</div>
						<input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email)?>" required>
					</div>
					
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text">Телефон:</span>					
						</div>
						<input type="text" name="telbroj" id="telbroj" class="form-control" value="<?php echo htmlspecialchars($telbroj)?>" required>
					</div>
					
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text">Корисничко име:</span>					
						</div>
						<input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($username)?>" required>
					</div>
					
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text">Лозинка:</span>					
						</div>
						<input type="password" name="password" id="password" class="form-control" required>	
					</div>
					
					<?php  if (count($errors) > 0) : ?>
					  <div class="err-msg" align="center">
						<?php foreach ($errors as $error) : ?>
						  <p><?php echo $error ?></p>
						<?php endforeach ?>
					  </div>
					<?php  endif ?>
			</div>			
			<div class="d-flex justify-content-center mt-3 login_container">
				<button type="submit" name="submit" id="login" class="btn login_btn">Регистрирај се</button> 
			</div>
			</form>
			
			<div class="mt-4">
				<div class="d-flex justify-content-center links">
					Веќе имаш профил? <a href="login.php" class="ml-2">Најави се</a>
				</div>
			</div>			
		</div>
	</div>
</div>

</body>
</html>