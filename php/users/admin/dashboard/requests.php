<?php
require 'database.php';

$sql = "SELECT * FROM requests";
$result = mysqli_query($db, $sql);
?>
<link rel="stylesheet" href="/../../\ASAHEL-IT-2\php\users\admin/dashboard/css.css">
<div class="container">

    <h1>Requests</h1>
    <table>
        <tr>
            <th>ID Request</th>
            <th>Asunto</th>
            <th>Nombre Completo</th>
            <th>Ver más</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['idRequest']; ?></td>
                <td><?php echo $row['asunto']; ?></td>
                <td><?php echo $row['nombreCompleto']; ?></td>
                <td><a href="verRequest.php?id=<?php echo $row['idRequest']; ?>">Ver más</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>

<br>
<center>

    <a href="index.php" class="back-button">Back</a>
</center>