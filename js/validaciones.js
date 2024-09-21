document.addEventListener("DOMContentLoaded", function () {
    const registroForm = document.getElementById("registroForm");

    registroForm.addEventListener("submit", function (event) {
        const identificacion = document.getElementById("identificacion");
        const nombre = document.getElementById("nombre");
        const apellido = document.getElementById("apellido");
        const email = document.getElementById("email");
        const usuario = document.getElementById("usuario");
        const contraseña = document.getElementById("contraseña");
        const confirmarContraseña = document.getElementById("confirmar_contraseña");
        const tipoUsuario = document.getElementById("tipo_usuario");

        let error = false;

        const errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach(function (message) {
            message.remove();
        });

        function showError(input, message) {
            const errorSpan = document.createElement("span");
            errorSpan.classList.add("error-message");
            errorSpan.style.color = "red";
            errorSpan.textContent = message;
            input.parentNode.insertBefore(errorSpan, input.nextSibling);
        }

        if (!/^\d+$/.test(identificacion.value)) {
            showError(identificacion, "La identificación debe contener solo números.");
            error = true;
        }

        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email.value)) {
            showError(email, "El correo electrónico no es válido.");
            error = true;
        }

        if (contraseña.value !== confirmarContraseña.value) {
            showError(confirmarContraseña, "Las contraseñas no coinciden.");
            error = true;
        }

        if (!/^(?=.*[a-zA-Z])(?=.*\d)[A-Za-z\d]{8,12}$/.test(contraseña.value)) {
            showError(contraseña, "La contraseña debe tener entre 8 y 12 caracteres, e incluir letras y números.");
            error = true;
        }

        if (error) {
            event.preventDefault(); 
        }
    });
});
