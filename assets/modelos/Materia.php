<?php
/*!
@brief Modelo Materia para phpActiveRecord.

Esta clase define el modelo Materia para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Materia extends ActiveRecord\Model {
	static $table_name = "materias";//!< Nombre de la tabla asociada en la base de datos.
	static $primary_key = "id_materia";//!< Clave primaria de la tabla asociada.
	static $belongs_to = array(
		array("carrera", "foreign_key" => "id_carrera")
	);//!< Define la relación "Cada Materia pertenece a una Carrera".
	static $has_many = array(
		array("imparticions", "foreign_key" => "id_materia", "class_name" => "Imparticion")
	); //!< Define la relación "Cada Materia tiene muchas Imparticiones".
}

?>