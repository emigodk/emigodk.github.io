<?php
require 'database.php';

// Verificar si se ha enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID del pedido desde la solicitud POST
    $idPedido = $_POST['idPedido'];

    // Preparar la consulta SQL para eliminar el pedido
    $sql = "DELETE FROM pedidos WHERE idPedido='$idPedido'";
    if (mysqli_query($db, $sql)) {
        header("Location: index.php"); // Redirigir después de eliminar
        exit();
    } else {
        echo "Error al eliminar pedido: " . mysqli_error($db);
    }
} else {
    echo "No se recibió el ID del pedido para eliminar.";
}
?>
