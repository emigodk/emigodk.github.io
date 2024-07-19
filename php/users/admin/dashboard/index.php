<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection
require 'database.php';

// Include any other necessary files
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/../../ASAHEL-IT-2/php/users/admin/dashboard/css.css">
</head>
<body>
    <div class="navbar">
        <a href="usuarios.php">Usuarios</a>
        <a href="pedidos.php">Pedidos</a>
        <a href="requests.php">Requests</a>
        <a href="/../../ASAHEL-IT-2/php/MainPage/index.php">Home</a>
    </div>
    <div class="container">
        <h2>Dashboard</h2>
        
        <!-- Sección de Usuarios -->
        <h3>Usuarios</h3>
        <table>
            <tr>
                <th>ID de usuario</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php
            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['idUsuario']."</td>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".($row['fkAdmin'] ? 'Sí' : 'No')."</td>";
                echo "<td><a class='btn btn-primary' href='editarUsuario.php?id=".$row['idUsuario']."'>Editar</a></td>";
                echo "<td><form action='eliminarUsuario.php' method='post'>
                          <input type='hidden' name='idUsuario' value='".$row['idUsuario']."'>
                          <button class='btn btn-primary' type='submit'>Eliminar</button>
                      </form></td>";
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Sección de Pedidos -->
        <h3>Pedidos</h3>
        <table>
            <tr>
                <th>ID de Pedido</th>
                <th>ID de Usuario</th>
                <th>Fecha</th>
                <th>Ver</th>
                <th>Eliminar</th>
            </tr>
            <?php
            $sql = "SELECT * FROM pedidos";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['idPedido']."</td>";
                echo "<td>".$row['idUsuario']."</td>";
                echo "<td>".$row['fecha']."</td>";
                echo "<td><a class='btn btn-primary' href='verPedido.php?id=".$row['idPedido']."'>Ver</a></td>";
                echo "<td><form action='eliminarPedido.php' method='post'>
                          <input type='hidden' name='idPedido' value='".$row['idPedido']."'>
                          <button class='btn btn-primary' type='submit'>Eliminar</button>
                      </form></td>";
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Sección de Requests -->
        <h3>Requests</h3>
        <table>
            <tr>
                <th>ID de Request</th>
                <th>Asunto</th>
                <th>Nombre</th>
                <th>Ver más</th>
                <th>Eliminar</th>
            </tr>
            <?php
            $sql = "SELECT * FROM requests";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['idRequest']."</td>";
                echo "<td>".$row['asunto']."</td>";
                echo "<td>".$row['nombreCompleto']."</td>";
                echo "<td><a class='btn btn-primary' href='verRequest.php?id=".$row['idRequest']."'>Ver más</a></td>";
                echo "<td><form action='eliminarRequest.php' method='post'>
                          <input type='hidden' name='idRequest' value='".$row['idRequest']."'>
                          <button class='btn btn-primary' type='submit'>Eliminar</button>
                      </form></td>";
                echo "</tr>";
            }
            ?>
        </table>
        
    </div>
</body>
</html>
