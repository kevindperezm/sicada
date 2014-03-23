<?php

class Carrera extends ActiveRecord\Model {}
	static $primary_key = "id_carrera";
	// TODO: Relación Carrera-Grupos
	// static $has_many = array(
	// 	array("grupos", "foreign_key" => "id_carrera", "class_name" => "Grupo")
	// );
?>
