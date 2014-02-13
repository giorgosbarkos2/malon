$('document').ready(function() {

$('#negativa').hide('fast');
$('#mailIncorrecto').hide();

// funcion validar mail 

 function validar_email(valor)
    {
        
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
   
        if(filter.test(valor))
            return true;
        else
            return false;
    }

////////////////////////////////////////


$('#enviar').click(function (e) {
		e.preventDefault();





var myData = 'firstName='+$('#firstName').val()
+'&emailaddress='+$('#emailaddress').val()
+'&device='+$('.device').val()
+'&tipoMensaje='+$('#tipoMensaje').val()
+'&mensaje='+$('#mensaje2').val()
;

var firstName = $('#firstName').val();
var emailaddress = $('#emailaddress').val();
var device = $('.device').val();
var tipoMensaje = $('#tipoMensaje').val();
var mensaje   =  $('#mensaje2');

var validaMail = validar_email(emailaddress);


if(validaMail){

    $('#mailIncorrecto').hide();

}else{



   $('#mailIncorrecto').show();

}




jQuery.ajax({

type: "POST",
url:"scripts/send.php",
dataType: "text",
data : myData,

success: function(response){

$("#respuestaMail").empty();



$("#respuestaMail").append(response);




},



error:function(xhr, ajaxOptions, thrownError){


					 alert(thrownError);


}





});




	});


	
});