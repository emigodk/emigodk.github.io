<?php
session_start();
require 'database.php';
require 'verificarAdmin.php';

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

<div class="container mt-5">
    <form method="post" action="crearPedido.php">
        <h4 style="text-align: center;">¡Contratanos!</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Contratar</th>
                    <th scope="col">Servicios</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">$</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><input type="checkbox" name="servicios[]" value="3000" id="MonitoreoProactivo"></th>
                    <td>Monitoreo Proactivo</td>
                    <td>Supervisión continua de la salud y rendimiento de tu red para identificar y mitigar amenazas antes de que se conviertan en problemas.</td>
                    <td>$3000</td>
                </tr>
                <tr>
                    <th scope="row"><input type="checkbox" name="servicios[]" value="5000" id="GestionIncidentes"></th>
                    <td>Gestión de Incidentes</td>
                    <td>Respuesta rápida y efectiva ante cualquier incidente de seguridad para minimizar el impacto y garantizar la continuidad operativa.</td>
                    <td>$5000</td>
                </tr>
                <tr>
                    <th scope="row"><input type="checkbox" name="servicios[]" value="2500" id="CumplimientoNormativo"></th>
                    <td>Cumplimiento Normativo</td>
                    <td>Aseguramos que tu empresa cumpla con todas las regulaciones de protección de datos, evitando sanciones y mejorando la confianza de tus clientes.</td>
                    <td>$2500</td>
                </tr>
                <tr>
                    <th scope="row"><input type="checkbox" name="servicios[]" value="2000" id="EducacionConcienciacion"></th>
                    <td>Educación y Concienciación</td>
                    <td>Fomentamos una cultura de seguridad dentro de tu organización mediante la capacitación y concienciación de tus empleados.</td>
                    <td>$2000</td>
                </tr>
                <tr>
                    <th scope="row"><input type="checkbox" name="servicios[]" value="4000" id="OptimizacionRecursos"></th>
                    <td>Optimización de Recursos</td>
                    <td>Liberamos tus recursos internos al gestionar la seguridad con nuestro equipo de expertos, permitiendo que tu equipo de TI se enfoque en iniciativas estratégicas.</td>
                    <td>$4000</td>
                </tr>
                <tr>
                    <th scope="row" colspan="3">Total</th>
                    <td id="total">$0.00</td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" aria-label="total-price" value="0.00">
        <button type="submit" class="btn btn-dark shadow-lg" id="chkbtn">¡Contrata ya!</button>
    </form>
</div>
</body>
</html>
