<?php 
include '../includes/functions.php'; 
estaLogueado(2);
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
						<form method="post">
							Nombre
							<input name="nombre" type="text" placeholder="Nombre">
							Teléfono
							<input name="telefono" type="text" placeholder="Teléfono de contacto">
							<select name="carrera">
								<option value="0">Carrera</option>
							</select><br>
							Usuario
							<input name="usuario" type="text" placeholder="Usuario">
							Contraseña
							<input name="contrasena" type="text" placeholder="Contraseña">
							<div class="acciones">
								<input type="submit" class="button" value="Guardar">
							</div>
						</form>
					</div>
				</div>
				<div class="seccion">
					<span class="titulo">Directores registrados</span>
					<div class="cuerpo">
						<div>
							Filtro
							<input class="filtro-input" type="text" placeholder="Filtro">
						</div>
						<div class="instrucciones">
							Haga clic en el nombre de un director para ver detalles
						</div>
						<div>
							<table class="filtro-tabla">
								<tr class="encabezados"> 
									<th>Nombre</th>
									<th>Carrera</th>
									<th>Teléfono</th>
									<th>Usuario</th>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- FIN DE CONTENIDO -->
		<?php include "../includes/footer.php"; ?>
</body>
</html>