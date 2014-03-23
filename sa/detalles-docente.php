<?php 
include '../includes/functions.php'; 
estaLogueado(2);

if (!isset($_GET['id'])) {
	header("Location: docentes.php");
}

$id = $_GET['id'];
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
			<span class="titulo">Detalles docentes</span>
			<div class="cuerpo">
				<div>
					<th> <a href="docentes.php?ed=id" class="button">Editar</a></th>
				</div>
				<br>
				<div>
					<table class="filtro-tabla">
						<tr>
							<th style="text-align: left;">Nombre</th>
							<td>Luis V&eacute;lez</td>
						</tr>
						<tr>
							<th style="text-align: left;">Nivel Profesional</th>
							<td></td>
						</tr>
						<tr>
							<th style="text-align: left;">Profesi&oacute;n</th>
							<td></td>
						</tr>
						<tr>
							<th style="text-align: left;">Categor&iacute;a</th>
							<td></td>
						</tr>
						<tr>
							<th style="text-align: left;">¿Imparte Tutorias?</th>
							<td></td>
						</tr>
						<tr>
							<th style="text-align: left;">¿Es miembro de alguna instituci&oacute;n de investigadores?</th>
							<td></td>
						</tr>

						<tr>
							<th style="text-align: left;">Fecha de ingreso al sistema</th>
							<td></td>
						</tr>

						<tr>
							<th style="text-align: left;">Carrera Afin</th>
							<td></td>
						</tr>

						<tr>
							<th style="text-align: left;">Horas Laborales</th>
							<td></td>
						</tr>

						<tr>
							<th style="text-align: left;">Estado de contrataci&oacute;n</th>
							<td></td>
						</tr>

						<tr>
							<th style="text-align: left;">Oficio de contrataci&oacute;n</th>
							<th> <button type="button" class="button" style="background:#00A54F">Imprimir</button></th>
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