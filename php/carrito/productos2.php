<?php
require 'database.php';
require 'verificarAdmin.php';
require 'añadir_a_carrito.php';
// Si no hay una sesión activa, redirigir a la página de inicio de sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: /../../ASAHEL-IT-2/php/users/login.php');
    exit;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        body {
            background-color: #f2f2f2;
        }
    </style>
    <title>Servicios</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const totalElement = document.getElementById('total');
            const totalInput = document.querySelector('input[aria-label="total-price"]');

            function updateTotal() {
                let total = 0;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        total += parseFloat(checkbox.value);
                    }
                });
                totalElement.textContent = `$${total}`;
                totalInput.value = total.toFixed(2);
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateTotal);
            });

            updateTotal();
        });
    </script>
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
                        <a class="nav-link" aria-current="page" href="/../../ASAHEL-IT-2/php/MainPage/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/../../ASAHEL-IT-2/php/MainPage/productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/../../ASAHEL-IT-2/php/users/verificarLoggedin_contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/../../ASAHEL-IT-2/php/MainPage/blog.php">Blog</a>
                    </li>
                    <li>
                        <?php
                        if ($esAdmin) {
                            echo '<a class="nav-link" href="/../../ASAHEL-IT-2/php/users/admin/dashboard/index.php">Admin</a>';
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if (!$esAdmin) {
                            echo '<a class="nav-link" href="/../../ASAHEL-IT-2/php/users/verificarLoggedin_carrito.php"><i class="fa-solid fa-cart-shopping fa-xs"></i></a>';
                        }
                        ?>
                    </li>
                </ul>
                <span class="navbar-text d-flex align-items-center">
                    Protege tus activos más valiosos y asegura el futuro digital de tu empresa.
                    <?php
                    if (isset($_SESSION['usuario'])) {
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



                <!-- Mensaje de confirmacion/error sobre la actualizacion del carrito -->
                <?php //Si no hay mensaje, no mostrar el div
                    if($mensaje!="") { ?>
                    
                    <div class="alert alert-success">
                         <!-- /../../ASAHEL-IT-2/php/users/verificarLoggedin_carrito.php-->
                         <a href="../carrito/carrito.php" class="badge-success" style="color: #333;">
                              <center><p><i class="fa-solid fa-cart-shopping fa-xs"> Ver carrito</i></p></center>
                            </a>
                            <center>
                            <?php echo "$mensaje"; ?>
                        </center>
                            
                    
                </div>
                <?php } ?>
    </div>

    <div class="container" style="background-color: #f2f2f2">

        <div class="row">
            <?php
            //Crear query de mysql
            $queryServicios = "SELECT * FROM servicios";
            //Ejecutar la query
            $resultServicios = mysqli_query($db, $queryServicios);
            //en una variable llamada $listaServicios, hacemos un fecth all, fetch assoc para traer los datos de la base de datos
            $listaServicios = mysqli_fetch_all($resultServicios, MYSQLI_ASSOC);
            //var_dump($listaServicios);

            ?>


            <?php
            // Creamos un foreach para recorrer la lista de servicios y cada elemento de la lista se guarda como un array en la variable $servicio        
            foreach ($listaServicios as $servicio) { ?>
                <div class="col">

                    <div class="card" style="height:auto; min-height:375px;">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $servicio['nombre']?></h4>
                            <h5 class="card-title">$<?php echo $servicio['precio']?></h5>
                            <p class="card-text"><?php echo $servicio['descripcion']?></p>
                            

                            <form action="" method="post">

                            <input type="hidden" name="idServicio" id="idServicio" value="<?php echo $servicio['idServicio']?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo $servicio['nombre']?>">
                            <input type="hidden" name="precio" id="precio"  value="<?php echo $servicio['precio']?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1?>">
                                
                        

                            <button class="btn btn-dark" 
                                name="btnAccion"
                                value="Agregar"
                                type="submit"
                                style=" position: absolute; bottom: 10px; right: 13%;"
                                >Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>


                
                <?php } //Aqui marcamos el fin del template?>
                
            </div>
    
</body>

</html>