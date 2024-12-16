<?php

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
}

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
      usleep(200000); // Pausa antes de cambiar de color
  }
}