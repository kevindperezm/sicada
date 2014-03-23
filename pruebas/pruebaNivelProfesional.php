<?php
echo "\r\n";

require_once "../includes/db.php";

$sara = Docente::first();
var_dump($sara);
echo "\r\n";
var_dump($sara->carrera);
echo "\r\n";
var_dump($sara->clasificacion);
echo "\r\n";
var_dump($sara->nivel_profesional);
echo "\r\n";
var_dump($sara->nivel_profesional->docentes);

echo "\r\n";
?>

