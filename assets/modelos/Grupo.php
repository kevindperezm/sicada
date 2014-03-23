<?php

class Grupo extends ActiveRecord\Model {
	static $primary_key = "id_grupo";
	static $has_one = array(
		array("carrera", "foreign_key" => "id_carrera")
	);
	static $has_many = array(
		array("imparticions", "foreign_key" => "id_grupo"),
		array("rangos", "foreign_key" => "id_grupo")
	);
}

?>