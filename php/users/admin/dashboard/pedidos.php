<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection
require 'database.php';

// Obtain the pedido ID from the URL parameter
$idPedido = $_GET['id'];

// Fetch pedido details
$sql = "SELECT p.idPedido, p.idUsuario, p.fecha, s.nombre, s.descripcion, s.precio, u.nombre AS nombreUsuario, u.email
        FROM pedidos AS p
        INNER JOIN carritos_servicios AS cs ON p.idCarrito = cs.idCarrito
        INNER JOIN servicios AS s ON cs.idServicio = s.idServicio
        INNER JOIN usuarios AS u ON p.idUsuario = u.idUsuario
        WHERE p.idPedido = '$idPedido'";

$result = mysqli_query($db, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($db);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Pedido</title>
    <link rel="stylesheet" href="/../../\ASAHEL-IT-2\php\users\admin/dashboard/css.css">
</head>
<body>
    <div class="navbar">
        <a href="usuarios.php">Usuarios</a>
        <a href="pedidos.php">Pedidos</a>
        <a href="requests.php">Requests</a>
        <a href="/../../\ASAHEL-IT-2\php\MainPage/index.php">Home</a>
    </div>
    <div class="container">
        <h2>Detalle del Pedido</h2>
        <table>
            <tr>
                <th>ID de Pedido</th>
                <th>ID de Usuario</th>
                <th>Nombre del Usuario</th>
                <th>Email del Usuario</th>
                <th>Fecha</th>
                <th>Nombre del Servicio</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['idPedido']; ?></td>
                <td><?php echo $row['idUsuario']; ?></td>
                <td><?php echo $row['nombreUsuario']; ?></td>
                <td><?php echo $row['email']; ?></td>
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
