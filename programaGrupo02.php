<?php
  declare(strict_types=1); // deshabilita conversiones automáticas de datos y fuerza control de tipos SOLO en funciones

  include 'menu.php';
  include 'obtenerColeccionMatrices.php';
  include "solicitarEnteroPositivo.php";
  include "incorporaMatriz.php";
  include 'mostrarMatriz.php';
  include 'buscarUnaMatriz.php';
  include 'traducirRomano.php';
  include "resumenMatriz.php";
  include "deseaContinuar.php";
  include 'validaciones.php';

  //La constante OPCIONES_MENU es un array inmodificable que se repite y se utiliza en la función MENU, para evitar el envio como parametro o la definicion de una variable en cada ejecucion//
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

/**
 * Esta función representa el bucle principal del programa para administrar una colección de matrices de manera recursiva.
 * Gestiona la entrada del usuario para diferentes operaciones como mostrar la cantidad de matrices, mostrar una matriz específica,
 * ingresar una nueva matriz, mostrar una matriz en números romanos, mostrar un resumen de una matriz y salir.
 *
 * @param array $unaColeccionMatrices La colección de matrices que se va a administrar.
 * @return void esta funcion tiene un retorno vacio
 */
function programaMatrices(array $unaColeccionMatrices): void {
  $opcion = menu(); // STRING
  $matriz = []; // ARRAY (2D)
  switch ($opcion) {
    case '1':
      echo "\033[100m\nLa cantidad de matrices del programa es " . count($unaColeccionMatrices) . ".\033[0m\n\n";
      break;

    case '2':
      echo "\033[100m\nVa a visualizar una matriz...\033[0m\n\n";
      if (!deseaContinuar()) {
        break;
      }
      while (!$matriz) { // Se repite mientras no se devuelva una matriz
        $matriz = buscarUnaMatriz('Para mostrar una matriz', $unaColeccionMatrices);
      }
      mostrarMatriz($matriz);
      break;

    case '3':
      echo "\033[100m\nVa a ingresar una nueva matriz NxM...\033[0m\n\n";
      if (!deseaContinuar()) {
        break;
      }
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
      echo "\033[100m\nVa a visualizar una matriz en números Romanos...\033[0m\n\n";
      if (!deseaContinuar()) {
        break;
      }
      while (!$matriz) {
        $matriz = buscarUnaMatriz('Para mostrar una matriz en números romanos', $unaColeccionMatrices);
      }
      $matrizEnRomanos = traducirMatrizANumerosRomanos($matriz);
      mostrarMatriz($matriz);
      mostrarMatriz($matrizEnRomanos);
      break;

    case '5':
      echo "\033[100m\nVa a visualizar el resumen de una matriz...\033[0m\n\n";
      if (!deseaContinuar()) {
        break;
      }
      while (!$matriz) {
        $matriz = buscarUnaMatriz('Para mostrar el resumen de una matriz', $unaColeccionMatrices);
      }
      mostrarMatriz($matriz);
        $resumen = resumenMatriz($matriz); // generar resumen de $matriz//
        foreach ($resumen as $indice => $opcion) { // Recorre la constante array de opciones para imprimirlo en consola dandole formato
          echo "\033[36m". ($indice). " ==>\033[0m\033[1m $opcion\033[0m \n\n";
        }
        print_r ($resumen); //muestra con print_r el array asociativo//
      break;

    case '6':
      echo "\033[100m\nVa a salir del Programa Matrices...\033[0m\n\n";
      if (!deseaContinuar()) {
        break;
      }
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


