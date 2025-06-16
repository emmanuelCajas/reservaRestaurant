<?php

use PHPUnit\Framework\TestCase;



class UsuarioTest extends TestCase {
    
    public function testGuardar(){

        require_once("Modelos/usuario.php");

        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST['Nombre'] = 'oscar';
        $_POST['email'] = 'oscar@email.com';
        $_POST['telefono'] = '123456789';
        $_POST['password'] = '123456';

        $usu = new Usuario();
        $usu->nombre = $_POST['Nombre'];
        $usu->email = $_POST['email'];
        $usu->telefono = $_POST['telefono'];
        $usu->password = $_POST['password'];

        $resultado = $usu->guardar();
        $this->assertEquals(true,$resultado);

        $_POST = [];
    }
    

    
    public function testVerificarTelefono() {
    require_once("Modelos/usuario.php");
        $_POST['telefono'] = 'gjhjghfhg';
    
        $this->assertTrue(is_numeric($_POST['telefono']), "El teléfono debe contener solo números");
    
        $_POST = [];
    }
    

    
    public function testVerificarEmail() {
        require_once("Modelos/usuario.php");
        $_POST['email'] = 'juanemail.com';
    
        $this->assertTrue(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false, "El correo no tiene el formato correcto");
    
        $_POST = [];
    }
    
}
?>