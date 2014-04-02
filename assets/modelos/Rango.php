<?php
/*!
@brief Modelo Rango para phpActiveRecord.

Esta clase define el modelo Rango para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Rango extends ActiveRecord\Model {
	static $table_name = 'rangos_horarios'; //!< Nombre de la tabla asociada en la base de datos.
	static $primary_key = "id_rango"; //!< Clave primaria de la tabla asociada.
	static $belongs_to = array(
		array("grupo", "foreign_key" => "id_grupo")
	); //!< Define la relación "Cada rango pertenece a un grupo".
}

?>