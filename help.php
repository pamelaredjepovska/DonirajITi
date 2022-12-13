<?php session_start(); ?>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <!-- text editor import -->
    <link rel="stylesheet" href="widgEditor/css/widgEditor.css" />
    <script src="widgEditor/scripts/widgEditor.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
	<style>        
        a.navbar-brand.mr-auto img 
		{
            width: 170px;
        }
        body 
        {
            background-color: #e6e6dc !important;
        }
        .container.post-holder 
		{
            margin-top: 20px;
            margin-bottom: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #f7f9fb;
            box-shadow: 0 0 14px #00000040;
            
        }
		
    </style>
	
    <title>Инструкции</title>
	
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
	
    <div class="container post-holder mx-auto" style="text-align: justify; text-justify: inter-word">
        <div class="row">
		<div class="col-sm d-flex mx-auto"><img src="images/meni4.png" class="img-fluid d-flex mx-auto"></div>
		</div>
		<br>
		
		<div class="row">
		<div class="col-sm"><p><span style="color:red; font-size:20px;">1. </span>Овој линк ве носи на почетната страница.</p></div>
		</div>
		
		<div class="row">
		<div class="col-sm"><p><span style="color:red; font-size:20px;">2 и 3. </span>Овде ви се прикажува формата за објавување на нова донација
		или ново барање за донација.</p>
		<img src="images/formadonacija.png" height="500" width="500" class="img-fluid d-flex mx-auto">
		<br><p>Во полето за наслов го внесувате насловот на вашата донација/барање, а во полето подолу описот за донацијата/барањето. 
		Притоа ја селектирате соодветната локација и категорија на вашата донација или барање и додавате слика која најдобро ја/го прикажува. 
		<br><span style="color:red; font-size:20px;">Напомена: </span>Сите полиња се задолжителни!</p>	
		</div>
		</div>
		
		<div class="row">
		<div class="col-sm"><p><span style="color:red; font-size:20px;">4 и 5. </span>Овие линкови водат до листа на сите објави за донации и барањата за 
		донации соодветно. Притоа, објавите можете да ги филтрирате според посакуваниот град/општина, категорија или и двете.</p>	
		</div>
		</div>
		
		<div class="row">
		<div class="col-sm"><p><span style="color:red; font-size:20px;">6. </span>Кога корисникот ќе кликне врз неговото име, се појавува 
		ново паѓачко мени со линкови со разни функционалности.</p>
		<img src="images/meni5.png" height="250" width="250"class="img-fluid d-flex mx-auto">
		<br><p><span style="color:red; font-size:20px;">6.1. </span>Го носи корисникот до неговиот профил, каде добива увид во неговите досегашни објави,
		кои може да ги модификува или брише.</p>
		<img src="images/objavi6.png" height="600" width="600"class=" img-fluid d-flex mx-auto">
		<br>
		<p><span style="color:red; font-size:20px;">6.2. </span>Корисникот добива можност за промена на неговата лозинка и телефонски број.</p>
		<img src="images/postavki.png" height="400" width="400"class="img-fluid d-flex mx-auto">
		<br>
		<p><span style="color:red; font-size:20px;">6.3. </span>Инструкции со објаснување како да се користи веб-платформата „ДонирајИТи“.</p>
		<p><span style="color:red; font-size:20px;">6.4. </span>Одјавување на корисникот.</p>
		</div>
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