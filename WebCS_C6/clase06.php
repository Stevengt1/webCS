<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primer PHP</title>
    <link rel="stylesheet" href="Styles/style2.css">
</head>
<body>
    <?php
    // Agregar un comentario en PHP
    // Manejo de variables
    $nombre = "Carlos";
    $edad = 30;
    $nota = 85.5;
    $aprobado = true;

    // Imprimir variables
    echo "<h1>Hola, $nombre</h1>";
    print("Tu edad es: $edad años<br>");
    echo "<p>";

    // Condicionales
    if ($edad >= 18){
        echo "Eres mayor de edad";
    } else {
        echo "Eres menor de edad";
    }
    echo "</p>";
    ?>
</body>
</html>

<!--
    = asigna valores
    == compara el valor, pero no el tipo
    === compara el valor y el tipo
    != niega una condición
    !== niega una condición y compara el tipo
    . concatenación de cadenas
-->