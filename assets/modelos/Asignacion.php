<?php
/*!
@brief Modelo Asignacion para phpActiveRecord.

Esta clase define el modelo Asignacion para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Asignacion extends ActiveRecord\Model {
	static $table_name = 'asignacion_docentes';//!< Nombre de la tabla asociada en la base de datos.
	static $primary_key = "id_asignacion";//!< Clave primaria de la tabla asociada.
	static $has_one = array(
		array("docente", "foreign_key" => "id_docente")
		array("director", "foreign_key" => "id_director_carrera")
	); /**< Define las siguientes relaciones:<br>
			<ul>
				<li>"Una Asignación tiene un Docente"</li>
				<li>"Un Asignación tiene un Director"</li>
			</ul>
		*/
}

?>