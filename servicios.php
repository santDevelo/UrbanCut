<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Urban Cut</title>
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

        <section id="servicios" class="servicios">

            <h2>Nuestros servicios</h2>

            <div class="contenedor-servicios">

                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <h5 class="card-title">
                            Corte de cabello
                        </h5>

                        <p class="card-text">
                            Cortes clásicos y modernos
                            adaptados a tu estilo.
                        </p>

                        <p class="card-text">
                            Duración aproximada: 35 minutos
                        </p>

                        <a href="barberos.php?servicio=1" class="btn btn-dark">
                            Seleccionar servicio
                        </a>

                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <h5 class="card-title">
                            Arreglo de barba
                        </h5>

                        <p class="card-text">
                            Perfilado y cuidado de barba
                            para una apariencia impecable.
                        </p>

                        <p class="card-text">
                            Duración aproximada: 35 minutos
                        </p>

                        <a href="barberos.php?servicio=2" class="btn btn-dark">
                            Seleccionar servicio
                        </a>

                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <h5 class="card-title">
                            Corte y barba
                        </h5>

                        <p class="card-text">
                            Servicio completo de barbería
                            para renovar tu imagen.
                        </p>

                        <p class="card-text">
                            Duración aproximada: 70 minutos
                        </p>

                        <a href="barberos.php?servicio=3" class="btn btn-dark">
                            Seleccionar servicio
                        </a>

                    </div>
                </div>

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