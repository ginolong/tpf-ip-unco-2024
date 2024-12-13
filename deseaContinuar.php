<?php
/**
 * Esta función pregunta al usuario si desea volver al menú principal.
 *
 * @return bool true si el usuario desea volver al menú principal, false en caso contrario.
 */
function deseaContinuar(): bool {
  $respuestaValida = True;
  do {
  echo "\n\033[103;30;3m¿Desea continuar? (s/n):\033[0m\n";
  $respuesta = trim(fgets(STDIN));
  $respuesta = strtolower($respuesta);
  $respuestaValida = validarSioNo($respuesta);
  } while (!$respuestaValida);

 return ($respuesta == "s") ? true : false;
// return true;//
}
