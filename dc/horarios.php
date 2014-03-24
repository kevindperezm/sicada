<?php 
include '../includes/functions.php'; 
estaLogueado(3);

if (isset($_POST['guardar'])) {
	$Imparticion = new Imparticion();
	$Imparticion->id_docente = $_POST['Docente'];
	$docente->id_nivel_profesional = $_POST['nivelprofecional'];
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
							<div>
								Docente
								<input name="Docente" type="search" placeholder="Docente">
								Materia
								<input name="Materia" type="text" placeholder="Materia">
							
								<select><option>Día</option></select>
							
								<select><option>Hora</option></select>
							</div>
							<div class="acciones">
								<input name="Agregar" type="submit" class="button" value="Agregar">
							</div>
						</form>
					</div>
				</div>
				<div class="seccion">
					<span class="titulo">Horario</span>
					<div class="cuerpo">
						<div style="text-align: left">
							<input name="Borrar Seleccionado" type="submit" class="button" value="Borrar Seleccionado">
						</div>
						<div class="acciones">
								<input name="Agregar" type="submit" class="button" value="Agregar">
						</div>
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