<?php

namespace TheClickCms\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use TheClickCms\AdminBundle\Entity\Usuarios;
use TheClickCms\AdminBundle\Entity\Empresa;
use TheClickCms\AdminBundle\Entity\Actualizacion;


class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('TheClickCmsAdminBundle:Default:index.html.twig', array('name' => $name));
    }




    public function vistaAgregarEmpresaAction(){
		$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
        	return $this->render('TheClickCmsAdminBundle:Default:empresaAgregar.html.twig');
        }else{

            return new Response('Acceso no autorizado');


        }
    }

    public function guardarEmpresaAction(Request $request){

        $pais = $request->request->get('pais');
        $detalle = $request->request->get('detalle');
        $nombre = $request->request->get('nombre');
        $correo = $request->request->get('correo');

        $em = $this->getDoctrine()->getManager();


        $empresa = new Empresa();

        $empresa->setCorreo($correo);
        $empresa->setNombre($nombre);
        $empresa->setDetalle($detalle);
        $empresa->setPais($pais);
        $empresa->setFecha(new \DateTime());

        $em->persist($empresa);
        $em->flush();


        return new Response('guardado');
    }




    public function loginAction() {

        return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
    }

    public function hacerLoginAction(Request $request) {
        $session = $this->getRequest()->getSession();
        $nombre = $request->request->get('usuario');
        $password = $request->request->get('password');
        $em = $this->getDoctrine()->getManager();
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if ($admin) {


            $session->set('usuario', $nombre);
            $session->set('password', $password);
            return new Response('200');

        } else {


            return new Response('100');
        }
    }


    public function principalAction(){
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
	        return $this->render('TheClickCmsAdminBundle:Default:principal.html.twig' , array ('nombre' => $nombre , 'password' => $password));
        }else{
            return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
        }
    }

      public  function logoutAction(){

           $session = $this->getRequest()->getSession();

           $session->remove('usuario');
           $session->remove('password');

           return   $this->redirect('login');
    }

	public function vistaFormularioUsuarioAction(){

		$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
	        $empresas = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();
		    return $this->render('TheClickCmsAdminBundle:Default:agregarUsuarios.html.twig' , array('empresa'  => $empresas));	
        }else{
            return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
		}
	}


	public function guardarUsuarioAction(Request $data){

		$pais = $data->request->get('pais');
		$detalle =$data->request->get('detalle');
		$nombre = $data->request->get('nombre');
		$nusuario = $data->request->get('nusuario');
		$contrasena = $data->request->get('contrasena');
		$correo = $data->request->get('correo');
		$cargo = $data->request->get('cargo');
		$empresaid = $data->request->get('empresa');

		$em = $this->getDoctrine()->getManager();
		$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy(array('id' => $empresaid));

		$usuario = new Usuarios();

		$usuario->setPais($pais);
		$usuario->setDetalle($detalle);
		$usuario->setNombre($nombre);
		$usuario->setNusuario($nusuario);
		$usuario->setContrasena($contrasena);
		$usuario->setEmail($correo);
		$usuario->setCargo($cargo);
		$usuario->setEmpresa($empresa);
		$usuario->setFecha(new \DateTime());

		$em->persist($empresa);
		$em->persist($usuario);
		$em->flush();

		return   $this->redirect('listarUsuarios');
	}

	public function listarUsuariosAction(){

		$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
	    	$usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findAll();
			return $this->render('TheClickCmsAdminBundle:Default:listarUsuarios.html.twig', array('usuario' => $usuario));    
        }else{
            return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
		}
	}

	public function vistaEditarUsuarioAction($id){
		$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
	        $usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->find($id);
			return $this->render('TheClickCmsAdminBundle:Default:editarUsuario.html.twig', array('usuario'=>$usuario));
        }else{
            return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
		}
	}

	public function guardarFormularioEditarUsuarioAction(Request $data){
 
 		$id = $data->request->get('id');
		$pais = $data->request->get('pais');
		$detalle = $data->request->get('detalle');
		$nombre = $data->request->get('nombre');
		$correo = $data->request->get('correo');
		$cargo = $data->request->get('cargo');
		$empresa = $data->request->get('empresa');

		$em = $this->getDoctrine()->getManager();
		$usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('id'=>$id));

		$usuario->setPais($pais);
		$usuario->setDetalle($detalle);
		$usuario->setNombre($nombre);
		$usuario->setEmail($correo);
		$usuario->setCargo($cargo);
		$usuario->setEmpresa($empresa);

		$em->merge($usuario);
		$em->flush();
		return new response('Usuario Editado');
	}

	public function eliminarUsuarioAction($id){

		$em = $this->getDoctrine()->getManager();
		$usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->find($id);
		$em->remove($usuario);
		$em->flush();
		return new Response('Usuario Eliminado');
	}

	public function listarEmpresasAction(){
		$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
	        $empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();
			return $this->render('TheClickCmsAdminBundle:Default:listarEmpresa.html.twig', array('empresa'=>$empresa));	
        }else{
            return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
		}
	}

	public function vistaEditarEmpresaAction($id){
		$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
			$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->find($id);
			return $this->render('TheClickCmsAdminBundle:Default:editarEmpresa.html.twig', array('empresa'=>$empresa));        		

        }else{
            return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
		}
	}

	public function guardarEditarEmpresaAction(Request $data){
		$id = $data->request->get('id');
		$pais = $data->request->get('pais');
		$detalle = $data->request->get('detalle');
		$nombre = $data->request->get('nombre');
		$correo = $data->request->get('correo');

		$em = $this->getDoctrine()->getManager();
		$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy(array('id'=>$id));

		$empresa->setPais($pais);
		$empresa->setDetalle($detalle);
		$empresa->setNombre($nombre);
		$empresa->setCorreo($correo);

		$em->merge($empresa);
		$em->flush();

		return new response('Usuario Editado');
	}

	public function eliminarEmpresaAction($id){
		//Conectar con la base de datos.
		$em = $this->getDoctrine()->getManager();
		$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->find($id);
		$em->remove($empresa);
		$em->flush();
		return new Response('Usuario Eliminado');
	}

	public function vistaAgregarActualizacionAction(){
		$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
			return $this->render('TheClickCmsAdminBundle:Default:agregarActualizacion.html.twig');

        }else{
            return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
		}
	}

	public function guardarActualizacionAction(Request $data){
		$detalle = $data->request->get('detalle');
		$descripccioncorta = $data->request->get('descripcioncorta');
		$version = $data->request->get('version');

		$actualizacion = new Actualizacion();

		$actualizacion->setDescripcion($detalle);
		$actualizacion->setDescripcionCorta($descripccioncorta);
		$actualizacion->setVersion($version);
		$actualizacion->setFechaActualizacion(new \DateTime());

		$em = $this->getDoctrine()->getManager();
		$em->persist($actualizacion);
		$em->flush();
		$mensaje = 'Actualización guardada';
		$this->redirect($this->generateUrl('route', array()));

	}

	public function listarActualizacionAction(){

		$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
			$actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
			return $this->render('TheClickCmsAdminBundle:Default:listarActualizacion.html.twig', array('actualizacion'=>$actualizacion));
        }else{
            return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
		}
	}

	public function vistaEditarActualizacionAction($id){
		$session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){
			$actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->find($id);
			return $this->render('TheClickCmsAdminBundle:Default:editarActualizacion.html.twig', array('actualizacion'=>$actualizacion));
        }else{
            return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
		}
		
	}

	public function guardarEditarActualizacionAction(Request $data){
		$id = $data->request->get('id');
		$detalle = $data->request->get('detalle');
		$descripcioncorta = $data->request->get('descripcioncorta');
		$version = $data->request->get('version');

		$em = $this->getDoctrine()->getManager();
		$actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findOneBy(array('id'=>$id));

		$actualizacion->setDescripcion($detalle);
		$actualizacion->setDescripcionCorta($descripcioncorta);
		$actualizacion->setVersion($version);

		$em->merge($actualizacion);
		$em->flush();

		return new response("Usuario Editado");
	}

	public function eliminarActualizacionAction($id){
		$em = $this->getDoctrine()->getManager();
		$actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->find($id);
		$em->remove($actualizacion);
		$em->flush();
		return new Response('Actualizacion Eliminada');
	}
}