
 <!DOCTYPE html>
<html>
<head>
	<title>SICADA</title>
	 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../assets/css/foundation.min.css">
 <link rel="stylesheet" href="../assets/css/gran-contenedor.css">
 <link rel="stylesheet" href="../assets/css/general.css">
 <link rel="favourite icon" href="../assets/img/nuevo-logo-chico.png">
 <!--[if lt IE 8]>
<link rel="stylesheet" href="css/general-ie.css">
<![endif]--></head>
<body>
	<div class="gran-contenedor">
	<div class="header row">
		<div class="small-12 medium-6 large-4 columns text-left sicada-logo">
			<img src="../assets/img/sicada-logo.png" alt="SICADA">
		</div>
		<div class="small-12 medium-6 large-4 columns text-center show-for-medium-up sicada-titulo">
			<h4>Universidad Tecnológica de Manzanillo</h4>
		</div>
		<div class="small-12 medium-6 large-4 columns show-for-large-up text-right sicada-utem">
			<img src="../assets/img/utem-logo.png" alt="UTeM">
		</div>
	</div>	<div class="row show-for-small-only">
	<div class="top-bar navegacion" data-topbar data-options="back_text: Atrás">
		<ul class="title-area">
			<li class="name">
				<a href="#"><span></span></a>
			</li>
			<li class="toggle-topbar menu-icon">
				<a href="#"><span>Menú</span></a>
			</li>
		</ul>
		<section class="top-bar-section">
			<ul class="left">
					<a href="index.php"><li<br />
					<li class="active"><a href="">Botón</a></li>
						<li><a href="">Botón</a></li>
						<li><a href="">Botón</a></li>
						<li><a href="">Botón</a></li>
						<li><a href="">Botón</a></li>
			</ul>
		</section>
	</div>
</div>
<div class="row sicada-topper">
	<div class="small-8 medium-8 columns sicada-bienvenida">
		<br />

Bienvenido, <b>secretaria academica</b>	</div>
	<div class="small-4 medium-4 columns sicada-salir text-right">
		<a href="../logout.php">Salir</a>
	</div>
</div>
<div class="main row">
	<div class="small-12 medium-2 columns show-for-medium-up sicada-menu">
		<ul>
				<a href="index.php"><li<br />
				<li class="activo"><span>Inicio</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					
					<!--<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>
					<li><span>Botón</span></li>-->
		</ul>
	</div>
	<div class="small-12 medium-10 columns sicada-contenido">

					<!-- Contenido -->
			<div class="row contenido-titulo">
				<div class="small-12 columns">
					<h4>Carga horaria</h4>
				</div>
				<div class="ola">
				<input class="filtro-input" type="text" placeholder="filtro">
				<input type="submit" class="button" value="Imprimir">
				</div>
			</div>
			<div class="row sicada-cuadrocontenido">
				<div class="seccion">
					<span class="titulo">Carga horaria</span>
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
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									
									</tr>
									<?php
									echo"<tr>";
									echo"<td>";
									echo"No.";
									echo"</td>";
									echo"</tr>"
								
									
									?>
				
								</table>
							</div>
					</div>
				</div>
			<!-- FIN DE CONTENIDO -->
		</div>
</div>
<div class="footer row">
	<div class="small-12 columns text-center">
		<span>SICADA</span><br>
		<span>Desarrollado por Team 1</span>
	</div>
</div>
</div>

<script src="../assets/js/jquery-1.11.0.min.js"></script>
<script src="../assets/js/foundation.min.js"></script>
<script src="../assets/js/ajustarMain.js"></script>
<script>
	$(document).foundation();
</script></body>
</html>