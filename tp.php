<?php
  declare(strict_types=1); // deshabilita conversiones automáticas de datos

  include 'menu.php';
  include 'obtenerMatrices.php';
  include 'mostrarMatriz.php';
  include 'buscarUnaMatriz.php';
  include 'mostrarError.php';
  include 'traducirRomano.php';

  echo "\033c"; // limpiar consola (solo cmd/powershell)
  
  $coleccionMatrices = obtenerColeccionMatrices(); // precarga de matrices
  programaMatrices($coleccionMatrices);

  /* comentar obj del programa */
  /* documentar función */
function programaMatrices(array $unaColeccionMatrices): void {
  $opcion = menu(); // STRING
  $matriz = []; // ARRAY (2D)
  switch ($opcion) {
    case '1':
      echo "\033[100m\nLa cantidad de matrices del programa es " . count($unaColeccionMatrices) . ".\033[0m\n\n";
      programaMatrices($unaColeccionMatrices); // recursividad
      break;
      
    case '2':
      while (!$matriz) { // se repite mientras no se devuelva una matriz
        $matriz = buscarUnaMatriz('Mostrando una matriz...', $unaColeccionMatrices);
      }
      if ($matriz) {
        mostrarMatriz($matriz);
      }
      programaMatrices($unaColeccionMatrices);
      break;
      
    case '3':
      echo "\033[100m\nIngresando una matriz NxM...\033[0m\n\n";
      programaMatrices($unaColeccionMatrices);
      break;
      
    case '4':
      while (!$matriz) {
        $matriz = buscarUnaMatriz('Mostrando una matriz en números Romanos...', $unaColeccionMatrices);
      }
      if ($matriz) {
        $matriz = traducirMatrizANumerosRomanos($matriz); //reemplazar valores en $matriz con numeros romanos
        mostrarMatriz($matriz);
      }
      programaMatrices($unaColeccionMatrices);
      break;
      
    case '5':
      while (!$matriz) {
        $matriz = buscarUnaMatriz('Mostrando el resumen de una matriz...', $unaColeccionMatrices);
      }
      if ($matriz) {
        // generar resumen de $matriz y mostrarlo
      }
      programaMatrices($unaColeccionMatrices);
      break;
      
    case '6':
      echo "Saliendo...\n\n";
      die;
    
    default:
      programaMatrices($unaColeccionMatrices);
      break;
  }
}
