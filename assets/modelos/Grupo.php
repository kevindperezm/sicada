<?php
/*!
@brief Modelo Grupo para phpActiveRecord.

Esta clase define el modelo Grupo para utilizarlo con phpActiveRecord.
Está vínculada a una tabla de la base de datos. Es posible crear objetos de 
esta clase con información obtenida desde esa tabla y también se pueden 
crear o modificar registros en ella con la información de objetos de esta 
clase.

@author Kevin Pérez
@date Abril 2014

*/
class Grupo extends ActiveRecord\Model {
	static $primary_key = "id_grupo"; //!< Nombre de la tabla asociada en la base de datos.
	static $has_one = array(
		array("carrera", "foreign_key" => "id_carrera")
	); //!< Define la relación "Cada Grupo tiene una Carrera".
	static $has_many = array(
		array("imparticions", "foreign_key" => "id_grupo"),
		array("rangos", "foreign_key" => "id_grupo")
	); /**< Define las siguientes relaciones:<br>
			<ul>
				<li>"Un Grupo tiene muchas Imparticiones"</li>
				<li>"Un Grupo tiene muchos Rangos"</li>
			</ul>
		*/
}

?>