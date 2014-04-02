<?php
/*!
@file includes/menu/menu-secretaria.php 
@brief Genera el menú para la interfaz de Secretaría Académica.

Este archivo genera las entradas del menú de Secretaría Académica a partir
de un hash con pares [texto => ruta]. Para cambiar el menú, hay que
modificar el hash.

@author Kevin Pérez
@date Abril 2014
*/

/*!
@brief Ejecuta el código que corresponde a este archivo.
@return Esta función no retorna ningún valor.
*/
if (!function_exists("renderMenuSecretaria")) {
	function renderMenuSecretaria() {
		$entradas_menu = array(
			"Carreras" => "carreras.php",
			"Directores" => "directores.php",
			"Docentes" => "docentes.php",
			"Carga horaria" => "carga-horaria.php",
			"Materias" => "materias.php"
		); //!< Par de valores <em>[texto => ruta]</em> que forma el menú.
		foreach ($entradas_menu as $nombre => $archivo) {
			$cadena = "<a href='$archivo'><li><span>$nombre</span></li></a>";
			$nombreActual = basename($archivo, ".php");
			if (strcmp($GLOBALS['nombreArchivo'], $nombreActual) == 0) {
				$cadena = "<a href='$archivo'><li class='activo'><span>$nombre</span></li></a>";
			}
			echo $cadena;
		}
	}
}
renderMenuSecretaria();

?>