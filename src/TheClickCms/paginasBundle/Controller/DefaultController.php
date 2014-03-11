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
        $path = 'home';

        if ($idioma == '') {
            $idioma = 'ES';
        }

        $formulario = 'acceso';

        
          
        if ($idioma == 'EN') {

            $acceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario  ));
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig', array('idioma' => $idioma, 'acceso' => $acceso , 'path' => $path));

        } elseif ($idioma == 'ES') {
        
            $acceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig', array('idioma' => $idioma, 'acceso' => $acceso , 'path' => $path));
        
        }elseif( $idioma =='PT') {
            
            $acceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig', array('idioma' => $idioma, 'acceso' => $acceso , 'path' => $path));
        
        }
    }

    public function vistaHistoriaAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');
        $path = '../home';

        if($idioma == ''){
            $idioma = 'ES';
        }


         $seccion = 'historia';




        if ($idioma == 'EN') {



            $historia = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));



             return $this->render('TheClickCmspaginasBundle:Default:historia.html.twig', array('historia' => $historia , 'idioma' => $idioma , 'path' =>  $path));


        } elseif ($idioma == 'ES') {



            $historia2 = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));


           return $this->render('TheClickCmspaginasBundle:Default:historia.html.twig', array('historia' => $historia2 , 'idioma' =>  $idioma , 'path' =>  $path ));




        }elseif ('PT') {
            $historia = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
         return $this->render('TheClickCmspaginasBundle:Default:historia.html.twig', array('historia' => $historia , 'idioma' => $idioma ,  'path' =>  $path));

        }

    }    

    public function noticiasAction()
    {

        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');
        $seccion = 'noticia';

        $path = '../home';


         if($idioma == ''){
            $idioma = 'ES';

        }

        if ($idioma == 'EN') {
            $noticias = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:noticia.html.twig', array('noticias' => $noticias  , 'idioma' => $idioma , 'path' => $path ));
        } elseif ($idioma == 'ES') {

            $noticias = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));           
            return $this->render('TheClickCmspaginasBundle:Default:noticia.html.twig', array('noticias' => $noticias , 'idioma' => $idioma  , 'path' => $path ));

        }elseif ('PT') {

            $noticias = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:noticia.html.twig', array('noticias' => $noticias , 'idioma' => $idioma , 'path' => $path ));

        }
    }
     

     public function servicioAction()
     {

        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');
        $seccion = 'servicio';
        $path = '../home';


        if($idioma == ''){
            $idioma = 'ES';

        }



        if ($idioma == 'EN') {


            $servicio = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:servicio.html.twig', array('servicio' => $servicio , 'idioma' => $idioma , 'path' => $path ));

        } elseif ($idioma == 'ES') {
            $servicio = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:servicio.html.twig', array('servicio' => $servicio , 'idioma' => $idioma  , 'path' => $path  ));
        }elseif ('PT') {
            $servicio = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:servicio.html.twig', array('servicio' => $servicio , 'idioma' => $idioma , 'path' => $path  ));
        }

     }


     public function productosAction()
     {

        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');

        $seccion = 'productos';

         $path = '../home';



         if($idioma == ''){
            $idioma = 'ES';

        }


        if ($idioma == 'EN') {

            $producto = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:producto.html.twig', array('producto' => $producto , 'idioma' => $idioma , 'path' => $path ));

        } elseif ($idioma == 'ES') {
            $producto = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:producto.html.twig', array('producto' => $producto , 'idioma' => $idioma  , 'path' => $path ));

        }elseif ('PT') {

            $producto = $em->getRepository('TheClickCmsIdiomaBundle:Paginas')->findOneBy(array('idioma' => $idioma, 'seccion' => $seccion));
            return $this->render('TheClickCmspaginasBundle:Default:producto.html.twig', array('producto' => $producto , 'idioma' => $idioma , 'path' => $path  ));

        }
      
     }


    public function vistaContactoAction()
    {

        $em = $this->getDoctrine()->getManager();
        
        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');
        $formulario = 'contacto';
        $path = '../home';



        if($idioma == ''){
            $idioma = 'ES';

        }

        if ($idioma == 'EN') {
            $contacto = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig', array('contacto' => $contacto , 'idioma' => $idioma  , 'path' => $path));
        } elseif ($idioma == 'ES') {
            $contacto = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig', array('contacto' => $contacto , 'idioma' => $idioma  , 'path' => $path ));
        }elseif ('PT') {
            $contacto = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig', array('contacto' => $contacto , 'idioma' => $idioma  , 'path' => $path));
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


            return new Response(100);
            
            
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

            return new Response(200);
        }
    }








    public function vistaAccesoAction()
    {
        $session = $this->getRequest()->getSession();
        
        $usuario = $session->get('nusuario');
        $contrasena = $session->get('contrasena');
        $path = '../home';

        $session = $this->getRequest()->getSession();
        $idioma = $session->get('idioma');


        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena) );

        $idioma = $session->get('idioma');

        $formulario = 'menuacceso';
        $formularioactualizarusuario = 'actualizausario';
        $formulariocambiaclave = 'cambiarpass';
        $formularioactualizaciones = 'actualizaciones';

        if($idioma == ''){
            $idioma = 'ES';

        }

        if ($usuario) {

         if ($idioma == 'EN') {
            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            $empresas = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();

            $actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();


            $cambioclave = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulariocambiaclave));
            $actualizausuario = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' =>  $formularioactualizarusuario));
            $actualizar = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formularioactualizaciones));

            $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            
            return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig',
                array(
                   'menuacceso' => $menuacceso, 
                   'empresas' => $empresas, 
                   'idioma' => $idioma, 'persona' => $persona, 
                   'actualizacion' => $actualizacion , 
                   'path' => $path,
                   'cambioclave' => $cambioclave,
                   'actualizarusuario' =>  $actualizausuario,
                   'actualizar' => $actualizar 
                )
            );


        } elseif ($idioma == 'ES') {
            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            $empresas = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();

            $actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();


            $cambioclave = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulariocambiaclave));
            $actualizausuario = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' =>  $formularioactualizarusuario));
            $actualizar = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formularioactualizaciones));

            $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            
            return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig',
                array(
                   'menuacceso' => $menuacceso, 
                   'empresas' => $empresas, 
                   'idioma' => $idioma, 'persona' => $persona, 
                   'actualizacion' => $actualizacion , 
                   'path' => $path,
                   'cambioclave' => $cambioclave,
                   'actualizarusuario' =>  $actualizausuario,
                   'actualizar' => $actualizar 
                )
            );


        }elseif ('PT') {
            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            $empresas = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();

            $actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();


            $cambioclave = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulariocambiaclave));
            $actualizausuario = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' =>  $formularioactualizarusuario));
            $actualizar = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formularioactualizaciones));

            $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
            
            return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig',
                array(
                   'empresas' => $empresas, 
                   'idioma' => $idioma, 'persona' => $persona, 
                   'actualizacion' => $actualizacion , 
                   'path' => $path,
                   'cambioclave' => $cambioclave,
                   'actualizarusuario' =>  $actualizausuario,
                   'actualizar' => $actualizar 
                )
            );


        }
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
        $path = '../home';



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
                return $this->render('TheClickCmspaginasBundle:Default:cambiarclave.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona , 'path' => $path));
            } elseif ($idioma == 'ES') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:cambiarclave.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona , 'path' => $path));
            }elseif ('PT') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:cambiarclave.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona  , 'path' => $path));
            }

        }else{
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');
        }
    }


    public function vistaAccesoActualizarUsuarioAction()
    {

        $session = $this->getRequest()->getSession();
        
        $usuario = $session->get('nusuario');
        $contrasena = $session->get('contrasena');
        $path = '../home';



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
                $empresas = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizarusuario.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona, 'empresas' => $empresas , 'path' => $path));
            } elseif ($idioma == 'ES') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $empresas = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizarusuario.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona, 'empresas' => $empresas , 'path' => $path));
            }elseif ('PT') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $empresas = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizarusuario.html.twig', array('menuacceso' => $menuacceso , 'idioma' => $idioma, 'persona' => $persona, 'empresas' => $empresas , 'path' => $path));
            }

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
        $path = '../home';



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
                return $this->render('TheClickCmspaginasBundle:Default:actualizaciones.html.twig', array('menuacceso' => $menuacceso ,'actualizacion' => $actualizaciones, 'idioma' => $idioma, 'persona' => $persona ,  'path' => $path ));
            } elseif ($idioma == 'ES') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $actualizaciones = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizaciones.html.twig', array('menuacceso' => $menuacceso ,'actualizacion' => $actualizaciones, 'idioma' => $idioma, 'persona' => $persona ,  'path' => $path));
            }elseif ('PT') {
                $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
                $actualizaciones = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
                $menuacceso = $em->getRepository('TheClickCmsIdiomaBundle:Formularios')->findOneBy(array('idioma' => $idioma, 'NombreFormulario' => $formulario));
                return $this->render('TheClickCmspaginasBundle:Default:actualizaciones.html.twig', array('menuacceso' => $menuacceso ,'actualizacion' => $actualizaciones, 'idioma' => $idioma, 'persona' => $persona ,  'path' => $path ));
            }

        }else{
            return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');    
        }


    }

    public function cambioClaveAction(Request $request)
    {

            $clavenueva = $request->request->get('clavenueva');
            $claveantigua = $request->request->get('claveantigua');

            $session = $this->getRequest()->getSession();
            
            $usuario = $session->get('nusuario');
            $contrasena = $session->get('contrasena');
            $idioma = $session->get('idioma');


            if ($contrasena == $claveantigua) {
    
                $em = $this->getDoctrine()->getManager();
                $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario , 'contrasena' => $contrasena));

                $usuarios->setContrasena($clavenueva);

                $em->merge($usuarios);
                $em->flush();

                return new Response(1);

            }else{
                return new response(2);
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