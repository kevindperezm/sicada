<?php

class Imparticion extends ActiveRecord\Model {
	static $table_name = 'clases_impartidas';
	static $primary_key = "id_imparticion";
	static $has_one = array(
		array("docente", "foreign_key" => "id_docente"),
		array("materia", "foreign_key" => "id_materia", "class_name" => "Materia"),
		array("grupo", "foreign_key" => "id_grupo"),
		array("director", "foreign_key" => "id_director_carrera")
	);
}

?>