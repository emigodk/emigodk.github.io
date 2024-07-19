<?php
require 'database.php';
require 'verificarAdmin.php';
require 'añadir_a_carrito.php';
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../users/login.php");
    exit;
}
if($_POST){
    $idUsuario = $_SESSION['idUsuario'];
    $total = 0;
    $SID=session_id();
    $fecha = date('Y-m-d H:i:s');
    $sql = "INSERT INTO pedidos (idUsuario, total, fecha) VALUES ('$idUsuario', '$total', '$fecha')";
    $result = mysqli_query($db, $sql);
    if (!$result) {
        die("Error al ejecutar la consulta: " . mysqli_error($db));
    }
    $idPedido = mysqli_insert_id($db);
    foreach ($_SESSION['carrito'] as $producto) {
        $idServicio = $producto['idServicio'];
        $nombre = $producto['nombre'];
        $sql = "INSERT INTO tblpedidosdetail (idPedido, idServicio, nombre) VALUES ('$idPedido', '$idServicio', '$nombre')";
        $result = mysqli_query($db, $sql);
        if (!$result) {
            die("Error al ejecutar la consulta: " . mysqli_error($db));
        }
    }
    unset($_SESSION['carrito']);

    // enviar a pagina de confirmacion de pedido
    header("Location: pedidoConfirmado.php");
    exit;
}

?>