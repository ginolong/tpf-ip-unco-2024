Los **códigos ANSI** (también conocidos como códigos de escape ANSI o secuencias de control ANSI) son utilizados en la terminal (o consola) para aplicar diferentes estilos y colores al texto. Existen varios códigos que te permiten cambiar el color de texto, color de fondo, atributos del texto (negrita, subrayado, etc.), y realizar otras manipulaciones de estilo. A continuación, te detallo algunos de los códigos ANSI más comunes y su funcionamiento.

### 1. **Colores de texto (foreground)**

Los códigos para establecer el color de texto en la terminal suelen ir del `30` al `37` para los colores básicos, y del `90` al `97` para los colores más brillantes (también conocidos como colores de alto brillo). Aquí están los códigos más comunes para los colores de texto:

| Código | Color       |
|--------|-------------|
| `30`   | Negro       |
| `31`   | Rojo        |
| `32`   | Verde       |
| `33`   | Amarillo    |
| `34`   | Azul        |
| `35`   | Magenta     |
| `36`   | Cian        |
| `37`   | Blanco      |
| `90`   | Gris oscuro |
| `91`   | Rojo brillante |
| `92`   | Verde brillante |
| `93`   | Amarillo brillante |
| `94`   | Azul brillante |
| `95`   | Magenta brillante |
| `96`   | Cian brillante |
| `97`   | Blanco brillante |

Ejemplo en PHP:
```php
echo "\033[31mEste texto es rojo\033[0m\n"; // Rojo
echo "\033[32mEste texto es verde\033[0m\n"; // Verde
```

### 2. **Colores de fondo (background)**

Los códigos para establecer el color de fondo van del `40` al `47` para los colores básicos, y del `100` al `107` para los colores más brillantes.

| Código | Color de fondo  |
|--------|-----------------|
| `40`   | Negro          |
| `41`   | Rojo           |
| `42`   | Verde          |
| `43`   | Amarillo       |
| `44`   | Azul           |
| `45`   | Magenta        |
| `46`   | Cian           |
| `47`   | Blanco         |
| `100`  | Gris oscuro    |
| `101`  | Rojo brillante |
| `102`  | Verde brillante |
| `103`  | Amarillo brillante |
| `104`  | Azul brillante |
| `105`  | Magenta brillante |
| `106`  | Cian brillante |
| `107`  | Blanco brillante |

Ejemplo en PHP:
```php
echo "\033[41mEste texto tiene fondo rojo\033[0m\n"; // Fondo rojo
echo "\033[42mEste texto tiene fondo verde\033[0m\n"; // Fondo verde
```

### 3. **Estilos de texto (atributos)**

Existen varios estilos para modificar el texto, como negrita, subrayado, parpadeo, etc. Los códigos son:

| Código | Atributo        |
|--------|-----------------|
| `0`    | Restablecer     |
| `1`    | Negrita         |
| `2`    | Atenuado (opaco)|
| `3`    | Cursiva         |
| `4`    | Subrayado       |
| `5`    | Parpadeo        |
| `7`    | Inverso (cambio de color) |
| `8`    | Ocultar (no visible) |

Ejemplo en PHP:
```php
echo "\033[1mEste texto es en negrita\033[0m\n"; // Negrita
echo "\033[4mEste texto está subrayado\033[0m\n"; // Subrayado
echo "\033[7mEste texto tiene colores invertidos\033[0m\n"; // Colores invertidos
```

### 4. **Combinaciones de colores y estilos**

Puedes combinar diferentes códigos ANSI para aplicar múltiples estilos al mismo tiempo. Por ejemplo, puedes usar un texto en negrita con fondo rojo y texto verde.

Ejemplo:
```php
echo "\033[1;31;42mTexto en negrita, rojo, con fondo verde\033[0m\n"; // Negrita, rojo, fondo verde
```

### 5. **Códigos avanzados (modos de brillo, etc.)**

Algunos terminales también soportan modos de brillo, texto subrayado, parpadeo o cambios en la posición del cursor. Aquí tienes algunos ejemplos adicionales:

| Código | Descripción             |
|--------|-------------------------|
| `22`   | Desactivar negrita      |
| `24`   | Desactivar subrayado    |
| `25`   | Desactivar parpadeo     |
| `27`   | Desactivar inverso      |
| `28`   | Mostrar texto oculto    |
| `29`   | No subrayado            |

### 6. **Restablecer los estilos**

Es fundamental restablecer los estilos al final de tu cadena, para evitar que los estilos afecten al texto posterior. El código `\033[0m` restablece todos los estilos y colores a los valores predeterminados.

Ejemplo:
```php
echo "\033[32mEste texto es verde\033[0m y este es normal.\n";  // Reseteando estilo después del verde
```

### 7. **Texto en el terminal con gradientes (solo en algunos terminales)**

Algunos terminales modernos permiten hacer gradientes de color utilizando secuencias de control. Sin embargo, esto no es compatible con todos los terminales y depende del soporte de tu terminal.

### 8. **Ejemplo completo de uso combinado**

Aquí tienes un ejemplo completo de cómo puedes combinar colores y estilos:

```php
<?php
// Texto rojo, negrita, fondo amarillo
echo "\033[1;31;43mEste es un texto en negrita, color rojo con fondo amarillo\033[0m\n";

// Texto azul, subrayado, fondo blanco
echo "\033[4;34;47mTexto azul subrayado con fondo blanco\033[0m\n";

// Texto en verde brillante, fondo negro
echo "\033[92;40mTexto verde brillante con fondo negro\033[0m\n";

// Texto en magenta con parpadeo
echo "\033[5;35mTexto en magenta con parpadeo\033[0m\n";
?>
```