<?php 
include '../includes/functions.php'; 
estaLogueado(3);

if (isset($_POST['guardar'])) {
	show_debug($_POST);	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SICADA</title>
	<?php include "../includes/htmlhead.php"; ?>
	<link rel="stylesheet" href="../assets/css/chosen.min.css">
	<style type="text/css">
		.a1{
			/*text-align: right;*/
			padding: 0 1em;
		}
		.a1 select {
			width: 10em;
		}

		form a {
			margin: 0 !important;
		}
	</style>
</head>
<body>
	<?php include "../includes/header.php"; ?>
	<?php include "../includes/menu.php"; ?>
	<!-- Contenido -->
	<div class="row contenido-titulo">
		<div class="small-12 columns">
			<h3>Horarios de materias</h3>
		</div>	
	</div>
	<div class="seccion">
		<span class="titulo">Nueva Asignación</span>
		<div class="cuerpo">
			<form method="post" id="asignacion-form">
				<table>
					<tr>
						<th>Grupo</th>
						<td>
							<select name="grupo" id="grupo-select" class="filter-select">
								<?php
								$carrera = $GLOBALS['usuario']->director->clave_carrera;
								$grupos = Grupo::find("all", array(
									"conditions" => array("id_carrera = ?", $carrera)
									));
								foreach ($grupos as $grupo) {
									echo "<option value='".$grupo->id_grupo."'>".$grupo->clave."</option>";
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<th>Docente</th>
						<td>
							<select name="docente" data-placeholder="Seleccione un maestro..." class='filter-select'>
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
							<select name="materia" data-placeholder="Seleccione una materia..." class='filter-select'>
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
							<select name="dia" id="dia-select" class="filter-select" data-placeholder="Seleccione día...">
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
						<select style="padding:0 !important;margin:0 !important;" name="bloque[]" multiple id="bloque-select" class="filter-select" data-placeholder="Seleccione bloque(s)...">
						</select>
					</td>
				</tr>
				<tr>
					<td class="hide-for-small">&nbsp;</td>
					<td colspan="2">
						<div class="acciones">
							<input type="submit" class="button" name="guardar" value="Agregar">
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
<script src="../assets/js/chosen.jquery.min.js"></script>
<script src="../assets/js/jquery.chained.remote.min.js"></script>
<script>
	$(".filter-select").chosen({
		width: "100%",
		no_results_text: "No hay resultados para "
	});
	$("#bloque-select").remoteChained({
		parents: "#dia-select,#grupo-select",
		url: "../assets/ajax/bloque-ajax.php"
	})
	.change(function(e){
		$("#bloque-select").trigger("chosen:updated");
	});
	$("#dia-select").remoteChained({
		parents: "#grupo-select",
		url: "../assets/ajax/dia-ajax.php"
	});
	$("#grupo-select").change(function(e){
		$("#dia-select").trigger("chosen:updated");
	})
	.change();
</script>
</body>
</html>