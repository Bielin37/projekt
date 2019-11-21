<?php

session_start();
error_reporting(0);
	
if (isset($_SESSION['zalogowany']))
	{
		$logo = '<i class="fa fa-user-circle-o link_color3 return" onclick="location.href = &quot;panel.php&quot;;"></i>';
	}
else
	{
		$logo = '<i class="fa fa-user-circle-o link_color2 return" onclick="location.href = &quot;logo.php&quot;;"></i>';
	}
	
if($_SESSION['platnosc']==1)
	{
		$_SESSION['platnosc']='Przy odbiorze';
	}
			
if($_SESSION['platnosc']==2)
	{
		$_SESSION['platnosc']='Karta kredytowa';
	}
			
if($_SESSION['platnosc']==3)
	{
		$_SESSION['platnosc']='Przelew bankowy';
	}
	
	if (isset($_POST['submit']))
		{	
			include "php.php";
	
			$konstrukcja = $_POST['konstrukcja'];
			$wysokosc = $_POST['wysokosc']; 
			$szerokosc = $_POST['szerokosc'];
			$wariant = $_POST['wariant'];
			$kolor = $_POST['kolor']; 
			$szyba = $_POST['szyba'];
			$klamka= $_POST['klamka'];
			$osp1 = $_POST['osp1']; 
			$osp2 = $_POST['osp2'];
			$osp3 = $_POST['osp3'];
			$ilosc = $_POST['ilosc'];
			$montaz = $_POST['montaz'];

			$_SESSION['konstrukcja'] = $konstrukcja;
			$_SESSION['wysokosc'] = $wysokosc;
			$_SESSION['szerokosc'] = $szerokosc;
			$_SESSION['wariant'] = $wariant;
			$_SESSION['kolor'] = $kolor;
			$_SESSION['szyba'] = $szyba;
			$_SESSION['klamka'] = $klamka;
			$_SESSION['osp1'] = $osp1;
			$_SESSION['osp2'] = $osp2;
			$_SESSION['osp3'] = $osp3;
			$_SESSION['ilosc'] = $ilosc;
			$_SESSION['montaz'] = $montaz;
			
		nazwaWariant();
		numerZlecenia();
		wartoscZlecenia();
			
		}
?>

<!DOCTYPE html>
<html>

<html lang="pl"> 

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="Shortcut icon" href="img/favicon.ico" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="js/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/angular.js"></script>
		<title>Fabryka Okien</title>
	</head>

<body>

<nav class="navbar navbar-light navbar-expand-lg">
	<div class="container">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent"><span class="navbar-toggler-icon"></span></button>
		<img src="img/logo.png" alt="" />
		<div class="collapse navbar-collapse" id="navContent">
			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item"> <a class="nav-link home" href="index.php">Start</a>
				</li>
				<li class="nav-item active"> <a class="nav-link" href="sklep.php">Sklep</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="oferta.php">Oferta</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="portfolio.php">Portfolio</a>
				</li>
				 <li class="nav-item"> <a class="nav-link" href="kontakt.php">Kontakt</a>
				</li>
			</ul>
		</div>
			<span><?php echo $logo;?></span>
	</div>
</nav>

<div class="jumbotron jumbotron-fluid text-white text-center top">
	<div class="container">
		<h1 class="text-uppercase top-header">Okna <span class="text_nag">dla twojego domu</span><span class="text_nag2"> i biura</span></h1>
		<p class="top-text">Wybierz jakość i doświadczenie !</p>
		<button class="btn btn-warning text-white top-button" type="submit" onclick="location.href = 'oferta.php';">Więcej</button>
	</div>
</div>
	
<div class="container border rounded">
	<header class="text-center" ><h1 class="mb-2"> Zlecenie produkcji okna </h1></header>
		<div class="container m-1 border rounded">
			<div class="col-12 p-2">
				<h4 class="m-2"><i class="fa fa-arrow-circle-right"></i> Etap 5. Sprawdź i zatwierdź zlecenie. </h4>
			</div>
			<div class="table-responsive">
				<table class="table table-warning table-text">
					<thead class="thead-dark">
					  <tr>
						<th>Nr</th>
						<th>Konstrukcja</th>
						<th>Wymiary</th>
						<th>Wariant</th>
						<th>Osprzęt</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>1</td>
						<td><?php echo $_SESSION['konstNazwa']; ?></td>
						<td>Wysokość : <?php echo $_SESSION['wysokosc']; ?> mm<br />Szerokość : <?php echo $_SESSION['szerokosc']; ?> mm</td>
						<td>Wariant : <?php echo $_SESSION['wariantNazwa']; ?> <br />Kolor : <?php echo $_SESSION['wariantKolor'];?> <br />Szyba : <?php echo $_SESSION['wariantSzyba']; ?> <br />Klamka : <?php echo $_SESSION['wariantKlamka']; ?> <br /></td>
						<td>Ogranicznik : <?php echo $_SESSION['wariantOsp1']; ?><br />Nawiewnik : <?php echo $_SESSION['wariantOsp2']; ?><br />Hamulec : <?php echo $_SESSION['wariantOsp3']; ?><br /></td>
					  </tr>
					</tbody>
				</table>
			</div>
			<div class="table-responsive">
				<table class="table table-warning table-text">
					<thead class="thead-dark">
					  <tr>
						<th>Nr</th>
						<th>Montaż</th>
						<th>Ilość</th>
						<th>Cena jednostkowa netto</th>
						<th>Razem brutto</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>1</td>
						<td><?php echo $_SESSION['wariantMontaz']; ?></td>
						<td><?php echo $_SESSION['ilosc']; ?></td>
						<td><strong><?php echo $_SESSION['cenaJ']; ?> zł</strong></td>
						<td><strong><?php echo $_SESSION['wartoscBrutto']; ?> zł</strong></td>
					  </tr>
					</tbody>
				</table>
			</div>
			<div class="table-responsive">
				<table class="table table-warning table-text">
					<thead class="thead-dark">
					  <tr>
						<th>Dane osobowe</th>
						<th>Adres</th>
						<th>Kontakt</th>
						<th>Płatność</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td><?php echo $_SESSION['imie']; ?><br /><?php echo $_SESSION['nazwisko']; ?></td>
						<td><?php echo $_SESSION['ulica']; ?> <?php echo $_SESSION['numerDomu']; ?><br /><?php echo $_SESSION['miasto']; ?><br/><?php echo $_SESSION['kodPoczta']; ?> </td>
						<td><?php echo $_SESSION['telefon']; ?><br /><?php echo $_SESSION['email']; ?></td>
						<td><?php echo $_SESSION['platnosc']; ?></td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
	<div class="container m-1 border rounded">
		<section>
			<div class="col-12 p-2">
				<form action="save.php" method="post">
					<button  type="submit" name="submit" class="btn btn-success"><span><i class="fa fa-check-square-o"></i></span> Zamów i opłać </button>
					</div>
				</form>
		</section>	
	</div>
</div>

<footer>
	<div class="site-footer">
		<div class="container">
				<div class="row pt-3 pb-3">
					<div class="col-xs-12 col-sm-3">
						<p class="footer-color text-uppercase">Nawigacja</p>
							<ul class="nav navbar-nav ml-auto">
								<li class="nav-item"> <a class="nav-link navi-color" href="index.php"><span><i class="fa fa-caret-right"></i></span> Start </a>
								</li>
								<li class="nav-item"> <a class="nav-link navi-color" href="sklep.php"><span><i class="fa fa-caret-right"></i></span> Sklep </a>
								</li>
								<li class="nav-item"> <a class="nav-link navi-color" href="oferta.php"><span><i class="fa fa-caret-right"></i></span> Oferta </a>
								</li>
								<li class="nav-item"> <a class="nav-link navi-color" href="portfolio.php"><span><i class="fa fa-caret-right"></i></span> Portfolio </a>
								</li>
								 <li class="nav-item"> <a class="nav-link navi-color" href="kontakt.php"><span><i class="fa fa-caret-right"></i></span> Kontakt</a>
								</li>
							</ul>
					</div>
					<div class="col-xs-12 col-sm-3">
						<p class="footer-color text-uppercase">Linki</p>
							<ul class="nav navbar-nav ml-auto">
								<li class="nav-item"> <a class="nav-link navi-color" target="_blank" href="index.php"><span><i class="fa fa-caret-right"></i></span> Facebook</a>
								</li>
								<li class="nav-item"> <a class="nav-link navi-color" target="_blank" href="index.php"><span><i class="fa fa-caret-right"></i></span> Blog</a>
								</li>
								
							</ul>
					</div>
					<div class="col-xs-12 col-sm-6">
						<p class="footer-color text-uppercase">Dziękujemy za zaufanie</p>
						<p>W razie pytań prosimy o kontakt z naszymi konsultantami:</p>
						<p><span><i class="fa fa-phone"></i></span> Adrian Bieliński telefon: 111-111-111</p>
						<p><span><i class="fa fa-phone"></i></span> Maciej Wolniak telefon: 222-222-222</p>
						<p><span><i class="fa fa-phone"></i></span> Patryk Sęk telefon: 333-333-333</p>
					</div>	
				</div>
		</div>
	</div>
</footer>
	
<section class="text-center text-black copyright color_cop py-3">
	<div class="container">
		<span> © 2018 Copyright: <a href="http://fourbytes.e-kei.pl/pzsi/">Fabryka Okien</a></span>
	</div>
</section>
	
</body>
</html>