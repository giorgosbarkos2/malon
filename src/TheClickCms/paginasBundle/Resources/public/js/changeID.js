$(document).ready(function(e) {

    var idioma = "{{ idioma }}";
    console.log(idioma);

    if(idioma == 'ES'){


        $("#home").text('Home');
        $("#acceso").text('Acceso Cliente');
        $("#historia").text('Historia');
        $("#producto").text('Producto');
        $("#servicio").text('Servicio');
        $("#noticias").text('Noticias');
        $("#contacto").text('Contacto');

    }


    if (idioma  == 'EN') {


        $("#home").text('Home');
        $("#acceso").text('Access client');
        $("#historia").text('History');
        $("#producto").text('Product');
        $("#servicio").text('Service');
        $("#noticias").text('News');
        $("#contacto").text('Contact');


    }


    if (idioma == 'PT') {

        $("#home").text('pt1');
        $("#acceso").text('pt2');
        $("#historia").text('pt3');
        $("#producto").text('pt4');
        $("#servicio").text('pt5');
        $("#noticias").text('pt6');
        $("#contacto").text('pt7');



    }






    $("#navigation_list").on("click", ".bandera", function(e) {
        e.preventDefault();
        var clickedID = this.id.split('-');
        var DbNumberID = clickedID[1]; // toma el numero del array

        var Data  =  'idioma=' + DbNumberID;

        console.log(DbNumberID);



        if (DbNumberID == 'EN') {
            $("#home").text('Home');
            $("#acceso").text('Access client');
            $("#historia").text('History');
            $("#producto").text('Product');
            $("#servicio").text('Service');
            $("#noticias").text('News');
            $("#contacto").text('Contact');

            jQuery.ajax({
                url: "{{path('idioma')}}",
                type: 'POST',
                dataType: 'text',

                data: Data,
                success: function(response){

                    window.top.location.href = 'home';


                },
                error: function(xhr, textStatus, errorThrown) {

                }
            });


        }else if(DbNumberID == 'PT'){
            $("#home").text('pt1');
            $("#acceso").text('pt2');
            $("#historia").text('pt3');
            $("#producto").text('pt4');
            $("#servicio").text('pt5');
            $("#noticias").text('pt6');
            $("#contacto").text('pt7');

            jQuery.ajax({
                url: "{{path('idioma')}}",
                type: 'POST',
                dataType: 'text',
                data:  Data,
                success: function(response){

                    window.top.location.href = 'home';


                },
                error: function(xhr, textStatus, errorThrown) {

                }
            });

        }else{




            $("#home").text('Home');
            $("#acceso").text('Acceso Cliente');
            $("#historia").text('Historia');
            $("#producto").text('Producto');
            $("#servicio").text('Servicio');
            $("#noticias").text('Noticias');
            $("#contacto").text('Contacto');

            jQuery.ajax({
                url: "{{path('idioma')}}",
                type: 'POST',
                dataType: 'text',
                data:  Data,
                success: function(response){


                    window.top.location.href = 'home';


                },
                error: function(xhr, textStatus, errorThrown) {

                }
            });
        };
    });




});