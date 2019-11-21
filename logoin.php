<?php

session_start();
error_reporting(0);

	if ((!isset($_POST['email'])) || (!isset($_POST['haslo'])))
	{
		header('Location: panel.php');
		exit();
	}
		if (isset($_POST['submit']))
	
	{
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
					$email = $_POST['email'];
					$haslo = $_POST['haslo'];
					$email = htmlentities($email, ENT_QUOTES, "UTF-8");
					$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
					
				if ($rezultat = @$polaczenie->query(
					sprintf("SELECT * FROM Klienci WHERE E_mail='%s' AND Haslo='%s'",
					mysqli_real_escape_string($polaczenie,$email),
					mysqli_real_escape_string($polaczenie,$haslo))))
					{
						$ilu_userow = $rezultat->num_rows;
					if($ilu_userow>0)
						{
							$_SESSION['zalogowany'] = true;
							$wiersz = $rezultat->fetch_assoc();
							$_SESSION['ID_Klienta'] = $wiersz['ID_Klienta'];		
							$_SESSION['imie'] = $wiersz['Imie'];
							$_SESSION['nazwisko'] = $wiersz['Nazwisko'];
							$_SESSION['email'] = $wiersz['E_mail'];	
							$_SESSION['ulica'] = $wiersz['Ulica'];
							$_SESSION['numerDomu'] = $wiersz['Nr_domu'];
							$_SESSION['miasto'] = $wiersz['Miasto'];
							$_SESSION['kodPoczta'] = $wiersz['Kod_Pocztowy'];
							$_SESSION['telefon'] = $wiersz['Telefon'];
							$_SESSION['upr'] = $wiersz['upr'];
							
							if($_SESSION['spr']==true)
								{
									unset($_SESSION['spr']);
									header('Location: order.php');
									$polaczenie->close();
								}
							else
								{
									unset($_SESSION['spr']);
									
									if($_SESSION['upr']==1)
										{
											header('Location: admin.php');
											$polaczenie->close();
										}
									else
										{
											header('Location: panel.php');
											$polaczenie->close();
										}
								}
						} 
						
					else 
						{
							$_SESSION['blad'] =  '<div class="false"><div class="alert alert-warning alert-dismissible alert_font"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Błąd !</strong> Błędne hasło lub e-mail.</div></div>';
							$polaczenie->close();
							header('Location: logo.php');
						}
					
					}
						
				}
			}	
			
		catch(Exception $e)
			{
				$_SESSION['e_bladserwer']= '<div class="false"><div class="alert alert-danger alert-dismissible alert_font"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Błąd !</strong> serwera. Prosimy spróbować później.</div></div>';
				/*echo '<br />Informacja developerska: '.$e;*/
			}		
	}
?>