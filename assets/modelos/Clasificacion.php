<?php
/*!
@brief Modelo Clasificacion para phpActiveRecord.

Esta clase define el modelo Clasificacion para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Clasificacion extends ActiveRecord\Model {
	static $primary_key = "id_clasificacion";//!< Clave primaria de la tabla asociada.
	static $table_name = "clasificaciones";//!< Nombre de la tabla asociada en la base de datos.
	static $has_many = array(
		array("docentes", "foreign_key" => "id_clasificacion")
	); //!< Define la relación "Una Clasificación tiene muchos Docentes".
}

?>