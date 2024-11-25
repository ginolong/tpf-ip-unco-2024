<?php
  include 'menu.php';
  echo "\033c"; // limpia consola (solo cmd/powershell)

  $seleccion = menu();
  echo $seleccion;
