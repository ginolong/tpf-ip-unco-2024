<?php
/**
 * Maneja las excepciones lanzadas en el programa.
 *
 * Esta función recibe un objeto de excepción de la clase base Exception (Standard PHP Library), y realiza diferentes acciones en función del código de error.
 * Si el código de error es 91218 significa que el usuario cancelo una operación en curso y desea volver al menu principal.
 * En caso contrario, imprime información detallada sobre la excepción.
 *
 * @param object $error El objeto de excepción que se va a manejar.
 * @return void No retorna ningún valor.
 */
function manejoDeExcepciones(object $error): void {
  if ($error->getCode() === 91218) { // para asegurar que sea la esperada, utilizamos el método getCode() del objeto $error (instancia de la clase base Exception) y comparamos con la fecha donde River se coronó campeón de la Copa Libertadores
    echo $error->getMessage(); // Mostramos el mensaje definido por nosotros (volviendo al menu principal)
  } else { // en caso de que sea una excepción no contemplada, la mostramos como normalmente se mostraría un error en la consola: 
      echo "Se produjo un error: " . $error->getMessage() . "\n"; 
      echo "Código de excepción: " . $error->getCode() . "\n";
      echo "Lanzada en archivo: " . $error->getFile() . "\n";
      echo "Línea de la excepción: " . $error->getLine() . "\n";
      echo "Stack Trace: \n" . $error->getTraceAsString();
  }
}
