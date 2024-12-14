<?php
// Llamada para prueba de modulo:
/* print_r(obtenerColeccionMatrices()); */

/** 
 * Obtiene una colección de matrices predefinidas.
 *
 * Esta función crea y devuelve un array que contiene cuatro matrices predefinidas.
 * 
 * Cada matriz es un array multidimensional con diferentes dimensiones y valores de enteros.
 *
 * @return array La colección de 4 matrices de enteros.
 */
function obtenerColeccionMatrices(): array {
  $coleccion[0] = [[1, 2, 34], [2, 23, 2], [34, 2, 15]];
  $coleccion[1] = [[0, 2, 61], [2, 0, 2], [25, 2, 7], [1, 2, 40]];
  $coleccion[2]= [[0, 2, 20, 61], [2, 0, 2, 13], [25, 2, 7, 7], [1, 2, 9, 11]];
  $coleccion[3] = [[1, 2, 3], [2, 4, 5], [3, 5, 6]]; // Matriz arbitraria
  //$coleccion[4] = [];
  return $coleccion;
}