<?php
class BaseDatosController extends ControllerBase
{
	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['arrayscriptJs'] = array("base_datos.js");
		
		$this->view->show("person/respaldo_bd.php", $data);
	}
	
	public function exportar_excel($array)
	{
		require 'models/PlantaModel.php';
		$dato = new PlantaModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['arrayscriptJs'] = array("base_datos.js");
		$col = $dato->getListaPlanta(array("denominacion"=>""));
		$data['colPlanta'] = $col[0];
		$this->view->show("person/exportar_excel.php", $data);
	}
	
	public function exporta_archivo_excel($array)
	{
		require 'models/BaseDatosModel.php';
		$basedatos = new BaseDatosModel();
		require 'models/PlantaModel.php';
		$dato = new PlantaModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['arrayscriptJs'] = array("base_datos.js");
		$col = $dato->getListaPlanta(array("denominacion"=>""));
		$data['colPlanta'] = $col[0];
		
		$result = $basedatos->exporta_archivo_excel($array);
		
		//$this->view->show("person/exportar_excel.php", $data);
		
	}
	
	
	public function form_exportar_bd($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['arrayscriptJs'] = array("base_datos.js");
		
		$this->view->show("person/exportar_bd.php", $data);
	}

	public function form_importar_bd($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['arrayscriptJs'] = array("validacampos.js","base_datos.js");
		$data['result'] = "";
		
		$this->view->show("person/importar_bd.php", $data);
	}

	public function importar_basedatos($array)
	{
		require 'models/BaseDatosModel.php';
		$basedatos = new BaseDatosModel();
		$result = $basedatos->imporatarBd($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['arrayscriptJs'] = array("base_datos.js");
		$data['result'] = $result;
		$this->view->show("person/importar_bd.php", $data);
	}
	
	public function exportar_bd($array)
	{
		require 'models/BaseDatosModel.php';
		$basedatos = new BaseDatosModel();
		$result = $basedatos->exportarBd();
		if(!$result)
		{
			echo("FALLO");
		}
	}
	
	public function backup_bd($array)
	{
		require 'models/BaseDatosModel.php';
		$basedatos = new BaseDatosModel();
		$result = $basedatos->backUp();
		if(!$result)
		{
			echo("FALLO");
		}
	}
}
?>
