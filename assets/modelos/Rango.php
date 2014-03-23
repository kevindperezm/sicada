<?php

class Rango extends ActiveRecord\Model {
	static $table_name = 'rangos_horarios';
	static $primary_key = "id_rango";
	static $belongs_to = array(
		array("grupo", "foreign_key" => "id_grupo")
	);
}

?>