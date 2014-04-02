<?php
/*!
@brief Modelo Docente para phpActiveRecord.

Esta clase define el modelo Docente para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Docente extends ActiveRecord\Model {
	static $primary_key = "id_docente"; //!< Nombre de la tabla asociada en la base de datos.
	static $belongs_to = array(
		array("carrera", "foreign_key" => "id_carrera"),
		array("clasificacion", "foreign_key" => "id_clasificacion"),
		array("nivel_profesional", "foreign_key" => "id_nivel_profesional")
	); /**< Define las siguientes relaciones:<br>
			<ul>
				<li>"Un Docente pertenece a una Carrera"</li>
				<li>"Un Docente pertenece a una Clasificación"</li>
				<li>"Un Docente pertenece a una Clasificación"</li>
			</ul>
		*/
	static $has_many = array(
		array("imparticions", "foreign_key" => "id_docente")
	); //!< Define la relación "Un Docente tiene muchas Imparticiones".
}

?>