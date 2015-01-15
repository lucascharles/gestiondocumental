<?php
class UsuarioModel extends ModelBase
{
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
	
	public function validarUsuario($param)
	{
		$resp = false; 
		
		$sql = " SELECT id, tipo_usuario, id_empresa ";
		$sql .= " FROM usuarios ";
		$sql .= " WHERE id_usuario = '".$param["usrLogin"]."'";
		$sql .= " AND clave = '".$param["passLogin"]."'";
		$sql .= " AND activo = 'S' ";
		//echo($sql);
		//exit();
		$idsql = consulta($sql);
		$rs=mysql_fetch_array($idsql);
		$bloqueo = array();
		if($rs["tipo_usuario"] == "E")
		{
			$sql = " SELECT id_faena FROM faenasxcontratista ";
			$sql .= " WHERE bloqueada = 1 AND fxcIdContratistaPadre = ".$rs["id_empresa"];
			//echo($sql);
			
			$idsql_bloq = consulta($sql);
			
			while($rs_bloq=mysql_fetch_array($idsql_bloq))
			{
				$bloqueo[] = $rs_bloq["id_faena"];
			}
		}
		if(mysql_num_rows($idsql)>0)
		{
			$resp = true; 
		}
		
		return array($resp,$rs,$bloqueo);
	}
	
	public function getListaUsuario($param)
	{
		include("config.php");
		
		$sql = " SELECT u.id id, u.id_usuario id_usuario, u.nom_usuario nom_usuario, u.ape_usuario ape_usuario, u.fec_alta fec_alta ";
		$sql .= " FROM usuarios u ";
		$sql .= " WHERE u.activo = 'S' ";
		
		if(trim($array["nombre"]) <> "")
		{
			$sql .= " and u.nom_usuario LIKE '".trim($param["nombre"])."%'";
		}

		if(trim($array["apellido"]) <> "")
		{
			$sql .= " and u.ape_usuario LIKE '".trim($param["apellido"])."%'";
		}
		
		$sql .= " ORDER BY u.ape_usuario ";
			
		$result = consulta($sql);
				
    	return $result;	
	}
	

}
?>