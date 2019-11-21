// JQuery

$(document).ready(function() {
	
	$("#e3_okno").hide();
	$("#e2_okno").hide();

	
	$("#okno_1").click(function(){
		$("#e2_okno").show();
		$( ".opis" ).html( " pojedynczego." );
		$("#e1_okno").hide();
		$( ".img_okno" ).html( '<img class="fluid min_img" src="img/okno_p.png" alt="" />' );
		$( ".wym_w" ).html( "( 700-1800mm )");
		$( ".wym_s" ).html( "( 400-2500mm )");
		
			$("#zatWym1").click(function(){
			$("#e3_okno").show();
			$("#w05,#w06,#w07,#w08").hide();
			
			});
		
	});
	
	$("#okno_2").click(function(){
		$("#e2_okno").show();
		$( ".opis" ).html( " podwójnego pionowego." );
		$("#e1_okno").hide();
		$( ".img_okno" ).html( '<img class="fluid min_img" src="img/okno_2_pi.png" alt="" />' );
		$( ".wym_w" ).html( "( 700-1800mm )");
		$( ".wym_s" ).html( "( 1100-2500mm )");
		
			$("#zatWym2").click(function(){
			$("#e3_okno").show();
			$("#w06,#w07,#w08").hide();
			
			});
	});
	
	$("#okno_3").click(function(){
		$("#e2_okno").show();
		$( ".opis" ).html( " podwójnego poziomego." );
		$("#e1_okno").hide();
		$( ".img_okno" ).html( '<img class="fluid min_img" src="img/okno_2_po.png" alt="" />' );
		$( ".wym_w" ).html( "( 1300-2500mm )");
		$( ".wym_s" ).html( "( 600-1500mm )");
		
			$("#zatWym3").click(function(){
			$("#e3_okno").show();
			});
	});
	
	$("#okno_4").click(function(){
		$("#e2_okno").show();
		$( ".opis" ).html( " potrójnego typ 1." );
		$("#e1_okno").hide();
		$( ".img_okno" ).html( '<img class="fluid min_img" src="img/okno_p_typ1.png" alt="" />' );
		$( ".wym_w" ).html( "( 700-2000mm )");
		$( ".wym_s" ).html( "( 1600-3000mm )");
		
			$("#zatWym4").click(function(){
			$("#e3_okno").show();
			});
	});
	
	$("#okno_5").click(function(){
		$("#e2_okno").show();
		$( ".opis" ).html( " potrójnego typ 2." );
		$("#e1_okno").hide();
		$( ".img_okno" ).html( '<img class="fluid min_img" src="img/okno_p_typ2.png" alt="" />' );
		$( ".wym_w" ).html( "( 1900-3800mm )");
		$( ".wym_s" ).html( "( 1100-2200mm )");
		
			$("#zatWym5").click(function(){
			$("#e3_okno").show();
			});
	});
	
		
	$(".return").click(function(){
		$("#e1_okno").show();
		$( ".opis" ).html( "" );
		$("#e2_okno").hide();
		$("#e3_okno").hide();
	});
	
});

// AngularJS

var app = angular.module('myApp', []);
app.controller('mainCtrl',function($scope) {
	
	
   
});