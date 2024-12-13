<?php
// Datos y llamadas para pruebas de modulo:
/*   include 'validaciones.php';
  const OPCIONES_MENU = ['Esta es la primera opcion de menu', 'Esta es otra opcion de menu', 'Aun otra opcion de menu', 'La ultima opcion de menu'];
  echo "Eligió la opción " . menu(); */

/**
 * Muestra un menú de opciones y solicita al usuario que seleccione una. 
 * 
 * Esta función presenta una lista de opciones al usuario, maneja la entrada del usuario, 
 * valida la selección y devuelve la opción elegida. Si se hace una selección inválida, 
 * lo comunica al usuario utilizando la función `mostrarError()`.
 * 
 * @return string La selección válida del usuario, como una cadena de texto que representa el número de la opción del menú.
 * 
 * @see mostrarError()
 */
function menu(): string {
  echo "\n\033[4mSeleccione una opción del menú ingresando el \033[32mnúmero\033[0m\033[4m correspondiente:\033[0m \n\n";
  foreach (OPCIONES_MENU as $indice => $opcion) { // Recorre la constante array de opciones para imprimirlo en consola dandole formato
    echo "\t \033[1;92m". ($indice+1). "\033[0m\033[90m)\033[0m $opcion \n\n";
  }

  $seleccion = trim(fgets(STDIN));
  validarIndiceArray($seleccion, OPCIONES_MENU); // Verifica si la selección es numérica y dentro del rango de opciones validas (count de array de opciones). El retorno no se usa en esta función.

  return $seleccion;
}