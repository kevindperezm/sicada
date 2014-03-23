<?php

try {
	require_once "php-activerecord/ActiveRecord.php";


	$cfg = ActiveRecord\Config::instance();
	// Cambia la ruta para que apunte a la dirección de la carpeta modelos en tu máquina
	$cfg->set_model_directory('/home/kevin/www/sicada/assets/modelos');
	// Modifica la ruta para que quede con este formato usando tus datos: mysql://[usuario]:[contraseña]@[servidor]/[base de datos];charset=utf8
	$cfg->set_connections(array('development' => 'mysql://root:root@localhost/SICADA;charset=utf8'));

} catch (Exception $e) {
	die("<h1>Error grave</h1><p>No es posible continuar. Hay un problema con ActiveRecord.<br>Contacte al administrador.</p><p style='color: #888888'>".$e->getMessage()."</p><p style='color: #888888;'>".$e->getTraceAsString()."</p>");
}

?>