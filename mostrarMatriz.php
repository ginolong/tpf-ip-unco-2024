<?php
// Datos y llamadas para pruebas de modulo:
/* $matriz3 = [["LXXXVIII", 100, 20, 61, 9], [2, 0, 2, 13, 9], [25, "", 7, 7, 9], [1, 3, 9, 11, 9], [22, 100, 20, "", 9], ["-", 100, "LXXXVIII", 61, ""], ["LXXXVIII", 100, 20, 61, 9]];
mostrarMatriz($matriz3);*/

/**
 * Muestra una matriz con formato de salida, alternando colores de fila.
 *
 * Esta función recibe un array bidimensional (matriz) y lo imprime
 * con un diseño formateado. Cada elemento se centra dentro de una celda 
 * de ancho fijo utilizando la funcion `str_pad()` de PHP.
 * 
 * Las filas se colorean alternadamente mediante codigos ANSI para mejorar la legibilidad,
 * tambien se imprimen lineas divisoras entre celdas para darle un formato de cuadricula atenuado, utilizando la funcion `concatenaLineaDivisoria()`.
 *
 * @param array $unaMatriz Un array bidimensional que representa la matriz a mostrar. Cada sub-array representa una fila en la matriz.
 *
 * @return void Esta función no devuelve ningún valor. Imprime la matriz formateada directamente.
 * 
 * @see str_pad()
 * 
 */
function mostrarMatriz(array $unaMatriz): void {
  echo "\n";
  $barraV = "\033[2m|\033[0m"; // STRING barra divisora vertical | atenuada
  $lineaDivisora = concatenaLineaDivisoria($unaMatriz); // STRING linea divisora atenuada

  foreach ($unaMatriz as $indiceFila => $fila) {
    echo $lineaDivisora; // linea divisora inicial y entrefila

    foreach ($fila as $elemento) {
      $color = ($indiceFila % 2 == 0) ? "\033[1;36m" : "\033[1m"; // Alterna colores (cod. ANSI) en función del índice de la fila
      $elementoCentrado = str_pad($elemento, 8, " ", STR_PAD_BOTH); // define ancho de celda 8, para acomodar el numero romano mas largo posible en el programa: 88=LXXXVIII
      echo ("$barraV$color$elementoCentrado\033[0m" ); // | + colorANSI + elemento
    }
    echo $barraV . "\n"; // barra y salto de línea al final de fila
  }
  echo $lineaDivisora . "\n"; // linea divisora final
}

/**
 * Concatena una línea divisora para una matriz dada.
 *
 * Esta función toma un array bidimensional (matriz) como entrada y devuelve una cadena
 * que representa una línea divisora. La línea divisora está formateada con códigos de escape ANSI
 * para crear una apariencia atractiva y atenuada. La longitud de la línea divisora está determinada
 * por el número de columnas en la matriz de entrada.
 *
 * @param array $otraMatriz Un array bidimensional que representa la matriz.
 *
 * @return string Una cadena que representa la línea divisora para la matriz dada.
 */
function concatenaLineaDivisoria (array $otraMatriz): string {
  $linea = ""; // STRING
  for ($i=0; $i < count($otraMatriz[0]); $i++) { 
    $linea = $linea . "|--------"; // concatena tantas veces como índices tenga una fila (son todas iguales)
  }
  return "\033[2m" . $linea. "|\033[0m\n"; // STRING línea divisora atenuada
}

