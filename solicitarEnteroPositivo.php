<?php
/*include "validaciones.php";
$numero = solicitarEnteroPositivo("filas");
var_dump ($numero);*/

/** Funcion para obtener el numero de filas o columnas, validando la entrada con la función `validarEnteroPositivo()` y `validarCancelacion()`
*
*   @param string $dimension
*
*   @return Integer $enteroPositivo
*
*/

function solicitarEnteroPositivo (string $dimension): int {
    echo "Ingrese un \033[32mnúmero\033[0m entero mayor a 0 para la cantidad de \033[32m$dimension\033[0m de la nueva matriz, o escriba \033[33mcancelar\033[37m para volver al menú principal:\n";
    $datoEntrada = trim(fgets(STDIN)); //Integer
    validarCancelacion($datoEntrada); // aseguramos que el usuario no quiera cancelar la operación en curso
    $enteroPositivo = 0;
    if (validarEnteroPositivo($datoEntrada)) {
        $enteroPositivo = intval($datoEntrada); //castea//
        //retorno $datoEntrada//
    }
    return $enteroPositivo;
}