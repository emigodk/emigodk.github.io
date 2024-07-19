<?php
require 'database.php';

// Obtener el ID del usuario desde la URL
$idUsuario = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Guardar los datos editados
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fkAdmin = isset($_POST['fkAdmin']) ? 1 : 0;

    // Preparar la consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', fkAdmin='$fkAdmin' WHERE idUsuario='$idUsuario'";
    if (mysqli_query($db, $sql)) {
        echo "Usuario actualizado correctamente.";
        // Redirigir de nuevo al panel de control
        header("Location: /../../\ASAHEL-IT-2\php\users\admin\dashboard/index.php");
        exit();
    } else {
        echo "Error actualizando usuario: " . mysqli_error($db);
    }
}

// Preparar la consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM usuarios WHERE idUsuario='$idUsuario'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        form {
            width: 300px;
            margin: 0 auto;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: teal;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: darkcyan;
        }
        .divvv {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

        <div class="divvv">
            <label for="fkAdmin">Administrador:</label>
            <input type="checkbox" id="fkAdmin" name="fkAdmin" <?php echo $row['fkAdmin'] ? 'checked' : ''; ?>>
        </div>

        <br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
