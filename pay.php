<?php

session_start();
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['zalogowany']))
	{
		$logo = '<i class="fa fa-user-circle-o link_color3 return" onclick="location.href = &quot;panel.php&quot;;"></i>';
	}
else
	{
		$logo = '<i class="fa fa-user-circle-o link_color2 return" onclick="location.href = &quot;logo.php&quot;;"></i>';
	}

include "php.php";

	if (isset($_POST['zamow']))
		{	

			$konstrukcja = $_SESSION['konstrukcja'];
			$platnosc = $_POST['platnosc'];
			$rejestracja = $_POST['rejestracja'];
			$_SESSION['platnosc'] = $platnosc;
			
	
		nazwaWariant();
		
			$_SESSION['platnoscNazwa']  = $nazwaPlatnosc;
			
			if($rejestracja==2)
			{
				$abredklr19asrq = 1;
				header('Location: logo.php?abredkl19asrq='.$abredklr19asrq);
			}
			
			if($rejestracja==3)
			{
				header('Location: order.php');
			}
		}

	if (isset($_POST['submit']))
		{	
			$wszystko_OK=true;
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$email = $_POST['email'];
			$haslo = $_POST['haslo'];
			$haslo2 = $_POST['haslo2'];
			$pesel = $_POST['pesel'];
			$ulica = $_POST['ulica'];
			$numerDomu = $_POST['numerDomu'];
			$miasto = $_POST['miasto'];
			$kodPoczta = $_POST['kodPoczta'];
			$telefon = $_POST['telefon'];
			$typ = $_POST['typ'];
			$nip = $_POST['nip'];
			$regon = $_POST['regon'];
			$nazwaPrze = $_POST['nazwaPrze'];
			$regulamin = $_POST['regulamin'];	
			
			$_SESSION['imie'] = $imie;
			$_SESSION['nazwisko'] = $nazwisko;
			$_SESSION['email'] = $email;
			$_SESSION['ulica'] = $ulica;
			$_SESSION['numerDomu'] = $numerDomu;
			$_SESSION['miasto'] = $miasto;
			$_SESSION['kodPoczta'] = $kodPoczta;
			$_SESSION['telefon'] = $telefon;
				
			$_SESSION['p_imie'] = $imie;
			$_SESSION['p_nazwisko'] = $nazwisko;
			$_SESSION['p_email'] = $email;
			$_SESSION['p_haslo'] = $haslo;
			$_SESSION['p_haslo2'] = $haslo2;
			$_SESSION['p_pesel'] = $pesel;
			$_SESSION['p_ulica'] = $ulica;
			$_SESSION['p_numerDomu'] = $numerDomu;
			$_SESSION['p_miasto'] = $miasto;
			$_SESSION['p_kodPoczta'] = $kodPoczta;
			$_SESSION['p_telefon'] = $telefon;
			$_SESSION['p_typ1'] = $typ;
			$_SESSION['p_typ2'] = $typ;
			$_SESSION['p_nip'] = $nip;
			$_SESSION['p_regon'] = $regon;
			$_SESSION['p_nazwaPrze'] = $nazwaPrze;
			$_SESSION['p_regulamin'] = $regulamin;
			
			$Data_rej = date('Y-m-d');
	
			echo $Data_rej;
			if ((strlen($imie)<3))
				{
					$wszystko_OK=false;
					$_SESSION['e_imie']='Podaj imię';
				}
			if ((strlen($nazwisko)<2))
				{
					$wszystko_OK=false;
					$_SESSION['e_nazwisko']='Podaj nazwisko';
				}
			if ((strlen($email)<5))
				{
					$wszystko_OK=false;
					$_SESSION['e_email']='Podaj e-mail';
				}
			$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
			if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
				{
					$wszystko_OK=false;
					$_SESSION['e_email']= 'Podaj porawny adres e-mail';
				}
			if ((strlen($haslo)<8) || (strlen($haslo)>20))
				{
					$wszystko_OK=false;
					$_SESSION['e_haslo']='Hasło musi posiadać od 8 do 20 znaków';
				}
		
			if ($haslo!=$haslo2)
				{
					$wszystko_OK=false;
					$_SESSION['e_haslo2']='Podane hasła nie są identyczne';
				}	

			if ((strlen($pesel)<11))
				{
					$wszystko_OK=false;
					$_SESSION['e_pesel']='Podaj PESEL';
				}
			if ((strlen($ulica)<3))
				{
					$wszystko_OK=false;
					$_SESSION['e_ulica']='Podaj ulicę';
				}
			if ((strlen($numerDomu)<1))
				{
					$wszystko_OK=false;
					$_SESSION['e_numerDomu']='Podaj numer domu';
				}
			if ((strlen($miasto)<3))
				{
					$wszystko_OK=false;
					$_SESSION['e_miasto']='Podaj miasto';
				}
			if ((strlen($kodPoczta)<6))
				{
					$wszystko_OK=false;
					$_SESSION['e_kodPoczta']='Podaj kod pocztowy';
				}
			if ((strlen($telefon)<5))
				{
					$wszystko_OK=false;
					$_SESSION['e_telefon']='Podaj telefon';
				}
			if($typ=='Firma')
				{
					$_SESSION['p_typ2'] = 'selected';
					
					if ((strlen($nazwaPrze)<2))
						{
							$wszystko_OK=false;
							$_SESSION['e_nazwaPrze']='Podaj nazwę firmy';
						}
					if ((strlen($nip)<10))
						{
							$wszystko_OK=false;
							$_SESSION['e_nip']='Podaj NIP';
						}
					if ((strlen($regon)<9))
						{
							$wszystko_OK=false;
							$_SESSION['e_regon']='Podaj REGON';
						}
				}
				
			if (!isset($regulamin))
				{
					$wszystko_OK=false;
					$_SESSION['e_regulamin']='Przeczytaj i zatwierdź regulamin';
				}		
				
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
				
			try
				{
					$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
					$polaczenie -> query ('SET NAMES utf8');
					$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
					
				if ($polaczenie->connect_errno!=0)
					{
						throw new Exception(mysqli_connect_errno());
					}
				else
					{					
						$rezultat = $polaczenie->query("SELECT ID_Klienta FROM Klienci WHERE e_mail='$email'");
						if (!$rezultat) throw new Exception($polaczenie->error);
						$ile_takich_maili = $rezultat->num_rows;
						
					if($ile_takich_maili>0)
						{
							$wszystko_OK=false;
							$_SESSION['e_email']='Istnieje już konto przypisane do tego adresu e-mail';
						}	
					 
					if ($wszystko_OK==true)
						{
						if ($polaczenie->query("INSERT INTO `Klienci` (`ID_Klienta`,`PESEL`,`Nazwisko`,`Imie`,`Ulica`,`Nr_domu`,`Miasto`,`Kod_Pocztowy`,`Telefon`,`E_mail`,`NIP`,`Rodzaj`,`Nazwa`,`REGON`,`Haslo`,`Data_rej`) VALUES ('','$pesel','$nazwisko','$imie','$ulica','$numerDomu','$miasto','$kodPoczta','$telefon','$email','$nip','$typ','$nazwaPrze','$regon','$haslo','$Data_rej')"))
							{
								$_SESSION['udanarejestracja']=true;
								require_once('src/PHPMailer.php'); 
								require_once('src/SMTP.php'); 
								require_once('src/Exception.php');
							
								$mail = new PHPMailer(); 
								$mail-> CharSet = "UTF-8";
								$mail->From = "pzsi@ikmaciej.nazwa.pl"; 
								$mail->FromName = $imie.", ".$email;    
								$mail->AddReplyTo('pzsi@ikmaciej.nazwa.pl', 'noreply'); 
								$mail->Host = "ikmaciej.nazwa.pl";    
								$mail->Mailer = "smtp";  
								$mail->SMTPAuth = true;    
								$mail->Username = "pzsi@ikmaciej.nazwa.pl";   
								$mail->Password = "FabrykaOkien2"; 
								$mail->Port = 587;
								$mail->Subject = "Rejestracja nowego klienta";    
								$mail->Body = "Administratorze, \r\n\n zarejestrowanie nowego użytkownika : ".$imie.", adres e-mail : ".$email."\n\n Treść wiadomość : \n\n"; 
								$mail->AddAddress ('pzsi@ikmaciej.nazwa.pl');    
								$mail->send();
								
								$mail = new PHPMailer(); 
								$mail -> CharSet = "UTF-8";
								$mail->From = "pzsi@ikmaciej.nazwa.pl"; 
								$mail->FromName = "Fabryka okien";    
								$mail->AddReplyTo('pzsi@ikmaciej.nazwa.pl', 'noreply'); 
								$mail->Host = "ikmaciej.nazwa.pl";    
								$mail->Mailer = "smtp";  
								$mail->SMTPAuth = true;    
								$mail->Username = "pzsi@ikmaciej.nazwa.pl";    
								$mail->Password = "FabrykaOkien2"; 
								$mail->Port = 587;
								$mail->Subject = 'Potwierdzenie rejestracji.';    
								$mail->Body = "Dziękujemy za rejestrację w naszej firmie.\n\n Fabryka Okien"; 
								$mail->AddAddress ($email);    
								
								if($mail->Send())    
									{
										$polaczenie->close();
										$abredklr19asrq = 1;
										$_SESSION['platnoscNazwa']  = $nazwaPlatnosc;
										header('Location: logo.php?abredkl19asrq='.$abredklr19asrq);
									}            
									else   
									{
										$polaczenie->close();
										$abredklr19asrq = 1;
										$_SESSION['platnoscNazwa']  = $nazwaPlatnosc;
										header('Location: logo.php?abredkl19asrq='.$abredklr19asrq);
									}
							}
							else
								{
								/*throw new Exception($polaczenie->error);*/
								}		
					}
						 $polaczenie->close();			
					}
				}
		catch(Exception $e)
			{
				$_SESSION['e_bladserwer']= '<div class="false"><div class="alert alert-danger alert-dismissible alert_font"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Błąd !</strong> serwera. Prosimy spróbować później.</div></div>';
				echo '<br />Informacja developerska: '.$e;
			}					
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
		<script src='https://www.google.com/recaptcha/api.js'></script>
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
				<h4 class="m-2"><i class="fa fa-arrow-circle-right"></i> Etap 4. Podaj swoje dane.</h4>
			</div>
				<div class="row">
					<div class="col mt-2">
						<div class="col mb-2 border rounded">
							<form action="" method="post" >
								<div class="form-group m-2">
									<label for="">Imię :</label>
									<input type="text" class="form-control" name="imie" maxlength="35" value="<?php if (isset($_SESSION['p_imie'])) { echo $_SESSION['p_imie']; unset($_SESSION['p_imie']); } ?>"  id="<?php if (isset($_SESSION['e_imie'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_imie'];unset($_SESSION['e_imie']);?>" />
									<label for="">Nazwisko :</label>
									<input type="text" class="form-control" name="nazwisko" maxlength="35" value="<?php if (isset($_SESSION['p_nazwisko'])) { echo $_SESSION['p_nazwisko']; unset($_SESSION['p_nazwisko']); } ?>"  id="<?php if (isset($_SESSION['e_nazwisko'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_nazwisko'];unset($_SESSION['e_nazwisko']);?>" />
									<label for="">e-mail :</label>
									<input type="text" class="form-control" name="email" maxlength="255" value="<?php if (isset($_SESSION['p_email'])) { echo $_SESSION['p_email']; unset($_SESSION['p_email']); } ?>"  id="<?php if (isset($_SESSION['e_email'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_email'];unset($_SESSION['e_email']);?>" />
									<label for="">Hasło :</label>
									<input type="password" class="form-control" name="haslo" maxlength="20" value="<?php if (isset($_SESSION['p_haslo'])) { echo $_SESSION['p_haslo']; unset($_SESSION['p_haslo']); } ?>"  id="<?php if (isset($_SESSION['e_haslo'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_haslo'];unset($_SESSION['e_haslo']);?>" />
									<label for="">Powtórz hasło :</label>
									<input type="password" class="form-control" name="haslo2" maxlength="20" value="<?php if (isset($_SESSION['p_haslo2'])) { echo $_SESSION['p_haslo2']; unset($_SESSION['p_haslo2']); } ?>"  id="<?php if (isset($_SESSION['e_haslo2'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_haslo2'];unset($_SESSION['e_haslo2']);?>" />
									<label for="">PESEL :</label>
									<input type="text" class="form-control" name="pesel" maxlength="11" value="<?php if (isset($_SESSION['p_pesel'])) { echo $_SESSION['p_pesel']; unset($_SESSION['p_pesel']); } ?>"  id="<?php if (isset($_SESSION['e_pesel'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_pesel'];unset($_SESSION['e_pesel']);?>" />
									<label for="">Ulica :</label>
									<input type="text" class="form-control" name="ulica" maxlength="35" value="<?php if (isset($_SESSION['p_ulica'])) { echo $_SESSION['p_ulica']; unset($_SESSION['p_ulica']); } ?>"  id="<?php if (isset($_SESSION['e_ulica'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_ulica'];unset($_SESSION['e_ulica']);?>" />
									<label for="">Numer domu :</label>
									<input type="text" class="form-control" name="numerDomu" maxlength="35" value="<?php if (isset($_SESSION['p_numerDomu'])) { echo $_SESSION['p_numerDomu']; unset($_SESSION['p_numerDomu']); } ?>"  id="<?php if (isset($_SESSION['e_numerDomu'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_numerDomu'];unset($_SESSION['e_numerDomu']);?>" />
									<label for="">Miasto :</label>
									<input type="text" class="form-control" name="miasto" maxlength="35" value="<?php if (isset($_SESSION['p_miasto'])) { echo $_SESSION['p_miasto']; unset($_SESSION['p_miasto']); } ?>"  id="<?php if (isset($_SESSION['e_miasto'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_miasto'];unset($_SESSION['e_miasto']);?>" />
									<label for="">Kod pocztowy :</label>
									<input type="text" class="form-control" name="kodPoczta" maxlength="6" value="<?php if (isset($_SESSION['p_kodPoczta'])) { echo $_SESSION['p_kodPoczta']; unset($_SESSION['p_kodPoczta']); } ?>"  id="<?php if (isset($_SESSION['e_kodPoczta'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_kodPoczta'];unset($_SESSION['e_kodPoczta']);?>" />
									<label for="">Telefon :</label>
									<input type="text" class="form-control" name="telefon" maxlength="15" value="<?php if (isset($_SESSION['p_telefon'])) { echo $_SESSION['p_telefon']; unset($_SESSION['p_telefon']); } ?>"  id="<?php if (isset($_SESSION['e_telefon'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_telefon'];unset($_SESSION['e_telefon']);?>" />							
									<label for="">Typ klienta :</label>
									<select class="spr_100 form-control" value="" name="typ"><option <?php if (isset($_SESSION['p_typ1'])) { echo $_SESSION['p_typ1']; unset($_SESSION['p_typ1']); } ?> >Prywatny</option><option <?php if (isset($_SESSION['p_typ2'])) { echo $_SESSION['p_typ2']; unset($_SESSION['p_typ2']); } ?>>Firma</option></select><?php if (isset($_SESSION['e_typ'])) {unset($_SESSION['e_typ']); } ?> 											
									<label for="">Nazwa przedsiębiorstwa :</label>
									<input type="text" class="form-control in_101" name="nazwaPrze" maxlength="35" disabled="disabled" value="<?php if (isset($_SESSION['p_nazwaPrze'])) { echo $_SESSION['p_nazwaPrze']; unset($_SESSION['p_nazwaPrze']); } ?>"  id="<?php if (isset($_SESSION['e_nazwaPrze'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_nazwaPrze'];unset($_SESSION['e_nazwaPrze']);?>" />
									<label for="">NIP :</label>
									<input type="text" class="form-control in_101" name="nip" maxlength="10" disabled="disabled" value="<?php if (isset($_SESSION['p_nip'])) { echo $_SESSION['p_nip']; unset($_SESSION['p_nip']); } ?>"  id="<?php if (isset($_SESSION['e_nip'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_nip'];unset($_SESSION['e_nip']);?>" />
									<label for="">REGON :</label>
									<input type="text" class="form-control in_101" name="regon" maxlength="9" disabled="disabled" value="<?php if (isset($_SESSION['p_regon'])) { echo $_SESSION['p_regon']; unset($_SESSION['p_regon']); } ?>"  id="<?php if (isset($_SESSION['e_regon'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_regon'];unset($_SESSION['e_regon']);?>" />
									
									<input type="checkbox" class="ml-1 mt-2 form-check-input" name="regulamin" <?php if (isset($_SESSION['p_regulamin'])) { echo "checked"; unset($_SESSION['p_regulamin']); }?> id="<?php if (isset($_SESSION['e_regulamin'])) { echo 'popoverOption'; } ?>" data-placement="left" data-trigger="hover"  data-toggle="popover" data-content="<?php echo $_SESSION['e_regulamin'];unset($_SESSION['e_regulamin']);?>"/><label class=" mt-2 ml-4 form-check-label">Akceptuję regulamin</label><br />
													
									<button type="submit" class="m-1 mt-2 btn btn-success " name="submit" role="button"><span><i class="fa fa-check-square-o"></i></span> Zatwierdź <span></button>
								</div>	
							</form>
						</div>
					</div>
					<div class="col mt-2">
						<div class="col mb-2 border rounded">
							<h5 class="text-center"> Zamówione okno - <?php echo $_SESSION['konstNazwa']; ?> </h5>
							<h5 class="text-center"> Sztuk - <?php echo $_SESSION['ilosc']; ?> </h5>
							<h5 class="text-center"> Kwota brutto zamówienia - <strong><?php echo $_SESSION['wartoscBrutto']; ?> zł </strong></h5>
							<h5 class="text-center"> Płatność - <?php echo $_SESSION['platnoscNazwa']; ?> </h5>
						</div>
					</div>
				</div>
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
</footer>
	
<section class="text-center text-black copyright color_cop py-3">
	<div class="container">
		<span> © 2018 Copyright: <a href="http://fourbytes.e-kei.pl/pzsi/">Fabryka Okien</a></span>
	</div>
</section>
	
</body>
</html>