<?php
// Datos y llamadas para pruebas de modulo:
/*   include 'mostrarError.php';
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

      // Recorre el array de opciones para imprimirlo en consola dandole formato
      echo "\033[4mSeleccione una opción ingresando el \033[32mnúmero\033[0m\033[4m correspondiente:\033[0m \n\n";
      foreach (OPCIONES_MENU as $indice => $opcion) {
        echo "\t \033[1;92m". ($indice+1). "\033[0m\033[90m)\033[0m $opcion \n\n";
      }

      $seleccion = trim(fgets(STDIN));

      // Verifica si la seleccion es numerica y dentro del rango de opciones validas (count de array de opciones)
      if (!is_numeric($seleccion)) {
        mostrarError('El valor ingresado no es un número.         ');
      } elseif (!($seleccion >= 1 && $seleccion <= count(OPCIONES_MENU))) { //$seleccion no sea menor 1 y no sea mayor a count/count (negado)
        mostrarError('El número ingresado no es una opción válida.');
      }
      return $seleccion;
    }