<?php
	
	$db = new mysql_db($config->get('dbhost'), $config->get('dbuser'),  $config->get('dbpass'), $config->get('dbname'), false);
		
	add_database($db, $db_name);

	// CLASES MODELO DE NEGOCIO	
	class UsuarioRol extends BusinessObject
	{
		function UsuarioRol()
		{
			$this->table_name = "si_usuario_rol";
			$this->field_metadata = array(
					"id" => array("int"),
					"id_usuario" => array("varchar"),
					"id_rol" => array("int")					
				);
			parent::BusinessObject();
		}
	}

	class UsuarioRolCollection extends BusinessObjectCollection
	{
		function UsuarioRolCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new UsuarioRol();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class Rol extends BusinessObject
	{
		function Rol()
		{
			$this->table_name = "si_rol";
			$this->field_metadata = array(
					"id" => array("int"),
					"descripcion" => array("varchar")
					
				);
			parent::BusinessObject();
		}
	}

	class RolCollection extends BusinessObjectCollection
	{
		function RolCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new Rol();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class Seccion extends BusinessObject
	{
		function Seccion()
		{
			$this->table_name = "si_seccion_layout";
			$this->field_metadata = array(
					"id" => array("int"),
					"descripcion" => array("varchar"),
					"id_layout" => array("int"),
					"coordx" => array("int"),
					"coordy" => array("int"),
					"imagen" => array("varchar"),
					"estado" => array("char")
					
				);
			parent::BusinessObject();
		}
	}

	class SeccionCollection extends BusinessObjectCollection
	{
		function SeccionCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new Seccion();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class Layout extends BusinessObject
	{
		function Layout()
		{
			$this->table_name = "si_layout";
			$this->field_metadata = array(
					"id" => array("int"),
					"descripcion" => array("varchar"),
					"imagen" => array("varchar"),
					"estado" => array("char")
					
				);
			parent::BusinessObject();
		}
	}

	class LayoutCollection extends BusinessObjectCollection
	{
		function LayoutCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new Layout();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class Usuario_layout extends BusinessObject
	{
		function Usuario_layout()
		{
			$this->table_name = "si_usuario_layout";
			$this->field_metadata = array(
					"id_usuario" => array("varchar"),
					"id_dispositivo" => array("int")
				);
			parent::BusinessObject();
		}
	}

	class Usuario_layoutCollection extends BusinessObjectCollection
	{
		function Usuario_layoutCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new Usuario_layout();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class ConfiguracionDispositivo extends BusinessObject
	{
		function ConfiguracionDispositivo()
		{
			$this->table_name = "si_configuracion_dispositivo";
			$this->field_metadata = array(
					"id" => array("int"),
					"id_dispositivo" => array("int"),
					"ubicacion" => array("varchar"),
					"posicion_relativa" => array("varchar"),
					"altura" => array("varchar"),
					"id_tipo_alerta" => array("int"),
					"id_modo_camara" => array("int"),
					"sensibilidad" => array("int"),
					"estado" => array("char")
				);
			parent::BusinessObject();
		}
	}

	class ConfiguracionDispositivoCollection extends BusinessObjectCollection
	{
		function ConfiguracionDispositivoCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new ConfiguracionDispositivo();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class ModoCamara extends BusinessObject
	{
		function ModoCamara()
		{
			$this->table_name = "si_modo_camara";
			$this->field_metadata = array(
					"id" => array("int"),
					"descricion" => array("varchar"),
					"estado" => array("char")
				);
			parent::BusinessObject();
		}
	}

	class ModoCamaraCollection extends BusinessObjectCollection
	{
		function ModoCamaraCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new ModoCamara();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class TipoAlerta extends BusinessObject
	{
		function TipoAlerta()
		{
			$this->table_name = "si_tipo_alertas";
			$this->field_metadata = array(
					"id" => array("int"),
					"descricion" => array("varchar"),
					"estado" => array("char")
				);
			parent::BusinessObject();
		}
	}

	class TipoAlertaCollection extends BusinessObjectCollection
	{
		function TipoAlertaCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new TipoAlerta();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class Dispositivo extends BusinessObject
	{
		function Dispositivo()
		{
			$this->table_name = "si_dispositivo";
			$this->field_metadata = array(
					"id" => array("int"),
					"descripcion" => array("varchar"),
					"direccion_ip"=> array("varchar"),
					"nro_serie" => array("varchar"),
					"modelo" => array("varchar"),
					"marca" => array("varchar"),
					"id_tipo_dispositivo" => array("int"),
					"id_estado_dispositivo" => array("int"),
					"estado" => array("char")

				);
			parent::BusinessObject();
		}
	}

	class DispositivoCollection extends BusinessObjectCollection
	{
		function DispositivoCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new Dispositivo();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class Panel_control extends BusinessObject
	{
		function Panel_control()
		{
			$this->table_name = "si_panel_control";
			$this->field_metadata = array(
					"id" => array("int"),
					"ventana" => array("varchar"),
					"cuadrante" => array("varchar"),
					"contenido" => array("varchar"),
					"tipo_carga" => array("varchar"),
					"usuario" => array("varchar")

				);
			parent::BusinessObject();
		}
	}

	class Panel_controlCollection extends BusinessObjectCollection
	{
		function Panel_controlCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new Panel_control();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class TipoDispositivo extends BusinessObject
	{
		function TipoDispositivo()
		{
			$this->table_name = "si_tipo_dispositivo";
			$this->field_metadata = array(
					"id" => array("int"),
					"descricion" => array("varchar"),
					"estado" => array("char")
				);
			parent::BusinessObject();
		}
	}

	class TipoDispositivoCollection extends BusinessObjectCollection
	{
		function TipoDispositivoCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new TipoDispositivo();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	class EstadoDispositivo extends BusinessObject
	{
		function EstadoDispositivo()
		{
			$this->table_name = "si_estado_dispositivo";
			$this->field_metadata = array(
					"id" => array("int"),
					"descricion" => array("varchar"),
					"estado" => array("char")
				);
			parent::BusinessObject();
		}
	}

	class EstadoDispositivoCollection extends BusinessObjectCollection
	{
		function EstadoDispositivoCollection ()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new EstadoDispositivo();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
		
	// CLASES DESOPORTE SISTEMA
	class respaldo extends BusinessObject
	{
		function respaldo()
		{
			$this->table_name = "si_respaldo";
			$this->field_metadata = array(
					"id" => array("int"),
					"fecha" => array("date"),
					"activo" => array("char")
				);
			parent::BusinessObject();
		}
	}
	
	class Usuarios extends BusinessObject
	{
		function Usuarios()
		{
			$this->table_name = "si_usuarios";
			$this->field_metadata = array(
					"id" => array("int"),
					"id_usuario" => array("varchar"),
					"clave" => array("varchar"),
					"nom_usuario" => array("varchar"),
					"ape_usuario" => array("varchar"),
					"activo" => array("char"),
					"fec_alta" => array("datetime"),
				);
			parent::BusinessObject();
		}
	}

	class UsuariosCollection extends BusinessObjectCollection
	{
		function UsuariosCollection()
		{
			parent::BusinessObjectCollection();
		}
		
		function create_singular($row) 
		{ 
			$obj = new Usuarios();
			$obj->load_from_list($row);
			
			return $obj;
		}
	}
	
	// CLASES SOPORTE SQL 
	class SqlPersonalizado extends SqlSoporte
	{
		function SqlPersonalizado($h, $u, $p)
		{
			parent::SqlSoporte($h, $u, $p);
		}
	}
	
//	-------------------------------------------------------------------------------------------
//	CLASES GESTION DOCUMENTAL
//	-------------------------------------------------------------------------------------------

	class Trabajador extends BusinessObject
		{
			function Trabajador()
			{
				$this->table_name = "trabajador";
				$this->field_metadata = array(
						"trbIdTrabajador" => array("int"),
						"afpIdAfp" => array("int"),
						"comIdComuna" => array("int"),
						"ctrIdContratista" => array("int"),
						"dirIdDireccion" => array("int"),
						"isaIdIsapre" => array("int"),
						"nacIdNacionalidad" => array("int"),
						"tgrlIdCargoContractual" => array("int"),
						"tgrlIdOficioCab" => array("int"),
						"tgrlIdOficioDet" => array("int"),		
						"tgrlIdTipoContrato" => array("int"),
						"tjorIdTipoJornada" => array("int"),
						"trbAfectoArt22" => array("varchar"),
						"trbAntiguedadMeses" => array("int"),
						"trbApMaterno" => array("varchar"),
						"trbApPaterno" => array("varchar"),
						"trbCeco" => array("varchar"),
						"trbDireccion" => array("varchar"),
						"trbEstado" => array("varchar"),
						"trbFechaContrato" => array("date"),
						"trbFechaCreacion" => array("date"),
						"trbFechaModificacion" => array("date"),
						"trbFechaNac" => array("date"),
						"trbHorasSemanales" => array("int"),
						"trbIngresoObraFecha" => array("date"),
						"trbNombre" => array("varchar"),
						"trbPensionado" => array("varchar"),
						"trbPerteneceSindicato" => array("varchar"),
						"trbRut" => array("varchar"),
						"trbRutJefe" => array("varchar"),
						"trbSeguroCesantia" => array("varchar"),
						"trbSexo" => array("varchar"),
						"trbTelefono" => array("varchar"),
						"trbTitulo" => array("varchar"),
						"trbUsuarioCreacion" => array("varchar"),
						"trbUsuarioModificacion" => array("varchar"),
						"trbVisa" => array("varchar"),
						"activo" => array("varchar")

				);
				parent::BusinessObject();
			}
		}

		class TrabajadorCollection extends BusinessObjectCollection
		{
			function TrabajadoresCollection()
			{
				parent::BusinessObjectCollection();
			}
			
			function create_singular($row) 
			{ 
				$obj = new Trabajador();
				$obj->load_from_list($row);
				
				return $obj;
			}
		}
	
		class Constructora extends BusinessObject
				{
					function Constructora()
					{
						$this->table_name = "constructora";
						$this->field_metadata = array(
								"consIdConstructora" => array("int"),
								"consEmail" => array("varchar"),
								"consEstado" => array("varchar"),
								"consFechaCreacion" => array("date"),
								"consFechaModificacion" => array("date"),
								"consNombreFantasia" => array("varchar"),
								"consRazonSocial" => array("varchar"),
								"consRut" => array("varchar"),
								"consTelefono" => array("varchar"),
								"consTelefono2" => array("varchar"),
								"consTelefono3" => array("varchar"),
								"consUsuarioCreacion" => array("varchar"),
								"consUsuarioModificacion" => array("varchar"),
								"dirIdDireccion" => array("int"),
								"rplIdRepLegal" => array("int"),
								"activo" => array("varchar"),

						);
						parent::BusinessObject();
					}
				}

		class ConstructoraCollection extends BusinessObjectCollection
		{
			function ConstructoraCollection()
			{
				parent::BusinessObjectCollection();
			}
			
			function create_singular($row) 
			{ 
				$obj = new Constructora();
				$obj->load_from_list($row);
				
				return $obj;
			}
		}

		class Contratista extends BusinessObject
				{
					function Contratista()
					{
						$this->table_name = "contratista";
						$this->field_metadata = array(
								"ctrIdContratista" => array("int"),
								"ccatIdAfiliado" => array("int"),
								"ctrEmail" => array("varchar"),
								"ctrEmailExpertoMutualidad" => array("varchar"),
								"ctrEstado" => array("varchar"),
								"ctrFechaCreacion" => array("date"),
								"ctrFechaModificacion" => array("date"),
								"ctrFonoExpertoMutualidad" => array("varchar"),
								"ctrIdAfiliadoMutualidad" => array("int"),
								"ctrIdServicioContratado" => array("int"),
								"ctrIngresoFaena" => array("date"),
								"ctrNombreExpertoMutualidad" => array("varchar"),
								"ctrNombreFantasia" => array("varchar"),
								"ctrNroActividadCab" => array("varchar"),
								"ctrNroActividadDet" => array("varchar"),
								"ctrRazonSocial" => array("varchar"),
								"ctrRut" => array("varchar"),
								"ctrTasaCotizacionActual" => array("int"),
								"ctrTasaCotizacionTotal" => array("int"),
								"ctrTasaGenerica" => array("int"),
								"ctrTelefono" => array("varchar"),
								"ctrTelefono2" => array("varchar"),
								"ctrTelefono3" => array("varchar"),
								"ctrUsuarioCreacion" => array("varchar"),
								"ctrUsuarioModificacion" => array("varchar"),
								"dirIdDirecion" => array("int"),
								"mutIdMutualidad" => array("int"),
								"rplIdRepLegal" => array("int"),
								"tjor_idTipoJornada" => array("int"),
								"activo" => array("varchar")
						);
						parent::BusinessObject();
					}
				}

				class ContratistaCollection extends BusinessObjectCollection
				{
					function ContratistaCollection()
					{
						parent::BusinessObjectCollection();
					}
					
					function create_singular($row) 
					{ 
						$obj = new Contratista();
						$obj->load_from_list($row);
						
						return $obj;
					}
				}

		class Afp extends BusinessObject
		{
			function Afp()
			{
				$this->table_name = "afp";
				$this->field_metadata = array(
						
					  "afpIdAfp" => array("int"), 
					  "afpEstado" => array("varchar"),
					  "afpFechaCreacion" => array("date"),
					  "afpFechaModificacion" => array("date"),
					  "afpNombre" => array("varchar"),
					  "afpUsuarioCreacion" => array("varchar"),
					  "afpUsuarioModificacion" => array("varchar"),
					  "activo" => array("varchar")
				);
				parent::BusinessObject();
			}
		}

		class AfpCollection extends BusinessObjectCollection
		{
			function AfpCollection()
			{
				parent::BusinessObjectCollection();
			}
			
			function create_singular($row) 
			{ 
				$obj = new Afp();
				$obj->load_from_list($row);
				
				return $obj;
			}
		}

		class Faenas extends BusinessObject
		{
			function Faenas()
			{
				$this->table_name = "faena";
				$this->field_metadata = array(
						"faeIdFaenas" => array("int"),
						"consIdConstructora" => array("int"),
						"dirIdDireccion" => array("int"),
						"faeEstado" => array("varchar"),
						"faeFechaCreacion" => array("date"),
						"faeFechaInicio" => array("date"),
						"faeFechaModificacion" => array("date"),
						"faeFechaTermino" => array("date"),
						"faeIdFaenaPadre" => array("int"),
						"faeNombre" => array("varchar"),
						"faeResponsable" => array("varchar"),
						"faeTelefono" => array("varchar"),
						"faeUsuarioCreacion" => array("varchar"),
						"faeUsuarioModificacion" => array("varchar")					
					);
				parent::BusinessObject();
			}
		}

		class FaenasCollection extends BusinessObjectCollection
		{
			function FaenasCollection()
			{
				parent::BusinessObjectCollection();
			}
			
			function create_singular($row) 
			{ 
				$obj = new Faenas();
				$obj->load_from_list($row);
				
				return $obj;
			}
		}

		
		
?>