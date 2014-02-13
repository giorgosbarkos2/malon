$(document).ready(function() {
	$("div.panel_button").click(function(){
		$("div#panel").animate({
			height: "160px"
		})
		.animate({
			height: "150px"
		}, "fast");
		$("div.panel_button").toggle();
	
	});	
	
   $("div#hide_button").click(function(){
		$("div#panel").animate({
			height: "0px"
		}, "fast");
		
	
   });	
	
});