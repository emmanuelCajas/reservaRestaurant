<?php
require_once 'Modelos/resenaModelo.php';

class ResenaController {

    private $modelo;

public function __construct() {
        $this->modelo = new ResenaModelo();
}

/****************************************************** */

public function mostrarFormularioResena() {
        
    /*
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?accion=login");
        exit;
    }
    */
    include 'Vistas/registroResena.php';
    
   }
/****************************************************** */
    public function verResenas() {
        $resenas = $this->modelo->obtenerResenas();
        include 'Vistas/verResenas.php';
    }
/***************************************************** */
    public function guardarResena() {

        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?accion=login");
            exit;
        }
    
        $usuario_id = $_SESSION['usuario']['id'];
        $calificacion = $_POST['calificacion'] ?? null;
        $comentario = trim($_POST['comentario'] ?? '');
    
        // Validación
        if (
            is_numeric($calificacion) &&
            $calificacion >= 1 &&
            $calificacion <= 5 &&
            !empty($comentario)
        ) {
            $this->modelo->guardarResena($usuario_id, $calificacion, $comentario);
        }
    
        header("Location: index.php?accion=verResenas");
        exit;
    }
    
    /***************************************************************************** */
    

    

}
?>