<?php 
session_start();
require 'verificarAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="/../../ASAHEL-IT-2/src/css.css">

    <title>Blog</title>
</head>

<body>

    <head>
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
                    <a class="nav-link" href="/../../ASAHEL-IT-2/php/carrito/productos2.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../../ASAHEL-IT-2/php/users/verificarLoggedin_contacto.php">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/../../ASAHEL-IT-2/php/MainPage/blog.php">Blog</a>
                </li>
                <li>
                        <?php
                        // Si es admin, mostrar el enlace
                        if ($esAdmin) {
                            echo '<a class="nav-link" href="/../../ASAHEL-IT-2/php/users/admin/dashboard/index.php">Admin</a>';
                        }
                        // Si no es admin, no mostrar el enlace
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

    </head>


    
    <center><h1>Nuestro Blog.</h1></center>


    <div class="feedback">

    <div class="card mb-8" >
  <div class="row g-0">
    <div class="col-md-4 ">
      <img src="/../../ASAHEL-IT-2/src/img/img-bg-index.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Protegiendo el Futuro
Digital: Un Caso de Éxito
en el Sector Financiero</h5>
        <p class="card-text">Un banco líder enfrentaba
ataques cibernéticos
frecuentes, lo que ponía en
riesgo datos financieros
críticos y la confianza de sus
clientes.
</p>

    <p class="card-text">
        Se implementó un sistema de
    monitoreo proactivo de la
red, junto con una gestión de
incidentes ágil y una
educación en seguridad
integral para el personal del
banco.
</p>

<p class="card-text"><strong>Se implementó un sistema de
monitoreo proactivo de la
red, junto con una gestión de
incidentes ágil y una
educación en seguridad
integral para el personal del
banco.</strong></p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

    </div>

</body>

</html>