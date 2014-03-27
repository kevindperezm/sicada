<?php 
include '../includes/functions.php'; 
estaLogueado(3);

if (isset($_POST['guardar'])) {
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SICADA</title>
	<?php include "../includes/htmlhead.php"; ?>
</head>
<style type="text/css">
	.a1{
		text-align: right;
		margin-top: 0;
		border-top: 0;
	}
</style>
<body>
	<?php include "../includes/header.php"; ?>
	<?php include "../includes/menu.php"; ?>
			<!-- Contenido -->
			<div class="row contenido-titulo">
				
			</div>
			<div>
			<p><B>Asignar Horarios de Materias</B></p>		
			</div>
			<div class="a1">
				<select><option>Grupo</option></select>	
			</div>
				<div class="seccion">
					<span class="titulo">Nueva Asignación</span>
					<div class="cuerpo">
						<form method="post">
							<table>
								<tr>
									<th>Docente</th>
									<td>
										<input type="text" name="docente">
										<select multiple>
											<?php
											$docentes = Docente::all(array("order" => "nombre ASC"));
											foreach ($docentes as $docente) {
												echo "<option value='".$docente->id_docente."'>".$docente->nombre."</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<th>Materia</th>
									<td>
										<input type="text" name="materia">
										<select multiple>
											<?php
											$materias = Materia::all(array("order" => "nombre ASC"));
											foreach ($materias as $materia) {
												echo "<option value='".$materia->id_materia."'>".$materia->nombre."</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<th>Día</th>
									<td>
										<select name="dia">
											<?php
											$dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
											for ($i = 0; $i < 7; $i++) {
												echo "<option value='".($i+1)."'>".$dias[$i]."</option>";
											}
											?>
										</select>
									</td>
								</tr>
									<th>Bloque</th>
									<td>
										<select name="bloque">
											<?php
											// TODO: Revisar bloques horarios de cada día al cambiar el select DIA
											// Esto solo funciona para el Lunes
											$dia = 1;
											$grupo = 19;
											$rango = Rango::find(array("conditions" => array("dia = ? and id_grupo = ?", $dia, $grupo)));
											if ($rango != null) {
												$tamanobloque = $rango->duracion_bloque;
												// TODO: Sumar valores time para obtener bloques horarios
											} else {
												echo "<option value=''>El día seleccionado no se asiste</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="hide-for-small">&nbsp;</td>
									<td colspan="2">
										<div class="acciones">
											<input name="Agregar" type="submit" class="button" value="Agregar">
										</div>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>

				<div class="seccion">
					<span class="titulo">Horario</span>
					<div class="cuerpo">
						<!-- <div style="text-align: left">
							<input name="Borrar Seleccionado" type="submit" class="button" value="Borrar Seleccionado">
						</div>
						<div class="acciones">
								<input name="Agregar" type="submit" class="button" value="Agregar">
						</div> -->
						<table style="margin-top: 1em">
							<tr>
								<td>
									Docente
								</td>
								<td>
									Materia
								</td>
								<td>
									Día
								</td>
								<td>
									Hora
								</td>
							</tr>
							<?php
								 $carrera = Docente::all();
								 foreach ($carrera as $key) {
								 	echo "<tr>";
								 		echo "<td>";
								 			echo $key->nombre;
								 		echo "</td>";
								 		echo "<td>";
								 			echo $key->id_nivel_profesional;
								 		echo "</td>";
								 		echo "<td>";
								 			echo $key->id_clasificacion;
								 		echo "</td";
								 		echo "<td>";
											echo $key->id_clasificacion;
								 		echo "</td>";
								 	echo "</tr>";
								 }				
								?>
						</table>
					</div>
				</div>
			

			<!-- FIN DE CONTENIDO -->
		<?php include "../includes/footer.php"; ?>
</body>
</html>