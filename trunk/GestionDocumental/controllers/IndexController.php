<?php
class IndexController extends ControllerBase
{
    public function save_emailnews($param)
	{
		require 'models/ContactoModel.php';
		$contacto = new ContactoModel();
		$contacto->save_emailnews($param);
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
	
	public function contacto($param)
	{
			$destino = "contacto.php";
			$data['nom_sistema'] = $param["nombre_sistema"];
			$data['nom_empresa'] = $param["nombre_empresa"];
			$data['accion_form'] = "index.php?controlador=Index&accion=envia_mail";
			$data["envio"] = false;	
			$this->view->show($destino, $data);
	}
	
	public function envia_mail($param)
	{
		require 'models/ContactoModel.php';
		$contacto = new ContactoModel();
						
		$data['controller'] = $param["controlador"];
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['nom_empresa'] = $param["nombre_empresa"];
		$param["destino_mail"] = $_SESSION["config_obj"]->get('destino_mail');
		$param["destino_nombre"] =  $_SESSION["config_obj"]->get('destino_nombre');
		$param["mail_envio"] =  $_SESSION["config_obj"]->get('mail_envio');
		$data['accion_form'] = "index.php";
		$data["result"] = $contacto->enviar_mensaje($param);
		$data["envio"] = true;
		$pagina = "contacto.php";
				
		$this->view->show($pagina, $data);
	}
	
	public function valid_login($param)
	{
		// SE INCLUYE MODELO USUARIO 
		require 'models/UsuarioModel.php';
		
		// SE CREA UNA INSTACIA DEL MODELO USUARIO 
		$usuario = new UsuarioModel();
	
		// VALIDAMOS USUARIO Y CLAVE CONTRA LA BASE DE DATOS
		if(trim($param["usrLogin"]) <> "" && trim($param["passLogin"]) <> "")
		{
			$resp = $usuario->validarUsuario($param);
		}
		$data['nom_sistema'] = $param["nombre_sistema"];
		if($resp[0] == false)
		{
			$destino = "login.php";
			$data['accion_form'] = "index.php?controlador=Index&accion=valid_login";
		}
		else
		{
			//$_SESSION["permisosusu"] = $usuario->getPermisos($array);
			$destino = "default.php";
			$_SESSION["idusuario"] = $param["usrLogin"];
			$_SESSION["userid"] = $resp[1]["id"];
			$_SESSION["tip_usuario"] = $resp[1]["tipo_usuario"];
			
			if($_SESSION["tip_usuario"] == "E")
			{
				$_SESSION["idagencia"] = $resp[1]["id_agencia"];
				$_SESSION["idempresa"] = $resp[1]["id_empresa"];
				$_SESSION["bloqueo"] = $resp[2];
				
				redir("index.php?controlador=Faenas&accion=faenasempresa");
			}
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