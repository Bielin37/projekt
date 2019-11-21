<?php

session_start();
error_reporting(0);
$_SESSION = array();
session_destroy();
session_unset();

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
			<ul class="nav navbar-nav ml-auto mr-3">
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
			<span><i class="fa fa-user-circle-o link_color2 return" onclick="location.href = 'logo.php';"></i></span></span>
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
				<h4 class="m-2"><i class="fa fa-arrow-circle-right"></i> Etap 6. Sprawdzenie zamówienia oraz ewentualnych płatności</h4>
			</div>
			<div id="" class="progress mb-3">
				<div id="e7" class="progress-bar progress-bar-striped progress-bar-animated" style="width:50%"></div>
				<div id="e8" class="progress-bar progress-bar-striped progress-bar-animated" style="width:100%"></div>
		</div>
	</div>
</div>
<div id="e9" class="mt-2 container border rounded">
	<header class="text-center" ><h1 class="mb-2"> Gratulacje ! </h1></header>
	<header class="text-center" ><h3 class="mb-2"> Twoje zamówienie zostało wysłane do realizacji</h3></header>
	<header class="text-center" ><h3 class="mb-2"> Dziękujemy i zapraszamy ponownie.</h3></header>
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
	</footer>
	
	<section class="text-center text-black copyright color_cop py-3">
		<div class="container">
			<span> © 2018 Copyright: <a href="http://fourbytes.e-kei.pl/pzsi/">Fabryka Okien</a></span>
		</div>
	</section>
	
</body>
</html>