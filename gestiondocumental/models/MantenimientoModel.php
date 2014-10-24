<?php
class MantenimientoModel extends ModelBase
{
	public function descarga_archivo_act()
	{
		$ftp_server = "ftp.bch-soluciones.com";
		$ftp_user_name = "bchsoluc"; 
		$ftp_user_pass = "lr4y19C9bX";
		
		$local_file = './ajax/actualiza.php';
		$server_file = '/public_html/demo/gautomotor/actualiza/actualiza.php';

		$conn_id = ftp_connect($ftp_server);

		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

		if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) 
		{
		    echo "";
		} 
		else 
		{
    		echo "Ha habido un problema\n";
		}

		ftp_close($conn_id);
	}
	
	public function upload_datos()
	{
		error_reporting(0);
		
		$resp = "";
		$dir_local_file = "";
		$local_file = "DBgautomotor".date('YmdHis').".sql";
		// COPIA BASE DE DATOS 
		$output = shell_exec("C:\AppServ\MySQL\bin\mysqldump.exe -u root -proot gautomotor"); 
			
		if(trim($output)==NULL)
     	{
           $resp = "Error copia base de datos";
     	}
		else
		{
			$dir_local_file = "./CopiaBaseDatos/".$local_file;
			
			$result = file_put_contents($dir_local_file ,$output);
			
			if($result == false)
			{
    			$operacion = false;
			}
		}
		
		// UPLOAD DATOS 
		$ftp_server = "ftp.bch-soluciones.com";
		$ftp_user_name = "bchsoluc"; 
		$ftp_user_pass = "lr4y19C9bX";
		
		$server_file = '/public_html/demo/gautomotor/exportar/'.$local_file;

		$conn_id = ftp_connect($ftp_server);

		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

		ftp_pasv($conn_id, true);
		
		if (ftp_put($conn_id, $server_file, $dir_local_file, FTP_BINARY)) 
		{
		    echo "";
		} 
		else 
		{
    		echo "Error upload datos";
		}

		ftp_close($conn_id);
		
		echo $resp;
	}
}
?>