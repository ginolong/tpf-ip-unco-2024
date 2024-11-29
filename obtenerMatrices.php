<?php
/** 
 * Obtiene una colección de matrices predefinidas.
 *
 * Esta función crea y devuelve un array que contiene cuatro matrices predefinidas.
 * Cada matriz es un array multidimensional con diferentes dimensiones y valores.
 *
 * @return array Un array multidimensional que contiene cuatro matrices predefinidas.
 */
function obtenerColeccionMatrices() {
  $matriz1 = [[1, 2, 34], [2, 23, 2], [34, 2, 15]];
  $matriz2 = [[0, 2, 61], [2, 0, 2], [25, 2, 7], [1, 2, 40]];
  $matriz3 = [[0, 2, 20, 61], [2, 0, 2, 13], [25, 2, 7, 7], [1, 2, 9, 11]];
  $matriz4 = [[1, 2, 3], [2, 4, 5], [3, 5, 6]]; // Matriz arbitraria
  return [$matriz1, $matriz2, $matriz3, $matriz4];
}