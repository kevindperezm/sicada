<?php
/*!
@file includes/htmlhead.php 
@brief Archivo de etiqueta HEAD de HTML del mecanismo de plantilla de SICADA.

<p>
	Este archivo contiene etiquetas <em>meta</em> y enlaces a hojas de estilo
	que son requeridos por todas las páginas de SICADA. Se incluye dentro de 
	cada página, justo antes de cerrar la etiqueta <em>meta</em>.
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/css/foundation.min.css">
<link rel="stylesheet" href="../assets/css/gran-contenedor.css">
<link rel="stylesheet" href="../assets/css/general.css">
<link rel="stylesheet" href="../assets/css/system_message.css">
<link rel="favourite icon" href="../assets/img/nuevo-logo-chico.png">
<!--[if lt IE 8]>
<link rel="stylesheet" href="css/general-ie.css">
<![endif]-->