<?php
require_once 'Config/baseDatos.php';

class Reserva {
    private $conn;

    public function __construct() {
        $db = new baseDatos();
        $this->conn = $db->getConnection();
    }

    public function obtenerMesasDisponibles($fecha, $hora) {
        // Calcular el intervalo de tiempo
        $horaInicio = $hora;
        $horaFin = date("H:i:s", strtotime($horaInicio) + 3600); // +1 hora
    
        $sql = "SELECT * FROM mesas 
                WHERE id NOT IN (
                    SELECT mesa_id FROM reservas 
                    WHERE fecha = :fecha 
                    AND (
                        (hora < :hora_fin AND ADDTIME(hora, '01:00:00') > :hora_inicio)
                    )
                )";
    
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute([
            ':fecha' => $fecha,
            ':hora_inicio' => $horaInicio,
            ':hora_fin' => $horaFin
        ]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function guardarReserva($nombre, $email, $fecha, $hora, $mesa_id) {
        $sql = "INSERT INTO reservas (nombre_cliente, email, fecha, hora, mesa_id) VALUES (:nombre, :email, :fecha, :hora, :mesa_id)";
    
        // Preparar la consulta
        $stmt = $this->conn->prepare($sql);
    
        // Ejecutar la consulta con los parámetros
        return $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':fecha' => $fecha,
            ':hora' => $hora,
            ':mesa_id' => $mesa_id
        ]);
    }


    public function mesaOcupada($fecha, $hora, $mesa_id) {
        // Calcular la hora fin sumando 1 hora
        $horaInicio = $hora;
        $horaFin = date("H:i:s", strtotime($horaInicio) + 3600); // +1 hora
    
        $sql = "SELECT * FROM reservas 
                WHERE fecha = :fecha 
                AND mesa_id = :mesa_id 
                AND (
                    (hora < :hora_fin AND ADDTIME(hora, '01:00:00') > :hora_inicio)
                )";
    
        $stmt = $this->conn->prepare($sql);
    
        $stmt->execute([
            ':fecha' => $fecha,
            ':mesa_id' => $mesa_id,
            ':hora_inicio' => $horaInicio,
            ':hora_fin' => $horaFin
        ]);
    
        return $stmt->rowCount() > 0;
    }

    public function obtenerTodasLasReservas() {
        $sql = "SELECT r.*, m.numero as mesa_numero, m.capacidad 
                FROM reservas r
                JOIN mesas m ON r.mesa_id = m.id
                ORDER BY r.fecha DESC, r.hora DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerReservasPorUsuario($email) {
        $sql = "SELECT r.*, m.numero as mesa_numero, m.capacidad 
                FROM reservas r
                JOIN mesas m ON r.mesa_id = m.id
                WHERE r.email = :email
                ORDER BY r.fecha DESC, r.hora DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM reservas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
