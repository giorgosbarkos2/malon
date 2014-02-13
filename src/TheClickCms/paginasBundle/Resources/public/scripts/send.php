<?php

$firstName = $_POST['firstName'];
$emailaddress = $_POST['emailaddress'];
$device = $_POST['device'];
$tipoMensaje = $_POST['tipoMensaje'];
$mensaje = $_POST['mensaje'];




if( $firstName  != '' and $emailaddress != '' and $device != '' and $tipoMensaje != '' and $mensaje != ''

){





$para      = 'claudio.torres@happyshop.cl';
$titulo = 'Contacto Happyshop Web';
$mensaje = '

Nombre : '.$firstName.'
Email : '.$emailaddress.'
Device : '.$device.'
Donde  : '.$tipoMensaje.'
Mensaje : '.$mensaje.'





';



$cabeceras = 'From: claudio.torres@happyshop.cl' . "\r\n" .
    'Reply-To: claudio.torres@happyshop.cl' . "\r\n" .
    'Mailer: PHP/';

mail($para, $titulo, $mensaje, $cabeceras);




echo "Tu mensaje fue enviao con éxito, pronto nos contactaremos contigo ";

echo '

<script>

$(document).ready(function() {
$("#contactForm")[0].reset();


});

</script>


';


}else{

	echo "Debe completar los campos";

}




?>