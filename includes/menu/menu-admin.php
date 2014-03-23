<?php

/** 
* Muestra el menú para la interfaz de Administrador
*/

$entradas_menu = array(
	
);

foreach ($entradas_menu as $nombre => $archivo) {
	$cadena = "<a href='$archivo'><li><span>$nombre</span></li></a>";
	$nombreActual = basename($archivo, ".php");
	if (strcmp($GLOBALS['nombreArchivo'], $nombreActual) == 0) {
		$cadena = "<a href='$archivo'><li class='activo'><span>$nombre</span></li></a>";
	}
	echo $cadena;
}

?>