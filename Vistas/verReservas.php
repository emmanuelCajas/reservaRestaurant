<?php
// Vistas/verReservas.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>MesaClick - reservas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/imagenes/cuchillos_blanco.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <?php include 'Includes/header.html'; ?>
    
        <?php if (isset($_SESSION['mensaje'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['mensaje'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $_SESSION['error'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="container mt-4">
        <h2 class="mb-4">Reservas</h2>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Mesa</th>
                        <th>Capacidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservas as $reserva): ?>
                    <tr>
                        <td><?= htmlspecialchars($reserva['id']) ?></td>
                        <td><?= htmlspecialchars($reserva['nombre_cliente']) ?></td>
                        <td><?= htmlspecialchars($reserva['email']) ?></td>
                        <td><?= htmlspecialchars($reserva['fecha']) ?></td>
                        <td><?= htmlspecialchars(substr($reserva['hora'], 0, 5)) ?></td>
                        <td>Mesa <?= htmlspecialchars($reserva['mesa_numero']) ?></td>
                        <td><?= htmlspecialchars($reserva['capacidad']) ?> personas</td>
                        <td>
                            <a href="index.php?accion=eliminarReserva&id=<?= $reserva['id'] ?>" 
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>
    
    <?php include 'Includes/footer.html'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>