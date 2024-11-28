<?php

/** la funcion deberia:
 *  recibir una tarea a ejecutar como string
 *  recibir una coleccion de matrices como array bidimensional
 *  
 * mostrar la tarea a ejecutar,
 * mostrar los valores validos
 * dar la opcion de volver atras
 * pedir un numero de matriz a buscar
 * validar la seleccion:
 *    que sea numerica
 *    que sea un valor que exista como matriz (de 1 a count($laColeccionMatrices))
 *    
 * en caso correcto, devolver la matriz buscada
 * en caso incorrecto:
 *  mostrar el error en cuestion
 *  
 */

function buscarUnaMatriz($laTarea, $laColeccionMatrices) {
  echo "\033[100m\n$laTarea\033[0m\n";
  echo "\033[4mEscriba el \033[32mnúmero\033[0m\033[4m de matriz (1 a " . count($laColeccionMatrices) . ") o escriba \033[33mvolver (no implementado)\033[0m\033[4m para retornar al menú principal:\033[0m \n";
  $seleccion = trim(fgets(STDIN));
  $unaMatriz = [];
  /* CAMBIAR ESTO A UNA FUNCION DE VALIDACION, SE REPITE EN menu.php  */
  if (!is_numeric($seleccion)) {
    mostrarError('El valor ingresado no es un número.         ');
  } elseif (!($seleccion >= 1 && $seleccion <= count($laColeccionMatrices))) {
    mostrarError('El número ingresado no es una opción válida.');
  /* CAMBIAR ESTO A UNA FUNCION DE VALIDACION, SE REPITE EN menu.php  */
  } else {
    $unaMatriz = $laColeccionMatrices[$seleccion-1];
  }
  return $unaMatriz;
}