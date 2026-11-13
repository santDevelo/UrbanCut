<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Urban Cut</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <!-- Encabezado -->
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

    <img src="./img/Urban Cut Hot Towel Shave.png" class="imagen-principal" alt="Barbería Urban Cut">
    
    <!-- Contenido principal -->
    <main>

        <!-- Bienvenida -->
        <section class="bienvenida">

            <h2>Bienvenido a Urban Cut</h2>

            <p>Tu estilo, a tu manera.</p>



            <p>
                En Urban Cut ofrecemos servicios de barbería
                en un ambiente cómodo y profesional.
                Nuestro objetivo es brindar una buena experiencia
                y ayudarte a encontrar tu mejor estilo.
            </p>

            <a href="servicios.php" class="btn btn-dark">
                Nuestros servicios
            </a>

        </section>

        <!-- Servicios -->
        <section id="servicios" class="servicios">

            <h2>Nuestros servicios</h2>

            <div class="contenedor-servicios">

                <!-- Corte de cabello -->
                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <h5 class="card-title">
                            Corte de cabello
                        </h5>

                        <p class="card-text">
                            Cortes clásicos y modernos
                            adaptados a tu estilo.
                        </p>

                    </div>
                </div>

                <!-- Arreglo de barba -->
                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <h5 class="card-title">
                            Arreglo de barba
                        </h5>

                        <p class="card-text">
                            Perfilado y cuidado de barba
                            para una apariencia impecable.
                        </p>

                    </div>
                </div>

                <!-- Corte y barba -->
                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <h5 class="card-title">
                            Corte y barba
                        </h5>

                        <p class="card-text">
                            Servicio completo de barbería
                            para renovar tu imagen.
                        </p>

                    </div>
                </div>

            </div>

        </section>

    </main>

    <!-- Pie de página -->
    <footer>
        <p>
            © 2026 Urban Cut - Todos los derechos reservados
        </p>
    </footer>

</body>

</html>