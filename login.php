
<?php
session_start();

require_once "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST["correo"]);
    $contrasena = $_POST["contrasena"];

    // Buscar usuario por correo
    $sql = "SELECT * FROM usuarios WHERE correo = :correo";
    $consulta = $conexion->prepare($sql);

    $consulta->execute([
        ":correo" => $correo
    ]);

    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    // Verificar contraseña
    if ($usuario && password_verify($contrasena, $usuario["contrasena"])) {

        session_regenerate_id(true);

        $_SESSION["id_usuario"] = $usuario["id"];
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["rol_id"] = $usuario["rol_id"];

        header("Location: index.php");
        exit();

    } else {

        $mensaje = "Correo o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión - Urban Cut</title>

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

    <!-- Inicio de sesión -->
    <main>

        <section class="login">

            <div class="card shadow">

                <div class="card-header bg-white">

                    <h4 class="mb-0">
                        Iniciar sesión
                    </h4>

                </div>

                <div class="card-body">

                    <?php if ($mensaje != ""): ?>

                        <p class="text-danger">
                            <?= htmlspecialchars($mensaje) ?>
                        </p>

                    <?php endif; ?>

                    <form method="POST" id="formularioLogin">

                        <!-- Correo -->
                        <div class="mb-3">

                            <label class="form-label">
                                Correo electrónico
                            </label>

                            <input type="email"
                                   name="correo"
                                   id="correoLogin"
                                   class="form-control"
                                   placeholder="Ingrese su correo"
                                   required>

                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">

                            <label class="form-label">
                                Contraseña
                            </label>

                            <input type="password"
                                   name="contrasena"
                                   id="contrasenaLogin"
                                   class="form-control"
                                   placeholder="Ingrese su contraseña"
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
                                Iniciar sesión
                            </button>

                        </div>

                    </form>

                    <p class="text-center mt-3">
                        ¿No tienes una cuenta?
                        <a href="registro.php">
                            Registrarse
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
