<?php
require 'database.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID del usuario desde la solicitud POST
    $idUsuario = $_POST['idUsuario'];

    // Preparar la consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE idUsuario='$idUsuario'";
    if (mysqli_query($db, $sql)) {
        header("Location: index.php"); // Redirigir después de eliminar
        exit();
    } else {
        echo "Error al eliminar usuario: " . mysqli_error($db);
    }
} else {
    echo "No se recibió el ID del usuario para eliminar.";
}
?>
