<?php

/* Borrar al terminar las pruebas */
	ini_set('display_errors', 1);
	error_reporting(~0);
/* ----------------------------- */

session_start();
if (isset($_SESSION['id_usuario'])) {
	/* Borrando login */
	session_destroy();
}

// Redirigiendo...
header("Location: index.php");

?>