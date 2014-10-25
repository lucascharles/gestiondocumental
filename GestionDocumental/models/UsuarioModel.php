<?php
class UsuarioModel extends ModelBase
{
	public function save_emailnews($param)
	{
		$sql = " SELECT * ";
		$sql .= " FROM si_mailnews ";
		$sql .= " WHERE email = '".$param["email"]."'";

		$idsql = consulta($sql);
		
		if(mysql_num_rows ($idsql) == 0)
		{
			$sql = " INSERT INTO si_mailnews (email, activo) VALUES ('".$param["email"]."','S')  ";
			consulta($sql);
		}
	}

	public function grabar_permisos($param)
	{
		$dato = new UsuarioRol();
		$dato->add_filter("id_usuario","=",$param["id_usu"]);
		$dato->load();
		if(!is_null($dato->get_data("id_rol")))
		{
			$dato->set_data("id_rol",$param["id_rol"]);
			$dato->save();
		}
		else
		{
			$dato_new = new UsuarioRol();
			$dato_new->set_data("id_usuario",$param["id_usu"]);
			$dato_new->set_data("id_rol",$param["id_rol"]);
			$dato_new->save();
		}
		
		
	}
	
	public function get_detalle_permisos($param)
	{
		$sql = " SELECT m.descripcion, p.alta, p.baja, p.modificacion, p.vista, p.extra ";
		$sql .= " FROM si_rol_permiso p, si_modulo m ";
		$sql .= " WHERE p.id_rol = ".$param["id_rol"];
		$sql .= " and p.id_modulo = m.id ";

		$idsql = consulta($sql);
		
		$permisos = array();
		
		while($rs=mysql_fetch_array($idsql))
		{
			$aux = array();
			
			$aux[] = $rs["descripcion"];
			$aux[] = $rs["alta"]; 
			$aux[] = $rs["baja"]; 
			$aux[] = $rs["modificacion"]; 
			$aux[] = $rs["vista"]; 
			$aux[] = $rs["extra"];
			
			$permisos[] = $aux;
		}
		
		return $permisos;
	}
	
	public function getRolUsuario($id_usuario)
	{
		$dato = new UsuarioRol();
		$dato->add_filter("id_usuario","=",$id_usuario);
		$dato->load();
		
		return $dato->get_data("id_rol");
	}
	
	public function getRoles()
	{
		$dato = new RolCollection();
		$dato->load();
		
		return $dato;
	}
	
	public function getPermisos($param)
	{
		$sql = " SELECT p.id_modulo, p.alta, p.baja, p.modificacion, p.vista, p.extra ";
		$sql .= " FROM si_usuario_rol ur, si_rol_permiso p ";
		$sql .= " WHERE ur.id_usuario = '".$param["usrLogin"]."'";
		$sql .= " and ur.id_rol = p.id_rol ";

// 		$idsql = consulta($sql);
		
		$permisos = array();
		while($rs=mysql_fetch_array($idsql))
		{
			$aux = array();
			
			$aux["modulo"] = $rs["id_modulo"];
			$aux["alta"] = $rs["alta"]; 
			$aux["baja"] = $rs["baja"]; 
			$aux["modificacion"] = $rs["modificacion"]; 
			$aux["vista"] = $rs["vista"]; 
			$aux["extra"] = $rs["extra"];
			
			$permisos[] = $aux;
		}
		
		return $permisos;
	}
	
	public function bajaRegistro($array)
	{
		$dato = new Usuarios();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		$dato->set_data("activo","N");
		$dato->save();
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];
		
		$dato = new Usuarios();
		if($tipop=="M")
		{
			$dato->add_filter("id","=",$array["id_usu"]);
			$dato->load();
		}
		
		if(trim($array["id_usuario"])<>"")$dato->set_data("id_usuario",$array["id_usuario"]);
		if(trim($array["ape_usuario"])<>"")$dato->set_data("ape_usuario",$array["ape_usuario"]);
		if(trim($array["nom_usuario"])<>"")$dato->set_data("nom_usuario",$array["nom_usuario"]);
		if(trim($array["clave"])<>"")$dato->set_data("clave",$array["clave"]);
		if(trim($array["fec_alta"])<>"")$dato->set_data("fec_alta",formatoFecha($array["fec_alta"],"dd/mm/yyyy","yyyy-mm-dd"));
		$dato->set_data("activo","S");
		$dato->save();
	}

	public function getUsuario($id_usuario)
	{
		$dato = new Usuarios();
		$dato->add_filter("id_usuario","=",$id_usuario);
		$dato->load();
		
		return $dato;
	}
	

	public function getUsuarioIDint($array)
	{
		$dato = new Usuarios();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}
	
	public function getDatosUsuario($array)
	{
		$dato = new Usuarios();
		$dato->add_filter("id_usuario","=",$array["idusuario"]);
		$dato->load();
		
		return $dato;
	}
	
	public function cambiarClave($nueva, $id_usuario)
	{
		$dato = new Usuarios();
		$dato->add_filter("id_usuario","=",$id_usuario);
		$dato->load();
		$dato->set_data("clave",$nueva);
		$dato->save();
	}
	
	public function validarUsuario($id_usuario, $clave)
	{
		$resp = false; 
		
		$oUsuario = new Usuarios();
		$oUsuario->add_filter("id_usuario","=",$id_usuario);
		$oUsuario->add_filter("AND");
		$oUsuario->add_filter("clave","=",$clave);
		$oUsuario->add_filter("AND");
		$oUsuario->add_filter("activo","=","S");
		$oUsuario->load();
	
		if(!is_null($oUsuario->get_data("nom_usuario")))
		{
			$_SESSION['idusuario'] = $oUsuario->get_data("id_usuario");
			$resp = true; 
		}
		
		return $resp;

	}
	
	public function getListaUsuario($array)
	{
		include("config.php");
		
		$select = " u.id id, u.id_usuario id_usuario, u.nom_usuario nom_usuario, u.ape_usuario ape_usuario, u.fec_alta fec_alta ";
		$from = " si_usuarios u ";
		$where = " u.activo = 'S' ";
		
		if(trim($array["nombre"]) <> "")
		{
			$where .= " and u.nom_usuario LIKE '".trim($array["nombre"])."%'";
		}

		if(trim($array["apellido"]) <> "")
		{
			$where .= " and u.ape_usuario LIKE '".trim($array["apellido"])."%'";
		}
		
		$where .= " ORDER BY u.ape_usuario ";
		
		$sqlpersonal = new SqlPersonalizado($config->get('dbhost'), $config->get('dbuser'), $config->get('dbpass') );
		$sqlpersonal->set_select($select); 
	  	$sqlpersonal->set_from($from);
		$sqlpersonal->set_where($where);
		if(!($array["all_rows"] == "S"))
		{
			$sqlpersonal->set_limit(($array["inicio"]*40),($array["inicio"]*40)+40); // PARA MYSQL
		}
	
    	$sqlpersonal->load();
		$cant = $sqlpersonal->get_cant_registros();
		
		$result = array();
		$result[] = $sqlpersonal;
		$result[] = $cant;
		
    	return $result;	
	}
	

}
?>