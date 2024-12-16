<?PHP
// Datos y llamadas para pruebas de modulo:
/* $unaMatriz  = [[1, 2, 34, 1], [2, 34, 2, 0], [34, 2, 15, 8]];
$cantFilas = 3;
$cantColumnas = 4;
$matriz = resumenMatriz ($unaMatriz);
print_r ($matriz); */


/**
 * Esta función calcula y devuelve un resumen de una matriz dada.
 *
 * @param array $unaMatriz La matriz de entrada que se resumirá.
 *
 * @return array Un array asociativo que contiene las siguientes claves:
 *               - 'dimension1': El número de filas en la matriz.
 *               - 'dimension2': El número de columnas en la matriz.
 *               - 'suma': La suma de todos los elementos de la matriz.
 *               - 'promedio': El promedio de todos los elementos de la matriz.
 *               - 'cuadrada': Una cadena que indica si la matriz es cuadrada ('si') o no ('no').
 *               - 'simetrica': Una cadena que indica si la matriz es simétrica ('si') o no ('no').
 *                 Nota: La simetría solo se verifica si la matriz es cuadrada.
 */
function resumenMatriz(array $unaMatriz): array { 
      $matrizResumen = [];
      $fila = count($unaMatriz); //obtiene la cantidad de filas de la matriz//
      $columna = count($unaMatriz[0]); //obtiene la cantidad de columnas de la matriz//
      $suma = 0;
      $cuadrada = ($fila == $columna) ? 'si' : 'no';
      $simetrica = 'si'; 
      for ($i = 0; $i < $fila; $i++) {
          for ($j = 0; $j < $columna; $j++) {
              $suma += $unaMatriz[$i][$j]; //suma los elementos de la matriz//
              if ($cuadrada == "si") { //alternativa para ver si la matriz es simétrica con el requisito de que sea cuadrada//
                if ($unaMatriz[$i][$j] != $unaMatriz[$j][$i]) { //compara los índices invertidos para ver si es simétrica//
                    $simetrica = 'no';
                }    
              }
              else {
                $simetrica = "no";
              }
          }
      }
      $promedio = round($suma / ($fila * $columna),2); //calcula el promedio y redondea a 2 decimales//
      $matrizResumen = [
          'dimension1' => $fila,    // INT
          'dimension2' => $columna, // INT
          'suma' => $suma,          // INT
          'promedio' => $promedio,  // FLOAT
          'cuadrada' => $cuadrada,  // STRING
          'simetrica' => $simetrica // STRING
      ];
      return $matrizResumen;
  }


