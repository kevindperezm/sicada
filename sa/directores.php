<?php 
include '../includes/functions.php'; 
estaLogueado(2);

$repetido = false;

// Guardando director en la BD
if (isset($_POST['guardar'])) {
	$director = new Director();
	$director->nombre = trim($_POST['nombre']);
	$director->telefono = trim($_POST['telefono']);
	$director->clave_carrera = trim($_POST['carrera']);

	$usuarionuevo = new Usuario();
	$usuarionuevo->nombre = trim($_POST['usuario']);
	/* Comprobando usuario del director */
	/* No se permiten dos usuarios cuyo nombre sea el mismo */
	$usuariorepetido = Usuario::find(array(
		"conditions" => array("nombre = ?", $usuarionuevo->nombre)
	));
	if ($usuariorepetido != null) {
		$repetido = true;
	}
	$usuarionuevo->contrasena = sha1(trim($_POST['contrasena']));
	$usuarionuevo->id_rol = 3;

	if (!$repetido) {
		$usuarionuevo->save();
		$director->id_usuario = $usuarionuevo->id_usuario;
		$director->save();
		header("Location: directores.php");
	}
}

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
			<!-- Contenido -->
			<div class="row contenido-titulo">
				<div class="small-12 columns">
					<h4>Directores de carrera</h4>
				</div>
			</div>
			<div class="row sicada-cuadrocontenido">
				<div class="seccion">
					<span class="titulo">Nuevo director</span>
					<div class="cuerpo">
						<?php
						if (isset($_POST['guardar']) && $repetido) {
							echo "<div class='mensaje-error'>No se permiten dos directores de carrera con el mismo nombre de usuario.</div>";
						}
						?>
						<form method="post">
							<input name="nombre" type="text" placeholder="Nombre" <?php if($repetido) echo "value='".$_POST['nombre']."'"; ?> >
							<input name="telefono" type="text" placeholder="Teléfono de contacto" <?php if($repetido) echo "value='".$_POST['telefono']."'"; ?> >
							<select name="carrera">
								<option value="0">Carrera</option>
								<?php
								$carreras = Carrera::all();
								foreach ($carreras as $carrera) {
									echo "<option value='".$carrera->id_carrera."'";
									if ($repetido && $_POST['carrera'] == $carrera->id_carrera) echo " selected=selected ";
									echo ">".$carrera->clave."</option>";
								}
								?>
							</select><br>
							<input name="usuario" type="text" placeholder="Usuario" <?php if($repetido) echo "value='".$_POST['usuario']."'"; ?> >
							<input name="contrasena" type="password" placeholder="Contraseña">
							<div class="acciones">
								<input name="guardar" type="submit" class="button" value="Guardar">
							</div>
						</form>
					</div>
				</div>
				<div class="seccion">
					<span class="titulo">Directores registrados</span>
					<div class="cuerpo">
						<div>
							<input class="filtro-input" type="text" placeholder="Filtro">
						</div>
						<div class="instrucciones">
							Haga clic en el nombre de un director para ver detalles
						</div>
						<div>
							<table class ="filtro-tabla">
								<tr class="encabezados"> 
									<th>Nombre</th>
									<th>Carrera</th>
									<th>Teléfono</th>
									<th>Usuario</th>
								</tr>
								<?php
									$directores = Director::all(); // Obtiene todos los directores de la BD
									foreach ($directores as $director) {
										echo "<tr>";
											echo "<td>";
												$id = $director->id_director_carrera;
												echo "<a href='detalles-director.php?id=$id'>".$director->nombre."</a>";
											echo "</td>";
											echo "<td>";
												// var_dump($director->carrera);
												echo $director->carrera->clave;
											echo "</td>";
											echo "<td>";
												echo $director->telefono;
											echo "</td>";
											echo "<td>";
												echo $director->usuario->nombre;
											echo "</td>";
										echo "</tr>";
									}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- FIN DE CONTENIDO -->
		<?php include "../includes/footer.php"; ?>
</body>
</html>