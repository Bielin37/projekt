<?php

session_start();
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
	
if (isset($_POST['submit']))
		{	
			$wszystko_OK = true;
			$Data_zam= date('Y-m-d');
			$ID_Klienta = $_SESSION['ID_Klienta'];
			$wartoscB = $_SESSION['wartoscBrutto'];
			$cenaJ = $_SESSION['cenaJ'];
			$platnoscNazwa = $_SESSION['platnosc'];
			$email = $_SESSION['email'];
			$imie = $_SESSION['imie']; 
			$nazwisko = $_SESSION['nazwisko'];
			$konstNazwa = $_SESSION['konstNazwa'];
			$wysokosc = $_SESSION['wysokosc'];
			$szerokosc = $_SESSION['szerokosc'];
			$wariantKolor = $_SESSION['wariantKolor'];
			$wariantSzyba = $_SESSION['wariantSzyba'];
			$wariantKlamka = $_SESSION['wariantKlamka'];
			$wariantOsp1 = $_SESSION['wariantOsp1'];
			$wariantOsp2 = $_SESSION['wariantOsp2'];
			$wariantOsp3 = $_SESSION['wariantOsp3'];
			$montaz = $_SESSION['wariantMontaz'];
			$ilosc = $_SESSION['ilosc'];
					
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
						$rezultat = $polaczenie->query("SELECT ID_Klienta FROM Klienci WHERE ID_Klienta='$ID_Klienta'");
						if (!$rezultat) throw new Exception($polaczenie->error);
						$ile_id = $rezultat->num_rows;
						
					if($ile_id>0)
						{
							$wszystko_OK=true;
						}	
					 
					if ($wszystko_OK==true)
						{
						if ($polaczenie->query("INSERT INTO `Zamowienia`(`ID_Zamowienia`, `ID_Klienta`, `Data_Zamowienia`, `W_Brutto`, `Cena_J`, `Konst_Nazwa`, `Wysokosc`, `Szerokosc`, `Wariant_Kolor`, `Wariant_Szyba`, `Wariant_Klamka`, `Wariant_Osp1`, `Wariant_Osp2`, `Wariant_Osp3`, `Montaz`, `Platnosc`, `ilosc`) VALUES ('','$ID_Klienta','$Data_zam','$wartoscB','$cenaJ','$konstNazwa','$wysokosc','$szerokosc','$wariantKolor','$wariantSzyba','$wariantKlamka','$wariantOsp1','$wariantOsp2','$wariantOsp3','$montaz','$platnoscNazwa','$ilosc')"))
							{
								$_SESSION['udanarejestracja']=true;
								require_once('src/PHPMailer.php'); 
								require_once('src/SMTP.php'); 
								require_once('src/Exception.php');
										
								$text1 = 'Zamówienie z dnia : '.$Data_zam;
								$text2 = 'Wartośc brutto : '.$wartoscB;
								$text3 = 'Ilość okien : '.$ilosc;
								$text4 = 'Konstrukcja : '.$konstNazwa;
							
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
								$mail->Subject = "Zamówienie produktu";    
								$mail->Body = "Administratorze, \r\n\n dodanie nowego zamówienia : ".$imie.", numer klienta : ".$ID_Klienta.", adres e-mail : ".$email."\n\n Zawartość zamówienia : \n\n".$text1."\n".$text2." zł\n".$text3."\n".$text4; 
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
								$mail->Subject = 'Potwierdzenie zamówienia.';    
								$mail->Body = "Twoje zamówienie : \n".$text1."\n".$text2." zł\n".$text3."\n".$text4."\n\n Dziękujemy za zakupy w naszej firmie.\n\n Fabryka Okien"; 
								$mail->AddAddress ($email);    
								
								if($mail->Send())    
									{
										$polaczenie->close();
										header('Location: finish.php');
									}            
									else   
									{
										$polaczenie->close();
										header('Location: finish.php');
									}

							}
							else
								{
								/*throw new Exception($polaczenie->error);*/
								header('Location: index.php');
								}		
					}
						 $polaczenie->close();			
					}
				}
		catch(Exception $e)
			{
				$_SESSION['e_bladserwer']= '<div class="false"><div class="alert alert-danger alert-dismissible alert_font"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Błąd !</strong> serwera. Prosimy spróbować później.</div></div>';
				//echo '<br />Informacja developerska: '.$e;
			}					
		}
?>