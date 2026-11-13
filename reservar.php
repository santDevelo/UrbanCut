<?php
session_start();

$servicio = isset($_GET["servicio"]) ? (int) $_GET["servicio"] : 0;
$barbero = isset($_GET["barbero"]) ? (int) $_GET["barbero"] : 0;

$servicios = [
    1 => "Corte de cabello",
    2 => "Arreglo de barba",
    3 => "Corte y barba"
];

$barberos = [
    1 => "Santiago Berrocal",
    2 => "Sebastián Fung",
    3 => "Sebastián Matamoros"
];

if (!isset($servicios[$servicio]) || !isset($barberos[$barbero])) {
    header("Location: servicios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservar cita - Urban Cut</title>

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

        <section class="registro">

            <div class="card shadow">

                <div class="card-header bg-white">

                    <h4 class="mb-0">
                        Reservar cita
                    </h4>

                </div>

                <div class="card-body">

                    <p>
                        <strong>Servicio:</strong>
                        <?= htmlspecialchars($servicios[$servicio]) ?>
                    </p>

                    <p>
                        <strong>Barbero:</strong>
                        <?= htmlspecialchars($barberos[$barbero]) ?>
                    </p>

                    <form id="formularioReserva">

                        <div class="mb-3">

                            <label class="form-label" for="fecha">
                                Fecha de la cita
                            </label>

                            <input type="date"
                                   id="fecha"
                                   class="form-control"
                                   min="<?= date('Y-m-d') ?>"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label" for="hora">
                                Horario disponible
                            </label>

                            <select id="hora"
                                    class="form-control"
                                    required>

                                <option value="">
                                    Seleccione un horario
                                </option>

                                <option value="08:00">8:00 a.m.</option>
                                <option value="09:00">9:00 a.m.</option>
                                <option value="10:00">10:00 a.m.</option>
                                <option value="11:00">11:00 a.m.</option>
                                <option value="13:00">1:00 p.m.</option>
                                <option value="14:00">2:00 p.m.</option>
                                <option value="15:00">3:00 p.m.</option>
                                <option value="16:00">4:00 p.m.</option>

                            </select>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="barberos.php?servicio=<?= $servicio ?>"
                               class="btn btn-secondary">
                                Regresar
                            </a>

                            <button type="submit"
                                    class="btn btn-dark">
                                Confirmar reservación
                            </button>

                        </div>

                    </form>

                    <div id="mensajeReserva"
                         class="alert alert-success mt-3"
                         style="display: none;">

                        <h5>
                            Reservación simulada correctamente
                        </h5>

                        <p>
                            <strong>Servicio:</strong>
                            <?= htmlspecialchars($servicios[$servicio]) ?>
                        </p>

                        <p>
                            <strong>Barbero:</strong>
                            <?= htmlspecialchars($barberos[$barbero]) ?>
                        </p>

                        <p>
                            <strong>Fecha:</strong>
                            <span id="fechaSeleccionada"></span>
                        </p>

                        <p>
                            <strong>Hora:</strong>
                            <span id="horaSeleccionada"></span>
                        </p>

                        <p class="mb-0">
                            Esta reservación es una demostración y todavía
                            no se ha guardado en el sistema.
                        </p>

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

    <script>
        document.getElementById("formularioReserva").addEventListener("submit", function(event) {
            event.preventDefault();

            let fecha = document.getElementById("fecha").value;
            let hora = document.getElementById("hora");
            let horario = hora.options[hora.selectedIndex].text;

            document.getElementById("fechaSeleccionada").textContent = fecha;
            document.getElementById("horaSeleccionada").textContent = horario;

            document.getElementById("mensajeReserva").style.display = "block";
        });

        document.getElementById("fecha").addEventListener("change", function() {
            document.getElementById("mensajeReserva").style.display = "none";
        });

        document.getElementById("hora").addEventListener("change", function() {
            document.getElementById("mensajeReserva").style.display = "none";
        });
    </script>

</body>

</html>