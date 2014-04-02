<?php
/*!
@file includes/db.php 
@brief Archivo que centraliza configuraciones de la base de datos.

<p>
	SICADA utiliza una base de datos para almacenar información de forma
	persistente. El manejador de base datos MySQL exige un usuario y
	contraseña para permitir el acceso a a información que administra.
	Esas y otras variables relacionadas con la base de datos se encuentras
	definidas en este archivo. Si SICADA cambia de entorno y se necesitan
	redefinir los valores de conexión a la base de datos, se deberían
	redefinir aquí.
</p>
<p>
	Este archivo se incluye en cada archivo que hace uso del mecanismo 
	de plantilla, para que sea posible conectar a la base de datos de
	SICADA desde ellos sin escribir código adicional. 
</p>

@author Kevin Pérez
@date Abril 2014
*/

/*!
@brief Ejecuta el código que corresponde a este archivo.
@return Esta función no retorna ningún valor.
*/
function renderDb() {
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
}

renderDb();
?>