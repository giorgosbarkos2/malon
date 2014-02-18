<?php

namespace TheClickCms\paginasBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    	return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig');
    }

    public function recibeFormularioAccesoAction(Request $data)
    {
        $rut = $data->request->get('rut');
        $contrasena = $data->request->get('password');

        if ($rut == '' or $contrasena == '') {
            return new Response('100');
        }else{
            return new Response('200');
        }
    }
}
