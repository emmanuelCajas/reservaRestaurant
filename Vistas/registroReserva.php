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
    <h3 class="tituloSeccion text-center mt-5">Reserva</h3>

    <form action="../index.php?accion=reserva" method="POST" class="containerRegistro w-50 w-lg-25 mt-5 mb-5 p-4 border rounded bg-light shadow">
        
        <div class="col-md-12 mb-3">
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" autocomplete="off" 
            <?php if(isset($_SESSION['usuario'])): ?>
                value="<?= htmlspecialchars($_SESSION['usuario']['nombre']) ?>"
                readonly
            <?php endif; ?>
            >
        </div>
            
        <div class="col-md-12 mb-3">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" 
            <?php if(isset($_SESSION['usuario'])): ?>
                value="<?= htmlspecialchars($_SESSION['usuario']['email']) ?>"
                readonly
            <?php endif; ?>
            >
        </div>
            
        <div class="col mb-3">
            <input type="date" id="fecha" name="fecha" class="form-control" autocomplete="off" >
        </div>
        
        <div class="col-md-12 mb-3">
            <input type="time" id="hora" name="hora" class="form-control" min="12:00" max="22:00" step="900" autocomplete="off">
        </div>
            
        <select name="mesa_id" id="mesa_id" required>
            <option value="">Selecciona una fecha y hora</option>
        </select><br>

        <button id="botonEnviar" type="submit" class="col btn btn-primary w-100 mx-auto d-block">Reservar</button>
    </form>
</div> 

<script>

//codigo que bloque fechas anteriores a la fecha actual 
document.addEventListener('DOMContentLoaded', function () {
    const inputFecha = document.getElementById('fecha');
    const hoy = new Date();
    const yyyy = hoy.getFullYear();
    const mm = String(hoy.getMonth() + 1).padStart(2, '0');
    const dd = String(hoy.getDate()).padStart(2, '0');
    const fechaMinima = `${yyyy}-${mm}-${dd}`;
    inputFecha.min = fechaMinima;
});

//Codigo para cargar las mesas disponibles en la hora seleccionada
document.getElementById('fecha').addEventListener('change', cargarMesas);
document.getElementById('hora').addEventListener('change', cargarMesas);

function cargarMesas() {
    const fecha = document.getElementById('fecha').value;
    const hora = document.getElementById('hora').value;
    console.log(fecha + " " + hora)
    if (fecha && hora) {
        fetch(`../index.php?accion=obtenerMesas&fecha=${fecha}&hora=${hora}`)
        .then(res => res.text())
        .then(data => {
            document.getElementById('mesa_id').innerHTML = data || '<option>No hay mesas disponibles</option>';
        });
    }
}
</script>

<?php 
    
    include 'Includes/footer.html';

?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>