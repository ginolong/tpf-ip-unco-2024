<?php
// Datos y llamadas para pruebas de modulo:
/* $matriz1 = [[-60, 61, 62], [71, 72, 73], [16, 17, 18]];
$traducida = traducirMatrizANumerosRomanos($matriz1);
print_r($traducida); */

/**
 * Traduce todos los números en una matriz a sus equivalentes en números romanos.
 *
 * Toma una matriz (array 2D) de números y convierte cada número
 * a su representación en números romanos utilizando la función `traducirNumeroARomano()`.
 *
 * @param array $unaMatriz La matriz de entrada que contiene los números a traducir.
 *
 * @return array La matriz con todos los números convertidos a números romanos.
 * 
 * @see traducirNumeroARomano()
 */
function traducirMatrizANumerosRomanos(array $unaMatriz): array {
  foreach ($unaMatriz as &$fila) { // "&" permite trabajar con una referencia y no una copia de la variable, permitiendo cambiar los valores de la matriz dentro del foreach (ver punto 3 en 'doc/Referencias en php.md')
    foreach ($fila as &$elemento) {
      $elemento = traducirNumeroARomano($elemento);
    }
  }
  return $unaMatriz;
/* 
La alternativa a usar "&" en este caso es indicar manualmente la posición sobre la matriz original usando los indices:
  foreach ($unaMatriz as $indiceMatriz => $fila) { 
    foreach ($fila as $indiceFila => $elemento) {
      $unaMatriz[$indiceMatriz][$indiceFila] = traducirNumeroARomano($elemento);
    }
  } 
*/
}

/**
 * Convierte un número arábigo a su representación en números romanos. Utiliza guion (-) para el 0.
 *
 * Esta función toma un número entero y lo convierte a su equivalente
 * en números romanos, utilizando los símbolos romanos para unidades,
 * decenas y centenas.
 *
 * @param int $unNumero El número arábigo a convertir (debe ser un entero positivo menor que 1000).
 *
 * @return string La representación en números romanos del número de entrada.
 */
function traducirNumeroARomano(int $unNumero): string {
  $romano = '';
  $unidades = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'];
  $decenas = ['', 'X', 'XX', 'XXX', 'XL', 'L', 'LX', 'LXX', 'LXXX', 'XC'];
  $centenas = ['', 'C', 'CC', 'CCC', 'CD', 'D', 'DC', 'DCC', 'DCCC', 'CM'];

  $unidadesIndex = $unNumero % 10;
  $decenasIndex = ($unNumero % 100) / 10;
  $centenasIndex = ($unNumero % 1000) / 100;

  if ($unNumero == 0) {
    $romano = '-';
  } else {
    $romano = $centenas[$centenasIndex]. $decenas[$decenasIndex]. $unidades[$unidadesIndex];
  }
  return $romano;
}