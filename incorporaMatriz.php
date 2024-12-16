<?php
// Datos y llamadas para pruebas de modulo:
/*$coleccion  = [[[1, 2, 34], [2, 34, 2], [34, 2, 15]], [[0, 2, 61], [2, 0, 2], [25, 2, 7], [1, 2, 40]], [[0, 2, 20, 61], [2, 0, 2, 13], [25, 2, 7, 7], [1, 2, 9, 11]]];
$cantFilas = 3;
$cantColumnas = 4;
$coleccion = incorporaMatriz ($coleccion, $cantFilas, $cantColumnas);
print_r ($coleccion);*/


/**
 * Incorpora una nueva matriz con valores random entre 0 y 100, a la colección de matrices ($unaColeccion).
 *
 * Recibe como parámetro una colección de matrices y le agrega una nueva matriz NxM con valores random entre 0 y 100
 * 
 * También recibe como parámetro la cantidad de filas (N) y de columnas (M) de la nueva matriz
 * 
 * @param array $unaColeccion
 * 
 * @param int $cantFilas 
 * 
 * @param int $cantColumnas
 * 
 * @return array 
 * 
 */
function incorporaMatriz(array $unaColeccion, int $cantFilas, int $cantColumnas): array {
    $nuevaMatriz = []; // ARRAY 2D inicializamos la nueva matriz vacia//
    for ($i = 0; $i < $cantFilas; $i++) {
      for ($j = 0; $j < $cantColumnas; $j++) {
        $nuevaMatriz[$i][$j] = rand(0, 100); //agregamos un numero random entre 0 y 100 a cada celda de la nueva matriz//
      }
    }
    array_push($unaColeccion, $nuevaMatriz); //agrego la nueva matriz a la coleccion de matrices// 
    return $unaColeccion; //devuelvo la coleccion modificada//
  }
