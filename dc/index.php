<?php 
/*!
@file dc/index.php 
@brief Página de bienvenida de la interfaz de Director de Carrera

Este archivo muestra una página de bienvenida para los directores de carrera.
Dicha página no se mostrará al usuario si el usuario no ha iniciado sesión o
si su rol no es "Director de Carrera".

@author Kevin Pérez
@date Abril 2014
*/

include '../includes/functions.php'; 
estaLogueado(3);
?>
<!DOCTYPE html>
<html>
<head>
	<title>SICADA</title>
	<?php include "../includes/htmlhead.php"; ?>
</head>
<body>
	<?php include "../includes/header.php"; ?>
	<?php include "../includes/menu.php"; ?>

	<h4>Inicio</h4>

	<?php include "../includes/footer.php"; ?>
</body>
</html>