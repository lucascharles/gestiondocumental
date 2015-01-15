<?php
class ContactoModel extends ModelBase
{
	public function save_emailnews($param)
	{
		$sql = " SELECT * ";
		$sql .= " FROM mailnews ";
		$sql .= " WHERE email = '".$param["email"]."'";
		//echo($sql);
		$idsql = consulta($sql);
		
		if(mysql_num_rows ($idsql) == 0)
		{
			$sql = " INSERT INTO mailnews (email, activo) VALUES ('".$param["email"]."','S')  ";
			consulta($sql);
		}
	}
	
	public function enviar_mensaje($param)
	{
		include("config.php");
		include_once "includes/mail/class.phpmailer.php"; 
		
		// ENVIA MAIL
		$QuienEnvia = "Web Gestion Documenta";
		$mailQuienEnvia = $param["mail_envio"];
		$asunto_mail = "WEB GESTION DOCUMENTAL - Contacto ";
		$logo = "<img  valign=top src='cid:logoproyecto' border='0' />";
		$path = "images/logoproyecto_min.png";
		$name = "logoproyecto";
		
		$mensaje ="";
	
	$mensaje .= "<table  cellpadding='0' cellspacing='0'  width=750 border='0' align='center'>";
	$mensaje .= "	<tr valign='top'> <td valign='top'>".$logo."</td>";
    $mensaje .= "    <td  width='80%' class=t3 align=right>";
	$mensaje .= $asunto_mail;
    $mensaje .= "</td></tr>";
	$mensaje .= "</table>";
	$mensaje .= "<table  cellpadding='3' cellspacing='0'  width=750  align='center'>";
	$mensaje .= "	<tr> <td  height='10' colspan=6></td><tr>";
	$mensaje .= "	<tr> <td colspan=6>";	
	$mensaje .= "<table  border='0' cellpadding='0'  cellspacing='0' align='center' width='750'>";
	$mensaje .= "<tr>";
	$mensaje .= "    <td width='80%' height='25'>";
	$mensaje .= " <span class=t1>";
	$mensaje .= "<strong>Nombre:</strong>&nbsp;".$param["nombre"];
	$mensaje .= "</span><br><br>";
	$mensaje .= " <span class=t1>";
	$mensaje .= "<strong>Email:</strong>&nbsp;".$param["email"];
	$mensaje .= "</span>";
	$mensaje .= "</td>";
	$mensaje .= "    <td align='center'><br><br>";
	$mensaje .= "</td>";
	$mensaje .= "</tr>";
	$mensaje .= "<tr>";
	$mensaje .= "<td  colspan=2 height='25'>";
	$mensaje .= "<br><br><span class=t2><strong>Mensaje:</strong><br>".nl2br($param["mensaje"]).".</span><br><br>";
	$mensaje .= "</td>";
	$mensaje .= "</tr>";
	$mensaje .= "</table>";
	$mensaje .= " </td></tr>";
	$mensaje .= "</table>";
		
		$mail = new PHPMailer(); 
		$mail->From = $mailQuienEnvia;
		$mail->FromName = $QuienEnvia;
		$mail->SMTPDebug  = 0;
		$mail->AltBody="To view the message, please use an HTML compatible email viewer!";
		$mail->Subject = $asunto_mail;
		$mail->MsgHTML($mensaje);
		$mail->AddEmbeddedImage($path, $name, $name."png");
		$mail->AddAddress($param["destino_mail"] , $param["destino_nombre"]);
		$error = "";
		
		if(!$mail->Send())
		{
			$error = "ERROR ENVIANDO A ".$destinatario["destino_mail"]." - " . $mail->ErrorInfo;
		}
		
		$mail->ClearAddresses();
		
		return $error;
	}
}
?>