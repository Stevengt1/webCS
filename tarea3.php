
<?php
session_start();
require_once("tarea3_conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST['name'];
  $fecha = $_POST['date'];
  $cantidadP = $_POST['amount'];
  $contra = $_POST['password'];

  $hash = password_hash($contra, PASSWORD_DEFAULT);
  $stmt = $mysqli->prepare("INSERT INTO tabla_reservaciones (nombre_cliente, fecha, num_personas, clave) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $nombre, $fecha, $cantidadP, $hash);
  if ($stmt->execute()) {
    $mensaje = "<div class='alert alert-success mt-3'>¡La reserva se ha hecho exitosamente! Gracias por su preferencia.</div>";
  } else {
    $mensaje = "<div class='alert alert-danger mt-3'>Ocurrió un error al realizar la reserva.</div>";
  }
  $stmt->close();
  $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 viewport-fit=cover">
  <title>Pizza Buono </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"></script>
  <link rel="stylesheet" href="Styles/TareaStyles/tarea2Styles.css" type="text/css">
  <script src="./JavaScript/Tareas/tarea2.js"></script>
</head>

<body>
  <div class="content">
    <header>
      <nav class="navbar navbar-expand-lg bg-primary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                </ul>
              </div>
          </div>
      </nav>
    </header>
    <main>
        <div class="card">
          <?php if (!empty($mensaje)) echo $mensaje; ?>
          <form id="formulario" class="card-body" method="POST">
            <div class="mb-2">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Pepe" required>
            </div>
            <div class="mb-2">
              <label for="date" class="form-label">Fecha</label>
              <input type="date" id="date" name="date" class="form-control" required>
            </div>
            <div class="mb-2">
              <label for="amount" class="form-label">Cantidad de personas</label>
              <input type="number" id="amount" name="amount" class="form-control" placeholder="5" required>
            </div>
            <div class="mb-2">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-secondary">Limpiar</button>
        </form>
        </div>
    </main>
    <footer>
      <div class="text-center bg-primary text-white">
        <p>&copy; 2023 Pizza Buono. All rights reserved.</p>
      </div>
    </footer>
    </div>
</body>

</html>