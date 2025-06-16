<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/imagenes/cuchillos_blanco.png" />
    <title>MesaClick</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../Assets/scriptsValidacionFormulario.js"></script> 
        
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

    include 'Includes/header.html';

?> 
<div class="container flex-fill">        
    <h3 class="tituloSeccion text-center mt-5">Registro</h3>

    <form action="../index.php?accion=registro" method="POST" id="formularioAltaUsuario" class="containerRegistro w-50 w-lg-25 mt-5 mb-5 p-4 border rounded bg-light shadow">
        
        <div class="col-md-12 mb-3">
            <!-- <label for="nombre" class="form-label">Nombre y Apellidos</label> -->
            <input type="text" id="nombre" name="Nombre" class="form-control" placeholder="Usuario" autocomplete="off" >
        </div>
            
        <div class="col-md-12 mb-3">
            <!-- <label for="email" class="form-label">Email</label> -->
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" >
        </div>
            
        <div class="col mb-3">
            <!-- <label for="telefono" class="form-label">Teléfono</label> -->
            <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" autocomplete="off" >
        </div>
        
        <div class="col-md-12 mb-3">
            <!-- <label for="password" class="form-label">Contraseña</label> -->
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" autocomplete="off" >
        </div>
            
        <div class="col-md-12 mb-3">
            <!-- <label for="confirmarClave" class="form-label">Confirmar Contraseña</label> -->
            <input type="password" id="confirmarClave" name="confirmarClave" class="form-control" placeholder="Confirmar contraseña" autocomplete="off" >
        </div>
            
        <button id="botonEnviar" type="submit" class="col btn btn-primary w-100 mx-auto d-block">Enviar</button>
    </form>
</div> 

<?php 
    
    include 'Includes/footer.html';

?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>