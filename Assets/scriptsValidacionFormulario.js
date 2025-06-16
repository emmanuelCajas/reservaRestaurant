
 //Garantiza que el código se ejecuta cuando el DOM esté completamente cargado
 $(document).ready(function() {
     // Manejar el evento de envío del formulario
     $("#formularioAltaUsuario").submit(function(e) {
         e.preventDefault();  // Evitar el envío tradicional antes de validar el formulario

         // Limpiar mensajes de error previos
         $(".error").remove();

         // Obtener los valores de los campos, eliminando espacios al principio y al final
         let nombre = $("#nombre").val().trim();
         let email = $("#email").val().trim();
         let telefono = $("#telefono").val().trim();
         let password = $("#password").val();
         let confirmarClave = $("#confirmarClave").val();

         let valido = true;  // Bandera para verificar la validez

         // Validación de cada campo

         // Validación de 'Nombre'
         if (!nombre) {
            // Agrega un mensaje de error justo después del campo de entrada
            $("#nombre").after('<span class="error">El campo "Nombre" es obligatorio.</span>');
             valido = false; //cambia la bandera a false
         }

         // Validación de 'Email'
         let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
         if (!email || !emailRegex.test(email)) {
             $("#email").after('<span class="error">Por favor, ingrese un email válido.</span>');
             valido = false;
         }

         // Validación de 'Teléfono'
         let telefonoRegex = /^\+?\d{1,3}?[-.\s]?\(?\d{1,4}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}$/;
         if (!telefono || !telefonoRegex.test(telefono)) {
             $("#telefono").after('<span class="error">Por favor, ingrese un teléfono válido.</span>');
             valido = false;
         }

         // Validación de 'Contraseña'
         if (!password) {
             $("#password").after('<span class="error">El campo "Contraseña" es obligatorio.</span>');
             valido = false;
         }
         
         if (password.length < 6) {
             $("#password").after('<span class="error">La contraseña debe tener al menos 6 caracteres.</span>');
             valido = false;
         }

         // Validación de 'Confirmar Contraseña'
         if (password !== confirmarClave) {
             $("#confirmarClave").after('<span class="error">Las contraseñas no coinciden.</span>');
             valido = false;
         }

         // Si todas las validaciones son correctas , se envia el formulario
         if(valido) {
            alert("Formulario validado correctamente"); //Muestra un mensaje de confirmacion de que se ha enviado
            this.submit(); // envia el formulario
         }
     });
 });