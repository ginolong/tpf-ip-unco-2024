<?php
  declare(strict_types=1); // deshabilita conversiones automáticas de datos y fuerza control de tipos SOLO en funciones

  include 'menu.php';
  include 'obtenerMatrices.php';
  include "solicitarEnteroPositivo.php";
  include "incorporaMatriz.php";
  include 'mostrarMatriz.php';
  include 'buscarUnaMatriz.php';
  include 'traducirRomano.php';
  include 'validaciones.php';

  // Constante array de opciones de menu, expandir opciones aca:
  const OPCIONES_MENU = [
    /*1*/ 'Mostrar cantidad de matrices del programa',
    /*2*/ 'Mostrar una matriz',
    /*3*/ 'Ingresar una matriz NxM',
    /*4*/ 'Mostrar una matriz en números Romanos',
    /*5*/ 'Mostrar el resumen de una matriz',
    /*6*/ 'Salir'
  ];
  
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
      break;
      
    case '2':
      while (!$matriz) { // Se repite mientras no se devuelva una matriz
        $matriz = buscarUnaMatriz('Para mostrar una matriz', $unaColeccionMatrices);
      }
      mostrarMatriz($matriz);
      break;
      
    case '3':
      echo "\033[100m\nIngresando una matriz NxM...\033[0m\n\n";
      $filas = 0;
      $columnas = 0;
      while (!$filas) { //repite mientras no sea un entero positivo//
        $filas = solicitarEnteroPositivo("filas"); //pedir filas (N) y valida que N sea integer positivo)//
      }
      while (!$columnas) { //repite mientras no sea un entero positivo//
        $columnas = solicitarEnteroPositivo("columnas"); //pedir columnas (M) y valida que M sea integer positivo)//
      }
      $unaColeccionMatrices = incorporaMatriz($unaColeccionMatrices, $filas, $columnas);
      echo "\033[42m\nSe ingresó una matriz de $filas filas x $columnas columnas\033[0m\n\n";
      break;
      
    case '4':
      while (!$matriz) {
        $matriz = buscarUnaMatriz('Para mostrar una matriz en números romanos', $unaColeccionMatrices);
      }
      $matrizEnRomanos = traducirMatrizANumerosRomanos($matriz);
      mostrarMatriz($matriz);
      mostrarMatriz($matrizEnRomanos);
      break;
      
    case '5':
      while (!$matriz) {
        $matriz = buscarUnaMatriz('Para mostrar el resumen de una matriz', $unaColeccionMatrices);
      }
      // generar resumen de $matriz y mostrarlo con print_r (el enunciado pide print_r)
      break;
      
    case '6':
      echo "Saliendo";
      usleep(250000);
      echo".";
      usleep(250000);
      echo".";
      usleep(250000);
      echo".";
      usleep(500000);
      echo "\033c";
      die;
  }
  programaMatrices($unaColeccionMatrices); // recursividad
}
