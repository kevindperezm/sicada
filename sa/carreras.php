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
					<h4>Carreras</h4>
				</div>
			</div>
			<div class="row sicada-cuadrocontenido">
				<div class="seccion">
					<span class="titulo">Nuevas Carreras</span>
					<div class="cuerpo">
						<form method="post">
								Nombre
								<input name="nombre" type="text" placeholder="Nombre">
								Profesión
								<input name="profesion" type="text" placeholder="Profesión">
							<div class="acciones">
								<input name="guardar" type="submit" class="button" value="Guardar">
							</div>
						</form>
					</div>
				</div>
				<div class="seccion">
					<span class="titulo">Carreras Guardadas</span>
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
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- FIN DE CONTENIDO -->
		<?php include "../includes/footer.php"; ?>
</body>
</html>