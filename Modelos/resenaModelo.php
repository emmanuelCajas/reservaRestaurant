<?php
require_once 'Config/baseDatos.php';

class ResenaModelo {
    private $conn;

    public function __construct() {
        $db = new baseDatos();
        $this->conn = $db->getConnection();
    }

    public function obtenerResenas() {
        $sql = "SELECT r.calificacion, r.comentario, r.fecha_reseña, u.nombre AS usuario
                FROM reseñas r
                JOIN usuarios u ON r.usuario_id = u.id
                ORDER BY r.fecha_reseña DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardarResena($usuario_id, $calificacion, $comentario) {
        $sql = "INSERT INTO reseñas (usuario_id, calificacion, comentario, fecha_reseña)
                VALUES (:usuario_id, :calificacion, :comentario, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->bindParam(':calificacion', $calificacion);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->execute();
    }
}
