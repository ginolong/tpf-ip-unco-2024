Al llamarse recursivamente sin retornar nada la primera vez, la variable $opcion adquiria el primer valor recibido que fue NULL, por mas que el consecuente llamado recursivo si retorne un valor. Esto ocurria por llamarse recursivamente sin un RETURN.

### Concepto clave: **Recursión y el valor de retorno**

La **recursión** implica que una función se llama a sí misma para resolver un problema. Cada vez que se realiza una llamada recursiva, se crea un **nuevo contexto de ejecución** (o **marco de pila**). Este contexto es independiente del contexto de la función que lo invocó. Una vez que la función recursiva termina su ejecución, se "devuelve" al contexto de la llamada anterior y se continúa desde donde se quedó.

En tu caso, el flujo sería algo como esto:

1. **Primera llamada a `menu()`**: El usuario ingresa un valor no válido.
   - La función muestra el error y se **llama a sí misma**.
2. **Segunda llamada recursiva a `menu()`**: El usuario ahora ingresa un valor válido.
   - En este contexto recursivo, la función retorna el valor válido.
3. **Retorno del valor válido al primer contexto**: Cuando la segunda llamada termina, **devuelve el valor a la primera llamada** (porque la primera llamada a `menu()` aún no ha completado su ejecución).
4. **El problema ocurre porque el valor de `$opcion` no se asigna correctamente**: Si en la primera llamada no haces un retorno explícito de la llamada recursiva (o no manejas correctamente el valor retornado), lo que pasa es que el valor en la pila de ejecución de la primera llamada es **`NULL`**.

### La razón del problema:

El comportamiento que describes tiene que ver con el **flujo de ejecución** en la recursión y cómo los valores son devueltos. En una función recursiva, el valor de retorno de cada llamada se "devuelve" al contexto anterior de la ejecución. Sin embargo, si la función no está **retornando explícitamente** el valor de la llamada recursiva, el valor retornado por la función recursiva no se asigna correctamente al contexto anterior.

1. **Primera llamada a `menu()`** (la llamada inicial):
   - El usuario ingresa una opción inválida.
   - La función se llama a sí misma **sin retornar** nada, solo ejecuta la llamada recursiva.
   - Esto **no asigna un valor a `$opcion`**, por lo que `NULL` se mantiene en `$opcion`.

2. **Segunda llamada a `menu()`** (la llamada recursiva):
   - El usuario ingresa una opción válida.
   - La función retorna el valor válido.
   
   **Pero el valor retornado no llega a la primera llamada** porque no se está manejando correctamente el retorno de la función recursiva. **La primera llamada sigue teniendo el valor `NULL`** y nunca recibe el valor de la segunda llamada recursiva.

### ¿Por qué `NULL` persiste en la primera llamada?

En PHP, cuando una función es llamada recursivamente y no devuelve explícitamente el valor retornado de la llamada recursiva, el valor de retorno de la función original no se actualiza. Es decir:

```php
function menu() {
    $entrada = readline("Seleccione una opción: ");
    if (!is_valid_option($entrada)) {
        echo "Opción no válida. Intenta de nuevo.\n";
        menu();  // Aquí no estamos retornando el valor
    }
    return $entrada;
}
```

En el caso anterior, cuando la función recursiva (`menu()`) es llamada debido a una opción no válida, **el valor retornado no se pasa** de la llamada recursiva a la llamada original, y la primera llamada nunca se completa adecuadamente. Por lo tanto, **el valor final de `$opcion` en la primera llamada será `NULL`**.

### La importancia de **retornar** explícitamente el valor:

Para que el valor de la opción seleccionada se asigne correctamente en la primera llamada, necesitamos asegurarnos de que la **segunda llamada recursiva** retorne su valor a la primera llamada:

```php
function menu() {
    $entrada = readline("Seleccione una opción: ");
    if (!is_valid_option($entrada)) {
        echo "Opción no válida. Intenta de nuevo.\n";
        return menu();  // Aseguramos que el valor retornado de la llamada recursiva sea retornado también en la llamada original
    }
    return $entrada;
}
```

En este caso, la segunda llamada a `menu()` retornará el valor válido, y luego ese valor será **devuelto a la llamada anterior**, lo que significa que la variable `$opcion` en `programaMatrices()` recibirá el valor correcto.

### Respuesta a tu pregunta sobre la "cola de llamadas":

Tu idea de que esto es un comportamiento similar a una "cola de llamadas" es **correcta** en el sentido de que cada llamada recursiva crea un nuevo **contexto** o **marco de ejecución**, y el valor de la última llamada es el que **finalmente se devuelve** cuando todas las llamadas recursivas han terminado.

Sin embargo, el valor retornado por una llamada recursiva debe ser explícitamente manejado y retornado hacia la llamada anterior. Si no lo haces, la primera llamada no recibe el valor correcto y, como resultado, `$opcion` puede terminar siendo `NULL`.

### Resumen:

- En una función recursiva, cada llamada se ejecuta en su propio contexto, y el valor de retorno de la llamada recursiva debe ser **retornado explícitamente** al contexto anterior para que la variable que lo almacena (en tu caso, `$opcion`) reciba el valor correcto.
- Si la llamada recursiva no retorna su valor, el valor de la variable en el contexto original permanece sin cambios (en este caso, `NULL`).
- Asegúrate de que la función recursiva `menu()` siempre retorne el valor de la opción válida para que el valor sea correctamente asignado en el contexto original de la llamada.