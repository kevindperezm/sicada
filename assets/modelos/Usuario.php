<?php
/*!
@brief Modelo Usuario para phpActiveRecord.

Esta clase define el modelo Usuario para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Usuario extends ActiveRecord\Model {
	static $table_name = "usuarios"; //!< Nombre de la tabla asociada en la base de datos.
	static $primary_key = "id_usuario"; //!< Clave primaria de la tabla asociada.
	static $has_one = array(
		array("director", "foreign_key" => "id_usuario")
	); //!< Define la relación "Cada usuario tiene un director".
	static $belongs_to = array(
		array("rol", "foreign_key" => "id_rol")
	); //!< Define la relación "Cada usuario pertenece a un rol".
	/*!
	@brief Indica si este usuario es Director de Carrera o no.
	@return <b>true</b> si el usuario tiene Director de Carrera asociado.
	@return <b>false</b> si no es así.
	*/
	function es_director() {
		return ($this->director != null);
	}
}

?>
