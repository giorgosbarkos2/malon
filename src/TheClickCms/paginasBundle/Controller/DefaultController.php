<?php

namespace TheClickCms\paginasBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use TheClickCms\AdminBundle\Entity\Usuarios;
use TheClickCms\AdminBundle\Entity\Actualizacion;
use TheClickCms\IdiomaBundle\Entity\Header;



class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');



        $formulario = '';

        if($idioma == ''){
            $idioma = 'ES';

            $acceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig', array('idioma' => $idioma));



        }

        if ($idioma == 'EN') {

            
            $acceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig', array('idioma' => $idioma, 'acceso' => $acceso));

        } elseif ($idioma == 'ES') {
        
            $acceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig', array('idioma' => $idioma, 'acceso' => $acceso));
        
        }elseif ('PT') {
            
            $acceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig', array('idioma' => $idioma, 'acceso' => $acceso));
        
        }
    }

    public function vistaHistoriaAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');
        if($idioma == ''){
            $idioma = 'ES';

        }


         $seccion = 'historia';




        if ($idioma == 'EN') {



            $historia = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));



             return $this->render('TheClickCmspaginasBundle:Default:historia.html.twig', array('historia' => $historia , 'idioma' => $idioma));


        } elseif ($idioma == 'ES') {



            $historia2 = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));


           return $this->render('TheClickCmspaginasBundle:Default:historia.html.twig', array('historia' => $historia2 , 'idioma' =>  $idioma));




        }elseif ('PT') {
            $historia = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
         return $this->render('TheClickCmspaginasBundle:Default:historia.html.twig', array('historia' => $historia , 'idioma' => $idioma));

        }

    }    

    public function noticiasAction()
    {

        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');
        $seccion = 'noticia';

         if($idioma == ''){
            $idioma = 'ES';

        }

        if ($idioma == 'EN') {
            $noticias = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:noticia.html.twig', array('noticias' => $noticias  , 'idioma' => $idioma ));
        } elseif ($idioma == 'ES') {

            $noticias = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));           
            return $this->render('TheClickCmspaginasBundle:Default:noticia.html.twig', array('noticias' => $noticias , 'idioma' => $idioma ));

        }elseif ('PT') {

            $noticias = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:noticia.html.twig', array('noticias' => $noticias , 'idioma' => $idioma  ));

        }
    }
     

     public function servicioAction()
     {

        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');
        $seccion = 'servicio';

        if($idioma == ''){
            $idioma = 'ES';

        }



        if ($idioma == 'EN') {


            $servicio = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:servicio.html.twig', array('servicio' => $servicio , 'idioma' => $idioma ));

        } elseif ($idioma == 'ES') {
            $servicio = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:servicio.html.twig', array('servicio' => $servicio , 'idioma' => $idioma ));
        }elseif ('PT') {
            $servicio = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:servicio.html.twig', array('servicio' => $servicio , 'idioma' => $idioma ));
        }

     }


     public function productosAction()
     {

        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');

        $seccion = 'productos';

         if($idioma == ''){
            $idioma = 'ES';

        }


        if ($idioma == 'EN') {

            $producto = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:producto.html.twig', array('producto' => $producto , 'idioma' => $idioma ));

        } elseif ($idioma == 'ES') {
            $producto = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:producto.html.twig', array('producto' => $producto , 'idioma' => $idioma ));

        }elseif ('PT') {
            $producto = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:producto.html.twig', array('producto' => $producto , 'idioma' => $idioma ));

        }
      
     }


    public function vistaContactoAction()
    {

        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');
        $formulario = 'contacto';

        if($idioma == ''){
            $idioma = 'ES';

        }

        if ($idioma == 'EN') {
            $contacto = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig', array('contacto' => $contacto , 'idioma' => $idioma ));
        } elseif ($idioma == 'ES') {
            $contacto = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig', array('contacto' => $contacto , 'idioma' => $idioma ));
        }elseif ('PT') {
            $contacto = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig', array('contacto' => $contacto , 'idioma' => $idioma ));
        }

    }

    public function recibeContactoAction(Request $data)
    {

        $nombre = $data->request->get('firstName');
        $correo = $data->request->get('emailaddress');
        $empresa = $data->request->get('empresa');
        $asunto = $data->request->get('asunto');
        $mensaje = $data->request->get('mensaje');

        if ($nombre == '' or $correo == '' or $empresa == '' or $asunto == '' or $mensaje == '') {


            return new Response('100');
            
            
        } else {

            $message = \Swift_Message::newInstance()
                    ->setSubject('Hola mundo soy subject')
                    ->setFrom('')
                    ->setTo('')
                    ->setBody(
                    $this->renderView(
                            'projectAdminprincipalBundle:Default:enviacorreo.html.twig', array('nombre' => $nombre, 'correo' => $correo, 'empresa' => $empresa, 'asunto'=> $asunto, 'mensaje' => $mensaje)
                        )
                    )
            ;
            $this->get('mailer')->send($message);

            return new Response('200');
        }
    }

    public function vistaAccesoAction()
    {
        $session = $this->getRequest()->getSession();
        
        $usuario = $session->get('nusuario');
        $contrasena = $session->get('contrasena');

        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');


        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );

        if ($usuario) {
            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            $actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
            //$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy()





            return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig',array('persona' => $persona, 'actualizacion' => $actualizacion , 'idioma' => $idioma ));
        }else{

            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');    
        }


    	
    }

    public function vistaAccesoCambioClaveAction()
    {
        
        $session = $this->getRequest()->getSession();
        
        $usuario = $session->get('nusuario');
        $contrasena = $session->get('contrasena');
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');



        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );

        if ($usuario) {
            /*
            $formulario = 'cambiarpass';
            if ($idioma == 'EN') {
                $contacto = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig', array('contacto' => $contacto));
            } elseif ($idioma == 'ES') {
                $contacto = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig', array('contacto' => $contacto));
            }elseif ('PT') {
                $contacto = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig', array('contacto' => $contacto));
            }

            */

            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            return $this->render('TheClickCmspaginasBundle:Default:cambiarclave.html.twig', array('persona' => $persona , 'idioma' => $idioma));
        }else{
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');
        }
    }


    public function vistaAccesoActualizarUsuarioAction()
    {

        $session = $this->getRequest()->getSession();
        
        $usuario = $session->get('nusuario');
        $contrasena = $session->get('contrasena');
        $idioma  = $session->get('idioma');

        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );

        $empresas = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();



        if ($usuario) {



            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario ) );

            return $this->render('TheClickCmspaginasBundle:Default:actualizarusuario.html.twig', array('persona' => $persona , 'idioma' => $idioma , 'empresas' => $empresas));
        }else{
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');    
        }


    }

    public function recibeFormularioAccesoAction(Request $request)
    {

        if($request->getMethod() == 'POST') {

            $session = $this->getRequest()->getSession();

            $usuario = $request->request->get('usuario');
            $contrasena = $request->request->get('clave');

            $em = $this->getDoctrine()->getManager();
            $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );



            if($usuarios){
                $session->set('nusuario', $usuario);
                $session->set('contrasena', $contrasena);

                return new Response(200);
            }else{
                return new Response(100);  
            }
        }
    }

    public function recibeformularioEditarAction(Request $request)
    {
        
        $id = $request->request->get('id');
        $pais = $request->request->get('pais');
        $nombre = $request->request->get('nombre');
        $correo = $request->request->get('email');
        $cargo = $request->request->get('cargo');
        $EmpresaId = $request->request->get('empresa');
        $em = $this->getDoctrine()->getManager();
        $empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy(array('id'=>$EmpresaId));



        $usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('id'=>$id));

        $usuario->setPais($pais);

        $usuario->setNombre($nombre);
        $usuario->setEmail($correo);
        $usuario->setEmpresa($empresa);
        $usuario->setCargo($cargo);
    
        $em->persist($usuario);
        $em->persist($empresa);

        $em->flush(); 

        return new response(100);






    }

    public function vistaActualizacionesAction()
    {


        $session = $this->getRequest()->getSession();
        
        $usuario = $session->get('nusuario');
        $contrasena = $session->get('contrasena');


        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');



        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );

        if ($usuario) {
            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            $actualizaciones = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
            return $this->render('TheClickCmspaginasBundle:Default:actualizaciones.html.twig', array('actualizacion' => $actualizaciones, 'persona' => $persona , 'idioma' => $idioma ));
        }else{
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');    
        }


    }

    public function cambioClaveAction(Request $request)
    {

            $claveantigua = $request->request->get('claveantigua');
            $clavenueva = $request->request->get('clavenueva');
            $repeticionclavenueva = $request->request->get('repeticionclavenueva');
            $usuarioId = $request->request->get('usuarioId');

            $session = $this->getRequest()->getSession();
            $idioma = $session->get('idioma');
            $em = $this->getDoctrine()->getManager();


           $usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('id' => $usuario , 'contrasena' => $claveantigua ));

           if($usuario){






           }else{



               // Caso que la contraseña antigua este mala

               return new Response(900);

           }



    }




    public function idiomaAction(Request $data)
    {
        $idioma = $data->request->get('idioma');


        $session = $this->getRequest()->getSession();
        $session->set('idioma',$idioma);



        return $this->redirect($this->generateUrl('the_click_cmspaginas_homepage'));
        
    }
}