<?php
/*!
@brief Modelo Director para phpActiveRecord.

Esta clase define el modelo Director para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Director extends ActiveRecord\Model {
	static $primary_key = "id_director_carrera";//!< Clave primaria de la tabla asociada.
	static $table_name = 'director_carrera';//!< Nombre de la tabla asociada en la base de datos.
	static $belongs_to = array(
		array("carrera", "foreign_key" => "clave_carrera")
	); //!< Define la relación "Un Director pertenece a una Carrera"
	static $has_one = array(
		array("usuario", "foreign_key" => "id_usuario")
	);//!< Define la relación "Cada Director tiene un Usuario".
	static $has_many = array(
		array("Imparticions", "primary_key" => "id_director_carrera")
	); //!< Define la relación "Cada Director tiene muchas Imparticiones".
}

?>