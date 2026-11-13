<?php
require_once "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"]);
    $apellidos = trim($_POST["apellidos"]);
    $telefono = trim($_POST["telefono"]);
    $correo = trim($_POST["correo"]);
    $contrasena = $_POST["contrasena"];

    // Verificar correo registrado
    $sql = "SELECT * FROM usuarios WHERE correo = :correo";
    $consulta = $conexion->prepare($sql);
    $consulta->execute([
        ":correo" => $correo
    ]);

    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {

        $mensaje = "El correo ya está registrado";

    } else {

        // Obtener rol cliente
        $sql = "SELECT id FROM roles WHERE nombre = 'cliente'";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();

        $rol = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($rol) {

            // Proteger contraseña
            $contrasenaSegura = password_hash($contrasena, PASSWORD_DEFAULT);

            // Registrar cliente
            $sql = "INSERT INTO usuarios
                    (nombre, apellidos, telefono, correo, contrasena, rol_id)
                    VALUES
                    (:nombre, :apellidos, :telefono, :correo, :contrasena, :rol_id)";

            $consulta = $conexion->prepare($sql);

            $consulta->execute([
                ":nombre" => $nombre,
                ":apellidos" => $apellidos,
                ":telefono" => $telefono,
                ":correo" => $correo,
                ":contrasena" => $contrasenaSegura,
                ":rol_id" => $rol["id"]
            ]);

            header("Location: login.php");
            exit();

        } else {
            $mensaje = "No existe el rol cliente";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registro - Urban Cut</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <!-- Encabezado -->
    <header>

        <h1>Urban Cut</h1>

        <nav>
            <a href="index.php">Inicio</a>
            <a href="index.php#servicios">Servicios</a>
            <a href="registro.php">Registrarse</a>
            <a href="login.php">Iniciar sesión</a>
        </nav>

    </header>

    <!-- Registro -->
    <main>

        <section class="registro">

            <div class="card shadow">

                <div class="card-header bg-white">

                    <h4 class="mb-0">
                        Registro de clientes
                    </h4>

                </div>

                <div class="card-body">

                    <?php if ($mensaje != ""): ?>

                        <p class="text-danger">
                            <?= htmlspecialchars($mensaje) ?>
                        </p>

                    <?php endif; ?>

                    <form method="POST" id="formularioRegistro">

                        <!-- Nombre -->
                        <div class="mb-3">

                            <label class="form-label">
                                Nombre
                            </label>

                            <input type="text"
                                   name="nombre"
                                   class="form-control"
                                   placeholder="Ingrese su nombre"
                                   maxlength="80"
                                   required>

                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3">

                            <label class="form-label">
                                Apellidos
                            </label>

                            <input type="text"
                                   name="apellidos"
                                   class="form-control"
                                   placeholder="Ingrese sus apellidos"
                                   maxlength="100"
                                   required>

                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3">

                            <label class="form-label">
                                Teléfono
                            </label>

                            <input type="tel"
                                   name="telefono"
                                   id="telefono"
                                   class="form-control"
                                   placeholder="Ingrese su teléfono"
                                   maxlength="25"
                                   required>

                        </div>

                        <!-- Correo -->
                        <div class="mb-3">

                            <label class="form-label">
                                Correo electrónico
                            </label>

                            <input type="email"
                                   name="correo"
                                   class="form-control"
                                   placeholder="Ingrese su correo"
                                   maxlength="150"
                                   required>

                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">

                            <label class="form-label">
                                Contraseña
                            </label>

                            <input type="password"
                                   name="contrasena"
                                   id="contrasena"
                                   class="form-control"
                                   placeholder="Ingrese su contraseña"
                                   required>

                        </div>

                        <!-- Confirmar contraseña -->
                        <div class="mb-3">

                            <label class="form-label">
                                Confirmar contraseña
                            </label>

                            <input type="password"
                                   name="confirmarContrasena"
                                   id="confirmarContrasena"
                                   class="form-control"
                                   placeholder="Confirme su contraseña"
                                   required>

                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">

                            <a href="index.php"
                               class="btn btn-secondary">
                                Regresar
                            </a>

                            <button type="submit"
                                    class="btn btn-dark">
                                Registrarse
                            </button>

                        </div>

                    </form>

                    <p class="text-center mt-3">
                        ¿Ya tienes una cuenta?
                        <a href="login.php">
                            Iniciar sesión
                        </a>
                    </p>

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

    <!-- JavaScript -->
    <script src="js/app.js"></script>

</body>

</html>