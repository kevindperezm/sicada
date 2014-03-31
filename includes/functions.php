<?php 
/* Borrar al terminar las pruebas */
ini_set('display_errors', 1);
error_reporting(~0);
/* ----------------------------- */

setlocale(LC_ALL,"es_ES");
date_default_timezone_set("America/Mexico_City");

function show_debug($var) {
	echo "<hr>";
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
	echo "<hr>";
}

include "show_message.php";

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
?>