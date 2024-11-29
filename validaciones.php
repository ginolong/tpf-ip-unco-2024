<?php
function validarIndiceArray(string $unIndice, array $unArray): bool {
  $valido = true; // BOOLEAN
  $indiceMaximo = count($unArray); // INT
  if (!is_numeric($unIndice)) {
    $valido = false;
    mostrarError("El valor ingresado '$unIndice' no es un número.         ");
  } elseif (!($unIndice >= 1 && $unIndice <= $indiceMaximo)) { // Verifica si la seleccion esta dentro del rango de opciones validas (count de array)
    $valido = false;
    mostrarError("El número ingresado '$unIndice' no es una opción válida. Por favor, ingrese un número entre 1 y $indiceMaximo.");
  }
  return $valido;
}

function mostrarError($mensajeError) {
  echo "\033[1;41m        ERROR: $mensajeError        \033[0m\n";
}