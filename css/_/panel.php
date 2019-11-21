<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
if (isset($_SESSION['zalogowany']))
	{
		if($_SESSION['upr']==1)
			{
			$logo = '<i class="fa fa-user-circle-o link_color4 return" onclick="location.href = &quot;admin.php&quot;;"></i>';							
			}
		else
			{
				$logo = '<i class="fa fa-user-circle-o link_color3 return" onclick="location.href = &quot;panel.php&quot;;"></i>';
			}
	}
else
	{
		$logo = '<i class="fa fa-user-circle-o link_color2 return" onclick="location.href = &quot;logo.php&quot;;"></i>';
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
				<li class="nav-item active"> <a class="nav-link home" href="index.php">Start</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="sklep.php">Sklep</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="oferta.php">Oferta</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="portfolio.php">Portfolio</a>
				</li>
				 <li class="nav-item"> <a class="nav-link" href="kontakt.php">Kontakt</a>
				</li>
			</ul>
		</div>
			<span><?php echo $logo; ?></span>
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
	<header class="text-center" ><h1 class="mb-4"> Witamy <?php echo $_SESSION['imie']; ?> w panelu klienta</h1></header>
		<div class="container m-1">
			<div class="row">
				<div class="col-xs-12 col-sm-6 border rounded">
						<h1 class="text-uppercase page-label2 text-danger">Twoje dane</h1>
							<p>Imię : <?php echo $_SESSION['imie']; ?></p>
							<p>Nazwisko : <?php echo $_SESSION['nazwisko']; ?></p>
							<p>Telefon : <?php echo $_SESSION['telefon']; ?></p>
							<p>e-mail : <?php echo $_SESSION['email']; ?></p>
							<p>Ulica : <?php echo $_SESSION['ulica']; ?></p>
							<p>Numer domu : <?php echo $_SESSION['numerDomu']; ?></p>
							<p>Miasto : <?php echo $_SESSION['miasto']; ?></p>
							<p>Kod pocztowy : <?php echo $_SESSION['kodPoczta']; ?></p>
				</div>
				<div class="col-xs-12 col-sm-6 border rounded">
						<h1 class="text-uppercase page-label2 text-danger">Twoje zamówienia</h1>
<?php

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
	
try
	{
		$idKlient = $_SESSION['ID_Klienta'];
		
		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
		$polaczenie -> query ('SET NAMES utf8');
		$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
		
			if ($polaczenie->connect_errno!=0)
				{
					throw new Exception(mysqli_connect_errno());
				}
			else
				{				
				if ($rezultat = @$polaczenie->query(
					sprintf("SELECT * FROM Zamowienia WHERE ID_Klienta='$idKlient'",
					mysqli_real_escape_string($polaczenie,$idKlient))))
					{
						$ilu_userow = $rezultat->num_rows;
					if($ilu_userow>0)
						{
							for ($i = 1; $i <= $ilu_userow; $i++)
								{
									$wiersz = $rezultat->fetch_assoc();		
									$idZamowienia = $wiersz['ID_Zamowienia'];	
									$wartoscB = $wiersz['W_Brutto'];	
									$data = $wiersz['Data_Zamowienia'];	
									$konst = $wiersz['Konst_Nazwa'];	
									
									echo '<p class="text-zam">Numer: '.$idZamowienia.'| Wartosc brutto: '.$wartoscB.'| Data zamówienia :'.$data.'| Typ : '.$konst;
								}	
						} 
						
					else 
						{
							$_SESSION['blad'] =  '<div class="false"><div class="alert alert-warning alert-dismissible alert_font"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Błąd !</strong> Błędne serwera.</div></div>';
							$polaczenie->close();
						}
					}			
				}
			}		
		catch(Exception $e)
			{
				$_SESSION['e_bladserwer']= '<div class="false"><div class="alert alert-danger alert-dismissible alert_font"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Błąd !</strong> serwera. Prosimy spróbować później.</div></div>';
				/*echo '<br />Informacja developerska: '.$e;*/
			}		
?>						
						
						
						
				</div>
			</div>	
		</div>
		<form action="logoout.php">
			<button type="submit" class="m-1 mt-2 btn btn-warning " name="submit" role="button"><span><i class="fa fa-sign-out"></i></span> Wyloguj <span></button>
		</form>
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