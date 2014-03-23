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
			<h4>Carga horaria</h4>
		</div>
	</div>
	<div class="row sicada-cuadrocontenido">
		<div class="seccion">
			<span class="titulo">Carga Horaria</span>
			<div class="cuerpo">
				<div>
					<input class="filtro-input" type="text" placeholder="Filtro">
				</div>
				<div class="instrucciones">

				</div>
				<div>
					<table class="filtro-tabla">
						<tr class="encabezados"> 
							<th>No.</th>
							<th>Nombre del docente</th>
							<th>Materia</th>
							<th>Carrera</th>
							<th>Grupo</th>
							<th>Carrera</th>
							<th>Nivel profesional</th>
							<th>Categor&iacute;a</th>
							<th>Horas totales</th>
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