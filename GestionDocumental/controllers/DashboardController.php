<?php
class DashboardController extends ControllerBase
{

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("admin/dashboard.php", $data);
	}
	
	public function listaritemsadmin($array)
	{

		require 'models/DashboardModel.php';
		$dato = new DashboardModel();		
		$_SESSION["f_const"] = $array["nombre"];
				
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getListaConstructoras($array);
	
		$this->view->show("admin/lista_dashboard.php", $data);
	}

}
?>