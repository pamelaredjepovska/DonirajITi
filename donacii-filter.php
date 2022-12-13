<?php 
    //include ('id_donacii.php'); 
    require ('database.php');
    session_start();

	if(!isset($_SESSION["id"]))
	{
		header("Location: login.php");
	}
	
	 // delo od id_donacii kopiran tuka
	/* da gi sortira i ogranici postovite na 4 */

	if(!isset($_GET['grad1']) && !isset($_GET['kategorija1']))
	{
		$grad = $_POST['grad'];
		$kategorija = $_POST['kategorija']; 
	}
	else 
	{
		$grad = $_GET['grad1'];
		$kategorija = $_GET['kategorija1'];
	}
	if($grad == 'G' && $kategorija == 'K')
	{
		header("Location: prikazidonacii.php"); 
		//$sql = "SELECT * FROM objavi WHERE Tip='Donacija' ORDER BY Datum desc"; 
	}
	else if ($grad == 'G' && $kategorija != 'K'){
		$sql = "SELECT * FROM objavi WHERE Tip='Donacija' AND KategorijaID = $kategorija ORDER BY Datum desc"; 
	}
	else if ($grad != 'G' && $kategorija == 'K'){
		$sql = "SELECT * FROM objavi WHERE Tip='Donacija' AND Lokacija = '$grad' ORDER BY Datum desc"; 
	}
	else 
	{
		$sql = "SELECT * FROM objavi WHERE Tip='Donacija' AND Lokacija = '$grad' AND KategorijaID = '$kategorija' ORDER BY Datum desc"; 
	}


	$result = mysqli_query($conn, $sql); 
	/* site objavi za donacii
	$sqlall= "SELECT * FROM objavi WHERE Tip='Donacija' ORDER BY Datum desc"; 
	$resultall = mysqli_query($conn, $sqlall); */

	$i = 0; 

	if (mysqli_num_rows($result) > 0) 
	{ 
		// Ispecati ja sodrzinata na sekoj red
		$idarray= array(); //Niza od id na postovite
		while($row = mysqli_fetch_assoc($result)) 
		{ 		
			// Smestuvanje na Objava_ID vo niza	 
			array_push($idarray,$row['Objava_ID']); 
		} 
	} 
	else 
	{ 
		$nemaobjavi="Нема објави за прикажување."; 
	} 
// kraj na delo od id donacii
?> 
<!DOCTYPE html> 
<html lang="en" dir="ltr"> 

<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
	
    <title>Донации</title> 

	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
	
    <!--Font Awesome--> 
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> 

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
    <style> 
        a.navbar-brand.mr-auto img 
        {
            width: 170px;
        }
        body 
        {
            background-color: white !important;
        }
        h1 
        {
            color:#3b8191;
        }
        .btn-primary 
        {
            background-color:#5dbd9e; 
            border:none; 
            left:20px;
            position: relative;
        }
        .btn-primary:hover 
        {
            color: white;
            background-color: #43a384;
            text-decoration: none;
        }
    </style>
	
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
                <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
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
                  <a class="dropdown-item" href="#">Промена на поставки</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Одјави се</a>
                </div>
            </ul>
           </li>
          </div>
      </div>
</nav>

<div class="blog-latest">
    <div class="container"> 
    <br>

    <div class="d-flex flex-row-reverse align-items-center" style="padding-right:0px">
        <div class="p-2"><a class="btn btn-primary btn-xl" href="novadonacija.php">Објави донација</a></div>
        <div class="mr-auto p-2"><h1 style="padding-left:25px;">Резултати од пребарувањето</h1></div>
    </div>
	<form action="" method="post">
        <input type="hidden" name="grad1" value="<?=$grad?>">
        <input type="hidden" name="kategorija1" value="<?=$kategorija?>">
    </form>

	
    <div class="main-carousel p-2" id="latestCarousel"> 
        <div class="row"> 
        <?php 
            // find out how many rows are in the table 
           // $sql = "SELECT COUNT(*) FROM objavi WHERE Tip='Donacija' ORDER BY Datum desc";
            if($grad == 'G' && $kategorija == 'K')
            {
				$sql = "SELECT COUNT(*) FROM objavi WHERE Tip='Donacija' ORDER BY Datum desc"; 
            }
            else if ($grad == 'G' && $kategorija != 'K'){
                $sql = "SELECT COUNT(*) FROM objavi WHERE Tip='Donacija' AND KategorijaID = $kategorija ORDER BY Datum desc"; 
            }
            else if ($grad != 'G' && $kategorija == 'K'){
                $sql = "SELECT COUNT(*) FROM objavi WHERE Tip='Donacija' AND Lokacija = '$grad' ORDER BY Datum desc"; 
            }
            else 
            {
                $sql = "SELECT COUNT(*) FROM objavi WHERE Tip='Donacija' AND Lokacija = '$grad' AND KategorijaID = $kategorija ORDER BY Datum desc"; 
            }
            $result = mysqli_query($conn, $sql);// or trigger_error("SQL", E_USER_ERROR);
            $r = mysqli_fetch_row($result);
            $numrows = $r[0];

            // number of rows to show per page
            $rowsperpage = 10;
            // find out total pages
            $totalpages = ceil($numrows / $rowsperpage);

            // get the current page or set a default
            if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
               // cast var as int
               $currentpage = (int) $_GET['currentpage'];
            } else {
               // default page num
               $currentpage = 1;
            } // end if

            // if current page is greater than total pages...
            if ($currentpage > $totalpages) {
               // set current page to last page
               $currentpage = $totalpages;
            } // end if
            // if current page is less than first page...
            if ($currentpage < 1) {
               // set current page to first page
               $currentpage = 1;
            } // end if

            // the offset of the list, based on current page 
            $offset = ($currentpage - 1) * $rowsperpage;

            // get the info from the db 
           // $sql = "SELECT * FROM objavi WHERE Tip='Donacija' ORDER BY Datum desc LIMIT $offset, $rowsperpage";
            if($grad == 'G' && $kategorija == 'K')
            {
            $sql = "SELECT * FROM objavi WHERE Tip='Donacija' ORDER BY Datum desc LIMIT $offset, $rowsperpage"; 
            }
            else if ($grad == 'G' && $kategorija != 'K'){
                $sql = "SELECT * FROM objavi WHERE Tip='Donacija' AND KategorijaID = $kategorija ORDER BY Datum desc LIMIT $offset, $rowsperpage"; 
            }
            else if ($grad != 'G' && $kategorija == 'K'){
                $sql = "SELECT * FROM objavi WHERE Tip='Donacija' AND Lokacija = '$grad' ORDER BY Datum desc LIMIT $offset, $rowsperpage"; 
            }
            else 
            {
                $sql = "SELECT * FROM objavi WHERE Tip='Donacija' AND Lokacija = '$grad' AND KategorijaID = $kategorija ORDER BY Datum desc LIMIT $offset, $rowsperpage"; 
            }
            $result = mysqli_query($conn, $sql);// or trigger_error("SQL", E_USER_ERROR);

            // while there are rows to be fetched...
            while ($list = mysqli_fetch_assoc($result)) 
            {
                $slika = $list['Picture']; 
                $naslov = $list['Naslov']; 
                $sodrzina = $list['Sodrzina']; 
                $id = $list['Objava_ID'];
               // echo data 
        ?>
		
        <div class="column"> 
            <div class="carousel-cell p-2"> 
            <div class="card mx-4" style="width:30rem; height:400px; object-fit:cover;"> 
                <img class="card-img-top" src="uploads/<?php echo $slika; ?>" alt="Недостапна слика." height="200" style="object-fit:cover;"> 
                <div class="card-body"> 			
                <h5 class="card-title"> 
                    <a href="view.php?postid=<?=$id?>" class="blog-link"> 
                    <?php 
                        echo $naslov; 
                    ?> 
                </h5> 
                </a> 
                <p class="card-subtitle mt-2 text-muted"> 
                    <?php 
                    echo substr($sodrzina, 0, 100); 
                    ?> 
                    <p style="font-size:18px; position: absolute; bottom: 0; right: 15px;">
                        ... <a href="view.php?postid=<?=$id?>">Прочитај повеќе</a></p>
                </p> 
                </div> 
            </div> 
            <?php echo "<br>";?>
            </div> 
        </div>	
		
        <?php } // end while ?>
        </div> <!--Kraj na div class=row za objavite-->
		
        <!--Linkovite so broevite na stranici-->
        <center><div class="footer" style="font-size:20px;">
        <?php 
                /******  build the pagination links ******/
                // range of num links to show
                $range = 5;

                // if not on page 1, don't show back links
                if ($currentpage > 1) {
                   // show << link to go back to page 1
                   echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=1&grad1=$grad&kategorija1=$kategorija'><<</a> ";
                   // get previous page num
                   $prevpage = $currentpage - 1;
                   // show < link to go back to 1 page
                   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage&grad1=$grad&kategorija1=$kategorija'><</a> ";
                } // end if 

                // loop to show links to range of pages around current page
                for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
                   // if it's a valid page number...
                   if (($x > 0) && ($x <= $totalpages)) {
                      // if we're on current page...
                      if ($x == $currentpage) {
                         // 'highlight' it but don't make a link
                         echo " [<b>$x</b>] ";
                      // if not current page...
                      } else {
                         // make it a link
                         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x&grad1=$grad&kategorija1=$kategorija'>$x</a> ";
                      } // end else
                   } // end if 
                } // end for
								 
                // if not on last page, show forward and last page links        
                if ($currentpage != $totalpages) {
                   // get next page
                   $nextpage = $currentpage + 1;
                    // echo forward link for next page 
                   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage&grad1=$grad&kategorija1=$kategorija'>></a> ";
                   // echo forward link for lastpage
                   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages&grad1=$grad&kategorija1=$kategorija'>>></a> ";
                } // end if
                /****** end build pagination links ******/

        ?> 
        </div></center>
    </div> 
    </div> 
</div> 

    <!-- Bootstrap --> 
    <script src=" 
    https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity= 
    "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"> 
    </script> 

    <script src= 
    "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity= 
    "sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"> 
    </script> 
		
    <script src= 
    "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        crossorigin="anonymous"> 
    </script> 
		
    <script src= 
    "https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"> 
    </script> 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body> 

</html> 
