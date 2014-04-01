<?php
include "includes/functions.php";
/*!
@file codigo/index.php 
@brief Página de inicio de sesión de SICADA. 

Cuando un usuario desea entrar a alguna de las páginas de SICADA y no se ha autenticado,
será dirigido a esta página donde deberá presentar sus credenciales. Si las credenciales que
introduce son válidas, el usuario será dirigido a la pantalla inicial del rol que le corresponde.
Es decir, si el usuario es miembro de Secretaría Académica será enviado a sa/index.php y si
se trata de un Director de Carrera será enviado a dc/index.php. Si las credenciales son
incorrectas, el usuario será notificado. Si el usuario visita esta página después de autenticarse
y sin haber cerrado sesión antes, no se le mostrará el formulario de inicio de sesión otra vez. 
Será dirigido directamente hacia la pantalla inicial del rol que le corresponde.

@param string $_POST['user'] Nombre del usuario que iniciará sesión.
@param string $_POST['password'] Contraseña del usuario que iniciará sesión.

@author Kevin Pérez
@date Marzo 2014
*/

$falloLogin = false; //!< Vale TRUE si ocurrió un error de credenciales al intentar iniciar sesión.

/*!
@brief Renderiza el HTML correspondiente a esta página.
*/
function perform() {


	if (isset($_POST['login'])) {
		$user = $_POST['user'];
		$password = $_POST['password'];

		include "includes/db.php";
		$usuario = Usuario::find(array(
			"conditions" => array("nombre = ? AND contrasena = SHA1(?)", $user, $password)
		));
		// show_debug($usuario);
		if ($usuario != null) {

			/* Login exitoso */

			$pre = "";
			if ($usuario->id_rol == 1) {
				$pre = "ad/";
			}
			if ($usuario->id_rol == 2) {
				$pre = "sa/";
			}
			if ($usuario->id_rol == 3) {
				$pre = "dc/";
			}

			session_start();
			$_SESSION['id_usuario'] = $usuario->id_usuario;

			if (isset($_GET['return'])) {
				$return = $_GET['return'];
				header("Location: ".$pre.$return.".php");
			} else {
				header("Location: ".$pre."index.php");
			}
		} else {
			/* Login fallido */
			$falloLogin = true;
		}
	} else {
		session_start();
		/*! 
		Sino está presente el valor $_POST['login'] 
		se envía al usuario a 'ad/index.php'. 'ad/index.php' se encarga de dirigir al usuario a la página
		del rol que le corresponde.
		*/
		if (isset($_SESSION['id_usuario'])) header("Location: ad/");
	}

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Iniciar sesión - SICADA</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/foundation.min.css">
		<link rel="stylesheet" href="assets/css/gran-contenedor.css">
		<link rel="stylesheet" href="assets/css/general.css">
		<link rel="favourite icon" href="assets/img/nuevo-logo-chico.png">
		<link rel="stylesheet" href="assets/css/login.css">
	</head>
	<body>
		<div class="gran-contenedor">
			<div class="header row">
				<div class="small-12 medium-6 large-4 columns text-left sicada-logo">
					<img src="assets/img/sicada-logo.png" alt="SICADA">
				</div>
				<div class="small-12 medium-6 large-4 columns text-center show-for-medium-up sicada-titulo">
					<!-- <h4>Universidad Tecnológica de Manzanillo</h4> -->
				</div>
				<div class="small-12 medium-6 large-4 columns show-for-large-up text-right sicada-utem">
					<img src="assets/img/utem-logo.png" alt="UTeM">
				</div>
			</div>

			<div class="row titulo">
				<!-- <h2>Bienvenido a SICADA</h2> -->
			</div>
			<div class="seccion inmovil">
				<span class="titulo">Iniciar sesión</span>
				<div class="cuerpo">
					<?php if (isset($falloLogin) and $falloLogin) { ?>
					<p class="mensaje-error">Usuario o contraseña incorrectos</p>
					<?php } ?>
					<form method="post">
						<table>
							<tr>
								<th>Usuario</th>
								<td><input type="text" name="user" placeholder="nombre de usuario"></td>
							</tr>
							<tr>
								<th>Contraseña</th>
								<td><input type="password" name="password" placeholder="*******"></td>
							</tr>
							<tr>
								<th class="hide-for-small">&nbsp;</th>
								<td class="acciones"><input type="submit" class="button" name="login" value="Entrar"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>

		<div class="footer row">
			<div class="small-12 columns text-center">
				<span>SICADA</span><br>
				<span>Desarrollado por Team 1</span>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-1.11.0.min.js"></script>
	<script src="assets/js/foundation.min.js"></script>
	<script src="assets/js/ajustarMain.js"></script>
	<script>
		$(document).foundation();
	</script>
</body>
</html>
<?php
}

perform();
?>