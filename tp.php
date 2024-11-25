<?php
  include 'menu.php';

  echo "\033c"; // limpiar consola (solo cmd/powershell)
  programaMatrices(); // inicializar programa principal

  /* comentario del obj del programa */
  /* documentar variables con tipos de datos */
function programaMatrices() {
  $opcion = menu();
  switch ($opcion) {
    case '1':
      echo "\033[100m\nMostrando cantidad de matrices del programa...\033[0m\n\n";
      programaMatrices();
      break;
      
    case '2':
      echo "\033[100m\nMostrando una matriz...\033[0m\n\n";
      programaMatrices();
      break;
      
    case '3':
      echo "\033[100m\nIngresando una matriz NxM...\033[0m\n\n";
      programaMatrices();
      break;
      
    case '4':
      echo "\033[100m\nMostrando una matriz en números Romanos...\033[0m\n\n";
      programaMatrices();
      break;
      
    case '5':
      echo "\033[100m\nMostrando el resumen de una matriz...\033[0m\n\n";
      programaMatrices();
      break;
      
    case '6':
      echo "Saliendo...\n\n";
      die;
    
    default:
      // programaMatrices();
      break;
  }
}
