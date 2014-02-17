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

    public function recibeFormularioContacto(Request $data)
    {

        $nombre = $data->request->get();
        $correo = $data->request->get();
        $empresa = $data->request->get();
        $asunto = $data->request->get();
        $mensaje = $data->request->get();

    }

    public function vistaAccesoAction()
    {
    	return $this->render('TheClickCmspaginasBundle:Default:acceso.html.twig');
    }
}
