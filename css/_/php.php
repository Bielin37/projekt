<?php

	function nazwaWariant() 
	{
		
		$konstrukcja = $_SESSION['konstrukcja'];
		$wariant = $_SESSION['wariant'];
		$kolor = $_SESSION['kolor'];
		$szyba = $_SESSION['szyba'];
		$klamka = $_SESSION['klamka'];
		$osp1 = $_SESSION['osp1'];
		$osp2 = $_SESSION['osp2'];
		$osp3 = $_SESSION['osp3'];
		$ilosc =	$_SESSION['ilosc'];
		$montaz = $_SESSION['montaz'];
		$platnosc = $_SESSION['platnosc'];
		
		require_once "info.php";
		
		global $konstNazwa, $wariantNazwa, $wariantKolor, $wariantSzyba, $wariantKlamka, $wariantOsp1, $wariantOsp2, $wariantOsp3, $wariantMontaz, $nazwaPlatnosc;
		
		// nazwy konstrukcji
		
		if ($konstrukcja==1) { $konstNazwa = $oknoPoj; }
		if ($konstrukcja==2) { $konstNazwa = $oknoPod1; }
		if ($konstrukcja==3) { $konstNazwa = $oknoPod2; }
		if ($konstrukcja==4) { $konstNazwa = $oknoPot1; }
		if ($konstrukcja==5) { $konstNazwa = $oknoPot2; }
		
		// nazwy wariantów
		
		if ($wariant==1) { $wariantNazwa = $oknoSta; }
		if ($wariant==2) { $wariantNazwa = $oknoUch; }
		if ($wariant==3) { $wariantNazwa = $oknoRoz; }
		if ($wariant==4) { $wariantNazwa = $oknoUchRoz; }
		if ($wariant==5) { $wariantNazwa = $oknoPrz; }
		
		// nazwy kolorów
		
		if ($kolor==1) { $wariantKolor = $oknoKolor1; }
		if ($kolor==2) { $wariantKolor = $oknoKolor2; }
		if ($kolor==3) { $wariantKolor = $oknoKolor3; }
		if ($kolor==4) { $wariantKolor = $oknoKolor4; }
		if ($kolor==5) { $wariantKolor = $oknoKolor5; }
		if ($kolor==6) { $wariantKolor = $oknoKolor6; }
		if ($kolor==7) { $wariantKolor = $oknoKolor7; }
		if ($kolor==8) { $wariantKolor = $oknoKolor8; }
		if ($kolor==9) { $wariantKolor = $oknoKolor9; }
		if ($kolor==10) { $wariantKolor = $oknoKolor10; }
		if ($kolor==11) { $wariantKolor = $oknoKolor11; }
		if ($kolor==12) { $wariantKolor = $oknoKolor12; }
		if ($kolor==13) { $wariantKolor = $oknoKolor13; }
		if ($kolor==14) { $wariantKolor = $oknoKolor14; }
		
		// nazwy szyb
		
		if ($szyba==1) { $wariantSzyba = $oknoSzyba1; }
		if ($szyba==2) { $wariantSzyba = $oknoSzyba2; }
		if ($szyba==3) { $wariantSzyba = $oknoSzyba3; }
		if ($szyba==4) { $wariantSzyba = $oknoSzyba4; }
		if ($szyba==5) { $wariantSzyba = $oknoSzyba5; }
		
		// nazwy klamek
		
		if ($klamka==1) { $wariantKlamka = $oknoKlamka1; }
		if ($klamka==2) { $wariantKlamka = $oknoKlamka2; }
		if ($klamka==3) { $wariantKlamka = $oknoKlamka3; }
		
		// nazwy osprzętu
		
		if ($osp1==1) { $wariantOsp1 = $oknoOsp1; } else { $wariantOsp1 = $oknoOsp2; }
		if ($osp2==1) { $wariantOsp2 = $oknoOsp1; } else { $wariantOsp2 = $oknoOsp2; }
		if ($osp3==1) { $wariantOsp3 = $oknoOsp1; } else { $wariantOsp3 = $oknoOsp2; }
		
		// nazwy montażu
		
		if ($montaz==1) { $wariantMontaz = $oknoMontaz1; }
		if ($montaz==2) { $wariantMontaz = $oknoMontaz2; }
		
		// nazwa platnosci
		
		if ($platnosc==1) { $nazwaPlatnosc = $oknoPlatnosc1; }
		if ($platnosc==2) { $nazwaPlatnosc = $oknoPlatnosc2; }
		if ($platnosc==3) { $nazwaPlatnosc = $oknoPlatnosc3; }
	}
	
	function numerZlecenia() 
	{
		// ustalenie numeru zlecenia
		
		global $numerZlecenia;
		$_SESSION['numerZlecenia'] = $numerZlecenia;
		$numer = $_SESSION['numerZlecenia'];
		
		if($numer==0)
		{
			require_once "connect.php";
			mysqli_report(MYSQLI_REPORT_STRICT);

			try 
			{
				$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
				$polaczenie -> query ('SET NAMES utf8');
				$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
														
					if ($polaczenie->connect_errno!=0)
					{
						throw new Exception(mysqli_connect_errno());
					} 
					else
					{ 
						$Zam1 = $polaczenie->query("SELECT MAX(Nr_Zamowienia) AS NumerZam FROM Numer");
						$Zam2 =  mysqli_fetch_assoc($Zam1);
						$MaxNumer = $Zam2['NumerZam'];		
						$_SESSION['numerZlecenia']  = $MaxNumer;
						$numerZlecenia = $MaxNumer;
					}
						$polaczenie->close();																	
			}
																 
			catch(Exception $e)
			{
				echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
				echo '<br />Informacja developerska: '.$e;
			}															
		}			
	}
		
	
	function wartoscZlecenia()
	{
		// ustalenie ceny produktu
		
		$konstrukcja = $_SESSION['konstrukcja'];
		$wariant = $_SESSION['wariant'];
		$kolor = $_SESSION['kolor'];
		$szyba = $_SESSION['szyba'];
		$klamka = $_SESSION['klamka'];
		$osp1 = $_SESSION['osp1'];
		$osp2 = $_SESSION['osp2'];
		$osp3 = $_SESSION['osp3'];
		$ilosc =	$_SESSION['ilosc'];
		$montaz = $_SESSION['montaz'];
		$wysokosc = $_SESSION['wysokosc']; 
		$szerokosc = $_SESSION['szerokosc'];
		
		global $cenaJ, $wartoscBrutto ;
		
		// ustalenie cen według wariantów
		
		$wartoscO1 = 0;
		$wartoscO2 = 0;
		$wartoscO3 = 0;
		$wartoscMontaz = 0;
		$podatek = 0.23;
		$wartoscAnty = 0;
		$wartoscSzybaS = 0;
		$wartoscKolorD = 0;
		
		if($klamka==1)
		{
			$wartoscKlamka = 5;
		}
		
		if($klamka==2)
		{
			$wartoscKlamka = 10;
		}
		
		if($klamka==3)
		{
			$wartoscKlamka = 15;
		}
		
		if($montaz==2 && $konstrukcja==1)
		{
			$wartoscMontaz = 100;
		}
		if($montaz==2 && $konstrukcja==2 || $konstrukcja==3)
		{
			$wartoscMontaz = 170;
		}
		if($montaz==2 && $konstrukcja==4 || $konstrukcja==5)
		{
			$wartoscMontaz = 230;
		}
		
		if($szyba==5 && $konstrukcja==1)
		{
			$wartoscSzybaA = 100;
			$wartoscOkucia = 80;
			$wartoscAnty = 180;
		}
		
		if($szyba==5 && $konstrukcja==2 || $konstrukcja==3)
		{
			$wartoscSzybaA = 200; 
			$wartoscOkucia = 120;
			$wartoscAnty = 320;
		}
		
		if($szyba==5 && $konstrukcja==4 || $konstrukcja==5)
		{
			$wartoscSzybaA = 300;
			$wartoscOkucia = 160;
			$wartoscAnty = 460;
		}

		if($konstrukcja==1 && $szyba==2 || $szyba==4)	
		{
			$wartoscSzybaS = 60;
		}
		if($konstrukcja==2 && $szyba==2 || $szyba==4)	
		{
			$wartoscSzybaS = 120;
		}
		if($konstrukcja==3 && $szyba==2 || $szyba==4)	
		{
			$wartoscSzybaS = 120;
		}
		if($konstrukcja==4 && $szyba==2 || $szyba==4)	
		{
			$wartoscSzybaS = 180;
		}
		if($konstrukcja==5 && $szyba==2 || $szyba==4)	
		{
			$wartoscSzybaS = 180;
		}
		
		if($kolor>8 && $konstrukcja=1)
		{
			$wartoscKolorD = 60;
		}
		if($kolor>8 && $konstrukcja==2 || $konstrukcja==3)
		{
			$wartoscKolorD = 70;
		}
		if($kolor>8 && $konstrukcja==4 || $konstrukcja==5)
		{
			$wartoscKolorD = 80;
		}
		
		if ($osp1==1) 
		{ 
			$wartoscO1 = 40; 
		} 
		if ($osp2==1) 
		{ 
			$wartoscO2 = 200; 
		} 
		if ($osp3==1 && $konstrukcja==1) 
		{ 
			$wartoscO3 = 70; 
		} 
		if ($osp3==1 && $konstrukcja==2 || $konstrukcja==3) 
		{ 
			$wartoscO3 = 100;
		} 
		if ($osp3==1 && $konstrukcja==4 || $konstrukcja==5) 
		{ 
			$wartoscO3 = 130;
		} 
		
		
		// ustalenie ceny według wymiarów
		
		// wartosc okna nr 1
		
		if($konstrukcja==1 && $wariant==1 && $szyba==1 || $szyba==2)
		{
			if($kolor==1)
			{
				$wartoscOkna = 95;
				$wartoscCm = 1.5;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 400;
			}
			else
			{
				$wartoscOkna = 140;
				$wartoscCm = 1.8;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 400;
			}
		}
		
		if($konstrukcja==1 && $wariant==1 && $szyba>=3)
		{
			if($kolor==1)
			{
				$wartoscOkna = 130;
				$wartoscCm = 1.7;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 400;
			}
			else
			{
				$wartoscOkna = 175;
				$wartoscCm = 2;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 400;
			}
		}
		
		if($konstrukcja==1 && $wariant>=2 && $szyba==1 || $szyba==2)
		{
			if($kolor==1)
			{
				$wartoscOkna = 170;
				$wartoscCm = 2.0;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 400;
			}
			else
			{
				$wartoscOkna = 260;
				$wartoscCm = 2.3;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 400;
			}
		}
		
		if($konstrukcja==1 && $wariant>=2 && $szyba>=3)
		{
			if($kolor==1)
			{
				$wartoscOkna = 220;
				$wartoscCm = 2.1;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 400;
			}
			else
			{
				$wartoscOkna = 300;
				$wartoscCm = 2.4;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 400;
			}
		}
		
		// wartosc okna nr 2
		
		if($konstrukcja==2 && $wariant==1 && $szyba==1 || $szyba==2)
		{
			if($kolor==1)
			{
				$wartoscOkna = 170;
				$wartoscCm = 1.8;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1100;
			}
			else
			{
				$wartoscOkna = 250;
				$wartoscCm = 2.0;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1100;
			}
		}
		
		if($konstrukcja==2 && $wariant>=2 && $szyba>=3)
		{
			if($kolor==1)
			{
				$wartoscOkna = 260;
				$wartoscCm = 1.9;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1100;
			}
			else
			{
				$wartoscOkna = 350;
				$wartoscCm = 2.1;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1100;
			}
		}
		
		if($konstrukcja==2 && $wariant>=2 && $szyba==1 || $szyba==2)
		{
			if($kolor==1)
			{
				$wartoscOkna = 290;
				$wartoscCm = 2.0;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1100;
			}
			else
			{
				$wartoscOkna = 440;
				$wartoscCm = 2.3;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1100;
			}
		}
		
		if($konstrukcja==2 && $wariant>=2 && $szyba>=3)
		{
			if($kolor==1)
			{
				$wartoscOkna = 380;
				$wartoscCm = 2.1;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1100;
			}
			else
			{
				$wartoscOkna = 530;
				$wartoscCm = 2.4;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1100;
			}
		}
		
		// wartosc okna nr 3
		
		if($konstrukcja==3 && $wariant==1 && $szyba==1 || $szyba==2)
		{
			if($kolor==1)
			{
				$wartoscOkna = 270;
				$wartoscCm = 2.0;
				$wartoscWysokosc = 1300;
				$wartoscSzerokosc = 600;
			}
			else
			{
				$wartoscOkna = 410;
				$wartoscCm = 2.1;
				$wartoscWysokosc = 1300;
				$wartoscSzerokosc = 600;
			}
		}
		
		if($konstrukcja==3 && $wariant>=2 && $szyba>=3)
		{
			if($kolor==1)
			{
				$wartoscOkna = 350;
				$wartoscCm = 2.1;
				$wartoscWysokosc = 1300;
				$wartoscSzerokosc = 600;
			}
			else
			{
				$wartoscOkna = 500;
				$wartoscCm = 2.2;
				$wartoscWysokosc = 1300;
				$wartoscSzerokosc = 600;
			}
		}
		
		// wartosc okna nr 4
		
		if($konstrukcja==4 && $wariant==4 && $szyba==1 || $szyba==2)
		{
			if($kolor==1)
			{
				$wartoscOkna = 440;
				$wartoscCm = 2.3;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1600;
			}
			else
			{
				$wartoscOkna = 660;
				$wartoscCm = 2.5;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1600;
			}
		}
		
		if($konstrukcja==4 && $wariant>=5 && $szyba>=3)
		{
			if($kolor==1)
			{
				$wartoscOkna = 550;
				$wartoscCm = 2.4;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1600;
			}
			else
			{
				$wartoscOkna = 790;
				$wartoscCm = 2.6;
				$wartoscWysokosc = 700;
				$wartoscSzerokosc = 1600;
			}
		}
		
		// wartosc okna nr 5
		
		if($konstrukcja==5 && $wariant==4 && $szyba==1 || $szyba==2)
		{
			if($kolor==1)
			{
				$wartoscOkna = 540;
				$wartoscCm = 2.3;
				$wartoscWysokosc = 1900;
				$wartoscSzerokosc = 1100;
			}
			else
			{
				$wartoscOkna = 810;
				$wartoscCm = 2.5;
				$wartoscWysokosc = 1900;
				$wartoscSzerokosc = 1100;
			}
		}
		
		if($konstrukcja==5 && $wariant==4 && $szyba>=3)
		{
			if($kolor==1)
			{
				$wartoscOkna = 790;
				$wartoscCm = 2.4;
				$wartoscWysokosc = 1900;
				$wartoscSzerokosc = 1100;
			}
			else
			{
				$wartoscOkna = 990;
				$wartoscCm = 2.6;
				$wartoscWysokosc = 1900;
				$wartoscSzerokosc = 1100;
			}
		}
		
		
		

		// obliczenie wartości produktu
		
		if($wysokosc == $wartoscWysokosc)
		{
			$wartoscA = 0;
		}
		else
		{
			$wartoscA = ($wysokosc - $wartoscWysokosc) * $wartoscCm;
		}
		if($szerokosc == $wartoscSzerokosc)
		{
			$wartoscB = 0;
		}
		else
		{
			$wartoscB = ($szerokosc - $wartoscSzerokosc) * $wartoscCm;
		}
		
		$cenaJ = $wartoscOkna + $wartoscA + $wartoscB + $wartoscMontaz + $wartoscKlamka + $wartoscAnty + $wartoscSzybaS + $wartoscKolorD + $wartoscO1 + $wartoscO2 + $wartoscO3;
		$wartoscNetto = $ilosc * $cenaJ;
		$wartoscPodatek = $wartoscNetto * $podatek;
		$wartoscBrutto = $wartoscNetto + $wartoscPodatek;
	}
	
?>

