<?php 
include '../includes/functions.php'; 
estaLogueado(2);

if (isset($_GET['eliminar'])) {
	$docente = Docente::find($_GET['eliminar']);
	if ($docente != null) {
		foreach ($docente->imparticions as $imparticion) {
			$imparticion->delete();
		}
		$docente->delete();
		header("Location: docentes.php");
	}
}

if (isset($_POST['guardar'])) {
	//print_r($_POST);
	if (isset($_GET['docente'])) {
		$docente = Docente::find($_GET['docente']);
	} else {
		$docente = new Docente();
		$docente->fecha_alta = date("Y-m-d");
	}
	$docente->nombre = $_POST['nombre'];
	$docente->id_nivel_profesional = $_POST['nivelprofecional'];
	$docente->carrera_profesional = $_POST['profesion'];
	$docente->id_clasificacion = $_POST['clasificacion'];
	$docente->tutor = $_POST['tutor']; || 0
	$docente->investigador = $_POST['investigador'] || 0;
	$docente->institucion = $_POST['instituciondeinvestigacion'] || 0;
	$docente->id_carrera = $_POST['carreraafin'];
	$docente->estado_contratacion = $_POST['estadodecontratacion'];
	$docente->save();
	if (!isset($_GET['docente'])) header("Location: docentes.php");
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
			if (isset($_GET['docente'])) {
				$docente = Docente::find($_GET['docente']);
				$E = ($docente != null);
			}
			?>

			<div class="row contenido-titulo">
				<div class="small-12 columns">
					<h4>Docentes</h4>
				</div>
			</div>
			<div class="row sicada-cuadrocontenido">
				<div class="seccion">
					<span class="titulo">
						<?php 
						if ($E) echo "Editar docente";
						else echo "Nuevo Docente";
						?>
					</span>
					<div class="cuerpo">
						<form method="post">
							<style>
							form table th{
								margin-right: 3em;
							}
							</style>
							<table>
								<tr>
									<th>Nombre</th>
									<td><input name="nombre" type="text" placeholder="Nombre" <?php if ($E) echo "value='".$docente->nombre."'" ?> ></td>
								</tr>
								<tr>
									<th>Nivel Profesional</th>
									<td>
										<select name="nivelprofecional">
											<option value="">Nivel Profesional</option>
											<?php
											$niveles = NivelProfesional::all();
											foreach ($niveles as $nivel) {
												echo "<option value='".$nivel->id_nivel_profesional."' ";
												if ($E and $docente->id_nivel_profesional == $nivel->id_nivel_profesional) echo "selected='selected'";
												echo ">".$nivel->nombre."</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<th>Carrera profesional</th>
									<td><input name="profesion" type="text" placeholder="Profesión" <?php if ($E) echo "value='".$docente->carrera_profesional."'" ?> ></td>
								</tr>
								<tr>
									<th>Clasificación de docente</th>
									<td>
										<select name="clasificacion">
											<option value="0">Clasificación</option>
											<?php
											$niveles = Clasificacion::all();
											foreach ($niveles as $nombre) {
												echo "<option value='".$nombre->id_clasificacion."' ";
												if ($E and $docente->id_clasificacion == $nombre->id_clasificacion) echo "selected='selected'";
												echo ">".$nombre->nombre."</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<th>Tutoría</th>
									<td><input name="tutor" value="1" type="checkbox" <?php if ($E and $docente->tutor > 0) echo "checked='checked'"; ?> > Imparte tutorías</td>
								</tr>
								<tr>
									<th>Investigador</th>
									<td>
										<input id="investigador" name="investigador" value="1" type="checkbox" <?php if ($E and $docente->investigador > 0) echo "checked='checked'"; ?> >Es investigador
										<br>
										Institución de investigación<br>
										<input id="institucion" name="instituciondeinvestigacion" type="text" placeholder="Institución de Investigación" <?php if ($E) echo "value='".$docente->institucion."'"; ?> >
									</td>
								</tr>
								<tr>
									<th>Carrera afín</th>
									<td>
										<select name="carreraafin">
											<option value="0">Carrera Afín</option>
											<?php
											$niveles = Carrera::all();
											foreach ($niveles as $nombre) {
												echo "<option value='".$nombre->id_carrera."' ";
												if ($E and $docente->id_carrera == $nombre->id_carrera) echo "selected='selected'";
												echo ">".$nombre->nombre."</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<th>Estado de contratación</th>
									<td>
										<select name="estadodecontratacion">
											<option value="0">Estado de Contratación</option>
											<option value="CONTRATADO" <?php if ($E and strcmp($docente->estado_contratacion, "CONTRATADO") == 0) echo "selected='selected'"; ?> >Contratado</option>
											<option value="RECONTRATADO" <?php if ($E and strcmp($docente->estado_contratacion, "RECONTRATADO") == 0) echo "selected='selected'"; ?> >Recontratado</option>
										</select>
									</td>
								</tr>
								<tr>
									<th class="hide-for-small">&nbsp;</th>
									<td colspan="2">
										<div class="acciones">
											<input name="guardar" type="submit" class="button" value="Guardar">
										</div>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
				<a name='lista'></a>
				<div class="seccion">
					<span class="titulo">Docentes Guardados</span>
					<div class="cuerpo">
						<div>
							Filtro: 
							<input class="filtro-input" type="search" placeholder="Filtro">
						</div>
						<div class="instrucciones">
							Haga clic en el nombre de un docente para ver detalles
						</div>
						<div>
							<table class="filtro-tabla">
								<tr class="encabezados"> 
									<th>Nombre</th>
									<th>Nivel Profesional</th>
									<!-- <th>Clasificación</th> -->
									<th>Contratación</th>
									<th class="text-right">Acciones</th>
								</tr>
								<?php
									$table = Docente::all();
									foreach ($table as $key) {
										echo "<tr>";
											echo "<td>";
												echo "<a href='detalles-docente.php?docente=".$key->id_docente."'>".$key->nombre."</a>";
											echo "</td>";
											echo "<td>";
												echo $key->nivel_profesional->nombre;
											echo "</td>";
											// echo "<td>";
												// echo $key->clasificacion->nombre;
											// echo "</td>";
											echo "<td>";
												echo $key->estado_contratacion;
											echo "</td>";
											echo "<td class='acciones'>";
												echo "<a href='docentes.php?docente=".$key->id_docente."'><img src='../assets/img/edit.png' alt='Editar'></a> ";
												echo "<a class='eliminar' href='docentes.php?eliminar=".$key->id_docente."#lista'><img src='../assets/img/discard.png' alt='Eliminar'></a> ";
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
		<script>
		$("#investigador").change(function(e) {
			if ($(this).is(":checked")) {
				$("#institucion").removeAttr("disabled");
			} else {
				$("#institucion").attr("disabled", "disabled");
			}
		});

		$(function(e){
			$("#investigador").change();
		});
		</script>
</body>
</html>