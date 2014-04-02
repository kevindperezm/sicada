<?php
/*!
@file includes/footer.php 
@brief Archivo que contiene el pie de página del mecanismo de plantilla de SICADA.

<p>
	Este archivo contiene el pie de página que se ve en todas las pantallas
	de SICADA. También contiene referencias a scripts de Javascript que
	se cargan al final, para mejorar el rendimiento del sitio. Este archivo
	se incluye en todas las páginas de SICADA, justo antes de cerrar la
	etiqueta <em>body</em>.
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
</div>
</div>
<div class="footer row">
	<div class="small-12 columns text-center">
		<span>SICADA</span><br>
		<span>Desarrollado por Team 1</span>
	</div>
</div>
</div>

<script src="../assets/js/jquery-1.11.0.min.js"></script>
<script src="../assets/js/jquery.form-validator.min.js"></script>
<script src="../assets/js/foundation.min.js"></script>
<script src="../assets/js/functions.js"></script>
<script src="../assets/js/system_message.js"></script>