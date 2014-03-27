<?php

class Director extends ActiveRecord\Model {
	static $primary_key = "id_director_carrera";
	static $table_name = 'director_carrera';
	static $belongs_to = array(
		array("carrera", "foreign_key" => "clave_carrera")
	);
	static $has_one = array(
		array("usuario", "foreign_key" => "id_usuario")
	);
	static $has_many = array(
		array("Imparticions", "primary_key" => "id_director_carrera")
	);
}

?>