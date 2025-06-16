<?php
require_once 'Config/baseDatos.php';

class Usuario {
    public $nombre;
    public $email;
    public $telefono;
    public $password;
    private $conn;

    public function __construct() {
        $db = new baseDatos();
        $this->conn = $db->getConnection();
    }

    public function guardar() {

        // Verificar si el correo electrónico ya está registrado
        $query = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        // Si el correo ya está registrado, retornar un error
        if ($count > 0) {
            // Mostrar un mensaje de error con un botón para regresar al registro
            include 'Vistas/Includes/header.html';

            echo "
            <body class='d-flex flex-column min-vh-100'>
                <div class='container text-center flex-fill mensajes'>
                    <h2 class='alert alert-danger'>El correo electrónico ya está registrado. Por favor, usa otro correo.</h2>
                    <a href='Vistas/registro.php' class='btn'>Volver al registro</a>
                </div>
            </body>";

            include 'Vistas/Includes/footer.html';
            
            exit;
        }

    
        
        // Si el correo no está registrado, proceder con el registro del usuario
        $query = "INSERT INTO usuarios (nombre, email, telefono, password) VALUES (:nombre, :email, :telefono, :password)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':password', $this->password);

        return $stmt->execute();
    }

    public function obtenerPorEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
