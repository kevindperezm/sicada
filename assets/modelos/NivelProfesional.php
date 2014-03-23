<?php

class NivelProfesional extends ActiveRecord\Model {
	static $primary_key = "id_nivel_profesional";
	static $table_name = "nivel_profesional";
	static $has_many = array(
		array("docentes", "foreign_key" => "id_nivel_profesional")
	);
}

?>