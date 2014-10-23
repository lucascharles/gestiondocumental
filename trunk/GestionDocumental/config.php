<?php
$config = Config::singleton();

$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');
$config->set('nombre_sistema','SEGURIDAD IP');
$config->set('nombre_empresa','BCH-SOLUCIONES S.A.');
//$config->set('nombre_empresa','BCH-SOLUCIONES');


// CONFIGURACION MYSQL

// maquina local

$config->set('dbhost', 'localhost');
$config->set('dbname', 'seguridadip');
//$config->set('dbname', 'test');
$config->set('dbuser', 'root');
//$config->set('dbuser', 'bchsoluc_dyv');
$config->set('dbpass', 'root');
//$config->set('dbpass', 'bchsoluc_dyv');

$config->set('modulo_panelcontrol', '1');
$config->set('modulo_informes', '2');
$config->set('modulo_dispositivo', '3');
$config->set('modulo_usuarios', '4');

$_SESSION["config_obj"] = $config;



$include_url = $_SERVER[DOCUMENT_ROOT]."/seguridadip";
//$include_url = $_SERVER[DOCUMENT_ROOT]."/demos/seguridadip";


/*
// server

$config->set('dbhost', 'localhost');
$config->set('dbname', 'bchsoluc_sistemadv');
$config->set('dbuser', 'bchsoluc_root');
$config->set('dbpass', 'bchroot123');

$include_url = $_SERVER[DOCUMENT_ROOT]."/demo/gcontratista";
*/

?>
