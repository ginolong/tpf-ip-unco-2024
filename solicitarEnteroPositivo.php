<?php
/*include "validaciones.php";
$numero = solicitarEnteroPositivo("filas");
var_dump ($numero);*/
/**  Funcion para obtener el numero de filas o columnas*/


function solicitarEnteroPositivo (string $dimension): int {
    echo "Ingrese la cantidad de $dimension de la nueva Matriz" ."\n";
    $datoEntrada = trim(fgets(STDIN));
    $enteroPositivo = 0;
    if (validarEnteroPositivo($datoEntrada)) {
        $enteroPositivo = intval($datoEntrada); //castea//
        //retorno $datoEntrada//
    }
return $enteroPositivo;
}