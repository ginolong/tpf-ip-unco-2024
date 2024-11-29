Puedes ser más específico con el tipo de datos que contiene un array al documentar una función en PHP. En lugar de simplemente usar `mixed`, puedes definir qué tipo de datos se espera que contenga el array. Esto hace que tu documentación sea más clara y útil para otros desarrolladores (o para ti mismo en el futuro).

Aquí tienes un ejemplo de cómo documentar una función que devuelve un array de enteros:

```php
/**
 * Obtiene una colección de matrices de enteros.
 *
 * Esta función no recibe ningún parámetro y devuelve una colección de matrices, 
 * donde cada matriz contiene enteros.
 *
 * @return int[][] La colección de matrices de enteros.
 */
function obtenerColeccionMatrices(): array {
  // Implementación de la función
  return [[1, 2, 3], [4, 5, 6]];
}
```

### Explicación:

- **`int[][]`**: Utilizamos esta notación para indicar que el array devuelto es un array de arrays de enteros. Este tipo de detalle ayuda a clarificar exactamente qué tipo de estructura de datos se espera.

Si necesitas especificar arrays de otros tipos, puedes hacerlo de manera similar. Aquí tienes algunos ejemplos más:

- **Array de cadenas**:
  ```php
  /**
   * @return string[] Un array de cadenas.
   */
  ```

- **Array de objetos**:
  ```php
  /**
   * @return MyClass[] Un array de objetos de la clase MyClass.
   */
  ```

- **Array asociativo**:
  ```php
  /**
   * @return array<string, int> Un array asociativo con claves de tipo string y valores de tipo int.
   */
  ```