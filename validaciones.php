<?php
/**
 * Valida si un índice es válido para acceder a un elemento dentro de un arreglo.
 *
 * Esta función verifica que el índice proporcionado sea un número entero positivo y que esté 
 * dentro del rango válido del arreglo.
 *
 * @param string $unIndice El índice a validar (se espera un número entero como cadena).
 * @param array $unArray El arreglo donde se buscará el elemento.
 * @return bool Retorna `true` si el índice es válido, `false` en caso contrario.
 */
function validarIndiceArray(string $unIndice, array $unArray): bool {
  $valido = true; // BOOLEAN
  $indiceMaximo = count($unArray); // INT
  if (!ctype_digit($unIndice)) { //usamos ctype_digit porque is_numeric toma los decimales (1.2)//
    $valido = false;
    mostrarError("El valor ingresado '$unIndice' no es un número.");
  } elseif (!($unIndice >= 1 && $unIndice <= $indiceMaximo)) { // Verifica si la seleccion esta dentro del rango de opciones validas (count de array)
    $valido = false;
    mostrarError("El número ingresado '$unIndice' no es una opción válida. Por favor, ingrese un número entre 1 y $indiceMaximo.");
  }
  return $valido;
}


/**
 * Valida si una respuesta es 's' o 'n'.
 *
 * Esta función verifica si la cadena de texto proporcionada es exactamente 's' o 'n', 
 * lo cual se utiliza comúnmente para respuestas de sí o no.
 *
 * @param string $rta La respuesta a validar.
 * @return bool Retorna `true` si la respuesta es 's' o 'n', `false` en caso contrario.
 */

function validarSioNo(string $rta): bool {
  $valido = true;
  if (!($rta === "s" || $rta === "n")) {
    $valido = false;
    mostrarError ("El valor ingresado $rta no es una opción valida. Por favor, ingrese (s) o (n).");
  }
    return $valido;
  }


  /**
 * Muestra un mensaje de error en la consola con formato destacado.
 *
 * Esta función imprime un mensaje de error en la consola, utilizando códigos ANSI para resaltar el texto 
 * en color rojo y con fondo blanco.
 *
 * @param string $mensajeError El mensaje de error a mostrar.
 * @return void
 */
function mostrarError(string $mensajeError): void {
  echo "\033[1;41m        ERROR        \033[0m $mensajeError\n\n";
}


/**
 * Valida si un dato es un número entero positivo.
 *
 * Esta función verifica si una cadena de texto representa un número entero positivo.
 *
 * @param string $unDato El dato a validar.
 * @return bool Retorna `true` si el dato es un número entero positivo, `false` en caso contrario.
 *
 */ 
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

/**
 * Valida si el usuario desea cancelar una operación durante su ejecución.
 *
 * Esta función arroja una nueva excepción (utilizando la clase base Exception) en caso de que el usuario haya ingresado la palabra 'cancelar'.
 *
 * @param string $entradaDeUsuario
 * 
 * @return void
 */ 
function validarCancelacion(string $entradaDeUsuario): void {
  if (strtolower($entradaDeUsuario) === 'cancelar') {
    throw new Exception("\033[3mOperación cancelada. Regresando al menú principal...\033[0m\n", 91218);
  }
}