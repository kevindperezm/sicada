<?php 
/*!
@file includes/functions.php 
@brief Archivo que reúne código que puede ser útil en todas las páginas
de SICADA.

<p>
	Algunas funciones y variables pueden ser muy útiles si están 
	disponibles de forma global a través de las diferentes páginas 
	de SICADA. Ese es el caso del código que contiene este archivo.
	Debido a que estas funciones y variables se usan en todas las
	páginas algún cambio a ellas en este archivo se verá reflejado en
	todo SICADA. 
</p>
<p>
	Si se desarrollan nuevas funciones o variables que necesiten estar
	disponibles en muchas o todas las páginas, se pueden incluir aquí. 
</p>
<p>
	Este archivo se incluye en cada archivo que hace uso del mecanismo 
	de plantilla, para que sea posible usar las variables, funciones y 
	configuraciones aquí definidas sin necesidad de código adicional. 
</p>

@author Kevin Pérez
@date Abril 2014
*/

/*!
@brief Mostrar una variable en el navegador.

Imprime el contenido de una variable de cualquier tipo de forma
que pueda leerse desde un explorador web. Es útil para propósitos
de depuración.
@param $var Variable de cualquier tipo que se mostrará.
@return Esta función no retorna ningún valor.
*/
function show_debug($var) {
	echo "<hr>";
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
	echo "<hr>";
}

/*!
@brief Conocer si el usuario inició sesión y tiene permisos.

Permite saber si el visitante actual es un usuario con sesión iniciada
en SICADA, además de si su rol le permite ver la página solicitada.
Si resulta que el visitante no ha iniciado sesión será redirigido a la
página de inicio de sesión de SICADA. Si ya inició sesión pero su rol
no es el adecuado, se le redirigirá a la pantalla de bienvenida que 
corresponda a su rol. 

@param $rol ID de rol que la página solicitada desea. Contra él se comparará el rol del usuario actual.
@return <b>true</b> si el usuario ha iniciado sesión y su rol le permite ver la página solicitada.
@return <b>false</b> si aún no ha iniciado sesión, o si su rol no tiene permisos para acceder a la página solicitada.
*/
function estaLogueado($rol) {
	/* Código que comprueba que se ha iniciado sesión */
	$nombreArchivo = explode("/", $_SERVER['PHP_SELF']);
	$nombreArchivo = $nombreArchivo[sizeof($nombreArchivo) - 1];
	$nombreArchivo = explode(".", $nombreArchivo);
	$nombreArchivo = $nombreArchivo[0];
	$GLOBALS['nombreArchivo'] = $nombreArchivo;

	if (!strcmp("login", $nombreArchivo) == 0) {
		session_start();

		if (!isset($_SESSION['id_usuario'])) {
			header("Location: ../index.php?return=$nombreArchivo");
		}

		include "db.php";
		$GLOBALS['usuario'] = Usuario::find($_SESSION['id_usuario']);
			// var_dump($GLOBALS['usuario']);
			// var_dump($GLOBALS['usuario']->rol);

		$usuario = $GLOBALS['usuario'];
		if ($usuario->rol->id_rol != $rol) {
			switch ($usuario->rol->id_rol) {
				case 1: header("Location: ../ad/"); break;
				case 2: header("Location: ../sa/"); break;
				case 3: header("Location: ../dc/"); break;
			}
		}
	}
}

/*!
@brief Renderizar la página.

Ejecuta el código que corresponde a este archivo.
@return Esta función no retorna ningún valor.
*/
function renderFunctions() {
	/* Borrar al terminar las pruebas */
	ini_set('display_errors', 1);
	error_reporting(~0);
	/* ----------------------------- */

	setlocale(LC_ALL,"es_ES");
	date_default_timezone_set("America/Mexico_City");

	include "show_message.php";

	
}
renderFunctions();
?>