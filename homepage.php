<?php 
	session_start(); 
	if(!isset($_SESSION["id"]))
	{
		header("Location: login.php");
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
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
    </style>
    <title>ДонирајИТи</title>
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
    <div class="container-fluid">
        <div class="row section1" style="background-color: #5dbd9e;">
            <div class="col-md-6 text-center py-5" style="color: white;">
                <hr style="background-color:lightgreen; width:50%; height:3px;"></hr>
                <h1>Донирај и ти</h1>
                <hr style="background-color:lightgreen; width:50%; height:3px;"></hr>
                <p class="description">Подарувањето не е само да се направи донација, туку да се направи разлика.<br/>
                Секоја донација претставува мал чекор, но голема промена.</p>
                <a href="novadonacija.php" type="button" class="btn btn-light btn-lg mt-3">ДОНИРАЈ</a>
            </div>
            <div class="col-md-6 p-0">
                <img src="images/doniraj.png" class="img-fluid" alt="Донација" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
        <div class="row section2"  style="background-color: #3d8191;">
            <div class="col-md-6 p-0">
                <img src="images/connect.png" class="img-fluid" alt="Поврзување" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="col-md-6 text-center py-5"  style="color: white;">
                <hr style="background-color:lightgreen; width:50%; height:3px;"></hr>
                <h1>Побарај донација</h1>
                <hr style="background-color:lightgreen; width:50%; height:3px;"></hr>
                <p class="description">Не можеме да помогнеме на секого , но секој може да помогне на некого.<br/>
                Единствената грешка која може да се направи е да не се бара помош.</p>
                <a href="novobaranje.php" type="button" class="btn btn-light btn-lg mt-3">ПОБАРАЈ ДОНАЦИЈА</a>
            </div>
            
        </div>
        <div class="row section3" style="background-color: #5dacbd;">
            <div class="col-md-6 text-center py-5"  style="color: white;">
                <hr style="background-color:lightgreen; width:50%; height:3px;"></hr>
                <h1>Листа на донации</h1>
                <hr style="background-color:lightgreen; width:50%; height:3px;"></hr>
                <p class="description">Во секој момент може да се прегледа листа на активни донации.<br/>
                Пребарувањето може да се врши со различни критериуми и филтри.</p>
                <a href="prikazidonacii.php" type="button" class="btn btn-light btn-lg mt-3">ДОНАЦИИ</a>
            </div>
            <div class="col-md-6 p-0">
                <img src="images/lista.png" class="img-fluid" alt="Листа на објави" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
        <div class="row section4"  style="background-color: #5dbd9e;">
            <div class="col-md-6 p-0">
                <img src="images/baranja1.png" class="img-fluid" alt="Барања" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
           <div class="col-md-6 text-center py-5"  style="color: white;">
                <hr style="background-color:lightgreen; width:75%; height:3px;"></hr>
                <h1>Листа на барања за донации</h1>
                <hr style="background-color:lightgreen; width:75%; height:3px;"></hr>
                <p class="description">Исто така, можете да ја прегледате и листата на барања за донации.<br/>
                Пребарувањето може да се врши со различни критериуми и филтри.</p>
                <a href="prikazibaranja.php" type="button" class="btn btn-light btn-lg mt-3">БАРАЊА ЗА ДОНАЦИИ</a>
            </div>
        </div>
		<!-- <div class="row section4"  style="background-color: #5dbd9e;">
            <div class="col-md-6 p-0">
                <img src="images/nastan1.png" class="img-fluid" alt="Настани" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
           <div class="col-md-6 text-center py-5"  style="color: white;">
                <hr style="background-color:lightgreen; width:50%; height:3px;"></hr>
                <h1>Настани и промоции</h1>
                <hr style="background-color:lightgreen; width:50%; height:3px;"></hr>
                <p class="description">Секој може да објави хуманитарни настани и бесплатни промоции.<br/>
                На тој начин што поголем број на луѓе ќе бидат засегнати.</p>
                <a href="prikazinastani.php" type="button" class="btn btn-light btn-lg mt-3">НАСТАНИ</a>
            </div>
        </div>-->
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