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

    public function vistauploadArchivoAction(){

    	$em = $this->getDoctrine()->getManager();

         $session = $this->getRequest()->getSession();

        

    $idActualizacion = $session->get('idActualizacion');


    	return $this->render('TheClickCmsAdminBundle:Default:uploadArchivo.html.twig' ,  array('idActualizacion' => $idActualizacion ));

    }

    public function vistaUploadEmpresaAction(){

    $em = $this->getDoctrine()->getManager();

    $session = $this->getRequest()->getSession();

    $idEmpresa = $session->get('idEmpresa');


    return $this->render('TheClickCmsAdminBundle:Default:uploadFoto.html.twig' ,  array('idEmpresa' => $idEmpresa ));

    }    



    public function uploadActualizacionesAction()


    {

    	$session = $this->getRequest()->getSession();
         $id = $session->get('idActualizacion');

        
        $idProducto = $id;
        
        
        $fileName = ($_REQUEST["name"]);
        
        $targetDirectorio = 'actualizaciones/' . $idProducto . '/' . $fileName;
        if (file_exists($targetDirectorio)) {
        } else {
            //   mkdir('fotos/', 0777, true);
        }



        $targetDir = 'actualizaciones/' . $idProducto . '/';

        //$targetDir = 'uploads';

        $cleanupTargetDir = true; 
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        @set_time_limit(5 * 60);


        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';


        $fileName = preg_replace('/[^\w\._]+/', '_', $fileName);

        if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
            $ext = strrpos($fileName, '.');
            $fileName_a = substr($fileName, 0, $ext);
            $fileName_b = substr($fileName, $ext);

            $count = 1;
            while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                $count++;

            $fileName = $fileName_a . '_' . $count . $fileName_b;
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;


        if (!file_exists($targetDir))
            @mkdir($targetDir);


        if ($cleanupTargetDir) {
            if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                    if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                        @unlink($tmpfilePath);
                    }
                }
                closedir($dir);
            } else {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
        }

        $uno = 'uno';
        
        
        
          
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
            $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
            $contentType = $_SERVER["CONTENT_TYPE"];


        if (strpos($contentType, "multipart") !== false) {
            if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {

                $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {

                    $in = @fopen($_FILES['file']['tmp_name'], "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    }
                    else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    @fclose($in);
                    @fclose($out);
                    @unlink($_FILES['file']['tmp_name']);
                }
                else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }
            else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
        } else {
            // Open temp file
            $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = @fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                }
                else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                @fclose($in);
                @fclose($out);
            }
            else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off 
            rename("{$filePath}.part", $filePath);

          $em = $this->getDoctrine()->getManager();
            $session = $this->getRequest()->getSession();
            $id = $session->get('idActualizacion');



            
            $actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findOneBy(array('id' => $id));
            $actualizacion->setUrl($fileName);
            $em->persist($actualizacion);
            $em->flush();



         


          $resp ='
           <script>
           alert("Tu contenido se ha subido exitosamente");
           
           </script>';
           
    
            
            
            
        }

        return new Response($resp);



    }




    public function uploadFotoEmpresaAction()
    {

        $session = $this->getRequest()->getSession();
        $id = $session->get('idEmpresa');

        
        $idEmpresa = $id;
        
        
        $fileName = ($_REQUEST["name"]);
        
        $targetDirectorio = 'empresas/' . $idEmpresa . '/' . $fileName;
        if (file_exists($targetDirectorio)) {
        } else {
            //   mkdir('fotos/', 0777, true);
        }



        $targetDir = 'empresas/' . $idEmpresa . '/';

        //$targetDir = 'uploads';

        $cleanupTargetDir = true; 
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        @set_time_limit(5 * 60);


        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';


        $fileName = preg_replace('/[^\w\._]+/', '_', $fileName);

        if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
            $ext = strrpos($fileName, '.');
            $fileName_a = substr($fileName, 0, $ext);
            $fileName_b = substr($fileName, $ext);

            $count = 1;
            while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                $count++;

            $fileName = $fileName_a . '_' . $count . $fileName_b;
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;


        if (!file_exists($targetDir))
            @mkdir($targetDir);


        if ($cleanupTargetDir) {
            if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                    if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                        @unlink($tmpfilePath);
                    }
                }
                closedir($dir);
            } else {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
        }

        $uno = 'uno';
        
        
        
          
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
            $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
            $contentType = $_SERVER["CONTENT_TYPE"];


        if (strpos($contentType, "multipart") !== false) {
            if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {

                $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {

                    $in = @fopen($_FILES['file']['tmp_name'], "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    }
                    else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    @fclose($in);
                    @fclose($out);
                    @unlink($_FILES['file']['tmp_name']);
                }
                else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }
            else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
        } else {
            // Open temp file
            $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = @fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                }
                else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                @fclose($in);
                @fclose($out);
            }
            else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off 
            rename("{$filePath}.part", $filePath);

            $em = $this->getDoctrine()->getManager();
            $session = $this->getRequest()->getSession();
            $id = $session->get('idEmpresa');


            var_dump($fileName);
            
            $empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy(array('id' => $id));
            $empresa->setUrl($fileName);
            $em->persist($empresa);
            $em->flush();



         


           $resp ='
           <script>
           alert("Tu contenido se ha subido exitosamente");
           
           </script>';
           
    
            
            
            
        }

        return new Response($resp);
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

        $mensaje = 'Imagen guardada';
        $idEmpresa = $empresa->getId();

    
        $session = $this->getRequest()->getSession();



        $session->set('idEmpresa' , $idEmpresa);


        return $this->redirect($this->generateUrl('vistaUploadEmpresa2'));
        
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

        return $this->redirect($this->generateUrl('listarUsuarios'));

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
            $empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();
			return $this->render('TheClickCmsAdminBundle:Default:editarUsuario.html.twig', array('usuario'=>$usuario, 'empresa' => $empresa));
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
        $EmpresaId = $data->request->get('empresa');
        

		$em = $this->getDoctrine()->getManager();
		$usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('id'=>$id));
        $empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy(array('id'=>$EmpresaId));

		$usuario->setPais($pais);
		$usuario->setDetalle($detalle);
		$usuario->setNombre($nombre);
		$usuario->setEmail($correo);
		$usuario->setCargo($cargo);
		$usuario->setEmpresa($empresa);


        $em->persist($usuario);
        $em->persist($empresa);
		$em->flush();

		return $this->redirect($this->generateUrl('listarUsuarios'));
	}

	public function eliminarUsuarioAction(Request $data){

        $id = $data->request->get('recordToDelete');

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

        return $this->redirect($this->generateUrl('listarEmpresas'));
	}

	public function eliminarEmpresaAction(Request $data){

        $id = $data->request->get('recordToDelete');

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
        $idioma = $data->request->get('idioma');
		$version = $data->request->get('version');

		$actualizacion = new Actualizacion();

		$actualizacion->setDescripcion($detalle);
		$actualizacion->setDescripcionCorta($descripccioncorta);
        $actualizacion->setIdioma($idioma);
		$actualizacion->setVersion($version);
		$actualizacion->setFechaActualizacion(new \DateTime());

		$em = $this->getDoctrine()->getManager();
		$em->persist($actualizacion);
		$em->flush();
		$mensaje = 'Actualización guardada';
        $idActualizacion = $actualizacion->getId();

    
        $session = $this->getRequest()->getSession();



       $session->set('idActualizacion' , $idActualizacion);

        return $this->redirect($this->generateUrl('vistauploadArchivo'));



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


        return $this->redirect($this->generateUrl('listarActualizacion'));
	}

	public function eliminarActualizacionAction(Request $data){

        $id = $data->request->get('recordToDelete');
		$em = $this->getDoctrine()->getManager();
		$actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->find($id);
		$em->remove($actualizacion);
		$em->flush();
		return new Response('Actualizacion Eliminada');
	}


}