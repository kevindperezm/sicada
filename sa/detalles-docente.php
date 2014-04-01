<?php 
include '../includes/functions.php'; 
estaLogueado(2);

if (!isset($_GET['docente'])) {
	header("Location: docentes.php");
}

$id = $_GET['docente'];
$docente = Docente::find($id);
if ($docente == null) {
	header("Location: docentes.php");
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
			<h3>Detalles Docentes</h3>
		</div>
	</div>
	<div class="row sicada-cuadrocontenido">
		<a href="docentes.php" style="margin-left:1em;margin-bottom:1em;display:block;">Atrás</a>
		<div class="seccion">
			<span class="titulo">Detalles de docente</span>
			<div class="cuerpo">
				<!-- <div> -->
					<!-- <th> <a href="docentes.php?ed=id" class="button">Editar</a></th> -->
				<!-- </div> -->
				<br>
				<div>
					<table class="filtro-tabla">
						<tr>
							<th style="text-align: left;">Nombre</th>
							<td><?php echo $docente->nombre; ?></td>
						</tr>
						<tr>
							<th style="text-align: left;">Nivel Profesional</th>
							<td><?php echo $docente->nivel_profesional->nombre; ?></td>
						</tr>
						<tr>
							<th style="text-align: left;">Profesi&oacute;n</th>
							<td><?php echo $docente->carrera_profesional; ?></td>
						</tr>
						<tr>
							<th style="text-align: left;">Clasificación</th>
							<td><?php echo $docente->clasificacion->nombre; ?></td>
						</tr>
						<tr>
							<th style="text-align: left;">¿Imparte Tutorias?</th>
							<td><?php if ($docente->tutor > 0) echo "Si"; else echo "No"; ?></td>
						</tr>
						<tr>
							<th style="text-align: left;">¿Es miembro de alguna instituci&oacute;n de investigadores?</th>
							<td><?php if ($docente->investigador > 0) echo "Si"; else echo "No"; ?></td>
						</tr>
						<?php
						if ($docente->investigador > 0) {
							echo "<tr>";
								echo "<th style='text-align: left;'>";
									echo "institución de investigación";
								echo "</th>";
								echo "<td>";
									echo $docente->institucion;
								echo "</td>";
							echo "</tr>";
						}
						?>
						<tr>
							<th style="text-align: left;">Fecha de ingreso al sistema</th>
							<td><?php echo $docente->fecha_alta->format("d - M - Y"); ?></td>
						</tr>
						<tr>
							<th style="text-align: left;">Carrera Afin</th>
							<td><?php echo $docente->carrera->nombre; ?></td>
						</tr>

						<tr>
							<th style="text-align: left;">Horas Laborales</th>
							<td>
								<?php
								$horas = sizeof($docente->imparticions);
								// TODO: Cálculo mejorado de horas
								if ($horas == 0) echo "Este docente no tiene horas asignadas.";
								else echo "<a title='Haga clic para ver el detalle' href='carga-horaria.php?docente=".$docente->id_docente."'>".$horas." horas asignadas.</a>";
								?>
							</td>
						</tr>

						<tr>
							<th style="text-align: left;">Estado de contrataci&oacute;n</th>
							<td><?php echo $docente->estado_contratacion; ?></td>
						</tr>

						<tr>
							<th style="text-align: left;">Oficio de contrataci&oacute;n</th>
							<td><a href='recontratacion.php?docente=<?php echo $docente->id_docente; ?>' class="button">Imprimir</a></td>
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