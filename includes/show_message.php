<?php
/*!
@file includes/show_message.php 
@brief Contiene funciones para mostrar notificaciones de éxito y error.

Este archivo contiene funciones que se usan para añadir mensajes a la
cola de mensajes de la sesión actual y mostrarlos en el navegador. 
Estos mensajes incluyen, por ejemplo, a los mensajes de éxito que aparecen
cuando una operación de guardado termina bien.

@author Kevin Pérez
@date Abril 2014
*/

/*!
@brief Añade un mensaje a la cola de mensajes.

En SICADA, los mensajes que se emiten desde las operaciones internas y que
quieren notificar al usuario de algo pueden encolarse. Esta función añade
un mensaje a la cola.

@param $type El tipo de mensaje: 
<ul>
	<li><b>0</b>: Mensaje de éxito</li>
	<li><b>1</b>: Mensaje de error.</li>
</ul>
@param $mssg El mensaje que será añadido a la cola de mensajes.
@return Esta función no retorna ningún valor.

*/
function add_message($type, $mssg) {
   if (!isset($_SESSION['messages'])) {
      $_SESSION['messages'] = array();
   }
   array_push($_SESSION['messages'], array($type, $mssg));
}

/*!
@brief Muestra la cola de mensajes.

Muestra cada mensaje de la cola de mensajes en forma de una notificación
al usuario. Las notificaciones aparecen como flotantes y desaparecen después
de unos segundos si Javascript está activado. De no ser así, las notificaciones
quedan en la pantalla, justo debajo del menú de navegación.
@return Esta función no retorna ningún valor.
*/
function show_message() {
   if (!isset($_SESSION['messages'])) return;
   echo "<div class='message-container'>";
   foreach ($_SESSION['messages'] as &$message_pair) {
      $type = $message_pair[0];
      $mssg = $message_pair[1];
      if ($type == 0)
         echo '
            <div class="system_message good">
               '.$mssg.'
            </div>';
      if ($type == 1)
         echo '
            <div class="system_message bad">
               '.$mssg.'
            </div>';
   }   
   echo "</div>";
   unset($_SESSION['messages']);
}

?>