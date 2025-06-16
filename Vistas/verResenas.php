<?php 
include 'Includes/header.html';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MesaClick - Reseñas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/imagenes/cuchillos_blanco.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/estilos.css">
</head>

<body class="d-flex flex-column min-vh-100">

<div class="container flex-fill">
    <h3 class="tituloSeccion text-center mt-5">Reseñas de Clientes</h3>

    <?php if (isset($_SESSION['usuario'])): ?>
    <div class="text-end mb-4">
        <!--<a href="index.php?accion=registroResena" class="btn btn-success">-->
        <a id="botonEnviar" href="index.php?accion=registroResena" class="btn btn-success">
            <i class="bi bi-chat-left-text"></i> Dejar una Reseña
        </a>
    </div>
    <?php endif; ?>

    <?php if (!empty($resenas)): ?>
        <?php foreach ($resenas as $resena): ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($resena['usuario']) ?></h5>
                    <h6 class="card-subtitle text-muted mb-2"><?= date("d/m/Y H:i", strtotime($resena['fecha_reseña'])) ?></h6>
                    <p class="card-text"><?= nl2br(htmlspecialchars($resena['comentario'])) ?></p>
                    <p class="text-warning mb-0">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <i class="bi <?= $i < $resena['calificacion'] ? 'bi-star-fill' : 'bi-star' ?>"></i>
                        <?php endfor; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center mt-5">No hay reseñas aún. Sé el primero en dejar una.</p>
    <?php endif; ?>
</div>

<?php include 'Includes/footer.html'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
