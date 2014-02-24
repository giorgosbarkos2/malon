<?php

namespace TheClickCms\paginasBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use TheClickCms\AdminBundle\Entity\Usuarios;
use TheClickCms\AdminBundle\Entity\Actuali;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TheClickCmspaginasBundle:Default:index.html.twig');
    }

    public function vistaHistoriaAction()
    {
    	return $this->render('TheClickCmspaginasBundle:Default:historia.html.twig');
    }


    public function UploadArchivoAction(){

        
        
        
    
          


    }

    public function noticiasAction()
    {
        return $this->render('TheClickCmspaginasBundle:Default:noticia.html.twig');
    }
     

     public function servicioAction()
     {
         return $this->render('TheClickCmspaginasBundle:Default:servicio.html.twig');
     }


     public function productosAction()
     {

       return $this->render('TheClickCmspaginasBundle:Default:producto.html.twig');

       
     }


    public function vistaContactoAction()
    {
    	return $this->render('TheClickCmspaginasBundle:Default:contacto.html.twig');
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

        if ($usuario) {
            $persona = $usuarios = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('nusuario' => $usuario) );
            $actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
            return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig', array('persona' => $persona, 'actualizacion' => $actualizacion));    
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

    public function cambioClaveAction(Request $request)
    {

        $claveantigua = $request->request->get('claveantigua');
        $clavenueva = $request->request->get('clavenueva');
        $repeticionclavenueva = $request->request->get('repeticionclavenueva');


        if ( $claveantigua == " " or $clavenueva == " " or $repeticionclavenueva == " " ) {
            return new Response('vacia');
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

                    return new Response('ok');

                }else{
                    return new Response('diferentesclavenueva');
                }
            }else{
                return new Response('diferentesclaveantigua');
            }
        }
    }
}
