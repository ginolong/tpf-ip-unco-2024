<?php
function validarIndiceArray(string $unIndice, array $unArray): bool {
  $valido = true; // BOOLEAN
  $indiceMaximo = count($unArray); // INT
  if (!ctype_digit($unIndice)) { //usamos ctype_digit porque is_numeric toma los decimales (1.2)//
    $valido = false;
    mostrarError("El valor ingresado '$unIndice' no es un número.         ");
  } elseif (!($unIndice >= 1 && $unIndice <= $indiceMaximo)) { // Verifica si la seleccion esta dentro del rango de opciones validas (count de array)
    $valido = false;
    mostrarError("El número ingresado '$unIndice' no es una opción válida. Por favor, ingrese un número entre 1 y $indiceMaximo.");
  }
  return $valido;
}

function validarSioNo(string $rta): bool {
  $valido = true;
  if (!($rta === "s" || $rta === "n")) {
    $valido = false;
    mostrarError ("El valor ingresado $rta no es una opción valida. Por favor, ingrese (s) o (n)");
  }
    return $valido;
  }

function mostrarError($mensajeError) {
  echo "\033[1;41m        ERROR: $mensajeError        \033[0m\n";
}

function validarEnteroPositivo(string $unDato): bool {
  $valido = true; // BOOLEAN
  if (!ctype_digit($unDato)) {//usamos ctype_digit porque is_numeric toma los decimales (1.2)//
    $valido = false;
    mostrarError("El valor ingresado '$unDato' no es un número.");
  } elseif (!($unDato > 0) ) { // Verifica si la seleccion es positiva//
    $valido = false;
    mostrarError("El número ingresado '$unDato' no es una opción válida. Por favor, ingrese un número mayor a cero.");
  }
  return $valido;
}

