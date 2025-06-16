<?php
require_once 'Modelos/reserva.php';

class ReservaController {
    
    public function mostrarFormulario() {
        include 'Vistas/registroReserva.php';
    }

    public function obtenerMesas() {
        $fecha = $_GET['fecha'] ?? '';
        $hora = $_GET['hora'] ?? '';
    
        if (!$fecha || !$hora) exit;
    
        $reserva = new Reserva();
        $mesas = $reserva->obtenerMesasDisponibles($fecha, $hora);
    
        foreach ($mesas as $mesa) {
            echo "<option value='{$mesa['id']}'>Mesa {$mesa['numero']} ({$mesa['capacidad']} personas)</option>";
        }
    }
    

    public function reservar() {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $mesa_id = $_POST['mesa_id'];

        $hora_apertura = "12:00:00";
        $hora_cierre = "22:00:00";

        $reserva = new Reserva();

        if ($hora < $hora_apertura || $hora > $hora_cierre) {
            $mensaje = "La hora seleccionada está fuera del horario de atención (12:00 - 22:00)";
        } elseif ($reserva->mesaOcupada($fecha, $hora, $mesa_id)) {
            $mensaje = "Esa mesa ya está reservada para esa hora.";
        } else {
            $reserva->guardarReserva($nombre, $email, $fecha, $hora, $mesa_id);
            $mensaje = "¡Reserva registrada con éxito!";
        }

        require_once 'Vistas/registroSatisfactorio.php';
    }

    public function verReservas() {
        /*
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit;
        }
        
        $reserva = new Reserva();
        $reservas = $reserva->obtenerTodasLasReservas();
        include 'Vistas/verReservas.php';
        */

        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit;
        }
        
        if ($_SESSION['usuario']['email'] === 'administrador@mesaclick.com'){
            $reserva = new Reserva();
            $reservas = $reserva->obtenerTodasLasReservas();
            include 'Vistas/verReservas.php';
        }else{
            $reserva = new Reserva();
            $reservas = $reserva->obtenerReservasPorUsuario($_SESSION['usuario']['email']);
            include 'Vistas/verReservas.php';
            
        }

    }

    public function eliminarReserva() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $reserva = new Reserva();
            if ($reserva->eliminar($id)) {
                $_SESSION['mensaje'] = "Reserva eliminada correctamente";
            } else {
                $_SESSION['error'] = "Error al eliminar la reserva";
            }
        }
        header('Location: index.php?accion=verReservas');
        exit;
    }

}
