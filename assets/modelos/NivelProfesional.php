<?php
/*!
@brief Modelo NivelProfesional para phpActiveRecord.

Esta clase define el modelo NivelProfesional para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class NivelProfesional extends ActiveRecord\Model {
	static $primary_key = "id_nivel_profesional"; //!< Clave primaria de la tabla asociada.
	static $table_name = "nivel_profesional"; //!< Nombre de la tabla asociada en la base de datos.
	static $has_many = array(
		array("docentes", "foreign_key" => "id_nivel_profesional")
	); //!< Define la relación "Cada NivelProfesional tiene muchos Docentes".
}

?>