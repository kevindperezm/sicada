<?php
/*!
@file includes/header.php 
@brief Archivo que contiene el encabezado del mecanismo de plantilla de SICADA.

<p>
	Este archivo contiene todo lo que aparece en el encabezado (header) de 
	SICADA. Se incluye en todas las páginas de SICADA justo después de abrir
	la etiqueta <em>body</em>.
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
<div class="gran-contenedor">
	<div class="header row">
		<div class="small-12 medium-6 columns text-left sicada-logo">
			<img src="../assets/img/sicada-logo.png" alt="SICADA">
		</div>
		<!-- <div class="small-12 medium-6 large-4 columns text-center show-for-medium-up sicada-titulo">
			<h4>Universidad Tecnológica de Manzanillo</h4>
		</div> -->
		<div class="small-12 medium-6 columns show-for-large-up text-right sicada-utem">
			<img src="../assets/img/utem-logo.png" alt="UTeM">
		</div>
	</div>