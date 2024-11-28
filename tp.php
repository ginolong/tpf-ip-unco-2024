<?php
  include 'menu.php';
  include 'obtenerMatrices.php';
  include 'mostrarMatriz.php';
  include 'buscarUnaMatriz.php';
  include 'mostrarError.php';

  echo "\033c"; // limpiar consola (solo cmd/powershell)
  
  $coleccionMatrices = obtenerColeccionMatrices(); // precarga de matrices
  programaMatrices($coleccionMatrices);

  /* comentar obj del programa */
  /* documentar función */
function programaMatrices($unaColeccionMatrices) {
  $opcion = menu(); // STRING
  $matriz = []; // ARRAY bidimensional
  switch ($opcion) {
    case '1': // Mostrar cantidad de matrices del programa
      echo "\033[100m\nLa cantidad de matrices del programa es " . count($unaColeccionMatrices) . ".\033[0m\n\n";
      programaMatrices($unaColeccionMatrices); // recursividad
      break;
      
    case '2': // Mostrar una matriz
      while (!$matriz) { // se repite mientras no se devuelva una matriz
        $matriz = buscarUnaMatriz('Mostrando una matriz...', $unaColeccionMatrices);
      }
      if ($matriz) {
        mostrarMatriz($matriz);
      }
      programaMatrices($unaColeccionMatrices);
      break;
      
    case '3': // Ingresar una matriz NxM
      echo "\033[100m\nIngresando una matriz NxM...\033[0m\n\n";
      programaMatrices($unaColeccionMatrices);
      break;
      
    case '4': // Mostrar una matriz en números Romanos
      echo "\033[100m\nMostrando una matriz en números Romanos...\033[0m\n\n";
      programaMatrices($unaColeccionMatrices);
      break;
      
    case '5': // Mostrar el resumen de una matriz
      echo "\033[100m\nMostrando el resumen de una matriz...\033[0m\n\n";
      programaMatrices($unaColeccionMatrices);
      break;
      
    case '6': // Salir
      echo "Saliendo...\n\n";
      die;
    
    default:
      programaMatrices($unaColeccionMatrices);
      break;
  }
}
