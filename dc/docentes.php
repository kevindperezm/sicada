<?php 
include '../includes/functions.php'; 
estaLogueado(3);


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
			<div>
				<?php
					//echo "LOL";
					$id = $usuario->id_usuario;
					$director = Director::find(array(
						"conditions" => array("id_usuario = ?", $id)
					));
					echo "<h3>Docentes laborando en ".$director->carrera->nombre."</h3>";
				?>
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
									<th class="text-right">Horas de la carrera</th>
								</tr>
								<?php
								 $imparticiones = Imparticion::find('all', array(
								 	"conditions" => array("id_carrera = ?", $director->carrera->id_carrera)
								 ));
								 // show_debug($imparticiones);
								 foreach ($imparticiones as $imparticion) {
								 	$docente = $imparticion->docente;
								 	// show_debug($docente);
								 	echo "<tr>";
								 		echo "<td>";
								 			echo $docente->nombre;
								 		echo "</td>";
								 		echo "<td>";
								 			echo $docente->nivel_profesional->nombre;
								 		echo "</td>";
								 		echo "<td>";
								 			echo $docente->clasificacion->nombre;
								 		echo "</td>";
								 		// Cálculo de horas trabajando
								 		$ptc = ($docente->id_clasificacion > 3 and $docente->id_clasificacion < 10);
								 		$min_ocu = $docente->minutos_ocupados;
								 		$hrs = intval($min_ocu / 60);
								 		$min = intval($min_ocu % 60);
								 		//TODO: Calcular horas de PTC
								 		echo "<td class='text-right'>".$hrs." horas</td>";
								 	echo "</tr>";
								 }
								?>
							</table>
						</div>
					</div>
				</div>
			

			<!-- FIN DE CONTENIDO -->
		<?php include "../includes/footer.php"; ?>
</body>
</html>