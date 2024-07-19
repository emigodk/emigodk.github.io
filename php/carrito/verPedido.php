<?php
session_start();
require 'database.php';

if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../users/login.php");
    exit;
}

$idPedido = $_GET['id'];

$sql = "SELECT p.idPedido, p.fecha, s.nombre, s.descripcion, s.precio
        FROM pedidos AS p
        INNER JOIN servicios AS s ON p.idPedido = s.idServicio
        WHERE p.idPedido = '$idPedido'";

$result = mysqli_query($db, $sql);

if (!$result) {
    echo "Error al obtener los detalles del pedido: " . mysqli_error($db);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Pedido</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}
.navbar {
    background-color: #212529;
    color: white;
    padding: 10px;
    text-align: center;
}
.navbar a {
    color: white;
    padding: 10px;
    text-decoration: none;
}
.container {
    width: 80%;
    margin: 0 auto;
}
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}
th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
th {
    background-color: #212529;
    color: white;
}

.back-button {
    background-color: teal;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s;
}

.back-button:hover {
    background-color: darkcyan;
}

    </style>
    
</head>
<body>
    <div class="navbar">
        <a href="/../../ASAHEL-IT-2/php/MainPage/index.php">Home</a>
    </div>
    <div class="container">
        <h2>Detalle del Pedido</h2>
        <table>
            <tr>
                <th>ID de Pedido</th>
                <th>Fecha</th>
                <th>Nombre del Servicio</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['idPedido']; ?></td>
                <td><?php echo $row['fecha']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo "$" . $row['precio']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
