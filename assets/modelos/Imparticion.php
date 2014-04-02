<?php
/*!
@brief Modelo Imparticion para phpActiveRecord.

Esta clase define el modelo Imparticion para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Imparticion extends ActiveRecord\Model {
	static $table_name = 'clases_impartidas';//!< Nombre de la tabla asociada en la base de datos.
	static $primary_key = "id_imparticion";//!< Clave primaria de la tabla asociada.
	static $has_one = array(
		array("docente", "foreign_key" => "id_docente"),
		array("materia", "foreign_key" => "id_materia", "class_name" => "Materia"),
		array("grupo", "foreign_key" => "id_grupo"),
		array("director", "foreign_key" => "id_director_carrera")
	); /**< Define las siguientes relaciones:<br>
			<ul>
				<li>"Una Impartición tiene un Docente"</li>
				<li>"Una Impartición tiene una Materia"</li>
				<li>"Una Impartición tiene un Grupo"</li>
				<li>"Una Impartición tiene un Director"</li>
			</ul>
		*/
}

?>