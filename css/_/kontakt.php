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
	
	if (isset($_POST['submit']))
		{ 
	
		$wszystko_OK=true;
	
		$name = $_POST['name'];
		$email = $_POST['email']; 
		$temat = $_POST['temat'];
		$text = $_POST['text'];
				
		$_SESSION['p_name'] = $name;		
		$_SESSION['p_temat'] = $temat;
		$_SESSION['p_email'] = $email;
		$_SESSION['p_text'] = $text;

	
			if ((strlen($name)<3))
				{
					$wszystko_OK=false;
					$_SESSION['e_name']='Podaj imię i nazwisko';
				}
				
			if ((strlen($email)<5))
				{
					$wszystko_OK=false;
					$_SESSION['e_email']='Podaj adres e-mail';
				}			
			$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
			
			if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
				{
					$wszystko_OK=false;
					$_SESSION['e_email']= 'Podaj porawny adres e-mail';
				}				
			if ((strlen($temat)<6))
				{
					$wszystko_OK=false;
					$_SESSION['e_temat']='Podaj temat';
				}
			if ((strlen($text)<6))
				{
					$wszystko_OK=false;
					$_SESSION['e_text']='Podaj treść wiadomości';
				}			
			if ($wszystko_OK==true)
				{	
					require_once('src/PHPMailer.php'); 
					require_once('src/SMTP.php'); 
					require_once('src/Exception.php');
				
					$mail = new PHPMailer(); 
					$mail-> CharSet = "UTF-8";
					$mail->From = "pzsi@ikmaciej.nazwa.pl"; 
					$mail->FromName = $name.", ".$email;    
					$mail->AddReplyTo('pzsi@ikmaciej.nazwa.pl', 'noreply'); 
					$mail->Host = "ikmaciej.nazwa.pl";    
					$mail->Mailer = "smtp";  
					$mail->SMTPAuth = true;    
					$mail->Username = "pzsi@ikmaciej.nazwa.pl";   
					$mail->Password = "FabrykaOkien2"; 
					$mail->Port = 587;
					$mail->Subject = $temat;    
					$mail->Body = "Administratorze, \r\n\n otrzymałeś wiadomość od użytkownika : ".$name.", adres e-mail : ".$email."\n\n Treść wiadomość : \n\n".$text."\n"; 
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
					$mail->Subject = 'Potwierdzenie wysłania wiadomości.';    
					$mail->Body = "Dziękujemy za wysłanie wiadomości do naszego biura. Odpowiemy na Twoją wiadomość w ciągu 24 godzin w dni robocze.\n\n Fabryka Okien"; 
					$mail->AddAddress ($email);    
					
					if($mail->Send())    
						{
							$mail = new PHPMailer(); 
							$mail-> CharSet = "UTF-8";
							$mail->From = $email; 
							$mail->FromName = $name.", ".$email;    
							$mail->AddReplyTo($email); 
							$mail->Host = "ikmaciej.nazwa.pl";    
							$mail->Mailer = "smtp";  
							$mail->SMTPAuth = true;    
							$mail->Username = "pzsi@ikmaciej.nazwa.pl";   
							$mail->Password = "FabrykaOkien2"; 
							$mail->Port = 587;
							$mail->Subject = $temat." - wiadomość ze strony";    
							$mail->Body = $text; 
							$mail->AddAddress ('pzsi@ikmaciej.nazwa.pl');    
							$mail->send();
							 
							$send = 1;
							unset($_SESSION['name']);			
							unset($_SESSION['email']);	
							unset($_SESSION['temat']);
							unset($_SESSION['text']);	
							header("Location: send.php?bnmerty=$send");
						}            
						else   
						{
							$send = 0;
							header("Location: send.php?bnmerty=$send");		
						}
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
		<div class="container border rounded mb-3">
			<header class="text-center mb-5" ><h1 class="mb-2 text-primary"> KONTAKT </h1></header>
			<div class="container mb-3">
				<div class="row">
					<div class="col-xs-12 col-sm-6 border rounded">
						<header class="p-2" ><h4>Napisz do nas</h4></header>
							<form action="" method="post" >
									<div class="form-group m-2" ng-controller="myCtrl">
										<label for="n_ame">Imię i nazwisko :</label>
										<input type="text" class="form-control" name="name" maxlength="35" value="<?php if (isset($_SESSION['p_name'])) { echo $_SESSION['p_name']; unset($_SESSION['p_name']); } ?>"  id="<?php if (isset($_SESSION['e_name'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_name'];unset($_SESSION['e_name']);?>" />
										<label for="e_mail">Adres e-mail : </label>
										<input type="text" class="form-control" name="email" maxlength="254" value="<?php if (isset($_SESSION['p_email'])) { echo $_SESSION['p_email']; unset($_SESSION['p_email']); } ?>"  id="<?php if (isset($_SESSION['e_email'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_email'];unset($_SESSION['e_email']);?>" />
										<label for="t_ematl">Temat : </label>
										<input type="text" class="form-control" name="temat" maxlength="50" value="<?php if (isset($_SESSION['p_temat'])) { echo $_SESSION['p_temat']; unset($_SESSION['p_temat']); } ?>"  id="<?php if (isset($_SESSION['e_temat'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_temat'];unset($_SESSION['e_temat']);?>" />
										<label for="comment">Wiadomość : </label>
										<textarea  type="text" class="form-control input_news" ng-change="myFunc()" rows="6" maxlength="500" name="text" ng-model="myValue"  id="<?php if (isset($_SESSION['e_text'])) { echo 'popoverOption'; } ?>"  data-placement="top" data-trigger="hover" data-toggle="popover" data-content="<?php echo $_SESSION['e_text'];unset($_SESSION['e_text']);?>"><?php if (isset($_SESSION['p_text'])) { echo $_SESSION['p_text']; unset($_SESSION['p_text']); } ?></textarea>
										<p>Maksymalnie 500 znaków. </p>			
										<button type="submit" class="m-2 btn btn-success " href="contact.html" name="submit" role="button"><span><i class="fa fa-envelope-open-o"></i></span> Wyślij </button>
									</div>	
							</form>	
					</div>
					<div class="col-xs-12 col-sm-6 border rounded text-center">
						<header class="p-2" ><h4>Kontakt z naszą firmą</h4></header>
							<p class="m-0"><h1 class="display-4"><span><i class="	fa fa-graduation-cap link_color"></i></span></h1> Projekt zespołowy WSPA Lublin</p>Adrian Bieliński<br />Sęk Patryk<br />Maciej Wolniak</p>
							<p class="m-0"><h1 class="display-4"><span><i class="fa fa-map-marker link_color"></i></span></h1> 20-150 Lublin ul. Bursaki 12</p>
							<p class="m-0"><h1 class="display-4"><span><i class="fa fa-mobile link_color"></i></span></h1>+48 800 - 800 - 800</p>
							<p class="m-0"><h1 class="display-4"><span><i class="fa fa-envelope link_color"></i></span></h1>pzsi@ikmaciej.nazwa.pl</p>
							<p class="m-0"><h1 class="display-4"><span><i class="fa fa-clock-o link_color"></i></span></h1>Pon-pią 9:00 – 17:00 </p>
					</div>
				</div>
			</div>	
		</div>
	</section>
	
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