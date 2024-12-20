<?php
// Datos y llamadas para pruebas de modulo:
$unaMatriz  = [[23,50,55,47,7,91,86,22,34,15,27,56,31,99,32],[23,38,93,99,23,27,12,22,84,10,89,58,48,86,88],[73,78,47,53,30,46,11,68,15,50,98,100,10,23,100],[24,44,70,97,84,25,9,35,79,79,46,24,53,98,56],[100,72,33,7,64,47,27,99,91,5,9,43,82,71,84],[74,61,40,92,3,16,25,9,7,55,59,55,71,82,2],[43,63,76,94,98,84,79,40,41,46,50,12,69,30,24],[42,28,85,13,69,22,1,91,60,47,55,5,17,78,7],[57,35,28,88,81,85,91,53,74,10,71,18,23,12,43],[83,40,95,32,19,87,54,40,83,92,95,37,77,35,38],[23,46,5,11,93,41,4,96,91,2,11,98,16,37,71],[47,37,9,22,72,85,36,35,51,0,3,70,4,84,89],[18,18,24,17,59,61,76,25,69,90,32,62,31,8,83],[13,85,71,10,63,43,85,79,81,45,31,12,63,53,28],[92,99,60,72,66,94,27,76,22,33,21,47,99,0,49]];
$cantFilas = 3;
$cantColumnas = 4;
$unaMatriz = array_map(function($fila) { return array_map(function() { return 1; }, $fila); }, $unaMatriz);
//print_r ($unaMatriz);
//$matriz = resumenMatriz ($unaMatriz);
$matriz3 = resumenMatriz ($unaMatriz);
//print_r ($matriz);
print_r ($matriz3);



/**
 * Esta función calcula y devuelve un resumen de una matriz dada.
 *
 * @param array $unaMatriz La matriz de entrada que se resumirá.
 *
 * @return array Un array asociativo que contiene las siguientes claves:
 *               - 'dimension1': El número de filas en la matriz.
 *               - 'dimension2': El número de columnas en la matriz.
 *               - 'suma': La suma de todos los elementos de la matriz.
 *               - 'promedio': El promedio de todos los elementos de la matriz.
 *               - 'cuadrada': Una cadena que indica si la matriz es cuadrada ('si') o no ('no').
 *               - 'simetrica': Una cadena que indica si la matriz es simétrica ('si') o no ('no').
 *                 Nota: La simetría solo se verifica si la matriz es cuadrada.
 */
function resumenMatriz(array $unaMatriz): array { 
    $matrizResumen = []; //ARRAY 2D
    $fila = count($unaMatriz); //Integer - Obtiene la cantidad de filas de la matriz//
    $columna = count($unaMatriz[0]); //Integer - Obtiene la cantidad de columnas de la matriz//
    $suma = array_sum(array_map('array_sum', $unaMatriz)); //Integer
    $promedio = round($suma / ($fila * $columna),2); //Float - Calcula el promedio y redondea a 2 decimales//
    $cuadrada = ($fila == $columna) ? true : false; // Boolean
    $simetrica = true; // Boolean
    if ($cuadrada) {
        for ($i = 0; $i < $fila && $simetrica; $i++) { // Elegimos for en vez de while por que conocemos de entrada la cantidad maxima de iteraciones posibles, y por que combina inicialización, condición y actualización, lo que lo hace más fácil de leer.
            for ($j = $i+1; $j < $columna && $simetrica; $j++) { // utilizamos $simetrica como boolean para optimizar la comparación lógica
                    if ($unaMatriz[$i][$j] != $unaMatriz[$j][$i]) { //compara los índices invertidos para ver si es simétrica//
                        $simetrica = false;
                    }    
            }
        }
    } else {
        $simetrica = false;
    }
    $matrizResumen = [
        'dimension1' => $fila,    // INT
        'dimension2' => $columna, // INT
        'suma' => $suma,          // INT
        'promedio' => $promedio,  // FLOAT
        'cuadrada' => $cuadrada ? 'si' : 'no',  // STRING
        'simetrica' => $simetrica ? 'si' : 'no' // STRING
    ];
    return $matrizResumen;
}
