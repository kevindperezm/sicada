<?php 
include '../includes/functions.php'; 
estaLogueado(2);

if (isset($_GET['eliminar'])) {
	try {
		$carrera = Carrera::find($_GET['eliminar']);
		if ($carrera != null) {
			// TODO: Borrado de carrera en cascada
			$carrera->delete();
			add_message(0, "Carrera '$carrera->nombre' borrada");
		}
	} catch (Exception $e) {
		add_message(1, "La carrera indicada para eliminar no existe");
		header("Location: carreras.php");
	}
}

if (isset($_POST['guardar'])) {
	if (isset($_GET['carrera'])) {
		$carrera = Carrera::find($_GET['carrera']);
	} else {
		$carrera = new Carrera();
	}
	$carrera->nombre = trim($_POST['nombre']);
	$carrera->clave = trim($_POST['clave']);
	// Comprobando clave
	$claveRepetida = Carrera::find(array("conditions" => array("clave = ?", $carrera->clave)));
	if ($claveRepetida != null) {
		add_message(1, "No se permite repetir clave de carrera");
		// TODO: Mensaje de error de clave de carrera repetida.
	} else {
		$carrera->save();
		add_message(0, "Carrera '$carrera->nombre' guardada");
		// if (!isset($_GET['carrera'])) header("Location: carreras.php");
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
			<?php
			$E = false;
			if (isset($_GET['carrera'])) {
				$carrera = Carrera::find($_GET['carrera']);
				$E = ($carrera != null);
			}
			// show_debug($carrera);
			?>

			<div class="row contenido-titulo">
				<div class="small-12 columns">
					<h4>Carreras</h4>
				</div>
			</div>
			<div class="row sicada-cuadrocontenido">
				<div class="seccion">
					<span class="titulo">
						<?php
						if ($E) echo "Editar carrera";
						else echo "Nueva carerra";
						?>
					</span>
					<div class="cuerpo">
						<form method="post">
							<table>
								<tr>
									<th>Clave</th>
									<td><input name="clave" type="text" <?php if ($E) echo "value='$carrera->clave'"; ?> ></td>
								</tr>
								<tr>
									<th>Nombre</th>
									<td><input name="nombre" type="text" <?php if ($E) echo "value='$carrera->nombre'"; ?> ></td>
								</tr>
								<tr>
									<th class="hide-for-small">&nbsp;</th>
									<td>
										<div class="acciones">
											<input name="guardar" type="submit" class="button" value="Guardar">
										</div>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
				<div class="seccion">
					<span class="titulo">Carreras Guardadas</span>
					<div class="cuerpo">
						<div>
							<table class="filtro-tabla">
								<tr class="encabezados"> 
									<th>Clave</th>
									<th>Nombre</th>
									<th class="text-right">Acciones</th>
								</tr>
								<?php
								foreach (Carrera::all() as $carrera) {
									echo "<tr>";
										echo "<td>";
											echo $carrera->clave;
										echo "</td>";
										echo "<td>";
											echo $carrera->nombre;
										echo "</td>";
										echo "<td class='acciones'>";
											echo "<a href='carreras.php?carrera=".$carrera->id_carrera."'><img src='../assets/img/edit.png' alt='Editar' title='Editar'></a> ";
											echo "<a class='eliminar' href='carreras.php?eliminar=".$carrera->id_carrera."'><img src='../assets/img/discard.png' alt='Eliminar' title='Eliminar'></a> ";
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