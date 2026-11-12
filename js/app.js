
document.addEventListener("DOMContentLoaded", function () {

    let formulario = document.getElementById("formularioRegistro");

    if (formulario) {

        formulario.addEventListener("submit", function (event) {

            let telefono = document.getElementById("telefono").value.trim();
            let contrasena = document.getElementById("contrasena").value;
            let confirmarContrasena = document.getElementById("confirmarContrasena").value;

            if (telefono.length != 8 || !/^[0-9]{8}$/.test(telefono)) {

                alert("El teléfono debe contener exactamente 8 números");
                event.preventDefault();

            } else if (contrasena.length < 8) {

                alert("La contraseña debe tener al menos 8 caracteres");
                event.preventDefault();

            } else if (contrasena != confirmarContrasena) {

                alert("Las contraseñas no coinciden");
                event.preventDefault();

            }

        });

    }

});
