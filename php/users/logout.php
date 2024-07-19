<?php
session_start(); // Iniciar la sesión

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario al inicio o a donde prefieras después de cerrar sesión
header('Location: /../../ASAHEL-IT-2/php/MainPage/index.php');
exit();
?>
