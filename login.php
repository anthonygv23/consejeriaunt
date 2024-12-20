<?php
session_start();
include 'data.php'; // Archivo para los datos de usuarios

// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el usuario es un docente
    foreach ($usuarios['docentes'] as $docente) {
        if ($docente['correo'] == $correo && $docente['contrasena'] == $contrasena) {
            $_SESSION['userType'] = 'docente';
            $_SESSION['userId'] = $docente['id'];
            header('Location: establecer_horarios.php');
            exit();
        }
    }

    // Verificar si el usuario es un alumno
    foreach ($usuarios['alumnos'] as $alumno) {
        if ($alumno['correo'] == $correo && $alumno['contrasena'] == $contrasena) {
            $_SESSION['userType'] = 'alumno';
            $_SESSION['userId'] = $alumno['id'];
            header('Location: consejeria.php');
            exit();
        }
    }

    // Si las credenciales no son válidas
    $error = "Correo o contraseña incorrectos.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Consejería UNT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Login de Consejería UNT</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required placeholder="Ingrese su correo electrónico (@unitru.edu.pe)">
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required placeholder="Ingrese su contraseña">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>

<!--...............................................-->