<?php
class AfpControlController extends ControllerBase
{

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("admin/afps.php", $data);
	}

	public function grabar_permisos($array)
	{
		require 'models/UsuarioModel.php';
		$dato = new UsuarioModel();
		
		$dato->grabar_permisos($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	
	public function get_detalle_permisos($param)
	{
		require 'models/UsuarioModel.php';
		$usuario = new UsuarioModel();
		
		$res = $usuario->get_detalle_permisos($param);
		
		echo(json_encode($res));
	}
	
	public function configuarar_permisos($array)
	{
		require 'models/UsuarioModel.php';
		$usuario = new UsuarioModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];

		$data['arrayscriptJs'] = array("validacampos.js","usuario_permisos.js");
		$data['dato'] = $usuario->getUsuarioIDint($array["id"]);
		$data['id_rol_usu'] = $usuario->getRolUsuario($data['dato']->get_data("id_usuario"));
		$data['col_rol'] = $usuario->getRoles();
		
		$this->view->show("person/usuario_permiso.php", $data);
	}
	
	public function baja($array)
	{
		require 'models/UsuarioModel.php';
		
		$dato = new UsuarioModel();
		$dato->bajaRegistro($array);
	}
	
	
	public function listaritemsadmin($array)
	{
		require 'models/UsuarioModel.php';
		$dato = new UsuarioModel();
		
		$_SESSION["f_nombre"] = $array["nombre"];
		$_SESSION["f_apellido"] = $array["apellido"];
				
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getListaUsuario($array);
		$data['inicio'] = $array["inicio"];
		$data['inicio_pag'] = $array["inicio_pag"];
	
		$this->view->show("admin/lista_afps.php", $data);
	}
	
	public function alta($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/afp.php", $data);
	}
	
	public function editar($array)
	{
		require 'models/UsuarioModel.php';
		
		$dato = new UsuarioModel();
		
		$usuario = $dato->getUsuarioIDint($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['dato'] = $usuario; 

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/afp.php", $data);
	}
	
	public function grabar_form($array)
	{
		require 'models/UsuarioModel.php';
		$dato = new UsuarioModel();
		
		$dato->grabar_datosForm($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	

}
?>