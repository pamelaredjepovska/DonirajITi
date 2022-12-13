<?php session_start(); 
if (!isset($_SESSION['id'])) //Ako ne e logiran od prethodno
{
    header("Location:login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome icons -->
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
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
    <div class="container bgcard" style="width:50%;">
       <div class="text-center mx-auto" style="width:80%;">
        <img class="img-fluid mt-3" src="images/not-found.png" alt="Error 404" style="width:150px;">
        <hr>
        <h3>Страната не е пронајдена или немате пермисии за пристап до истата</h3>
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