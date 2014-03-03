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

        $formulario = 'acceso';

        if($idioma == ''){
            $idioma = 'ES';

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

        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );

        $idioma = $session->get('idioma');

        $formulario = 'menuacceso';

        if($idioma == ''){
            $idioma = 'ES';

        }

        if ($usuario) {
            
            //$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy()




         if ($idioma == 'EN') {
            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            $actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
            $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona, 'actualizacion' => $actualizacion ));
        } elseif ($idioma == 'ES') {
            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            $actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
            $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona, 'actualizacion' => $actualizacion ));
        }elseif ('PT') {
            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            $actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
            $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona, 'actualizacion' => $actualizacion ));
        }





            return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig', array('persona' => $persona, 'actualizacion' => $actualizacion));    
        }else{
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');    
        }


    	
    }

    public function vistaAccesoCambioClaveAction()
    {
        
        $session = $this->getRequest()->getSession();
        
        $usuario = $session->get('nusuario');
        $contrasena = $session->get('contrasena');

        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );

        $idioma = $session->get('idioma');

        $formulario = 'cambiarpass';

        if($idioma == ''){
            $idioma = 'ES';

        }
        
        if ($usuario) {


             if ($idioma == 'EN') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:cambiarclave.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona));
            } elseif ($idioma == 'ES') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:cambiarclave.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona));
            }elseif ('PT') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:cambiarclave.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona ));
            }

        //    $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
        //    return $this->render('TheClickCmspaginasBundle:Default:cambiarclave.html.twig', array('persona' => $persona));   
        }else{
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');
        }
    }


    public function vistaAccesoActualizarUsuarioAction()
    {

        $session = $this->getRequest()->getSession();
        
        $usuario = $session->get('nusuario');
        $contrasena = $session->get('contrasena');


        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );


        $idioma = $session->get('idioma');
        
        $formulario = 'actualizausario';

        if($idioma == ''){
            $idioma = 'ES';

        }
        if ($usuario) {


             if ($idioma == 'EN') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizarusuario.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona));
            } elseif ($idioma == 'ES') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizarusuario.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona));
            }elseif ('PT') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizarusuario.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona ));
            }


           // $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
          //  return $this->render('TheClickCmspaginasBundle:Default:actualizarusuario.html.twig', array('persona' => $persona));    
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
        $nombreEmpresa = $request->request->get('empresa');

        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('id'=>$id));

        $usuario->setPais($pais);
        $usuario->setNombre($nombre);
        $usuario->setEmail($correo);
        $usuario->setCargo($cargo);
    
        $em->merge($usuario);
    

        $empresaId = $usuario->getEmpresa()->getId();
        $empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy(array('id'=>$empresaId));
        $empresa->setNombre($nombreEmpresa);
        $em->persist($empresa);

        $em->flush(); 

        return new response( $empresaId );
    }

    public function vistaActualizacionesAction()
    {


        $session = $this->getRequest()->getSession();
        
        $usuario = $session->get('nusuario');
        $contrasena = $session->get('contrasena');

        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );


        $idioma = $session->get('idioma');
        
        $formulario = 'actualizaciones';

        if($idioma == ''){
            $idioma = 'ES';

        }

        if ($usuario) {


             if ($idioma == 'EN') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $actualizaciones = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizaciones.html.twig', array('menuacceso' => $menuacceso ,'actualizacion' => $actualizaciones, 'idioma' => $idioma, 'persona' => $persona));
            } elseif ($idioma == 'ES') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $actualizaciones = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizaciones.html.twig', array('menuacceso' => $menuacceso ,'actualizacion' => $actualizaciones, 'idioma' => $idioma, 'persona' => $persona));
            }elseif ('PT') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $actualizaciones = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizaciones.html.twig', array('menuacceso' => $menuacceso ,'actualizacion' => $actualizaciones, 'idioma' => $idioma, 'persona' => $persona ));
            }



            //$persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            //$actualizaciones = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
            //return $this->render('TheClickCmspaginasBundle:Default:actualizaciones.html.twig', array('actualizacion' => $actualizaciones, 'persona' => $persona));    
        }else{
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');    
        }


    }

    public function cambioClaveAction(Request $request)
    {

            $claveantigua = $request->request->get('claveantigua');
            $clavenueva = $request->request->get('clavenueva');
            $repeticionclavenueva = $request->request->get('repeticionclavenueva');


            if ( $claveantigua == " " or $clavenueva == " " or $repeticionclavenueva == " " ) {
                return new Response('0');
            }else{
                $session = $this->getRequest()->getSession();

                $usuario = $request->request->get('usuario');
                $contrasena = $request->request->get('clave');

                if ($contrasena == $claveantigua) {
                    if ($clavenueva == $repeticionclavenueva) {
                        
                        $usuario = $session->get('nusuario');
                        $contrasena = $session->get('contrasena');

                        $em = $this->getDoctrine()->getManager();
                        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena));

                        $usuarios->setContrasena($clavenueva);

                        $em->merge($usuarios);
                        $em->flush();

                        return new Response('1');
                    }else{
                        return new Response('2');
                    }
                }else{
                    return new Response('3');
                }
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