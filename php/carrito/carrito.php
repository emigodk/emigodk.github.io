<?php
require 'database.php';
require 'verificarAdmin.php';
require 'añadir_a_carrito.php';
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../users/login.php");
    exit;
}

$idUsuario = $_SESSION['idUsuario'];

// Consulta para obtener los pedidos del usuario
$sql = "SELECT * FROM pedidos WHERE idUsuario = '$idUsuario'";
$result = mysqli_query($db, $sql);

if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($db));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Carrito</title>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/../../ASAHEL-IT-2/php/MainPage/index.php">ASAHEL IT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/../../ASAHEL-IT-2/php/MainPage/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/../../ASAHEL-IT-2/php/carrito/productos2.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/../../ASAHEL-IT-2/php/users/verificarLoggedin_contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/../../ASAHEL-IT-2/php/MainPage/blog.php">Blog</a>
                    </li>
                    <li>
                        <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo '<a class="nav-link" href="/verificarLoggedin_carrito.php"><i class="fa-solid fa-cart-shopping fa-xs"></i></a>';
                        }
                        ?>
                    </li>
                </ul>
                <span class="navbar-text d-flex align-items-center">
                    Protege tus activos más valiosos y asegura el futuro digital de tu empresa.
                    <?php 
                    if(isset($_SESSION['usuario'])){
                        echo '<span class="navbar-text ms-3" style="color: #FFFFFF; pointer-events: none;"><i class="fa-solid fa-user fa-xs"> </i>' . ucwords($_SESSION['usuario']) . '</span>';
                        echo '<a class="nav-link ms-3" href="/../../ASAHEL-IT-2/php/users/logout.php" style="color: #FFFFFF;"><i class="fa-solid fa-arrow-right-from-bracket fa-xs"> </i>Cerrar Sesión</a>';
                    } else {
                        echo '<a class="nav-link ms-3" href="/../../ASAHEL-IT-2/php/users/login.php" style="color: #FFFFFF;">Login</a>';
                    }                        
                    ?>
                </span>
            </div>
        </div>
    </nav>
    <div class="container">
                    <br>

                    <?php //Si no hay mensaje, no mostrar el div
                    if($mensaje!="") { ?>
                    
                    <div class="alert alert-success">
                         <!-- /../../ASAHEL-IT-2/php/users/verificarLoggedin_carrito.php-->
                         <a href="../carrito/productos2.php" class="badge-success" style="color: #333;">
                              <center><p>Ver tienda de servicios</p></center>
                            </a>
                            <center>
                            <?php echo "$mensaje"; ?>
                        </center>
                            
                    
                </div>
                <?php } ?>
    </div>
    <div class="container mt-5">
        <h4 style="text-align: center;">Tu Carrito de Pedidos</h4>
        <?php if(!empty($_SESSION['carrito'])){ ?> 
            <table class="table table-light table-bordered">
                <tbody>
                    <tr>
                        <th width="40%">Descripcion</th>
                        <th width="15%">Cantidad</th>
                        <th width="20%">Precio</th>
                        <th width="20%">Total</th>
                        <th width="5%"></th>
                    </tr>
                    <?php $total=0; ?>
                    <?php foreach($_SESSION['carrito'] as $indice => $servicio){ ?>
                        <tr>
                            <td width="40%"><?php echo $servicio['nombre']; ?></td>
                            <td width="15%"><?php echo $servicio['cantidad']; ?></td>
                            <td width="20%"><?php echo $servicio['precio']; ?></td>
                            <td width="20%"><?php echo number_format($servicio['precio'] * $servicio['cantidad'], 2); ?></td>
                            <td width="5%"> 
                                <form action="" method="post">
                                    <input type="hidden" name="idServicio" value="<?php echo $servicio['idServicio']; ?>">
                                    <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>  
                                </form>
                            </td>
                        </tr>
                        <?php $total += ($servicio['precio'] * $servicio['cantidad']); ?>
                    <?php } ?>
                    <tr>
                        <td colspan="3" align="right"><h3>Total</h3></td>
                        <td align="right"><h3><?php echo number_format($total, 2); ?></h3></td>
                        <td></td>
                    </tr>
                        <tr>

                            <td colspan="5">
                                <div class="form-group">
                                    <form action="procesarPedido.php" method="post">
                                        <button class="btn btn-primary" name="btnAccion" value="proceder" type="submit">Proceder a Pagar</button>
                                    
                                    
                                    </form>

                                </div>
                            </td>
                        </tr>


                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-secondary">
                No hay productos en el carrito...
            </div>
        <?php } ?>
    </div>
</body>
</html>
