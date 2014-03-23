<?php
echo "\r\n";

include "../includes/db.php";

$sara = Director::first();
var_dump($sara);
echo "\r\n";
var_dump($sara->carrera);
echo "\r\n";
var_dump($sara->usuario);

echo "\r\n";
?>

