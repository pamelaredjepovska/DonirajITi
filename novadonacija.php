<!doctype html>
<?php 
  header('Content-Type: text/html; charset=utf-8');
  session_start();
  if(!isset($_SESSION["id"]))
	{
		header("Location: login.php");
	}
	
  if(!isset($naslov))
  {
    $naslov = "";
  }
  if(!isset($sodrzina))
  {
    $sodrzina = "";
  }
  $uploadMsg = '';
  // file upload directory
  $targetDir = "uploads/"; //kade se smestuvaat prikacenite sliki
  if(isset($_POST['submit']))
  {
    require('database.php');
	mysql_query("SET NAMES utf8");
    $naslov = mysqli_real_escape_string($conn,$_POST['naslov']);
    $sodrzina = mysqli_real_escape_string($conn, $_POST['sodrzina']);
    $lokacija = mysqli_real_escape_string($conn, $_POST['lokacija']);
    $kategorijaID = mysqli_real_escape_string($conn, $_POST['kategorija']);
    $korisnikID = $_SESSION['id'];
    if(!empty($_FILES["file"]["name"]))
    {
      $fileName=basename($_FILES["file"]["name"]); //originalnoto ime na slikata na kompjuterot na klientot
      $targetFilePath = $targetDir . $fileName; //patekata na folderot kade ke se smesti slikata?
      $fileType=pathinfo($targetFilePath,PATHINFO_EXTENSION); //da ja najde ekstenzijata
      // dozvoleni ekstenzii
      $allowTypes = array('jpg','png','jpeg','gif');
      if(in_array($fileType,$allowTypes)) //ako slikata e dozvolen format
      {
        // uploadiraj ja slikata na serverot
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath))
        {	
          $query = "INSERT INTO objavi(Naslov,Sodrzina,Lokacija,Tip,Picture,KorisnikID,KategorijaID)
          VALUES('$naslov','$sodrzina','$lokacija','Donacija','$fileName',$korisnikID,$kategorijaID)";
          if(mysqli_query($conn, $query))
          {
              header("Location: prikazidonacii.php");
          }
        }else {
          $uploadMsg = "Се случи грешка при прикачување на сликата. ";
        }
      }
      else {
        $uploadMsg = "Дозволено е прикачување само на фајлови со екстензии .jpg, .png, .jpeg, .gif";
      }
    }
    else {
      $uploadMsg = "Ве молиме изберете слика. ";
    }
  } 
?>

<html lang="en">
<head>
  
    <!-- Required meta tags -->
    <!--<meta charset="utf-8">-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <!-- text editor import -->
    <link rel="stylesheet" href="widgEditor/css/widgEditor.css" />
    <script src="widgEditor/scripts/widgEditor.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
	integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	
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
	
    <title>Нова донација</title>
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
			</ul>
          </div>
      </div>
    </nav>
	
    <div class="container post-holder mx-auto">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Naslov">Наслов:</label>
            <input type="text" class="form-control" name="naslov" id="Naslov" placeholder="Внесете наслов" value="<?php echo htmlspecialchars($naslov)?>" required>
          </div>
          <div class="form-group">
            <label for="widgEditor">Опис за донацијата:</label>
            <textarea class="form-control widgEditor" name="sodrzina" id="widgEditor" placeholder="Внесете опис" rows="10" required> <?php echo htmlspecialchars($sodrzina)?></textarea>
          </div>
          <div class="form-group">
            <label for="Lokacija">Локација</label>
            <select class="form-control" id="Lokacija" name="lokacija">
              <option value="Aerodrom">Аеродром</option>
              <option value="Aracinovo">Арачиново</option>
              <option value="Berovo">Берово</option>
              <option value="Bitola">Битола</option>
              <option value="Bogdanci">Богданци</option>
              <option value="Bogovinje">Боговиње</option>
              <option value="Bosilovo">Босилово</option>
              <option value="Brvenica">Брвеница</option>
              <option value="Butel">Бутел</option>
              <option value="Valandovo">Валандово</option>
              <option value="Vasilevo">Василево</option>
              <option value="Vevcani">Вевчани</option>
              <option value="Veles">Велес</option>
              <option value="Vinica">Виница</option>
              <option value="Vranestica">Вранештица</option>
              <option value="Vrapciste">Врапчиште</option>
              <option value="Gazi Baba">Гази Баба</option>
              <option value="Gevgelija">Гевгелија</option>
              <option value="Gostivar">Гостивар</option>
              <option value="Gradsko">Градско</option>
              <option value="Grad Skopje">Град Скопје</option>
              <option value="Debar">Дебар</option>
              <option value="Debarca">Дебарца</option>
              <option value="Delcevo">Делчево</option>
              <option value="Demir Kapija">Демир Капија</option>
              <option value="Demir Hisar">Демир Хисар</option>
              <option value="Dojran">Дојран</option>
              <option value="Dolneni">Долнени</option>
              <option value="Drugovo">Другово</option>
              <option value="Gorce Petrov">Ѓорче Петров</option>
              <option value="Zhelino">Желино</option>
              <option value="Zajas">Зајас</option>
              <option value="Zelenikovo">Зелениково</option>
              <option value="Zrnovci">Зрновци</option>
              <option value="Ilinden">Илинден</option>
              <option value="Jegunovce">Јегуновце</option>
              <option value="Kavadarci">Кавадарци</option>
              <option value="Karbinci">Карбинци</option>
              <option value="Karpos">Карпош</option>
              <option value="Kisela Voda">Кисела Вода</option>
              <option value="Kicevo">Кичево</option>
              <option value="Konce">Конче</option>
              <option value="Kocani">Кочани</option>
              <option value="Kratovo">Кратово</option>
              <option value="Kriva Palanka">Крива Паланка</option>
              <option value="Krivogastani">Кривогаштани</option>
              <option value="Krusevo">Крушево</option>
              <option value="Kumanovo">Куманово</option>
              <option value="Lipkovo">Липково</option>
              <option value="Lozovo">Лозово</option>
              <option value="Mavrovo i Rostuse">Маврово и Ростуше</option>
              <option value="Makedonski Brod">Македонски Брод</option>
              <option value="Makedonska Kamenica">Македонска Каменица</option>
              <option value="Mogila">Могила</option>
              <option value="Negotino">Неготино</option>
              <option value="Novaci">Новаци</option>
              <option value="Novo Selo">Ново Село</option>
              <option value="Oslomej">Осломеј</option>
              <option value="Ohrid">Охрид</option>
              <option value="Petrovec">Петровец</option>
              <option value="Pehcevo">Пехчево</option>
              <option value="Plasnica">Пласница</option>
              <option value="Prilep">Прилеп</option>
              <option value="Probistip">Пробиштип</option>
              <option value="Radovis">Радовиш</option>
              <option value="Rankovce">Ранковце</option>
              <option value="Resen">Ресен</option>
              <option value="Rosoman">Росоман</option>
              <option value="Staro Nagoricane">Старо Нагоричане</option>
              <option value="Saraj">Сарај</option>
              <option value="Sveti Nikole">Свети Николе</option>
              <option value="Sopiste">Сопиште</option>
              <option value="Struga">Струга</option>
              <option value="Strumica">Струмица</option>
              <option value="Studenicani">Студеничани</option>
              <option value="Tearce">Теарце</option>
              <option value="Tetovo">Тетово</option>
              <option value="Centar">Центар</option>
              <option value="Centar Zupa">Центар Жупа</option>
              <option value="Cair">Чаир</option>
              <option value="Caska">Чашка</option>
              <option value="Cesino i Oblesevo">Чешино и Облешево</option>
              <option value="Cucer Sandevo">Чучер Сандево</option>
              <option value="Stip">Штип</option>
              <option value="Suto Orizari">Шуто Оризари</option>
            </select>
          </div>
            <div class="form-group">
              <label for="Kategorija">Категорија</label>
              <select class="form-control" id="Kategorija" name="kategorija">
                <option value="1">Технологија</option>
                <option value="3">Средства за хигиена</option>
                <option value="4">Облека</option>
                <option value="5">Медицинска помош</option>
                <option value="6">Социјална помош</option>
				<option value="9">Парична помош</option>
                <option value="8">Друго</option>
              </select>
            </div>
            <div class="form-group">
                <label for="Slika">Прикачете слика:</label>
                <input type="file" class="form-control" name="file" id="Slika">
                <?php if(!empty($uploadMsg)) { ?>
                <p style="color:red; font-size:18px; text-align:center;"><?php echo $uploadMsg; ?> </p> <?php } ?>
              </div>
              <div class="mx-auto text-center">
                <button type="submit" class="btn btn-md mt-3 btn-info" name="submit" style="background-color:#3b8191">ДОДАДИ НОВА ДОНАЦИЈА</button>
              </div>           
        </form>
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