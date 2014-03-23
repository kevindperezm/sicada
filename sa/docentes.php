<?php 
include '../includes/functions.php'; 
estaLogueado(2);

if (isset($_POST['guardar'])) {
	//print_r($_POST);
	$docente = new Docente();
	$docente->nombre = $_POST['nombre'];
	$docente->id_nivel_profesional = $_POST['nivelprofecional'];
	$docente->carrera_profesional = $_POST['profesion'];
	$docente->id_clasificacion = $_POST['clasificacion'];
	if (isset($_POST['tutor'])) {
		$docente->tutor = $_POST['tutor'];
	}
	else{
		$docente->tutor = 0;
	}
	if (isset($_POST['investigador'])) {
		$docente->investigador = $_POST['investigador'];
	}
	else{
		$docente->investigador = 0;
	}
	$docente->institucion = $_POST['instituciondeinvestigacion'];
	$docente->id_carrera = $_POST['carreraafin'];
	$docente->estado_contratacion = $_POST['estadodecontratacion'];
	$docente->save();
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
					<h4>Docentes</h4>
				</div>
			</div>
			<div class="row sicada-cuadrocontenido">
				<div class="seccion">
					<span class="titulo">Nuevo Docente</span>
					<div class="cuerpo">
						<form method="post">
							<input name="nombre" type="text" placeholder="Nombre">
						<select name="nivelprofecional" >
							<option value="0">Nivel Profesional</option>
							<?php
								$niveles = NivelProfesional::all();
								foreach ($niveles as $nivel) {
									echo "<option value='".$nivel->id_nivel_profesional."'>".$nivel->nombre."</option>";
								}
							?>
						</select>
						<input name="profesion" type="text" placeholder="Profesión">
						<select name="clasificacion">
							<option value="0">Clasificación</option>
							<?php
								$niveles = Clasificacion::all();
								foreach ($niveles as $nombre) {
									echo "<option value='".$nombre->id_clasificacion."'>".$nombre->nombre."</option>";
								}
							?>
						</select><br>
							<input name="tutor" value="1" style="min-width: 0 !important; margin-left: 15px" type="checkbox">Tutor<br class="show-for-small-only">
							<input name="investigador" value="1" style="min-width: 0 !important; margin-left: 15px; margin-right: 15px" type="checkbox">Investigador
							<input  name="instituciondeinvestigacion" type="text" placeholder="Institucion de Investigacion">	
						<select name="carreraafin">
							<option value="0">Carrera Afín</option>
							<?php
								$niveles = Carrera::all();
								foreach ($niveles as $nombre) {
									echo "<option value='".$nombre->id_carrera."'>".$nombre->nombre."</option>";
								}
							?>
						</select>
						<select name="estadodecontratacion">
							<option value="0">Estado de Contratación</option>
							<option value="CONTRATADO">Contratado</option>
							<option value="RECONTRATADO">Recontratado</option>
						</select>
							<div class="acciones">
								<input name="guardar" type="submit" class="button" value="Guardar">
							</div>
						</form>
					</div>
				</div>
				<div class="seccion">
					<span class="titulo">Docentes Guardados</span>
					<div class="cuerpo">
						<div>
							<input class="filtro-input" type="text" placeholder="Filtro">
						</div>
						<div class="instrucciones">
							Haga clic en el nombre de un docente para ver detalles
						</div>
						<div>
							<table class="filtro-tabla">
								<tr class="encabezados"> 
									<th>Nombre</th>
									<th>Nivel Profesional</th>
									<th>Clasificación</th>
									<th>Contratación</th>
								</tr>
								<?php
									$table = Docente::all();
									foreach ($table as $key) {
										echo "<tr>";
											echo "<td>";
												echo "<a href='detalles-docente.php?id=".$key->id_docente."'>".$key->nombre."</a>";
											echo "</td>";
											echo "<td>";
												echo $key->id_nivel_profesional;
											echo "</td>";
											echo "<td>";
												echo $key->id_clasificacion;
											echo "</td>";
											echo "<td>";
												echo $key->estado_contratacion;
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