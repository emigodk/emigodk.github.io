<?php
require 'database.php';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
$idUsuario = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE idUsuario = $idUsuario";
mysqli_query($db, $sql);
}

$sql = "SELECT * FROM usuarios";
$result = mysqli_query($db, $sql);
?>
<link rel="stylesheet" href="/../../\ASAHEL-IT-2\php\users\admin/dashboard/css.css">
<div class="container">
    
    <h1>Usuarios</h1>
    
    
    
    <table id="usuariosTable">
        
        <?php require 'database.php';

$sql = "SELECT * FROM usuarios";
$result = mysqli_query($db, $sql);
echo "<tr>";
echo "<th>ID de usuario</th>";
echo "<th>Nombre</th>";
echo "<th>Email</th>";
echo "<th>Admin</th>";
echo "<th>Editar</th>";
echo "<th>Eliminar</th>";
echo "</tr>";
while ($row = mysqli_fetch_assoc($result)) {
    
    echo "<tr id='user-" . $row['idUsuario'] . "'>";
    
    echo "<td>" . $row['idUsuario'] . "</td>";
    
    echo "<td>" . $row['nombre'] . "</td>";
    
    echo "<td>" . $row['email'] . "</td>";
    
    echo "<td>" . $row['fkAdmin'] . "</td>";
    
    echo "<td><a href='/../../ASAHEL-IT-2/php/users/admin/dashboard/editarUsuarios.php?id=" . $row['idUsuario'] . "'>Editar</a></td>";
    
    echo "<td><button onclick='eliminarUsuario(" . $row['idUsuario'] . ")'>Eliminar</button></td>";
    
    echo "</tr>";
}
?>
</table>

</div>

<br>
<center>
    
    <a href="index.php" class="back-button">Back</a>
</center>