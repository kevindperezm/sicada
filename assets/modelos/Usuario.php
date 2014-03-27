<?php

class Usuario extends ActiveRecord\Model {
	static $primary_key = "id_usuario";
	static $has_one = array(
		array("director", "foreign_key" => "id_usuario")
	);
	static $belongs_to = array(
		array("rol", "foreign_key" => "id_rol")
	);
	function es_director() {
		return ($this->director != null);
	}
}

?>
