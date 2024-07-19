<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Verificar si hay una sesión activa
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Si hay sesión activa, redirigir a la página de contacto
    header('Location: /../../ASAHEL-IT-2/php/carrito/carrito.php');
    exit;
} else {
    // Si no hay sesión activa, redirigir a la página de inicio de sesión
    header('Location: /../../ASAHEL-IT-2/php/users/login.php');
    exit;
}
?>
