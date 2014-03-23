<?php

class Clasificacion extends ActiveRecord\Model {
	static $primary_key = "id_clasificacion";
	static $table_name = "clasificaciones";
	static $has_many = array(
		array("docentes", "foreign_key" => "id_clasificacion")
	);
}

?>