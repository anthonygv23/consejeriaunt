<?php
session_start();
include 'data.php'; // Archivo para los datos de usuarios

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}

// Obtener el tipo de usuario
$userType = $_SESSION['userType'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Consejeria</title>
    <style>
        body {
            font-size: 15px; /* Cambiar este valor según el tamaño que se desee */
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #007bff; /* Color de fondo de la barra de navegación */
            display: flex;
            justify-content: space-between;
            padding: 13px;
            width: 100%; /* Ocupa todo el ancho de la pantalla */
            box-sizing: border-box; /* Incluye el padding en el ancho total */
        }
        .navbar a {
            color: white;
            text-align: center;
            padding: 5px 15px;
            text-decoration: none;
            font-size: 17px;
        }
        .navbar a:hover {
            background-color: #0056b3;
            color: white;
        }
        .navbar-left, .navbar-center, .navbar-right {
            display: flex;
            align-items: center;
        }
        .navbar-center {
            flex: 1;
            justify-content: center;
        }
        .navbar-right {
            justify-content: flex-end;
        }
    </style>
</head>
<body>
<nav class="navbar">

    <div class="navbar-left">
        <a class="nav-link" href="principal.php">
            <img src="img/UNT3.jpg" alt="Botón Principal" style="height: 50px;">
        </a>
        <div class="navbar-left">
        <a class="nav-link" href="principal.php">INICIO</a>
    </div>
    </div>
    <div class="navbar-left">
        <?php if ($userType === 'alumno'): ?>
            <a class="nav-link" href="consejeria.php">CONSEJERIA</a>
            <a class="nav-link" href="citas_pendientes.php">CITAS PENDIENTES</a>
        <?php elseif ($userType === 'docente'): ?>
            <a class="nav-link" href="horarios.php">HORARIOS</a>
            <a class="nav-link" href="ver_citas.php">VER CITAS</a>
            <a class="nav-link" href=""></a>
        <?php endif; ?>
    </div>
    <div class="navbar-center">
        <a class="nav-link" href="usuario.php">USUARIO</a>
    </div>
    <div class="navbar-right">
        <a class="nav-link" href="logout.php">CERRAR</a>
    </div>
</nav>

</body>
</html>

<!--...............................................-->