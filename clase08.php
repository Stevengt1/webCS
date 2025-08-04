<?php
session_start();

require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $fecha_nam = $_POST['fechanam'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['pass_confirm'];

    //Validar datos
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger'>Correo invalido</div>";
    } elseif ($password !== $confirm) {
        echo "<div class='alert alert-danger'>Contraseñas no coinciden</div>";
    } else {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['fecha_nam'] = $fecha_nam;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        print_r($_SESSION); DIE;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <title>Formulario con post</title>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-lg w-100" style="max-width: 400px">
            <h3 class="card-title text-center mb-4">Información de usuario</h3>
            <form id="registro" method="post">
                <div class=" mb-3">
                    <label class="form-label" for="nombre">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class=" mb-3">
                    <label class="form-label" for="fechanam">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="fechanam" name="fechanam" required>
                </div>
                <div class=" mb-3">
                    <label class="form-label" for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class=" mb-3">
                    <label class="form-label" for="password">Contraeña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class=" mb-3">
                    <label class="form-label" for="pass_confirm">Confirmar contraseña:</label>
                    <input type="password" class="form-control" id="pass_confirm" name="pass_confirm" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </form>
        </div>

</body>

</html>
<!-- El ID se usa para metodos de CSS o JS para alguna función o buscar algún dato (trabaja del lado del cliente) mientras que 
  Name trabaja para el server(PHP)-->
<!-- El GET muestra la información en el link mientras que el POST va oculto en el mensaje. 
 PD: el POST ejecuta una carga despues de un evento-->
<!-- Es obligatorio poner name a nuestros controles para poder identificar y enviar datos al servidor -->