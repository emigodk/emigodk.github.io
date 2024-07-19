<?php
require 'database.php';
$esAdmin = false;

// Si hay una sesion activa
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // SQL para verificar si el usuario es admin
    $QueryEsAdmin = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario = '$_SESSION[usuario]' AND fkAdmin = 1");
    // Si la consulta devuelve resultados, el usuario es admin
    if (mysqli_num_rows($QueryEsAdmin) > 0) {
        // Establecer en la variable que el usuario es admin
        $esAdmin = true;
    }
}
?>