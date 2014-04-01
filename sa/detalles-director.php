<?php 
include '../includes/functions.php'; 
estaLogueado(2);

if (!isset($_GET['director'])) {
	header("Location: directores.php");
}

$id = $_GET['director'];
$director = Director::find($id);
if ($director == null) {
	header("Location: directores.php");
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
			<h4>Detalles Director</h4>
		</div>
	</div>
	<div class="row sicada-cuadrocontenido">
		<a href="directores.php" style="margin-left:1em;margin-bottom:1em;display:block;">Atrás</a>
		<div class="seccion">
			<span class="titulo">Detalles director</span>
			<div class="cuerpo">
				<!-- <div>
					<th> <a href="directores.php?ed=<?php echo $_GET['id'] ?>" class="button">Editar</a></th>
				</div> -->
				<div class="instrucciones">
				</div>
				<div>
					<table class="filtro-tabla">
						<tr class="encabezados"> 
						</tr>
						<tr>
							<th style="text-align: left;">Nombre</th>
							<td><?php echo $director->nombre ?></td>

						</tr>
						<tr>
							<th style="text-align: left;">Teléfono</th>
							<td><?php echo $director->telefono ?></td>
						</tr>
						<tr>
							<th style="text-align: left;">Fecha de ingreso al sistema</th>
							<td>
								<?php
								if ($director->fecha_alta != null) { 
									echo strftime("%d de %B de %Y", strtotime($director->fecha_alta->format("Y-m-d")));
								}
								?>
							</td>
						</tr>
						<tr>
							<th style="text-align: left;">Carrera</th>
							<td><?php echo $director->carrera->nombre ?></td>
						</tr>
						<tr>
							<th style="text-align: left;">Usuario</th>
							<td><?php echo $director->usuario->nombre ?></td>
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