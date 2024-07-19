<?php
require 'database.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID del request desde la solicitud POST
    $idRequest = $_POST['idRequest'];

    // Preparar la consulta SQL para eliminar el request
    $sql = "DELETE FROM requests WHERE idRequest='$idRequest'";
    if (mysqli_query($db, $sql)) {
        header("Location: index.php"); // Redirigir después de eliminar
        exit();
    } else {
        echo "Error al eliminar request: " . mysqli_error($db);
    }
} else {
    echo "No se recibió el ID del request para eliminar.";
}
?>
