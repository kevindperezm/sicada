<?php
/*!
@brief Modelo Carrera para phpActiveRecord.

Esta clase define el modelo Carrera para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Carrera extends ActiveRecord\Model {}
	static $table_name = "carreras";//!< Nombre de la tabla asociada en la base de datos.
	static $primary_key = "id_carrera";//!< Clave primaria de la tabla asociada.
	// TODO: Relación Carrera-Grupos
	// static $has_many = array(
	// 	array("grupos", "foreign_key" => "id_carrera", "class_name" => "Grupo")
	// );
?>
