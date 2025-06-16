<?php
require_once 'Modelos/Usuario.php';

class UsuarioController {
    public function mostrarFormulario() {
        include 'Vistas/registro.php';
    }

    public function registrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = new Usuario();
            $usuario->nombre = $_POST['Nombre'];
            $usuario->email = $_POST['email'];
            $usuario->telefono = $_POST['telefono'];
            $usuario->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($usuario->guardar()) {
                include 'Vistas/registroSatisfactorio.php';
            } else {

                // include 'Vistas/Includes/header.html';

                // echo "
                //     <body class='d-flex flex-column min-vh-100'>
                //         <div class='container text-center flex-fill mensajes'>
                //             <h2 class='alert alert-danger'>Error al registrar el usuario. El correo ya está registrado.</h2>
                //             <a href='Vistas/registro.php' class='btn'>Volver al registro</a>
                //         </div>
                //     </body>";

                // include 'Vistas/Includes/footer.html';
            }
        }
    }
}
