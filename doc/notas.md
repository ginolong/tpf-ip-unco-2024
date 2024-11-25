 ** Funciones mínimas a desarrollar:

  a) una función que muestre en pantalla las opciones del menú, solicite un número
  válido (si no lo es tiene que volver a pedirlo) y retorne el valor de la opción
  seleccionada.

   Menú de opciones que se mostrará en pantalla:
 1) Mostrar cantidad de matrices del programa
 2) Mostrar una matriz
 3) Ingresar una matriz NxM
 4) Mostrar una matriz en números Romanos
 5) Mostrar el resumen de una matriz
 6) salir

Ideas:
  Array opciones[] para los 6 numeros del menu (tambien puede ser un if que sea >0  y <6)

  Un echo de opciones
  Un if que controla el STDIN de 1 a 6 (con included en array o < y >)
  la funcion solo retorna el valor seleccionado

  otra funcion se encarga de llamar a las correspondientes funciones?
  la opcion 6 tira die() al script
