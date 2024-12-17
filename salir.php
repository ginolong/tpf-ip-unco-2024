<?php

/**
 * Esta función simula el proceso de salida del programa. Muestra un mensaje "Saliendo...",
 * seguido de un contador, después de eso, llama a la función mensajeFinal() y luego limpia la pantalla.
 *
 * @return void
 */
function salirPrograma (): void {
  echo "Saliendo";
  usleep(250000);
  echo".";
  usleep(250000);
  echo".";
  usleep(250000);
  echo".";
  usleep(500000);
  echo "\033c";
  mensajeFinal();
  echo "\033c";
}

/**
 * Muestra un mensaje de despedida con un efecto de desvanecimiento en la consola.
 *
 * Esta función itera sobre una serie de colores, mostrando el mensaje "¡Adiós!" en cada color
 * con una breve pausa entre cada cambio. El efecto final es similar a un desvanecimiento
 * gradual del mensaje.
 *
 * @return void
 */

function mensajeFinal(): void {
  // Simulamos el desvanecimiento cambiando los colores gradualmente
  $colores = [
    "\033[1;37m", // blanco negrita
    "\033[97m",   // blanco brillante
    "\033[37m",   // blanco
    "\033[2;97m", // Blanco brillante atenuado
    "\033[2;37m", // Blanco atenuado
    "\033[30m",   // negro 
    "\033[2;90m", // gris oscuro atenuado
  ];
  
  // Desvanecimiento gradual
  foreach ($colores as $color) {
    echo "\r     \r";
      echo $color . "¡Adiós!\033[0m";
      usleep(300000); // Pausa antes de cambiar de color
  }
}