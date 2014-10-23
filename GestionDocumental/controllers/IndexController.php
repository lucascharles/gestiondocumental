<?php
class IndexController extends ControllerBase
{
    public function save_emailnews($param)
	{
		// SE INCLUYE MODELO USUARIO 
		require 'models/UsuarioModel.php';
		$usuario = new UsuarioModel();
		$usuario->save_emailnews($param);
	}
	
    public function index($array)
    {
		//Pasamos a la vista toda la informaci�n que se desea representar
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['nom_empresa'] = $array["nombre_empresa"];
		$data['accion_form'] = "index.php?controlador=Index&accion=valid_login";
		$data['arrayscriptJs'] = array("jquery-1.7.1.min.js","home.js");
		//Finalmente presentamos nuestra plantilla
		$this->view->show("home.php", $data);
    }
	
	public function valid_login($array)
	{
		// SE INCLUYE MODELO USUARIO 
		require 'models/UsuarioModel.php';
		
		// SE CREA UNA INSTACIA DEL MODELO USUARIO 
		$usuario = new UsuarioModel();
	
		// VALIDAMOS USUARIO Y CLAVE CONTRA LA BASE DE DATOS
		$resp = $usuario->validarUsuario($array["usrLogin"], $array["passLogin"]);
		$data['nom_sistema'] = $array["nombre_sistema"];
		if($resp == false)
		{
			$destino = "login.php";
			$data['accion_form'] = "index.php?controlador=Index&accion=valid_login";
		}
		else
		{
			$_SESSION["permisosusu"] = $usuario->getPermisos($array);
			$destino = "default.php";
			$_SESSION["idusuario"] = $array["usrLogin"];
			include("init.php");
		}

		$this->view->show($destino, $data);
	}
    
	public function logoff($array)
	{
		session_destroy();
	}
	
	
	public function page_default($array)
	{
		$destino = "default.php";
		$data['nom_sistema'] = $array["nombre_sistema"];
		$this->view->show($destino, $data);
	}
}
?>