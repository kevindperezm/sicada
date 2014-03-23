<?php

class Materia extends ActiveRecord\Model {
	static $table_name = "materias";
	static $primary_key = "id_materia";
	static $belongs_to = array(
		array("carrera", "foreign_key" => "id_carrera")
	);
	static $has_many = array(
		array("imparticions", "foreign_key" => "id_materia", "class_name" => "Imparticion")
	);
}

?>