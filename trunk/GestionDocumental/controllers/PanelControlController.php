<?php

class PanelControlController extends ControllerBase
{
	public function dispositivo_seccion($array)
	{
		require 'models/PanelControlModel.php';
		$dato = new PanelControlModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("layout_dispositivos.js");
		$array["id_usuario"] = $_SESSION["idusuario"];
		
		$seccion = $dato->getSeccion($array);
		$data['des_layout'] = strtoupper($seccion->get_data("descripcion"));
		$data['imagen'] = "images/layout".$seccion->get_data("id_layout")."/seccion".$seccion->get_data("id")."/".$seccion->get_data("imagen");		
		$data['dispositivo'] = $dato->getDispositivosSeccion($array);
		$data['opcion_lay'] = "DISP";
				
		$this->view->show("person/camaras.php", $data);
	}
	
	public function camaras($array)
	{
		require 'models/PanelControlModel.php';
		$dato = new PanelControlModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("layout_dispositivos.js");
		$array["id_usuario"] = $_SESSION["idusuario"];
		$layout = $dato->getLayout($array);
		$data['id_layout'] = $layout->get_data("id");
		$data['des_layout'] = strtoupper($layout->get_data("descripcion"));
		$data['imagen'] = "images/layout".$layout->get_data("id")."/".$layout->get_data("imagen");
		$data['seccion'] = $dato->getSeccionesLayout($array);
		$data['secc_info'] = $dato->getInfoSeccionesLayout($array);
		$data['opcion_lay'] = "LAY";
		$this->view->show("person/camaras.php", $data);
	}
	
	public function estado_dispositivos($array)
	{
		require 'models/PanelControlModel.php';
		$dato = new PanelControlModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$array["idusuario"] = $_SESSION["idusuario"];
		$data['result'] = $dato->getEstado_dispositivos($array);
		$data['titulo_ventana'] = "ESTADOS DISPOSITIVOS";
		$data["nom_column"][] = "ESTADO";
		$data["nom_column"][] = "CANT. DISPOSITIVOS";
	
		$this->view->show("person/contenido_ventana.php", $data);
	}
	
	public function alertas($array)
	{
		require 'models/PanelControlModel.php';
		$dato = new PanelControlModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$array["idusuario"] = $_SESSION["idusuario"];
		$data['result'] = $dato->getAlertas($array);
		$data['titulo_ventana'] = "ALERTAS";
		$data["nom_column"][] = "ALERTAS";
		$data["nom_column"][] = "CANTIDAD";
		$data["nom_column"][] = "FECHA RECIENTE";
		
	
		$this->view->show("person/contenido_ventana.php", $data);
	}
	
	public function admin($array)
	{
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("jquery-1.7.1.min.js", "jquery-ui-1.8.18.custom.min.js","panelcontrol.js");
        $data['arrayscriptCss'] = array("jquery-ui-1.8.18.custom.css","panelcontrol.css");
		$this->view->show("person/panelcontrol.php", $data);
	}
	
	public function carga_panel($array)
	{
		require 'models/PanelControlModel.php';
		$dato = new PanelControlModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$array["idusuario"] = $_SESSION["idusuario"];
		$result = $dato->getCargapanel($array);
	
		echo(json_encode($result));
	}

	public function guarda_posicion($array)
	{
		require 'models/PanelControlModel.php';
		$dato = new PanelControlModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$array["idusuario"] = $_SESSION["idusuario"];
		$result = $dato->guardaPosicion($array);
	}
	
}
?>