<?php

/** 
* Muestra el menú para la interfaz de Secretaría Académica 
*/

$entradas_menu = array(
	"Carreras" => "carreras.php",
	"Directores" => "directores.php",
	"Docentes" => "docentes.php",
	"Carga horaria" => "carga-horaria.php",
	"Materias" => "materias.php"
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