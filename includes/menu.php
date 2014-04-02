<?php
/*!
@file includes/menu.php 
@brief Archivo que contiene el menú de navegación del mecanismo de plantilla de SICADA.

<p>
	Este archivo contiene el menú de navegación de SICADA. Este menú
	aparece en todas las páginas del sitio y por eso necesita funcionar
	como parte de la plantilla. La lógica para mostrar el menú de 
	navegación según el rol del usuario también está en este archivo.
	Este archivo es incluido en todas las páginas de SICADA justo después
	de incluir a header.php.
</p>
@author Kevin Pérez
@date Abril 2014

<h2 class='groupheader'>Sobre el mecanismo de plantilla de SICADA</h2>
<p>
	La mayoría de las páginas que conforman un sitio web comparten elementos de diseño por distintas razones. Entre ellas, suelen encontrarse la imagen corporativa y el tema de colores. La posición del encabezado, el pie de página, el menú y la barra lateral suele ser siempre la misma. Esto hace que se repita mucho código entre cada una de las páginas y que a la larga los archivos sean innecesariamente grandes y complejos para su mantenimiento. 
</p>
<p>
	SICADA soluciona este problema reutilizando el código de los elementos que
	se repiten. Esta es una idea que puede verse aplicada en los grandes
	frameworks de desarrollo web, como Ruby on Rails, Wordpress, 
	por mencionar algunos. El código que se repite se encuentra dentro de
	archivos PHP que son incluidos en un orden y posición específicos
	dentro de cada una de las páginas de SICADA, haciendo que todas ellas
	compartan esos mismos elementos y que todas reflejen cualquier cambio
	en ellos.
</p>


*/
?>
<?php
/*!
@brief Muestra el menú de navegación

Muestra el menú de navegación de SICADA en forma de una lista desordenada (ul).
@return Esta función no retorna ningún valor.
*/
function menu() { ?>
	<a href="index.php"><li<?php if(strcmp($GLOBALS['nombreArchivo'],"index") == 0) echo " class='activo'" ?>><span>Inicio</span></li></a>
<?php 
	$usuario = $GLOBALS['usuario'];
	if ($usuario->rol->id_rol == 1) { 
		include "menu/menu-admin.php";
	}
	if ($usuario->rol->id_rol == 2) { 
		include "menu/menu-secretaria.php";
	}
	if ($usuario->rol->id_rol == 3) { 
		include "menu/menu-directores.php";
	}
}

?>
<?php
/*!

@brief Ejecuta el código que corresponde a este archivo.
@return Esta función no retorna ningún valor.
*/
function renderMenu() { 
	$usuario = $GLOBALS['usuario']; ?>
	
	<div class="row show-for-small-only">
		<div class="top-bar navegacion" data-topbar data-options="back_text: Atrás">
			<ul class="title-area">
				<li class="name">
					<a href="#"><span></span></a>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menú</span></a>
				</li>
			</ul>
			<section class="top-bar-section">
				<ul class="left">
					<?php menu(); ?>
				</ul>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-2 columns show-for-medium-up sicada-menu">
			<ul>
				<?php menu(); ?>
			</ul>
		</div>
	</div>
	<div class="row sicada-topper">
		<div class="small-8 medium-8 columns sicada-bienvenida">
			<?php 
			$saludo = "Bienvenido, <b>";
			if ($usuario->rol->id_rol == 3) {
				$director = Director::find(array(
					"conditions" => array("id_usuario = ?", $usuario->id_usuario)
					));
				if ($director != null) {
					$saludo .= $director->nombre;
				} else {
					$saludo .= $usuario->nombre;
				}
			} else {
				$saludo .= $usuario->nombre;
			}
			$saludo .= "</b>";
			echo $saludo;
			?>
		</div>
		<div class="small-4 medium-4 columns sicada-salir text-right">
			<a href="../logout.php">Salir</a>
		</div>
	</div>
	<div class="main row">
		<!-- Antigua posición de menú -->
		<div class="small-12 columns">
			<?php show_message(); ?>
		</div>
		<div class="small-12 medium-10 columns sicada-contenido">
<?php } renderMenu(); ?>
		