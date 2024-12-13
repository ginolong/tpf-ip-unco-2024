<?php
// Datos y llamadas para pruebas de modulo:
/* $coleccion = [[[0, 2, 20, 61], [2, 0, 2, 13], [25, 2, 7, 7], [1, 2, 9, 11]], [[0, 2, 61], [2, 0, 2], [25, 2, 7], [1, 2, 40]]];
$tarea = "Esta es una tarea de prueba...";
print_r(buscarUnaMatriz($tarea, $coleccion)); */

/**
 * Busca una matriz específica en una colección de matrices.
 *
 * Esta función presenta al usuario una tarea y le solicita seleccionar una matriz 
 * de una colección de matrices. Realiza validaciones sobre la entrada del usuario 
 * para asegurar que es un número válido y que está dentro del rango permitido. 
 * Devuelve la matriz seleccionada o una matriz vacía si la selección no es válida.
 *
 * @param string $laTarea La descripción de la tarea que se presenta al usuario.
 * @param array $laColeccionMatrices La colección de matrices de la que se seleccionará una.
 *
 * @return array La matriz seleccionada de la colección, o una matriz vacía si la entrada no es válida.
 */
function buscarUnaMatriz(string $laTarea, array $laColeccionMatrices): array {
  echo "\033[4m$laTarea escriba el \033[32mnúmero\033[0m\033[4m de matriz (1 a " . count($laColeccionMatrices) . ")\033[0m \n";
  $seleccion = trim(fgets(STDIN));
  $unaMatriz = [];

  if (validarIndiceArray($seleccion, $laColeccionMatrices)) {
    $unaMatriz = $laColeccionMatrices[$seleccion-1];
  }
  return $unaMatriz;
}
//*comentario al pedo*//