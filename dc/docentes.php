<?php 
include '../includes/functions.php'; 
estaLogueado(3);

/*!
@file dc/docentes.php 
@brief Página de visualización de Docentes de la interfaz de Director de Carrera

Este archivo muestra una página para visualizar a los docentes que trabajan en una carrera de la que el usuario actual es director. Dicha página no se mostrará al usuario si el usuario no ha iniciado sesión o si su rol no es "Director de Carrera".

@author Kevin Pérez
@date Abril 2014
*/

/*!
@brief Ejecuta el código que corresponde a este archivo.
@return Esta función no retorna ningún valor.
*/
function renderDocentes() {
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
						<?php
						echo "<h3>Docentes laborando en su carrera</h3>";
						?>
					</div>
				</div>
					<div class="seccion">
						<span class="titulo">Docentes Guardados</span>
						<div class="cuerpo">
							
							<div class="instrucciones">
								Haga clic en el nombre de un docente para ver detalles
							</div>
							<div>
								<table class="-tabla">
									<tr class="encabezados"> 
										<th>Nombre</th>
										<th>Nivel Profesional</th>
										<th>Clasificación</th>
										<th class="text-right">Horas de la carrera</th>
									</tr>
									<?php
									$director = $GLOBALS['usuario']->director;
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
<?php
}
renderDocentes();
?>