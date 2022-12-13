<?php 
	session_start();
  // dokolku ne e logiran korisnikot
  if (!isset($_SESSION['id'])) 
  {
    header("Location:login.php");
  }
	// prenasocuvanje dokolku linkot ne sodrzi parametar za objava id
	if(!isset($_GET['postid']))
	{
		header("Location:homepage.php");
	}
	else 
	{
		require('database.php');
		$postid = mysqli_real_escape_string($conn,$_GET['postid']); //zemanje na vrednosta za parametarot za id na objavata koja treba da se prikaze
	}
  //upit za proverka dali logiraniot korisnik e admin ili obicen korisnik
  $logiran = $_SESSION['id'];
  $qAdmin = "SELECT Uloga FROM korisnik WHERE Korisnik_ID = $logiran";
  $rez = mysqli_query($conn,$qAdmin);
  $red = mysqli_fetch_array($rez);
  $uloga = $red['Uloga'];
	// upit za dobivanje na site potrebni podatoci za objavata so spojuvanje na tabelite objavi,korisnik i kategorii
	$query = "SELECT * FROM objavi o 
	JOIN korisnik k ON o.KorisnikID=k.Korisnik_ID 
	JOIN kategorii ka ON o.KategorijaID=ka.Kategorija_ID 
	WHERE Objava_ID =$postid";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)==0)
	{
		header("Location:homepage.php"); //prenasocuvanje dokolku baranata objava ne postoi
	}
	else 
	{
		$row=mysqli_fetch_array($result);
		$naslov = $row['Naslov'];
		$sodrzina = $row['Sodrzina'];
		$lokacija = $row['Lokacija'];
		$kategorija = $row['Kategorija'];
		$ime = $row['Ime'];
		$prezime = $row['Prezime'];
		$datum = $row['Datum'];
		$slika = $row['Picture'];
	}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
 
    
    <style>         
        a.navbar-brand.mr-auto img {
            width: 170px;
        }

        body 
        {
            background-color: #e6e6dc !important;
        }
        .container.post-holder {
          
            margin-top: 20px;
            margin-bottom: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #f7f9fb;
            box-shadow: 0 0 14px #00000040;
            
        }
    </style>
	
    <title><? $naslov ?></title>
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
                  <li class="nav-item">
                      
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
    <div class="container post-holder mx-auto">
        <div class="row">

          <!-- Post Content Column -->
          <div class="col-lg-12">

            <!-- Naslov -->
            <h1 class="mt-4 text-center"><?php echo $naslov?></h1>

            <!-- Avtor -->
            <p class="lead">
              Објавено од
              <span style="color: #00C7B0;"><b><?php echo $ime . " " . $prezime; ?></b></span>
			  
              <?php if($uloga == 1) { ?>
              <br><a href="delete.php?postid=<?=$row['Objava_ID'];?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Дали сте сигурни дека сакате да ја избришете објавата?');">Избриши објава</a>
              <a href="edit.php?postid=<?=$row['Objava_ID'];?>" type="button" class="btn btn-info btn-sm" >Измени објава</a>
              <?php } ?>
            </p>
			
            <hr>

            <!-- Vreme na objava / lokacija / kategorija -->
            <p><?php echo "Објавено на " . date("j F Y G:i",strtotime($datum)) . " ";?> 
            <img class="img-fluid ml-3" src="images/locationicon.png" alt="lokacija" style="width:20px;">
            <?php echo $lokacija . " "; ?>
                <img class="img-fluid ml-3" src="images/categoryicon.png" alt="lokacija" style="width:25px;">
                <?php echo $kategorija . " "; ?>
            </p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded mx-auto d-block" src="<?php echo "uploads/".$slika;  ?>" style="width:60%;">

            <hr>

            <!-- Sodrzina na objavata -->
            <p class="lead"><?php echo $sodrzina; ?></p>
            <!-- Prikazuvanje na informacii za kontakt dokolku onoj sto ja cita objavata e zainteresiran -->

            <!--Informacii za kontakt-->
			<div class="text-center">
				<button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#kontaktCollapse" aria-expanded="false" aria-controls="kontaktCollapse">
				  Дознај информации за контакт
				</button>
				<div class="card mx-auto collapse" id="kontaktCollapse" style="width: 22rem;">
				  <div class="card-body">
					<h5 class="card-title">Информации за објавувачот</h5>
					<h6 class="card-subtitle mb-2 text-muted"><?php echo $ime . " " . $prezime; ?></h6>
					<p class="card-text">
					  <b>Број за контакт:</b> <?php echo $row['Telefon']?></br>
					  <b>Email адреса:</b> <?php echo $row['Email']?></br>
					</p>
				  </div>
				</div>
            </div>
            <hr>
            <!-- Del za spodeluvanje na objavata -->
            <div class="text-center">
                <h6 class="mt-4">Споделување на објавата</h6>
                 <!-- Facebook Social Media -->
                <a href="http://www.facebook.com/sharer.php?u=view.php?postid=<?=$postid?>&amp;quote=<?=$naslov . " http://localhost/donacii/view.php?postid=" . $postid ?>" target="_blank">
                <img src="http://www.onlinecode.org/example/images/facebook.png" alt="Facebook share link" />
                </a>
                <!-- Twitter Social Media -->
                <a href="https://twitter.com/share?url=http://localhost/donacii/view.php?postid=<?=$postid?>&amp;text=<?=$naslov?>&amp;hashtags=donacii" target="_blank">
                    <img src="http://www.onlinecode.org/example/images/twitter.png" alt="Twitter share link" />
                </a>
                <!-- Email Social Media -->
                <a href="mailto:?Subject=<?=$naslov?>&amp;Body=http://localhost/donacii/view.php?postid=<?=$postid?>">
                    <img src="http://www.onlinecode.org/example/images/email.png" alt="Email share link" />
                </a>
            </div>
           
            <hr>
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