<?php
/*!
@file dc/grupos.php 
@brief Página de administración de Grupos de la interfaz de Director de Carrera

Este archivo muestra una página para administrar los grupos de una carrera.
Desde ella es posible crear, modificar y eliminar grupos de la carrera de la
que el usuario actual es director. Dicha página no se mostrará al usuario si el usuario no ha iniciado sesión o
si su rol no es "Director de Carrera".

@author Kevin Pérez
@date Abril 2014
*/

include '../includes/functions.php'; 
estaLogueado(3);

/*!
@brief Ejecuta el código que corresponde a este archivo.
@return Esta función no retorna ningún valor.
*/
function renderGrupos() {
	if (isset($_GET['eliminar'])) {
		$grupo = Grupo::find($_GET['eliminar']);
		if ($grupo != null)
			foreach ($grupo->rangos as $rango) {
				$rango->delete();
			}
			$grupo->delete();
		header("Location: grupos.php#lista");
	}

	if (isset($_POST['guardar'])) {
		$grupo = null;
		$rhorarios = null;
		
		if (isset($_GET['grupo'])) {
			$grupo = Grupo::find($_GET['grupo']);
			$rhorarios = Rango::find('all', array("conditions" => array("id_grupo = ?", $grupo->id_grupo)));
		} else {
			$grupo = new Grupo();
			$rhorarios = array();
			for ($i = 0; $i < 7; $i++) { /* Rellenando array de nuevos rangos */
				$rhorarios[$i] = new Rango();
				$rhorarios[$i]->dia = $i+1; /* Los días se cuentan desde 1 a 7 */
			}
			/* Creando clave de grupo */
			$director = $GLOBALS['usuario']->director;
			if ($director != null) {
				$grupos = Grupo::find('all', 
					array(
						"conditions" => array("id_carrera = ? and cuatrimestre = ?", $director->carrera->id_carrera, $_POST['cuatrimestre']),
						"order" => "clave desc"
					)
				);
				if ($grupos != null) {
					$split = explode("-", $grupos[0]->clave);
					$nuevoNumero = $split[2] + 1;
				} else {
					$nuevoNumero = 1;
				}
				// echo "<hr>";
				// echo "<pre>";
				// var_dump($grupos);
				// echo "</pre>";
				// echo "<hr>";
				$grupo->clave = $_POST['cuatrimestre']."-".$director->carrera->clave."-".$nuevoNumero;
				$grupo->cuatrimestre = $_POST['cuatrimestre'];
				$grupo->id_carrera = $director->carrera->id_carrera;
			}
		}
		
		$horas_entrada = $_POST['hora-inicio'];
		$horas_salida = $_POST['hora-salida'];
		$recesos_entrada = $_POST['receso-inicio'];
		$recesos_duracion = $_POST['receso-duracion'];
		$duraciones_clase = $_POST['duracion-clase'];
		$igual_anteriores = $_POST['igual-anterior']; /* Array del 0 al 6, porque Lunes no tiene esta opción */
		$no_asistencias = $_POST['no-asiste'];

		for ($i = 0; $i < 7; $i++) { /* Rellenando objetos Rango */
			$rhorario = $rhorarios[$i];
			if ($i > 0 and $igual_anteriores[$i] == 1) { /* Rango igual al anterior */
				$rhorario_ayer = $rhorarios[$i-1];
				$rhorario->hora_inicio = $rhorario_ayer->hora_inicio;
				$rhorario->hora_termino = $rhorario_ayer->hora_termino;
				$rhorario->receso_inicio = $rhorario_ayer->receso_inicio;
				$rhorario->receso_duracion = $rhorario_ayer->receso_duracion;
				$rhorario->duracion_bloque = $rhorario_ayer->duracion_bloque;
				$rhorario->no_se_asiste = $rhorario_ayer->no_se_asiste;
			} else { /* Rango con datos únicos */
				$rhorario->hora_inicio = $horas_entrada[$i];
				$rhorario->hora_termino = $horas_salida[$i];
				$rhorario->receso_inicio = $recesos_entrada[$i];
				$rhorario->receso_duracion = $recesos_duracion[$i];
				$rhorario->duracion_bloque = $duraciones_clase[$i];
				$rhorario->no_se_asiste = $no_asistencias[$i];
			}
		}

		// echo "<hr>";
		// echo "<pre>";
		// var_dump($_POST);
		// var_dump($grupo);
		// var_dump($rhorarios);
		// echo "</pre>";
		// echo "<hr>";
		$grupo->save();
		foreach ($rhorarios as $rhorario) {
			$rhorario->id_grupo = $grupo->id_grupo;
			$rhorario->save();
		}
		header("Location: grupos.php");
	}



?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Grupos - SICADA</title>
		<link rel="stylesheet" href="../assets/css/grupos.css">
		<?php include "../includes/htmlhead.php"; ?>
	</head>
	<body>
		<?php include "../includes/header.php"; ?>
		<?php include "../includes/menu.php"; ?>

		<!-- Contenido -->
		<?php
		$E = false;
		if (isset($_GET['grupo'])) {
			$grupo = Grupo::find($_GET['grupo']);
			$rangos = $grupo->rangos;
			$E = ($grupo != null and $rangos != null);
			// show_debug($grupo);
		}
		?>

		<div class="row contenido-titulo">
			<div class="small-12 columns">
				<h4>Grupos</h4>
			</div>
		</div>

		<div id="nuevo-grupo" class="seccion">
			<span class="titulo">Nuevo grupo</span>
			<div class="cuerpo">
				<form method="post">
					<table>
						<tr>
							<th>Cuatrimestre</th>
							<td colspan="2"><input style="width: 8em !important;" type="number" name="cuatrimestre" min="1" max="10" value="1"></td>
						</tr>
						<tr>
							<th colspan='3'>Horarios de clase</th>
						</tr>
						<?php
						$dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
						$i = 0;
						foreach ($dias as $dia) {
							if ($E) $rango = $rangos[$i];
							echo "<tr>";
								echo "<th>";echo $dia;echo "</th>";
								echo "<td class='checkboxes'>";
									if (array_search($dia, $dias) > 0) {
										echo "<input type='checkbox' name='igual-anterior[]' value='1'><span>Igual que el ".$dias[$i-1]."</span>";
										// if ($E && $rango->no_se_asiste) echo "checked='checked'";
									}
									echo "<br>";
									echo "<input type='checkbox' name='no-asiste[]' value='1' ";
									if ($E and $rango->no_se_asiste) echo "checked='checked'";
									echo "> No se asiste hoy";
								echo "</td>";
								echo "<td class='row'>";
									echo "<table>";
										echo "<tr>";
											echo "<th>Hora de entrada<br>(24 horas)</th>";
											echo "<td>";
												echo "<input type='time' name='hora-inicio[]' ";
												if ($E) echo "value='".$rango->hora_inicio."'>"; else echo "value='07:30'>";
											echo "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th>Hora de salida<br>(24 horas)</th>";
											echo "<td>";
												echo "<input type='time' name='hora-salida[]' ";
												if ($E) echo "value='".$rango->hora_termino."'>"; else echo "value='14:30'>";
											echo "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th>Duración de clase<br>(minutos)</th>";
											echo "<td>";
												echo "<input class='minutos' type='number' name='duracion-clase[]' "; 
												if ($E) echo "value='".$rango->duracion_bloque."'>"; else echo "value='50'>";
											echo "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th>Inicio de receso<br>(24 horas)</th>";
											echo "<td>";
												echo "<input type='time' name='receso-inicio[]' ";
												if ($E) echo "value='".$rango->receso_inicio."'>"; else echo "value='09:30'>";
											echo "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th>Duración de receso<br>(minutos)</th>";
											echo "<td>";
												echo "<input type='number' class='minutos' name='receso-duracion[]' ";
												if ($E) echo "value='".$rango->receso_duracion."'>"; else echo "value='30'>";
									echo "</div>";
											echo "</td>";
										echo "</tr>";
									echo "</table>";
								echo "</td>";
							echo "</tr>";
							$i++;
						}
						?> 
						<tr>
							<td class="hide-for-small">&nbsp;</td>
							<td colspan="3">
								<div class="acciones">
									<input name="guardar" type="submit" class="button" value="Guardar">
								</div>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<a name="lista"></a>
		<div class="seccion">
			<span class="titulo">Grupos guardados</span>
			<div class="cuerpo">
				<div class="instrucciones">
					Haga clic en la clave de un grupo para editarlo
				</div>
				<div>
					<table class="-tabla">
						<tr class="encabezados">
							<th>Clave</th>
							<th>Cuatrimestre</th>
							<th>Horarios</th>
							<th class="acciones">Acciones</th>
						</tr>
						<?php 
						$director = $GLOBALS['usuario']->director;
						// show_debug($director);
						if ($director != null) {
							$grupos = Grupo::find('all', array(
								"conditions" => array("id_carrera = ?", $director->clave_carrera)
							));
							// $grupos = $director->carrera->grupos;
							// show_debug($grupos);
							if ($grupos != null) {
								foreach ($grupos as $grupo) {
									echo "<tr>";
										echo "<td>";
											echo "<a href='grupos.php?grupo=".$grupo->id_grupo."'>".$grupo->clave."</a>";
										echo "</td>";
										echo "<td>";
											echo $grupo->cuatrimestre;
										echo "</td>";
										echo "<td>";
											echo "<a href='horarios.php?grupo=".$grupo->id_grupo."'>Horario</a>";
										echo "</td>";
										echo "<td class='acciones'>";
											echo "<a href='grupos.php?grupo=".$grupo->id_grupo."'><img src='../assets/img/edit.png' alt='Editar'></a> ";
											echo "<a class='eliminar' href='grupos.php?eliminar=".$grupo->id_grupo."#lista'><img src='../assets/img/discard.png' alt='Eliminar'></a> ";
										echo "</td>";
									echo "</tr>";
								}
							}
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

renderGrupos();
?>