<?php 
include '../includes/functions.php'; 
estaLogueado(2);

if (isset($_GET['eliminar'])) {
	$materia = Materia::find($_GET['eliminar']);
	if ($materia != null)
		foreach ($materia->imparticions as $imparticion) {
			$imparticion->delete(); /* Se borran las imparticiones de esta materia */
		}
		$materia->delete();
	header("Location: materias.php");
}

if (isset($_POST['guardar'])) {
	$materia = null;
	
	if (isset($_GET['materia'])) {
		$materia = Materia::find($_GET['materia']);
	} else {
		$materia = new Materia();
	}

	$materia->nombre = $_POST['nombre'];
	$materia->cuatrimestre = $_POST['cuatrimestre'];
	$materia->id_carrera = $_POST['carrera'];
	
	$materia->save();
	header("Location: materias.php");
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
			if (isset($_GET['materia'])) {
				$materia = Materia::find($_GET['materia']);
				$E = true;
			}
			?>

			<div class="row contenido-titulo">
				<div class="small-12 columns">
					<h4>Mapa curricular</h4>
				</div>
			</div>
			<div class="row sicada-cuadrocontenido">
				<div class="seccion">
					<span class="titulo">Nueva materia</span>
					<div class="cuerpo">
						<form method="post" id="nuevo">
							<input name="nombre" type="text" placeholder="Nombre" <?php if ($E) echo "value='".$materia->nombre."'"; ?>>
							<input name="cuatrimestre" type="number" min="1" placeholder="Cuatrimestre" <?php if ($E) echo "value='".$materia->cuatrimestre."'"; ?>>
							<select name="carrera">
								<option value="">Carrera</option>
								<?php
								$carreras = Carrera::all();

								foreach ($carreras as $carrera) {
									echo "<option value='".$carrera->id_carrera."' ";
									if ($E and $materia->id_carrera == $carrera->id_carrera) echo "selected='selected'";
									echo ">".$carrera->nombre."</option>";
								}
								?>
							</select><br>
							<div class="acciones">
								<input type="submit" name="guardar" class="button" value="Guardar">
							</div>
						</form> 
					</div>
				</div>

				<div class="seccion">
					<span class="titulo">Materias guardadas</span>
					<div class="cuerpo">
						<div>
							<input class="filtro-input" type="search" placeholder="Filtro">
						</div>
						<div class="instrucciones">
							Haga clic en el nombre de un director para ver detalles
						</div>
						<div>
							<table class="filtro-tabla">
								<tr class="encabezados">
									<th>Nombre</th>
									<th>Cuatrimestre</th>
									<th>Carrera</th>
									<th class="text-right">Acciones</th>
								</tr>
								<?php
								$materias = Materia::all();
								if (sizeof($materias) > 0) {
									foreach ($materias as $materia) {
										echo "<tr>";
											echo "<td>".$materia->nombre."</td>";
											echo "<td>".$materia->cuatrimestre."</td>";
											echo "<td>".$materia->carrera->nombre."</td>";
											echo "<td class='acciones'>";
												echo "<a href='materias.php?materia=".$materia->id_materia."'><img src='../assets/img/edit.png' alt='Editar' title='Editar'></a> ";
												echo "<a class='eliminar' href='materias.php?eliminar=".$materia->id_materia."'><img src='../assets/img/discard.png' alt='Eliminar' title='Eliminar'></a> ";
											echo "</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr>";
									echo "<td>No se han encontrado materias guardadas.</td>";
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