<?php

/** ACTUALMENTE NO HACE ESTO
 * recibe un mensaje de error como parametro, recibe como parametro la funcion de donde se llama
 * muestra el mensaje de error por consola
 * devuleve a la funcion de donde fue llamado
 */

  function mostrarError($mensajeError) {
    echo "\033[1;41m        ERROR: $mensajeError\033[0m\n\n";
  }