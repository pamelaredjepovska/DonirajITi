<?php 
	session_start(); 
	if (!isset($_SESSION['id'])) //Ako ne e logiran od prethodno
	{
		header("Location:login.php");
	}
	require('database.php');
	
	$user = $_SESSION['id'];
	$query = "SELECT * FROM korisnik WHERE Korisnik_ID = $user";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$error1 ='';
	$error2 ='';
	
	// nizi so prifateni izrazi za validacija
	$uppercasePassword = "/(?=.*?[A-Z])/";
	$lowercasePassword = "/(?=.*?[a-z])/";
	$digitPassword = "/(?=.*?[0-9])/";
	$spacesPassword = "/^$|\s+/";
	$symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
	$minEightPassword = "/.{8,}/";

	//validacija za tel.broj
	$validPhone="/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/";
	
	if(isset($_POST['submit1']))
	{
	  $star=mysql_real_escape_string($_POST['stara']);
	  $nov=mysql_real_escape_string($_POST['nova']);
	  $salt1="qm&h*";
	  $salt2="pg!@";
	  $starProverka=hash('sha256', "$salt1$star$salt2");
	  if($starProverka == $row['Password']) //dali vnesenata lozinka e ista so starata
	  {
		//Validacija na nova lozinka
		if (!preg_match($uppercasePassword, $nov) || !preg_match($lowercasePassword, $nov) || 
		  !preg_match($digitPassword, $nov) || !preg_match($symbolPassword, $nov) || 
		  !preg_match($minEightPassword, $nov) || preg_match($spacesPassword, $nov)) 
		{
		 $error1 = "Новата лозинка мора да содржи барем една голема буква, мала буква, цифра, специјален карактер (без празно место) и да има повеќе од 8 карактери.";
		}
		else 
		{
		  $novaLozinka=hash('sha256', "$salt1$nov$salt2");
		  $queryPromenaPass = "UPDATE korisnik SET Password = '$novaLozinka' WHERE Korisnik_ID = $user"; // update upit za promena
		  if(mysqli_query($conn,$queryPromenaPass))
		  {
			$error1 = "Лозинката е успешно променета!";
		  }
		  else {
			$error1 = "Се случи грешка!";
		  }
		}		
	  }
	  else 
	  {
		$error1 = "Имате внесено погрешна лозинка!";
	  } 
	}

	if(isset($_POST['submit2']))
	{
	  $startel=mysql_real_escape_string($_POST['startel']);
	  $novtel=mysql_real_escape_string($_POST['novtel']);

	  if($startel == $row['Telefon']) //dali vnesenito tel.broj e istiot so stariot
	  {
		//Validacija na nov tel.broj
		if (!preg_match($validPhone, $novtel)) 
		{
		 $error2 = "Телефонскиот број треба да биде во следниот формат: ххх-ххх-ххх.";
		}
		else 
		{
		  $queryPromenaTel = "UPDATE korisnik SET Telefon = '$novtel' WHERE Korisnik_ID = $user"; // update upit za promena
		  if(mysqli_query($conn,$queryPromenaTel))
		  {
			$error2 = "Телефонскиот број е успешно променет!";
		  }
		  else {
			$error2 = "Се случи грешка!";
		  }
		}		
	  }
	  else 
	  {
		$error2 = "Имате внесено погрешен телефонски број!";
	  } 
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <!-- Font Awesome icons -->
    <script src="https://kit.fontawesome.com/bb4c8f2783.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style> 
        p.description {
            font-size: 1.5em;
            text-align: center;
            padding: 20px 100px;
            line-height: 1.2;
            <!--text-align: justify; Poramnuvanje od dvete strani
            text-justify: inter-word;-->
        }
        a.navbar-brand.mr-auto img {
            width: 170px;
        }
        body 
        {
            background-color: #e6e6dc !important;
        }
        .container.bgcard {
          
            margin-top: 20px;
            margin-bottom: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #f7f9fb;
            box-shadow: 0 0 14px #00000040;
            
        }
    </style>
    <title>Промена на поставки</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand mr-auto" href="homepage.php"><img src="images/logo2.png" alt="Logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="homepage.php">Почетна <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="novadonacija.php">Донирај</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="novobaranje.php">Побарај</a>
                    </li>
                  <li class="nav-item">
                      <a class="nav-link" href="prikazidonacii.php">Донации</a>
                    </li>
                  <li class="nav-item">
                      <a class="nav-link" href="prikazibaranja.php">Барања</a>
                    </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php echo $_SESSION['ime']." ".$_SESSION['prezime']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="userpanel.php"><img src="images/profil1.png" width="25" height="25">&nbsp;Вашиот профил</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="changepassword.php"><img src="images/settings.png" width="25" height="25">&nbsp;Промена на поставки</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="help.php"><img src="images/help.png" width="25" height="25">&nbsp;Помош</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout.php"><img src="images/logout2.png" width="30" height="25">&nbsp;Одјави се</a>
                    </div>
                  </ul>
                 </li>
            
          </div>
      </div>
    </nav>
    <div class="container bgcard">
       <div class="text-center mx-auto" style="width:50%;">
           <h1><?php echo $_SESSION['ime']." ".$_SESSION['prezime']; ?></h1>
        <hr style="background-color:lightgreen; width:50%; height:3px;"></hr>
		</div>
		
        <br/>
		
		<div class="text-center mx-auto" style="width:40%;">
        <h4>ПРОМЕНА НА ЛОЗИНКА:</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="form-group">
            <label for="Stara">Моментална лозинка:</label>
            <input type="password" class="form-control" name="stara" id="Stara" placeholder="Внесете ја моменталната лозинка" required>
          </div>
          <div class="form-group">
            <label for="Nova">Нова лозинка:</label>
            <input type="password" class="form-control" name="nova" id="Nova" placeholder="Внесете ја новата лозинка" required>
          </div>
          <p style="color:red;"><?php if (isset($error1)) echo $error1;?></p>
          <button type="submit" class="btn btn-md mt-3 btn-info"  name="submit1">ПРОМЕНИ ЛОЗИНКА</button>
        </form>  

       <br>
	   
        <h4>ПРОМЕНА НА ТЕЛЕФОНСКИ БРОЈ:</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="form-group">
            <label for="startel">Моментален телефонски број:</label>
            <input type="text" name="startel" id="startel" class="form-control"  placeholder="Внесете го моменталниот тел.број" required>
          </div>
          <div class="form-group">
            <label for="novtel">Нов телефонски број:</label>
            <input type="text" name="novtel" id="novtel" class="form-control" placeholder="Внесете го новиот тел. број" required>
          </div>
          <p style="color:red;"><?php if (isset($error2)) echo $error2;?></p>
          <button type="submit" class="btn btn-md mt-3 btn-info"  name="submit2">ПРОМЕНИ ТЕЛ. БРОЈ</button>
        </form>  
       </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>