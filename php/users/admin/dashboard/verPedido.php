<?php
require 'database.php';

$idPedido = $_GET['id'];

// Obtener información del pedido del usuario asociado y los servicios solicitados
$sqlPedido = "SELECT p.idPedido, p.idUsuario, p.fecha, u.nombre, u.email 
            FROM pedidos p 
            JOIN usuarios u ON p.idUsuario = u.idUsuario 
            WHERE p.idPedido = $idPedido";
$resultPedido = mysqli_query($db, $sqlPedido);
$rowPedido = mysqli_fetch_assoc($resultPedido);

if (!$rowPedido) {
    echo "Pedido no encontrado.";
    exit;
}

// Obtener los datos del servicio de la tabla tblpedidosdetail asociados al pedido

$sqlServicios = "SELECT s.nombre, s.descripcion, s.precio, pd.total
                FROM tblpedidosdetail pd 
                JOIN servicios s ON pd.idServicio = s.idServicio 
                WHERE pd.idPedido = $idPedido";
$resultServicios = mysqli_query($db, $sqlServicios);

if (!$resultServicios) {
    echo "Error al obtener los servicios del pedido: " . mysqli_error($db);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Pedido</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de tener esta hoja de estilos -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .navbar {
            background-color: teal;
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
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: teal;
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
        h1 {
            color: teal;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/../../ASAHEL-IT-2/php/users/admin/dashboard/index.php">Back</a>
    </div>
    <div class="container">
        <h1>Detalle del Pedido</h1>
        <table>
            <tr>
                <th>ID Pedido</th>
                <td><?php echo $rowPedido['idPedido']; ?></td>
            </tr>
            <tr>
                <th>ID Usuario</th>
                <td><?php echo $rowPedido['idUsuario']; ?></td>
            </tr>
            <tr>
                <th>Fecha</th>
                <td><?php echo $rowPedido['fecha']; ?></td>
            </tr>
            <tr>
                <th>Nombre Usuario</th>
                <td><?php echo $rowPedido['nombre']; ?></td>
            </tr>
            <tr>
                <th>Email Usuario</th>
                <td><?php echo $rowPedido['email']; ?></td>
            </tr>
        </table>

        <h2>Servicios Solicitados</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
            
            </tr>
            <?php
            while ($rowServicio = mysqli_fetch_assoc($resultServicios)) {
                echo "<tr>";
                echo "<td>" . $rowServicio['nombre'] . "</td>";
                echo "<td>" . $rowServicio['descripcion'] . "</td>";
                echo "<td>$" . number_format($rowServicio['precio'], 2) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
