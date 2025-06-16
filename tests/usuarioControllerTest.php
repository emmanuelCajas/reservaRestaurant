<?php

use PHPUnit\Framework\TestCase;
require_once("Controladores/usuarioController.php");

class UsuarioControllerTest extends TestCase {

    public function testRegistrar(){
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST['Nombre'] = 'jaun';
        $_POST['email'] = 'jaun@example.com';
        $_POST['telefono'] = '123456789';
        $_POST['password'] = '123456';

        $usuController = new UsuarioController();
        $usuController->nombre = $_POST['Nombre'];
        $usuController->email = $_POST['email'];
        $usuController->telefono = $_POST['telefono'];
        $usuController->password = $_POST['password'];

        $resultado = $usuController->registrar();
        $this->assertEquals(true,$resultado);

        $_POST = [];
    }
    
}

?>