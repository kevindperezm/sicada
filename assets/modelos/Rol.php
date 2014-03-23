<?php

class Rol extends ActiveRecord\Model {
	static $table_name = 'usuarios_roles';
	static $has_many = array(
		array("usuarios", "foreign_key" => "id_rol")
	);
}

?>