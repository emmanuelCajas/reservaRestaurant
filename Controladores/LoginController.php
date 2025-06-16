<?php

require_once 'Modelos/usuario.php';

class LoginController {

    public function mostrarFormulario() {
        include 'Vistas/login.php';
    }
    public function autenticar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $clave = $_POST['confirmarClave'] ?? '';

            $usuario = new Usuario();
            $usuarioEncontrado = $usuario->obtenerPorEmail($email);

            if ($usuarioEncontrado && password_verify($clave, $usuarioEncontrado['password'])) {
                session_start();
                $_SESSION['usuario'] = [
                    'id' => $usuarioEncontrado ['id'],
                    'nombre' => $usuarioEncontrado ['nombre'],
                    'email' => $usuarioEncontrado ['email'],
                    'telefono' => $usuarioEncontrado ['telefono'],

                ];
                
                header("Location: index.php");
                exit();
            } else {
                
                header("Location: index.php?accion=login&error=credenciales");
                exit();
            }
        }
    }
}
