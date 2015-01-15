<?php
$config = Config::singleton();

$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');
$config->set('nombre_sistema','GESTION DOCUMENTAL');
$config->set('nombre_empresa','BCH-SOLUCIONES S.A.');

// CONFIGURACION MYSQL
$config->set('dbhost', 'localhost');
$config->set('dbname', 'gestion_documental');
$config->set('dbuser', 'root');
$config->set('dbpass', 'root');
$config->set('carpeta_archivos_general', 'docvarios/');
$config->set('destino_mail','seba.charles@gmail.com');
$config->set('destino_nombre','Administracion');
$config->set('mail_envio',"info@bc-soluciones.com");
$_SESSION["config_obj"] = $config;
$include_url = $_SERVER[DOCUMENT_ROOT]."/gestiondocumental";
?>
