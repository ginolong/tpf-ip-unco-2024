<?php
// Datos y llamadas para pruebas de modulo:
/* $matriz3 = [[0, 2, 20, 61], [2, 0, 2, 13], [25, 2, 7, 7], [1, 2, 9, 11]];
mostrarMatriz($matriz3); */

/**
 * Muestra una matriz en una estructura de tabla con formato y colores alternos en las filas.
 *
 * Esta función recibe un arreglo bidimensional (matriz) y lo imprime en la consola,
 * con cada elemento separado por barras verticales y tabuladores. Las filas con números
 * pares se muestran en cian (\033[36m), mientras que las filas con números impares se muestran en negrita (\033[1m).
 *
 * @param array $unaMatriz El arreglo bidimensional (matriz) que se mostrará.
 * 
 * @return void Esta función no devuelve ningún valor; imprime directamente en la consola.
 */
function mostrarMatriz(array $unaMatriz): void {
  echo "\n";
  foreach ($unaMatriz as $indiceFila => $fila) { // $indiceFila lo utilizaremos para saber si es par o impar, formateando con colores alternos
    foreach ($fila as $elemento) {
      echo "|\t" . (($indiceFila % 2 == 0)? "\033[36m" : "\033[1m") . $elemento . "\t\033[0m"; // El ternario alterna colores de elementos en la fila
    }
    echo "|\n";
  }
  echo "\n";
}