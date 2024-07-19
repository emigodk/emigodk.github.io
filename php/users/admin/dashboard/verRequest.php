<?php
require 'database.php';

$idRequest = $_GET['id'];

// Asegúrate de que $idRequest está configurado
if (!$idRequest) {
    die('ID de request no proporcionado.');
}

$sql = "SELECT r.idRequest, r.asunto, r.nombreCompleto, r.descripcion, r.correo, u.nombre, u.email
        FROM requests r
        JOIN usuarios u ON r.idUsuario = u.idUsuario
        WHERE r.idRequest = $idRequest";
$result = mysqli_query($db, $sql);

// Verificar si la consulta se ejecutó correctamente
if (!$result) {
    die('Error en la consulta SQL: ' . mysqli_error($db));
}

// Verificar si se encontraron resultados
$row = mysqli_fetch_assoc($result);
if (!$row) {
    die('Request no encontrado.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Request</title>
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
    
    <div class="container">
        <h1>Detalle del Request</h1>
        <table>
            <tr>
                <th>ID Request</th>
                <td><?php echo htmlspecialchars($row['idRequest']); ?></td>
            </tr>
            <tr>
                <th>Asunto</th>
                <td><?php echo htmlspecialchars($row['asunto']); ?></td>
            </tr>
            <tr>
                <th>Nombre Completo</th>
                <td><?php echo htmlspecialchars($row['nombreCompleto']); ?></td>
            </tr>
            <tr>
                <th>Descripción</th>
                <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
            </tr>
            <tr>
                <th>Email empresa</th>
                <td><?php echo htmlspecialchars($row['correo']); ?></td>
            </tr>
            <tr>
                <th>Nombre Usuario</th>
                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
            </tr>
            <tr>
                <th>Email Usuario</th>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
            </tr>
        </table>

        <div class="navbar">
        <a href="/../../ASAHEL-IT-2/php/users/admin/dashboard/index.php">Back</a>
    </div>
    </div>
</body>
</html>
