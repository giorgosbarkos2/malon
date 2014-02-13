/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


   $(window).load(function(){
 $('#dvLoading').fadeOut(600);
  
  
}); 
     
  
    $(document).ready(function(e) {
   
 
 
  
if( /Android|webOS|iPhone|iPod|iPad|BlackBerry/i.test(navigator.userAgent) ) {
     
             var hijo = document.getElementById("contenedorVideo");
             hijo.innerHTML ='<div id="bg-image"></div>';
             
             
             
    

  
}else{
    
    

        
   
   var hijo = document.getElementById("contenedorVideo");
  
  
  hijo.innerHTML='<video id="todalapantalla" autoplay="autoplay" ><source src="video/Footage_chile.m4v" type="video/mp4" />	<source src="video/Footage_chile.ogv" type="video/ogg" /><source src="video/Footage_chile.webm" type="video/webm" /><source src="video/Footage_chile.mp4 />	<object type="application/x-shockwave-flash" data="video/flashfox.swf" width="1280" height="720" style="position:relative;">	<param name="movie" value="video/flashfox.swf" />	<param name="allowFullScreen" value="true" />	<param name="flashVars" value="autoplay=true&amp;controls=true&amp;fullScreenEnabled=true&amp;posterOnEnd=true&amp;loop=false&amp;poster=video/Footage_chile.jpg&amp;src=Footage_chile.m4v" />	<embed src="video/flashfox.swf" width="1280" height="720" style="position:relative;" flashVars="autoplay=true&amp;controls=true&amp;fullScreenEnabled=true&amp;posterOnEnd=true&amp;loop=false&amp;poster=video/Footage_chile.jpg&amp;src=Footage_chile.m4v" allowFullScreen="true" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_en"  /> <img alt="Footage_chile" src="video/Footage_chile.jpg" style="position:absolute;left:0;" width="1280" height="720" title="Video playback is not supported by your browser" />';



}



    

  });
  
  

    
    
     

$('document').ready(function() {
    

   var ua = navigator.userAgent;
var isiPad = navigator.userAgent.match(/iPad/i) != null;
     
    if(isiPad == true) {
   
        $('#playdiv').show();
        
    }
        

if( /Android|webOS|iPhone|iPad|BlackBerry/i.test(navigator.userAgent) ) {
    
   
        
        
   

 $('#playdiv').show();
 console.log('es mobil');


}else{

 $('#playdiv').hide();
 console.log('no es mobil');
 
}

});



$('document').ready(function() {


 


  $('#titlemkt').hide();
  $('#qr').hide();
  
  
  
  
});






$(document).ready(function() {


  
 





var todalapantalla = document.getElementById('todalapantalla');
$('#playdiv').click(function (e) {
    
    
     if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)){
       
        
      window.location="video/Footage_chile.mp4";   
        
    }else{
   
            
     $('#playdiv').hide('slow');
    
     var hijo = document.getElementById("contenedorVideo");
  
   hijo.innerHTML='<video id="todalapantalla" autoplay="autoplay" poster="video/Footage_chile.jpg"><source src="video/Footage_chile.m4v" type="video/mp4" />	<source src="video/Footage_chile.ogv" type="video/ogg" /><source src="video/Footage_chile.webm" type="video/webm" /><source src="video/Footage_chile.mp4" />	<object type="application/x-shockwave-flash" data="video/flashfox.swf" width="1280" height="720" style="position:relative;">	<param name="movie" value="video/flashfox.swf" />	<param name="allowFullScreen" value="true" />	<param name="flashVars" value="autoplay=true&amp;controls=true&amp;fullScreenEnabled=true&amp;posterOnEnd=true&amp;loop=false&amp;poster=video/Footage_chile.jpg&amp;src=Footage_chile.m4v" />	<embed src="video/flashfox.swf" width="1280" height="720" style="position:relative;" flashVars="autoplay=true&amp;controls=true&amp;fullScreenEnabled=true&amp;posterOnEnd=true&amp;loop=false&amp;poster=video/Footage_chile.jpg&amp;src=Footage_chile.m4v" allowFullScreen="true" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_en"  /> <img alt="Footage_chile" src="video/Footage_chile.jpg" style="position:absolute;left:0;" width="1280" height="720" title="Video playback is not supported by your browser" />';

 
// document.getElementById("todalapantalla").play();
 
    }
  
  e.preventDefault();

$('#titlemkt').hide('fast');
  $('#qr').hide('fast');


  




  $('#cargador').show('slow');

  todalapantalla.play();
  
});
  if(todalapantalla.ended == true){

   
  }

if(todalapantalla.play){

$('#cargador').hide('fast');



}

todalapantalla.addEventListener("timeupdate", function() {
if (todalapantalla.ended == true) {



todalapantalla.pause();
todalapantalla.currentTime = 0;

$('#playdiv').show('slow');

$('#titlemkt').show('fast');
  $('#qr').show('fast');

}}, false);

$('#imgVideo').hide('fast');
  



});





$(document).ready(function() {



      

 


$('.borderimg, .borderimg2').toggle(function(e) {
  

  e.preventDefault();


   var ventana_ancho = $(window).width();
    var ventana_alto = $(window).height();


    parseInt(ventana_ancho);
 
   console.log(ventana_ancho);
    console.log(ventana_alto);


    var   porcentaje = parseInt(ventana_alto * 0.13);

    console.log('porcentaje' + porcentaje);

    parseInt(porcentaje);
    
   var uno = 1351;
   var dos = 0.07
   var resultado = uno * dos;

  console.log(resultado);










  $('.flexslider').show('fast');

 $("#flipabajo").animate({
    "margin-top":'-'+porcentaje+'px'
    
  });

   
      $('.flexslider').flexslider({
        animation: "slide",

}, function(e) {

  

 $('.flexslider').hide('fast');
  $("#flipabajo").animate({
    "margin-top":porcentaje+'px'
    
  });
  
 
       
});


  
  

}, function(e) {

   e.preventDefault();

 $('.flexslider').hide('fast');
  $("#flipabajo").animate({
    "margin-top":'0'
    
  });
});
});

/mobile/i.test(navigator.userAgent) && !window.location.hash && setTimeout(function () {
  window.scrollTo(0, 1);
}, 1000);