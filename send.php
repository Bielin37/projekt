<?php

	session_start();
	error_reporting(0);

	$send = $_GET['bnmerty'];	
	
	if (!isset($send))
		{
			header('Location: kontakt.php');
			exit();
		}
	
	if($send==1)
		{
			$alert = 'alert-success';
			$wiersz1 = 'Dziękujemy !';
			$wiersz2 = 'Twoja wiadomość została wysłana do naszej firmy.';
			$wiersz3 = 'Odpowiemy na Twoją wiadomość w ciągu 24 godzin w dni robocze.';
			$wiersz4 = 'Zespół Fabryk okien';
		}
		
	if($send==0)
		{
			$alert = 'alert-danger';
			$wiersz1 = 'Uwaga !';
			$wiersz2 = 'Twoja wiadomość nie została wysłana do naszej firmy.';
			$wiersz3 = 'Prosimy spróbować ponownie. Jeżeli problem będzie się powtarzał prosimy o kontakt pod adres pzsi@ikmaciej.nazwa.pl';
			$wiersz4 = 'Zespół Fabryk Okien.';
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
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="Shortcut icon" href="img/favicon.ico" />
		<script src="js/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.js"></script>
		<title>Fabryka Okien</title>
	</head>

<body>

	<nav class="navbar navbar-light navbar-expand-lg">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent">
				<span class="navbar-toggler-icon"></span>
			</button>
			<img src="img/logo.png" alt="" />
			<div class="collapse navbar-collapse" id="navContent">
				<ul class="nav navbar-nav ml-auto mr-3">
				<li class="nav-item"> <a class="nav-link home" href="index.php">Start</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="sklep.php">Sklep</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="oferta.php">Oferta</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="portfolio.php">Portfolio</a>
				</li>
				 <li class="nav-item active"> <a class="nav-link" href="kontakt.php">Kontakt</a>
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

	<section>
		<div class="container mt-5">
			<div class="alert <?php echo $alert ?>" role="alert">
				<h4 class="alert-heading"><?php echo $wiersz1; ?></h4>
				<p><?php echo $wiersz2; ?></p>
				<p><?php echo $wiersz3; ?></p>
				<p><?php echo $wiersz4; ?></p>
			</div>
		</div>	
	<section>
	
	<section class="bottom-row background_maps">
				<div class="container text-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<h1>Odwiedź biuro naszej firmy</h1>
						</div>
					</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12">
							</div> 
						</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 p-2">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2496.229241161509!2d22.567221215951182!3d51.270099235846416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472257533487c4e5%3A0x557650e8d1a9b118!2sBursaki+12%2C+20-001+Lublin%2C+Polska!5e0!3m2!1spl!2snl!4v1529947216156" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>	
						</div>
					</div>
				</div>
</section>

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