<?php
/**
 * Esta función pregunta al usuario si desea continuar en la opción elegida, de lo contrario lo retorna al menú principal.
 *
 * @return bool true si el usuario desea volver al menú principal, false en caso contrario.
 */
function deseaContinuar(string $opcion): bool {
  $respuestaValida = True; // BOOL
  do {
    echo "\n\033[103;30;3m$opcion\033[0m"; // mensaje de opción seleccionada
    echo "\n\033[103;30;3m¿Desea continuar con la opción seleccionada? (s/n):\033[0m\n";
    $respuesta = trim(fgets(STDIN)); // STRING
    $respuesta = strtolower($respuesta);
    $respuestaValida = validarSioNo($respuesta); // BOOL
  } while (!$respuestaValida);
  return ($respuesta == "s") ? true : false;
}