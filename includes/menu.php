<?php

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
	<div class="small-12 medium-10 columns sicada-contenido">

		