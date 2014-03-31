<?php

/*!
@function add_message($type, $mssg)
@param $type int El tipo de mensaje: 0 para mensaje de éxito, 1 para mensaje de error.
param $mssg String El mensaje que será mostrado en la notificación.
*/
function add_message($type, $mssg) {
   if (!isset($_SESSION['messages'])) {
      $_SESSION['messages'] = array();
   }
   array_push($_SESSION['messages'], array($type, $mssg));
}

/*!
@function show_message()
Muestra un mensaje en forma de una pequeña notificación, si el mensaje
ya ha sido colocado antes por add_message().
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