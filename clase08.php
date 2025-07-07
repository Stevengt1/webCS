<?php
session_start();

require_once("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'];
    $fecha_nam = $_POST['fechanam'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['pass_confirm'];

    // Validar datos
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<div class='alert alert-danger'>Correo electrónico inválido</div>";
    } elseif($password !== $confirm){
        echo "<div class='alert alert-danger'>Contraseñas no coinciden.</div>";
    }else {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;

        $stmt = $mysqli->prepare("insert into usuarios (Nombre,Email,Fecha_Nacimiento,Contrasenia) Values(?,?,?,?)"); //Para evitar inyeccion de SQL, se agrega ? dentro del () de Values
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        /* 
        s= string
        i = integer
        d = double
        b = blob (binario)
        */
        $stmt->bind_param("ssss", $nombre, $email, $fecha_nam, $password);
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-lg w-100" style="max-width: 400px">
            <h3 class="card-title text-center mb-4">Información de usuario</h3>
            <form>
                <div class=input-group mb-3">
                    <label class="form-label" for="nombre" required>Nombre Completo </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Pedro">
                </div>
                <div class=input-group mb-3">
                    <label class="form-label" for="fechanam" required>Fecha Nacimiento </label>
                    <input type="date" class="form-control" id="fechanam" name="fecha">
                </div>
                <div class=input-group mb-3">
                    <label class="form-label" for="email" required>Correo electrónico </label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class=input-group mb-3">
                    <label class="form-label" for="password" required>Contraseña </label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class=input-group mb-3">
                    <label class="form-label" for="pass_confirm" required>Confirmar Contraseña </label>
                    <input type="password" class="form-control" id="pass_confirm" name="nombre">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </form>
        </div>

        <!-- ID: cliente(CSS, JS) Name para el server(PHP)-->
    </div>
</body>
</html>