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
  include 'excepciones.php';
  include 'salir.php';

  //La constante OPCIONES_MENU es un array inmodificable que se repite y se utiliza en la función MENU, para evitar el envió como parámetro o la definición de una variable en cada ejecución//
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
 * El switch principal esta envuelto en un bloque try-catch para el manejo de excepciones, principalmente como medio de 
 * cancelación de operaciones en curso para retornar al menú principal.
 *
 * @param array $unaColeccionMatrices La colección de matrices que se va a administrar.
 * @return void esta funcion tiene un retorno vacio
 */
function programaMatrices(array $unaColeccionMatrices): void {
  $opcion = menu(); // STRING
  $matriz = []; // ARRAY (2D)
  try {
    switch ($opcion) {
      case '1':
        echo "\n\033[3mLa cantidad de matrices del programa es \033[32m" . count($unaColeccionMatrices) . "\033[0m.\n";
        break;

      case '2':
        while (!$matriz) { // Se repite mientras no se devuelva una matriz
          $matriz = buscarUnaMatriz('Para mostrar una matriz', $unaColeccionMatrices);
        }
        mostrarMatriz($matriz);
        break;

      case '3':
        echo "Va a ingresar una matriz a la colección... \n";
        $filas = 0;
        $columnas = 0;
        while (!$filas) { //repite mientras no sea un entero positivo//
          $filas = solicitarEnteroPositivo("filas"); //pedir filas (N) y valida que N sea integer positivo)//
        }
        while (!$columnas) { //repite mientras no sea un entero positivo//
          $columnas = solicitarEnteroPositivo("columnas"); //pedir columnas (M) y valida que M sea integer positivo)//
        }
        $unaColeccionMatrices = incorporaMatriz($unaColeccionMatrices, $filas, $columnas);
        echo "\n\033[42;1;3mSe ingresó una matriz de $filas fila/s por $columnas columna/s en la posición ". count($unaColeccionMatrices) .".\033[0m\n";
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
        mostrarMatriz($matriz);
          $resumen = resumenMatriz($matriz); // generar resumen de $matriz//
          foreach ($resumen as $indice => $opcion) { // Recorre la constante array de opciones para imprimirlo en consola dandole formato
            echo "\033[36m". ($indice). " ==>\033[0m\033[1m $opcion\033[0m \n\n";
          }
          print_r ($resumen); //muestra con print_r el array asociativo//
        break;

      case '6':
        if (!deseaContinuar('Va a salir del Programa Matrices...')) {
          break;
        }
        salirPrograma();
        die;
    }
  } catch (Exception $e) { // capturamos excepción perteneciente a la clase base Exception de PHP, alojandolo en un objeto (instancia de clase Exception) llamado $e (por convención).
    manejoDeExcepciones($e);
  }
  programaMatrices($unaColeccionMatrices); // recursividad
}


