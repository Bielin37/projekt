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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/angular.js"></script>
		<title>Fabryka Okien</title>
	</head>

<body ng-app="myApp" ng-controller="mainCtrl">

	<nav class="navbar navbar-light navbar-expand-lg">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent">
				<span class="navbar-toggler-icon"></span>
			</button>
			<img class="img-fluid" src="img/logo.png" alt="" />
			<div class="collapse navbar-collapse" id="navContent">
				<ul class="nav navbar-nav ml-auto mr-3">
				<li class="nav-item"> <a class="nav-link home" href="index.php">Start</a>
				</li>
				<li class="nav-item active"><a class="nav-link" href="sklep.php">Sklep</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="oferta.php">Oferta</a>
				</li>
				<li class="nav-item"> <a class="nav-link" href="portfolio.php">Portfolio</a>
				</li>
				 <li class="nav-item"> <a class="nav-link" href="kontakt.php">Kontakt</a>
				</li>
			</ul>
			</div>
				<span></span>
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
		<form action="sale.php" method="post" name="myForm" novalidate>
		
			<header class="text-center" ><h1 class="mb-2"> Zamów okno on-line </h1><p>Za pomocą naszego elektronicznego systemu zamówień mają Państwo możliwość zamówienia okna lub okien według ustalonych wymagań.</p></header>
				<div class="container m-1 border rounded">
					<div class="col-xs-12 col-sm-12 p-2">
						<h4 class="m-2"><i class="fa fa-arrow-circle-right link_color return" onclick="location.href = 'sklep.php';"></i> Etap 1. Wybierz konstrukcję okna.</h4>
					</div>
					<section id="parametryTrzecie">
						<div class="row m-2">
							<div class="col-xs-12 col-sm-2 m-3">
								<label class="form-check-label mb-2"><input type="radio" id="oknoPierwsze" class="form-check-input" name="konstrukcja" ng-model="parametryP" value="1" >Pojedyncze</label>
								<img class="fluid form_img" src="img/okno_p.png" alt="" />
							</div>
							<div class="col-xs-12 col-sm-2 m-3">
								<label class="form-check-label mb-2"><input type="radio" id="oknoDrugie" class="form-check-input" name="konstrukcja" ng-model="parametryP" value="2">Podwójne pionowe</label>
								<img class="fluid form_img" src="img/okno_2_pi.png" alt="" />
							</div>
							<div class="col-xs-12 col-sm-2 m-3">
								<label class="form-check-label mb-2"><input type="radio" id="oknoTrzecie" class="form-check-input" name="konstrukcja" ng-model="parametryP" value="3" >Podwójne poziome</label>
								<img class="fluid form_img" src="img/okno_2_po.png" alt="" />
							</div>
							<div class="col-xs-12 col-sm-2 m-3">
								<label class="form-check-label mb-2"><input type="radio" id="oknoCzwarte" class="form-check-input" name="konstrukcja" ng-model="parametryP" value="4">Potrójne typ 1</label>
								<img class="fluid form_img" src="img/okno_p_typ1.png" alt="" />
							</div>
							<div class="col-xs-12 col-sm-2 m-3">
								<label class="form-check-label mb-2"><input type="radio" id="oknoPiate" class="form-check-input" name="konstrukcja" ng-model="parametryP" value="5">Potrójne typ 2</label>
								<img class="fluid form_img" src="img/okno_p_typ2.png" alt="" />
							</div>
						</div>
					</section>		
				</div>
				<div class="container m-1 border rounded" > 
					<div class="col-xs-12 col-sm-12 p-2">
						<h4 class="m-2"><i class="fa fa-arrow-circle-right"></i> Etap 2. Podaj paremetry okna <span class="text-info opis"></span></h4>
					</div>
					<section id="parametryDrugie">
						<div  class="container">
						
						<!-- Okno pierwsze -->
							<div ng-switch="parametryP">
								<div ng-switch-when="1">
									<div class="row" ng-init="wariant=1;kolor=1;szyba=1;klamka=1;montaz=1">
										<div class="col mt-2">
											<div class="col mb-2 border rounded">
												<h5 class="p-2 text-info">Podaj wymiary okna : </h5>
													<label class="mb-2">Wysokość: <span class="text-muted label-text">( minimum 700 mm, maksimum 1800 mm )</span></label><span class="text-info wym_w"></span>
													<input type="number" id="" class="form-control" min="700" max="1800" placeholder="mm" name="wysokosc"  ng-model="wysokosc" required>
													<label class="mb-2 mt-2">Szerokość: <span class="text-muted label-text">( minimum 400 mm, maksimum 2500 mm )</span></label><span class="text-info wym_s"></span>
													<input type="number" id="" class="form-control mb-2" min="400" max="2500" placeholder="mm" name="szerokosc"  ng-model="szerokosc" required>
													<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><input type="checkbox" class="mb-2" ng-model="zatPierwszy"> Zatwierdź wymiary</span>
					
													<div ng-show="zatPierwszy">
														<h5 class="p-2 text-info">Wybierz wariant okna : </h5>
														<input type="radio" id="w1" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="1"><label class="ml-4"> Stałe </label><br />
														<input type="radio" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="2"><label class="ml-4"> Uchylne </label><br />
														<input type="radio" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="3"><label class="ml-4"> Rozwierane ( lewo - prawo )</label><br />
														<input type="radio" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="4"><label class="ml-4"> Uchylne + Rozwierane ( lewo - prawo )</label><br />
													
														<h5 class="p-2 text-info">Wybierz kolor okna : </h5>
														<input type="radio" id="w2" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="1"><label class="ml-4"> Biały </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="2"><label class="ml-4"> Szary</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="3"><label class="ml-4"> Żółty </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="4"><label class="ml-4"> Niebieski </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="5"><label class="ml-4"> Brązowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="6"><label class="ml-4"> Zielony</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="7"><label class="ml-4"> Kremowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="8"><label class="ml-4"> Kość słoniowa </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="9"><label class="ml-4"> Ciemny dąb </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="10"><label class="ml-4"> Mahoń</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="11"><label class="ml-4"> Dąb naturalny </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="12"><label class="ml-4"> Palisander </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="13"><label class="ml-4"> Orzech </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="14"><label class="ml-4"> Daglezja</label><br />
													
														<h5 class="p-2 text-info">Wybierz rodzaj szyby : </h5>
														<input type="radio" id="w3" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="1" ><label class="ml-4"> Termiczna podwójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="2"><label class="ml-4"> Termiczna podwójna smoczyszcząca</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="3"><label class="ml-4"> Termiczna potrójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="4"><label class="ml-4"> Termiczna potrójna samoczyszcząca </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="5"><label class="ml-4"> Termiczna potrójna antywłamaniowa + okucia</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj klamki : </h5>
														<input type="radio" id="w4" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="1" ><label class="ml-4"> Klamka zwykła</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="2"><label class="ml-4"> Klamka dwuramienna</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="3"><label class="ml-4"> Klamka z kluczykiem </label><br />
														
														<h5 class="p-2 text-info">Osprzęt dodatkowy : </h5>
														<input type="checkbox" id="w5" class="form-check-input ml-1" name="osp1" ng-model="osp1" value="1"><label class="ml-4"> Ogranicznik </label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp2" ng-model="osp2" value="1"><label class="ml-4"> Nawiewnik</label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp3" ng-model="osp3" value="1"><label class="ml-4"> Hamulec</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj montażu okna : </h5>
														<input type="radio" id="w6" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="1"  ><label class="ml-4"> Bez usługi montażu </label><br />
														<input type="radio" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="2"><label class="ml-4"> Montaż wykonany przez oficjalnego partnera </label><br />
														
														<h5 class="p-2 text-info">Podaj ilość tych samych okien : </h5>
														<input type="number" id="" class="form-control mb-3" min="1" max="100" placeholder="sztuk" name="ilosc"  ng-model="ilosc" required>	

															<script> $(document).ready(function() 
																{	
																	$( "#w1, #w2, #w3, #w4, #w6" ).prop( "checked", true ); 
																	
																});								
															</script>
	
													</div>
											</div>
										</div>
										<div class="col m-2 border rounded">
											<div class="p-4 m-3 border rounded">
												<h4 class="text-center p-2"><strong> Parametry Twojego okna </strong></h4>
												<img class="fluid min_img text-center mb-3" src="img/okno_p.png" alt="" />
												<span> Okno podwójne pionowe </span><br />
												<span> Wysokość : {{ wysokosc }} </span><span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												<span>Szerokość : {{ szerokosc }} </span><span ng-show="myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												
												<div ng-switch="wariant">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Stałe</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Uchylne</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Rozwierane ( lewo - prawo )</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Uchylne + Rozwierane ( lewo - prawo )</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="kolor">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Biały</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Szary</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Żółty</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Niebieski</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Brązowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="6">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Zielony</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="7">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kremowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="8">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kość słoniowa</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="9">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Ciemny dąb</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="10">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Mahoń</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="11">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Dąb naturalny</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="12">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Palisander</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="13">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Orzech</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="14">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Daglezja</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="szyba">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna antywłamaniowa+okucia</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="klamka">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Zwykła</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Dwuramienna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : z kluczykiem</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
									
												<div ng-show="osp1">
													<span>Osprzęt dodatkowy : Ogranicznik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp2">
													<span>Osprzęt dodatkowy : Nawiewnik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp3">
													<span>Osprzęt dodatkowy : Hamulec</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												
												<div ng-switch="montaz">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Bez montażu</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Oficjalny partner</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
												
												<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> Ilość tych samych okien : {{ ilosc }} <span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> <i class="fa fa-check text-success"></i></span></span><br />
											
											</div>
											<!--<div class="p-4 m-3 border rounded">
												<h5> Cenna jednostkowa netto : <strong ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> {{ (wysokosc  * 2 ) * ilosc}} zł </strong></h5>
											</div>-->
										</div>
									</div>
								</div>
							</div>
							
							
							<!-- Okno drugie -->
							
							<div ng-switch="parametryP">
								<div ng-switch-when="2">
									<div class="row" ng-init="wariant=1;kolor=1;szyba=1;klamka=1;montaz=1">
										<div class="col mt-2">
											<div class="col mb-2 border rounded">
												<h5 class="p-2 text-info">Podaj wymiary okna : </h5>
													<label class="mb-2">Wysokość: <span class="text-muted label-text">( minimum 700 mm, maksimum 1800 mm )</span></label><span class="text-info wym_w"></span>
													<input type="number" id="" class="form-control" min="700" max="1800" placeholder="mm" name="wysokosc"  ng-model="wysokosc" required>
													<label class="mb-2 mt-2">Szerokość: <span class="text-muted label-text">( minimum 1100 mm, maksimum 2500 mm )</span></label><span class="text-info wym_s"></span>
													<input type="number" id="" class="form-control mb-2" min="1100" max="2500" placeholder="mm" name="szerokosc"  ng-model="szerokosc" required>
													<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><input type="checkbox" class="mb-2" ng-model="zatPierwszy"> Zatwierdź wymiary</span>
					
													<div ng-show="zatPierwszy">
														<h5 class="p-2 text-info">Wybierz wariant okna : </h5>
														<input type="radio" id="w7" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="1" ><label class="ml-4"> Stałe </label><br />
														<input type="radio" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="2"><label class="ml-4"> Uchylne </label><br />
														<input type="radio" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="3"><label class="ml-4"> Rozwierane ( lewo - prawo )</label><br />
														<input type="radio" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="4"><label class="ml-4"> Uchylne + Rozwierane ( lewo - prawo )</label><br />
														<input type="radio" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="5"><label class="ml-4"> Przesuwne </label><br />
													
														<h5 class="p-2 text-info">Wybierz kolor okna : </h5>
														<input type="radio" id="w8" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="1" ><label class="ml-4"> Biały </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="2"><label class="ml-4"> Szary</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="3"><label class="ml-4"> Żółty </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="4"><label class="ml-4"> Niebieski </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="5"><label class="ml-4"> Brązowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="6"><label class="ml-4"> Zielony</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="7"><label class="ml-4"> Kremowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="8"><label class="ml-4"> Kość słoniowa </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="9"><label class="ml-4"> Ciemny dąb </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="10"><label class="ml-4"> Mahoń</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="11"><label class="ml-4"> Dąb naturalny </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="12"><label class="ml-4"> Palisander </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="13"><label class="ml-4"> Orzech </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="14"><label class="ml-4"> Daglezja</label><br />
													
														<h5 class="p-2 text-info">Wybierz rodzaj szyby : </h5>
														<input type="radio" id="w9" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="1" ><label class="ml-4"> Termiczna podwójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="2"><label class="ml-4"> Termiczna podwójna smoczyszcząca</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="3"><label class="ml-4"> Termiczna potrójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="4"><label class="ml-4"> Termiczna potrójna samoczyszcząca </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="5"><label class="ml-4"> Termiczna potrójna antywłamaniowa + okucia</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj klamki : </h5>
														<input type="radio" id="w10" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="1" ><label class="ml-4"> Klamka zwykła</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="2"><label class="ml-4"> Klamka dwuramienna</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="3"><label class="ml-4"> Klamka z kluczykiem </label><br />
														
														<h5 class="p-2 text-info">Osprzęt dodatkowy : </h5>
														<input type="checkbox" id="w11" class="form-check-input ml-1" name="osp1" ng-model="osp1" value="1"><label class="ml-4"> Ogranicznik </label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp2" ng-model="osp2" value="1"><label class="ml-4"> Nawiewnik</label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp3" ng-model="osp3" value="1"><label class="ml-4"> Hamulec</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj montażu okna : </h5>
														<input type="radio" id="w12" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="1"><label class="ml-4"> Bez usługi montażu </label><br />
														<input type="radio" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="2"><label class="ml-4"> Montaż wykonany przez oficjalnego partnera </label><br />
														
														<h5 class="p-2 text-info">Podaj ilość tych samych okien : </h5>
														<input type="number" id="" class="form-control mb-3" min="1" max="100" placeholder="sztuk" name="ilosc"  ng-model="ilosc" required>
														
														<script> $(document).ready(function() 
																{	
																	$( "#w7, #w8, #w9, #w10, #w12" ).prop( "checked", true ); 
																	
																});								
															</script>
	
													</div>
											</div>
										</div>
										<div class="col m-2 border rounded">
											<div class="p-4 m-3 border rounded">
												<h4 class="text-center p-2"><strong> Parametry Twojego okna </strong></h4>
												<img class="fluid min_img text-center mb-3" src="img/okno_2_pi.png" alt="" />
												<span> Okno podwójne pionowe </span><br />
												<span> Wysokość : {{ wysokosc }} </span><span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												<span>Szerokość : {{ szerokosc }} </span><span ng-show="myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												
												<div ng-switch="wariant">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Stałe</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Uchylne</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Rozwierane ( lewo - prawo, otwieranie środek ) </span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Uchylne + Rozwierane ( lewo - prawo, otwieranie środek )</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Przesuwne</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="kolor">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Biały</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Szary</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Żółty</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Niebieski</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Brązowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="6">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Zielony</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="7">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kremowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="8">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kość słoniowa</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="9">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Ciemny dąb</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="10">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Mahoń</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="11">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Dąb naturalny</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="12">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Palisander</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="13">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Orzech</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="14">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Daglezja</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="szyba">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna antywłamaniowa+okucia</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="klamka">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Zwykła</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Dwuramienna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : z kluczykiem</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
									
												<div ng-show="osp1">
													<span>Osprzęt dodatkowy : Ogranicznik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp2">
													<span>Osprzęt dodatkowy : Nawiewnik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp3">
													<span>Osprzęt dodatkowy : Hamulec</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												
												<div ng-switch="montaz">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Bez montażu</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Oficjalny partner</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
												
												<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> Ilość tych samych okien : {{ ilosc }} <span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> <i class="fa fa-check text-success"></i></span></span><br />
											
											</div>
											<!--<div class="p-4 m-3 border rounded">
												<h5> Cenna jednostkowa netto : <strong ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> {{ (wysokosc  * 2 ) * ilosc}} zł </strong></h5>
											</div>-->
										</div>
									</div>
								</div>
							</div>
							
							<!-- Okno trzecie -->
							
							<div ng-switch="parametryP">
								<div ng-switch-when="3">
									<div class="row" ng-init="wariant=5;kolor=1;szyba=1;klamka=1;montaz=1">
										<div class="col mt-2">
											<div class="col mb-2 border rounded">
												<h5 class="p-2 text-info">Podaj wymiary okna : </h5>
													<label class="mb-2">Wysokość: <span class="text-muted label-text">( minimum 1300 mm, maksimum 2500 mm )</span></label><span class="text-info wym_w"></span>
													<input type="number" id="" class="form-control" min="1300" max="2500" placeholder="mm" name="wysokosc"  ng-model="wysokosc" required>
													<label class="mb-2 mt-2">Szerokość: <span class="text-muted label-text">( minimum 600 mm, maksimum 1500 mm )</span></label><span class="text-info wym_s"></span>
													<input type="number" id="" class="form-control mb-2" min="600" max="1500" placeholder="mm" name="szerokosc"  ng-model="szerokosc" required>
													<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><input type="checkbox" class="mb-2" ng-model="zatPierwszy"> Zatwierdź wymiary</span>
					
													<div ng-show="zatPierwszy">
														<h5 class="p-2 text-info">Wybierz wariant okna : </h5>
														<input type="radio" id="w13" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="5"><label class="ml-4"> Przesuwne </label><br />
													
														<h5 class="p-2 text-info">Wybierz kolor okna : </h5>
														<input type="radio" id="w14" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="1"><label class="ml-4"> Biały </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="2"><label class="ml-4"> Szary</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="3"><label class="ml-4"> Żółty </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="4"><label class="ml-4"> Niebieski </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="5"><label class="ml-4"> Brązowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="6"><label class="ml-4"> Zielony</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="7"><label class="ml-4"> Kremowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="8"><label class="ml-4"> Kość słoniowa </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="9"><label class="ml-4"> Ciemny dąb </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="10"><label class="ml-4"> Mahoń</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="11"><label class="ml-4"> Dąb naturalny </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="12"><label class="ml-4"> Palisander </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="13"><label class="ml-4"> Orzech </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="14"><label class="ml-4"> Daglezja</label><br />
													
														<h5 class="p-2 text-info">Wybierz rodzaj szyby : </h5>
														<input type="radio" id="w15" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="1"><label class="ml-4"> Termiczna podwójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="2"><label class="ml-4"> Termiczna podwójna smoczyszcząca</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="3"><label class="ml-4"> Termiczna potrójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="4"><label class="ml-4"> Termiczna potrójna samoczyszcząca </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="5"><label class="ml-4"> Termiczna potrójna antywłamaniowa + okucia</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj klamki : </h5>
														<input type="radio" id="w16" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="1"><label class="ml-4"> Klamka zwykła</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="2"><label class="ml-4"> Klamka dwuramienna</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="3"><label class="ml-4"> Klamka z kluczykiem </label><br />
														
														<h5 class="p-2 text-info">Osprzęt dodatkowy : </h5>
														<input type="checkbox" id="w17" class="form-check-input ml-1" name="osp1" ng-model="osp1" value="1"><label class="ml-4"> Ogranicznik </label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp2" ng-model="osp2" value="1"><label class="ml-4"> Nawiewnik</label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp3" ng-model="osp3" value="1"><label class="ml-4"> Hamulec</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj montażu okna : </h5>
														<input type="radio" id="w18" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="1"><label class="ml-4"> Bez usługi montażu </label><br />
														<input type="radio" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="2"><label class="ml-4"> Montaż wykonany przez oficjalnego partnera </label><br />
														
														<h5 class="p-2 text-info">Podaj ilość tych samych okien : </h5>
														<input type="number" id="" class="form-control mb-3" min="1" max="100" placeholder="sztuk" name="ilosc"  ng-model="ilosc" required>
														
														<script> $(document).ready(function() 
																{	
																	$( "#w13, #w14, #w15, #w16, #w18" ).prop( "checked", true ); 
																	
																});								
															</script>
	
													</div>
											</div>
										</div>
										<div class="col m-2 border rounded">
											<div class="p-4 m-3 border rounded">
												<h4 class="text-center p-2"><strong> Parametry Twojego okna </strong></h4>
												<img class="fluid min_img text-center mb-3" src="img/okno_2_po.png" alt="" />
												<span> Okno podwójne poziome </span><br />
												<span> Otwierane jedynie okno górne </span><br />
												<span> Wysokość : {{ wysokosc }} </span><span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												<span>Szerokość : {{ szerokosc }} </span><span ng-show="myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												
												<div ng-switch="wariant">
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Przesuwne</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="kolor">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Biały</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Szary</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Żółty</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Niebieski</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Brązowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="6">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Zielony</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="7">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kremowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="8">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kość słoniowa</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="9">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Ciemny dąb</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="10">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Mahoń</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="11">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Dąb naturalny</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="12">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Palisander</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="13">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Orzech</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="14">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Daglezja</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="szyba">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna antywłamaniowa+okucia</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="klamka">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Zwykła</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Dwuramienna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : z kluczykiem</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
									
												<div ng-show="osp1">
													<span>Osprzęt dodatkowy : Ogranicznik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp2">
													<span>Osprzęt dodatkowy : Nawiewnik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp3">
													<span>Osprzęt dodatkowy : Hamulec</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												
												<div ng-switch="montaz">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Bez montażu</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Oficjalny partner</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
												
												<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> Ilość tych samych okien : {{ ilosc }} <span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> <i class="fa fa-check text-success"></i></span></span><br />
											
											</div>
											<!--<div class="p-4 m-3 border rounded">
												<h5> Cenna jednostkowa netto : <strong ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> {{ (wysokosc  * 2 ) * ilosc}} zł </strong></h5>
											</div>-->
										</div>
									</div>
								</div>
							</div>
							
							<!-- Okno czwarte -->
							
							<div ng-switch="parametryP">
								<div ng-switch-when="4">
									<div class="row" ng-init="wariant=4;kolor=1;szyba=1;klamka=1;montaz=1">
										<div class="col mt-2">
											<div class="col mb-2 border rounded">
												<h5 class="p-2 text-info">Podaj wymiary okna : </h5>
													<label class="mb-2">Wysokość: <span class="text-muted label-text">( minimum 700 mm, maksimum 2000 mm )</span></label><span class="text-info wym_w"></span>
													<input type="number" id="" class="form-control" min="700" max="2000" placeholder="mm" name="wysokosc"  ng-model="wysokosc" required>
													<label class="mb-2 mt-2">Szerokość: <span class="text-muted label-text">( minimum 1600 mm, maksimum 3000 mm )</span></label><span class="text-info wym_s"></span>
													<input type="number" id="" class="form-control mb-2" min="1600" max="3000" placeholder="mm" name="szerokosc"  ng-model="szerokosc" required>
													<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><input type="checkbox" class="mb-2" ng-model="zatPierwszy"> Zatwierdź wymiary</span>
					
													<div ng-show="zatPierwszy">
														<h5 class="p-2 text-info">Wybierz wariant okna : </h5>
														<input type="radio" id="w19" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="4"><label class="ml-4"> Uchylne + Rozwierane ( lewo - prawo )</label><br />
														<input type="radio" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="5"><label class="ml-4"> Przesuwne </label><br />
													
														<h5 class="p-2 text-info">Wybierz kolor okna : </h5>
														<input type="radio" id="w20" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="1"><label class="ml-4"> Biały </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="2"><label class="ml-4"> Szary</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="3"><label class="ml-4"> Żółty </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="4"><label class="ml-4"> Niebieski </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="5"><label class="ml-4"> Brązowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="6"><label class="ml-4"> Zielony</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="7"><label class="ml-4"> Kremowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="8"><label class="ml-4"> Kość słoniowa </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="9"><label class="ml-4"> Ciemny dąb </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="10"><label class="ml-4"> Mahoń</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="11"><label class="ml-4"> Dąb naturalny </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="12"><label class="ml-4"> Palisander </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="13"><label class="ml-4"> Orzech </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="14"><label class="ml-4"> Daglezja</label><br />
													
														<h5 class="p-2 text-info">Wybierz rodzaj szyby : </h5>
														<input type="radio" id="w21" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="1" ><label class="ml-4"> Termiczna podwójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="2"><label class="ml-4"> Termiczna podwójna smoczyszcząca</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="3"><label class="ml-4"> Termiczna potrójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="4"><label class="ml-4"> Termiczna potrójna samoczyszcząca </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="5"><label class="ml-4"> Termiczna potrójna antywłamaniowa + okucia</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj klamki : </h5>
														<input type="radio" id="w22" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="1" ><label class="ml-4"> Klamka zwykła</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="2"><label class="ml-4"> Klamka dwuramienna</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="3"><label class="ml-4"> Klamka z kluczykiem </label><br />
														
														<h5 class="p-2 text-info">Osprzęt dodatkowy : </h5>
														<input type="checkbox" id="w23" class="form-check-input ml-1" name="osp1" ng-model="osp1" value="1"><label class="ml-4"> Ogranicznik </label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp2" ng-model="osp2" value="1"><label class="ml-4"> Nawiewnik</label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp3" ng-model="osp3" value="1"><label class="ml-4"> Hamulec</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj montażu okna : </h5>
														<input type="radio" id="w24" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="1"  ><label class="ml-4"> Bez usługi montażu </label><br />
														<input type="radio" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="2"><label class="ml-4"> Montaż wykonany przez oficjalnego partnera </label><br />
														
														<h5 class="p-2 text-info">Podaj ilość tych samych okien : </h5>
														<input type="number" id="" class="form-control mb-3" min="1" max="100" placeholder="sztuk" name="ilosc"  ng-model="ilosc" required>
														
														<script> $(document).ready(function() 
																{	
																	$( "#w19, #w20, #w21, #w22, #w24" ).prop( "checked", true ); 
																	
																});								
														</script>
	
													</div>
											</div>
										</div>
										<div class="col m-2 border rounded">
											<div class="p-4 m-3 border rounded">
												<h4 class="text-center p-2"><strong> Parametry Twojego okna </strong></h4>
												<img class="fluid min_img text-center mb-3" src="img/okno_p_typ1.png" alt="" />
												<span> Okno potrójne typ 1 </span><br />
												<span> Stałe okno środkowe </span><br />
												<span> Wysokość : {{ wysokosc }} </span><span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												<span>Szerokość : {{ szerokosc }} </span><span ng-show="myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												
												<div ng-switch="wariant">
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Uchylne + Rozwierane ( lewo - prawo, otwieranie środek )</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Przesuwne</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="kolor">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Biały</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Szary</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Żółty</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Niebieski</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Brązowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="6">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Zielony</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="7">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kremowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="8">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kość słoniowa</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="9">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Ciemny dąb</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="10">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Mahoń</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="11">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Dąb naturalny</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="12">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Palisander</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="13">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Orzech</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="14">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Daglezja</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="szyba">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna antywłamaniowa+okucia</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="klamka">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Zwykła</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Dwuramienna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : z kluczykiem</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
									
												<div ng-show="osp1">
													<span>Osprzęt dodatkowy : Ogranicznik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp2">
													<span>Osprzęt dodatkowy : Nawiewnik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp3">
													<span>Osprzęt dodatkowy : Hamulec</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												
												<div ng-switch="montaz">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Bez montażu</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Oficjalny partner</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
												
												<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> Ilość tych samych okien : {{ ilosc }} <span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> <i class="fa fa-check text-success"></i></span></span><br />
											
											</div>
											<!--<div class="p-4 m-3 border rounded">
												<h5> Cenna jednostkowa netto : <strong ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> {{ (wysokosc  * 2 ) * ilosc}} zł </strong></h5>
											</div>-->
										</div>
									</div>
								</div>
							</div>
							
							<!-- Okno piąte -->
							
							<div ng-switch="parametryP">
								<div ng-switch-when="5">
									<div class="row" ng-init="wariant=4;kolor=1;szyba=1;klamka=1;montaz=1">
										<div class="col mt-2">
											<div class="col mb-2 border rounded">
												<h5 class="p-2 text-info">Podaj wymiary okna : </h5>
													<label class="mb-2">Wysokość: <span class="text-muted label-text">( minimum 1900 mm, maksimum 3000 mm )</span></label><span class="text-info wym_w"></span>
													<input type="number" id="" class="form-control" min="1900" max="3000" placeholder="mm" name="wysokosc"  ng-model="wysokosc" required>
													<label class="mb-2 mt-2">Szerokość: <span class="text-muted label-text">( minimum 1100 mm, maksimum 2200 mm )</span></label><span class="text-info wym_s"></span>
													<input type="number" id="" class="form-control mb-2" min="1100" max="2200" placeholder="mm" name="szerokosc"  ng-model="szerokosc" required>
													<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><input type="checkbox" class="mb-2" ng-model="zatPierwszy"> Zatwierdź wymiary</span>
					
													<div ng-show="zatPierwszy">
														<h5 class="p-2 text-info">Wybierz wariant okna : </h5>
														<input type="radio" id="w25" class="form-check-input ml-1" name="wariant"  ng-model="wariant" value="4"><label class="ml-4"> Uchylne + Rozwierane ( lewo - prawo )</label><br />
													
														<h5 class="p-2 text-info">Wybierz kolor okna : </h5>
														<input type="radio" id="w26" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="1" ><label class="ml-4"> Biały </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="2"><label class="ml-4"> Szary</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="3"><label class="ml-4"> Żółty </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="4"><label class="ml-4"> Niebieski </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="5"><label class="ml-4"> Brązowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="6"><label class="ml-4"> Zielony</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="7"><label class="ml-4"> Kremowy </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="8"><label class="ml-4"> Kość słoniowa </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="9"><label class="ml-4"> Ciemny dąb </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="10"><label class="ml-4"> Mahoń</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="11"><label class="ml-4"> Dąb naturalny </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="12"><label class="ml-4"> Palisander </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="13"><label class="ml-4"> Orzech </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="kolor"  ng-model="kolor" value="14"><label class="ml-4"> Daglezja</label><br />
													
														<h5 class="p-2 text-info">Wybierz rodzaj szyby : </h5>
														<input type="radio" id="w27" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="1" ><label class="ml-4"> Termiczna podwójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="2"><label class="ml-4"> Termiczna podwójna smoczyszcząca</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="3"><label class="ml-4"> Termiczna potrójna </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="4"><label class="ml-4"> Termiczna potrójna samoczyszcząca </label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="szyba"  ng-model="szyba" value="5"><label class="ml-4"> Termiczna potrójna antywłamaniowa + okucia</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj klamki : </h5>
														<input type="radio" id="w28" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="1" ><label class="ml-4"> Klamka zwykła</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="2"><label class="ml-4"> Klamka dwuramienna</label><br />
														<input type="radio" id="" class="form-check-input ml-1" name="klamka"  ng-model="klamka" value="3"><label class="ml-4"> Klamka z kluczykiem </label><br />
														
														<h5 class="p-2 text-info">Osprzęt dodatkowy : </h5>
														<input type="checkbox" id="w29" class="form-check-input ml-1" name="osp1" ng-model="osp1" value="1"><label class="ml-4"> Ogranicznik </label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp2" ng-model="osp2" value="1"><label class="ml-4"> Nawiewnik</label><br />
														<input type="checkbox" id="" class="form-check-input ml-1" name="osp3" ng-model="osp3" value="1"><label class="ml-4"> Hamulec</label><br />
														
														<h5 class="p-2 text-info">Wybierz rodzaj montażu okna : </h5>
														<input type="radio" id="w30" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="1" ><label class="ml-4"> Bez usługi montażu </label><br />
														<input type="radio" class="form-check-input ml-1" name="montaz"  ng-model="montaz" value="2"><label class="ml-4"> Montaż wykonany przez oficjalnego partnera </label><br />
														
														<h5 class="p-2 text-info">Podaj ilość tych samych okien : </h5>
														<input type="number" id="" class="form-control mb-3" min="1" max="100" placeholder="sztuk" name="ilosc"  ng-model="ilosc" required>
														
														<script> $(document).ready(function() 
																{	
																	$( "#w25, #w26, #w27, #w28, #w30" ).prop( "checked", true ); 
																	
																});								
														</script>
	
													</div>
											</div>
										</div>
										<div class="col m-2 border rounded">
											<div class="p-4 m-3 border rounded">
												<h4 class="text-center p-2"><strong> Parametry Twojego okna </strong></h4>
												<img class="fluid min_img text-center mb-3" src="img/okno_p_typ2.png" alt="" />
												<span> Okno potrójne typ 2</span><br />
												<span> Stałe okno górne</span><br />
												<span> Wysokość : {{ wysokosc }} </span><span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												<span>Szerokość : {{ szerokosc }} </span><span ng-show="myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> mm <i class="fa fa-check text-success"></i></span><br />
												
												<div ng-switch="wariant">
													
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Wariant : Uchylne + Rozwierane ( lewo - prawo, otwieranie środek )</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													
												</div>
												
												<div ng-switch="kolor">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Biały</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Szary</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Żółty</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Niebieski</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Brązowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="6">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Zielony</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="7">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kremowy</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="8">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Kość słoniowa</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="9">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Ciemny dąb</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="10">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Mahoń</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="11">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Dąb naturalny</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="12">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Palisander</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="13">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Orzech</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="14">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Kolor ramy : Daglezja</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="szyba">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna podwójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="4">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna samoczyszcząca</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="5">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Szyba : Termiczna potrójna antywłamaniowa+okucia</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
												</div>
												
												<div ng-switch="klamka">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Zwykła</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : Dwuramienna</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="3">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Klamka : z kluczykiem</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
									
												<div ng-show="osp1">
													<span>Osprzęt dodatkowy : Ogranicznik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp2">
													<span>Osprzęt dodatkowy : Nawiewnik</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												<div ng-show="osp3">
													<span>Osprzęt dodatkowy : Hamulec</span> <i class="fa fa-check text-success"></i></span><br />
												</div>
												
												<div ng-switch="montaz">
													<div ng-switch-when="1">
														<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Bez montażu</span> <i class="fa fa-check text-success"></i></span><br />
													</div>
													<div ng-switch-when="2">
															<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"><span>Montaż : Oficjalny partner</span> <i class="fa fa-check text-success"></i></span><br />
													</div>		
												</div>
												
												<span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> Ilość tych samych okien : {{ ilosc }} <span ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine"> <i class="fa fa-check text-success"></i></span></span><br />
											
											</div>
											<!--<div class="p-4 m-3 border rounded">
												<h5> Cenna jednostkowa netto : <strong ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine"> {{ (wysokosc  * 2 ) * ilosc}} zł </strong></h5>
											</div>-->
										</div>
									</div>
								</div>
							</div>
							
						</div>		
					</section>
				</div>
				
					
			<div class="container m-1 border rounded">
				<section>
					<div class="row">
						<div class="col-xs-12 col-sm-6 p-2">
							<button type="button" class="btn btn-danger" onclick="location.href = 'sklep.php';"><span><i class="fa fa-eraser"></i></span> Wyczyść </button>
						</div>
						<div class="col-xs-12 col-sm-6 p-2">
							<button ng-show="myForm.wysokosc.$valid && !myForm.wysokosc.$pristine && myForm.szerokosc.$valid && !myForm.szerokosc.$pristine" type="submit" name="submit" class="btn btn-success"><span><i class="fa fa-calculator"></i></span> Przelicz i zamów</button>
						</div>
					</div>	
				</section>	
			</div>
		</form>
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