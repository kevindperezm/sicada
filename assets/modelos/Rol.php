<?php
/*!
@brief Modelo Rol para phpActiveRecord.

Esta clase define el modelo Rol para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Rol extends ActiveRecord\Model {
	static $table_name = 'usuarios_roles'; //!< Nombre de la tabla asociada en la base de datos.
	static $has_many = array(
		array("usuarios", "foreign_key" => "id_rol")
	); //!< Define la relación "Un rol tiene muchos usuarios".
}

?>