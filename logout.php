<?php
session_start();
session_unset();  // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirigir al login
header('Location: Vistas/login.php');
exit;
