<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primer PHP</title>
    <link rel="stylesheet" href="../Styles/style2.css">
</head>
<body>
    <?php
    // Agregar un comentario en PHP
    // Manejo de variables
    $nombre = "Carlos";
    $edad = 30;
    $nota1 = 85.5;
    $nota2 = 60.4;
    $nota3 = 70.8;
    $nota4 = 40.3;

    $aprobado = true;

    // Imprimir
    echo "<header>";
    echo "<h1>Hola, $nombre</h1>";
    print("Tu edad es: $edad años<br>");
    echo "</header>";
    echo "<section> <p>";

    // Condicionales
    if ($edad >= 18){
        echo "Eres mayor de edad";
    } else {
        echo "Eres menor de edad";
    }
    echo "</p></section>";

    // Operadores aritméticos
    $suma = 0;
    $arr_notas = array($nota1, $nota2, $nota3, $nota4);
    for( $i = 0; $i < count($arr_notas); $i++) {
        $suma += $arr_notas[$i];
    }
    $promedio = 0;
    $promedio = $suma / count($arr_notas);

    if ($promedio < 70) {
        $aprobado = false;
    }
    echo "<section>";
    echo "<p>Tu promedio es: $promedio</p>";
    if ($aprobado) {
        echo "<p>¡Felicidades, has aprobado!</p>";
    } else {
        echo "<p>Lo siento, no has aprobado.</p>";
    }
    echo "</section>";

    echo "<section>";
    switch ($promedio){
        case $promedio >= 90:
            echo "<p>Excelente trabajo, $nombre. Tu promedio es A.</p>";
            break;
        case $promedio >= 80:
            echo "<p>Buen trabajo, $nombre. Tu promedio es B.</p>";
            break;
        case $promedio >= 70:
            echo "<p>Buen esfuerzo, $nombre. Tu promedio es C.</p>";
            break;
        default:
            echo "<p>Necesitas mejorar, $nombre. Tu promedio es D.</p>";
            break;
    }
    echo "</section>";
    $contador = 0;
    echo "<h2>Notas</h2>";
    echo "<section>";
    foreach ($arr_notas as $nota) {
        $contador ++;
        if ($nota >= 70) {
            echo "<p>Nota $contador aprobada: $nota</p>";
        } else {
            echo "<p>Nota $contador reprobada: $nota</p>";
        }
    }
    echo "</section>";
    echo "<h2>Operadores lógicos</h2>";
    echo "<section>";
    if( $nota1 >= 70 && $nota2 >= 70 && $nota3 >= 70 && $nota4 >= 70) {
        echo "<p>¡Felicidades! Todas tus notas son aprobadas.</p>";
    } else {
        echo "<p>Algunas de tus notas son reprobada.</p>";
    }
    echo "</section>";
    echo "<section>";
    if($nota1 < 70 || $nota2 < 70 || $nota3 < 70 || $nota4 < 70) {
        echo "<p>Al menos una de tus notas está reprobada (menor a 70).</p>";
    } else {
        echo "<p>¡Felicidades! Todas tus notas son aprobadas.</p>";
    }
    echo "</section>";

    echo "<section>";
    if(!$aprobado) {
        echo "<p>Lo siento. Debes repetir el curso</p>";
    } else {
        echo "<p>¡Felicidades! Te veo en el siguiente curso</p>";
    }
    echo "</section>";
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