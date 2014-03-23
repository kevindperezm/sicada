<?php

class Docente extends ActiveRecord\Model {
	static $primary_key = "id_docente";
	static $belongs_to = array(
		array("carrera", "foreign_key" => "id_carrera")
	);
	static $has_one = array(
		array("clasificacion", "foreign_key" => "id_clasificacion"),
		array("nivel_profesional", "foreign_key" => "id_nivel_profesional")
	);
	static $has_many = array(
		array("imparticions", "primary_key" => "id_docente")
	);
}

?>