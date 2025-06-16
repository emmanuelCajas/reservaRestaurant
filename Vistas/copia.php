<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/imagenes/cuchillos_blanco.png" />
    <title>MesaClick</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
     <!-- link css de Bootsrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link iconos de Bootsrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- link css -->
    <link rel="stylesheet" href="../Assets/estilos.css">
    <!--links Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    
</head>    
    
<body class="d-flex flex-column min-vh-100">

<?php 
session_start();
include 'Includes/header.html'; 
?>

<div class="container flex-fill">
    <h3 class="tituloSeccion text-center mt-5">Dejar una Reseña</h3>
    
    <form action="../index.php?accion=guardarResena" method="POST" class="containerRegistro w-50 w-lg-25 mt-5 mb-5 p-4 border rounded bg-light shadow">

        <div class="col-md-12 mb-3">
            <label for="calificacion" class="form-label">Calificación (1 a 5)</label>
            <select id="calificacion" name="calificacion" class="form-select" required>
                <option value="">Selecciona</option>
                <option value="1">1 - Muy malo</option>
                <option value="2">2 - Malo</option>
                <option value="3">3 - Regular</option>
                <option value="4">4 - Bueno</option>
                <option value="5">5 - Excelente</option>
            </select>
        </div>

        <div class="col-md-12 mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea id="comentario" name="comentario" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="col btn btn-primary w-100 mx-auto d-block">Enviar Reseña</button>
    </form>
</div>

<?php include 'Includes/footer.html'; ?>
</body>
</html>




