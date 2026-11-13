<?php
session_start();

$servicio = isset($_GET["servicio"]) ? (int) $_GET["servicio"] : 0;

if ($servicio < 1 || $servicio > 3) {
    header("Location: servicios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barberos - Urban Cut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <header>
        <h1>Urban Cut</h1>

        <nav>
            <a href="index.php">Inicio</a>
            <a href="servicios.php">Servicios</a>

            <?php if (isset($_SESSION["id_usuario"])): ?>

                <div class="usuario-sesion">
                    <p class="bienvenida-usuario">
                        Bienvenido, <?= htmlspecialchars($_SESSION["nombre"]) ?>
                    </p>

                    <a href="logout.php">Cerrar sesión</a>
                </div>

            <?php else: ?>

                <a href="registro.php">Registrarse</a>
                <a href="login.php">Iniciar sesión</a>

            <?php endif; ?>
        </nav>
    </header>

    <main>

        <section class="servicios">

            <h2>Selecciona tu barbero</h2>

            <p class="text-center">
                Escoge el barbero con el que deseas reservar tu cita.
            </p>

            <div class="contenedor-servicios">

                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <h5 class="card-title">
                            Santiago Berrocal
                        </h5>

                        <p class="card-text">
                            Especialista en cortes clásicos
                            y modernos.
                        </p>

                        <a href="reservar.php?servicio=<?= $servicio ?>&barbero=1" class="btn btn-dark">
                            Seleccionar barbero
                        </a>

                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <h5 class="card-title">
                            Sebastian Fung
                        </h5>

                        <p class="card-text">
                            Especialista en arreglo y
                            cuidado de barba.
                        </p>

                        <a href="reservar.php?servicio=<?= $servicio ?>&barbero=2" class="btn btn-dark">
                            Seleccionar barbero
                        </a>

                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <h5 class="card-title">
                            Sebastian Matamoros
                        </h5>

                        <p class="card-text">
                            Especialista en cortes modernos
                            y estilos personalizados.
                        </p>

                        <a href="reservar.php?servicio=<?= $servicio ?>&barbero=3" class="btn btn-dark">
                            Seleccionar barbero
                        </a>

                    </div>
                </div>

            </div>

            <div class="text-center mt-4">

                <a href="servicios.php" class="btn btn-secondary">
                    Regresar
                </a>

            </div>

        </section>

    </main>

    <footer>
        <p>
            © 2026 Urban Cut - Todos los derechos reservados
        </p>
    </footer>

</body>

</html>