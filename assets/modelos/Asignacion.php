<?php

class Asignacion extends ActiveRecord\Model {
	static $table_name = 'asignacion_docentes';
	static $primary_key = "id_asignacion";
	static $has_one = array(
		array("docente", "foreign_key" => "id_docente")
		array("director", "foreign_key" => "id_director_carrera")
	);
	static $has_many = array(
		array("imparticions", "primary_key" => "id_materia")
	);
}

?>