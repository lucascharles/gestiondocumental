<?php
class FrontController
{
	static function main()
	{
		require 'libs/Config.php'; //de configuracion
		require 'libs/SPDO.php'; //PDO con singleton
		require 'libs/ControllerBase.php'; //Clase controlador base
		require 'libs/ModelBase.php'; //Clase modelo base
		require 'libs/View.php'; //Mini motor de plantillas
		
		require 'config.php'; //Archivo con configuraciones.
		require $include_url.'/includes/funciones/funciones.php'; 

		
		if(! empty($_REQUEST['controlador']))
		      $controllerName = $_REQUEST['controlador'] . 'Controller';
		else
		      $controllerName = "IndexController";
		
		if(! empty($_REQUEST['accion']))
		      $actionName = $_REQUEST['accion'];
		else
		      $actionName = "index";
		
		$controllerPath = $config->get('controllersFolder') . $controllerName . '.php';
			
		//Incluimos el fichero que contiene nuestra clase controladora solicitada	
		if(is_file($controllerPath))
		      require $controllerPath;
		else
		      die('El controlador no existe - 404 not found');
		
		//Si no existe la clase que buscamos y su accion, tiramos un error 404
		if (is_callable(array($controllerName, $actionName)) == false) 
		{
			trigger_error ($controllerName . '->' . $actionName . '` no existe', E_USER_NOTICE);
			return false;
		}
		
		//Si todo esta bien, creamos una instancia del controlador y llamamos a la accion
		$controller = new $controllerName();
		$_REQUEST["arch_upload"] = $_FILES;
		$_REQUEST["nombre_sistema"] = $config->Get('nombre_sistema');
		$_SESSION ["nombre_empresa"] = $config->Get('nombre_empresa');
		$controller->$actionName($_REQUEST);
	}
}
?>