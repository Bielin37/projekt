// JQuery

$(document).ready(function() {
	
$("#e2").hide();
	
	$("#e1").click(function(){
	$("#e2").show();
	$("#e1").hide();
});
   
});

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

 $(document).ready(function(){
     $('#popoverOption').popover('show').css('border-color', 'red');
	 
	 $(".spr_100").change(function () {
		 var str = "";
			$(".spr_100 option:selected").each(function () {
					str += $(this).text();
				if(str == "Firma"){
					$(".in_101").removeAttr("disabled");
				}else{
					$(".in_101").attr("disabled", "true");		
					}
			});
		}).change();
 });
 
 $(document).ready(function () {
		$("#e8").hide();
		$("#e9").hide();
				setInterval("ukryjDiv();", 1500);
			});	
			
			function ukryjDiv() {
				$("#e7").hide();
				$("#e8").show();
				$("#e9").show();
		}
