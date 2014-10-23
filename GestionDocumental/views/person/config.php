<?php
$config = Config::singleton();

$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');
$config->set('nombre_sistema','SEGURIDAD IP');

// CONFIGURACION MYSQL
$config->set('dbhost', 'localhost');
$config->set('dbname', 'seguridadip');
$config->set('dbuser', 'root');
$config->set('dbpass', 'root');

$include_url = $_SERVER[DOCUMENT_ROOT]."/seguridadip";



?>
