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

    <title>Home</title>

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
                        <a class="nav-link active" aria-current="page" href="/../../ASAHEL-IT-2/php/MainPage/index.php">Home</a>
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




    <div class="bgblack">

        <div class="slider">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active text-center">
                        <img src="/../../ASAHEL-IT-2/src/img/slide11.jpg" id="imgn" class="d-block w-100" alt="...">
                        <div class="carousel-caption" id="texto-img">
                            <h2 id="text">Con nosotros...</h2>
                            <h5 id="text">Mantén tus sistemas siempre seguros y actualizados</h5>
                        </div>
                    </div>
                    <div class="carousel-item text-center">
                        <img src="/../../ASAHEL-IT-2/src/img/slide22.jpg" id="imgn" class="d-block w-100" alt="...">
                        <div class="carousel-caption" id="texto-img">
                            <h2 id="text">¡Mantente seguro!</h2>
                            <h5 id="text">Elimina brechas de seguridad y optimizando tus recursos para un rendimiento impecable.</h5>
                        </div>
                    </div>
                    <div class="carousel-item text-center">
                        <img src="/../../ASAHEL-IT-2/src/img/slide33.jpg" id="imgn" class="d-block w-100" alt="...">
                        <div class="carousel-caption" id="texto-img">
                            <h2 id="text">Para nosotros...</h2>
                            <h5 id="text">Tu seguridad es nuestra prioridad.</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="grid-sect1">
    </div>


    <div class="container text-center">
        <div class="row justify-content-md-">
            <div class="col-md-auto">

                <div class="card shadow-lg" id="div-sec1">
                    <img src="/../../ASAHEL-IT-2/src/img/riskch.jpg" id="img1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Las empresas se enfrentan constantemente a brechas de seguridad que ponen en riesgo la integridad y confidencialidad de la información. Estas brechas pueden resultar en mayores costos financieros, daño a la reputación, interrupciones operativas y desafíos legales y de cumplimiento. Con AIS ASAHEL IT SERVICES, tus activos están protegidos contra las amenazas más avanzadas. Esto no solo reduce riesgos financieros y daños a la reputación, sino que también asegura la integridad y confidencialidad de tu información crítica.</p>
                        <br>
                        <a class="btn btn-dark shadow-lg" href="/../../ASAHEL-IT-2/php/contacto.php" role="button">¡Contacta un experto!</a>
                    </div>

                </div>
            </div>


            <div>



                <br>
                <br>
                <section class="secc2">
                    <br>
                    <h1 class="title text-light">¡Casos de éxito!</h1>
                    <br>
                    <br>

                    <div class="card-group shadow-lg">
                        <div class="card ">
                            <img src="/../../ASAHEL-IT-2/src/img/img-bg-index.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Protegiendo el Futuro Digital: Un Caso de Éxito en el Sector Financiero</h5>
                                <p class="card-text">La entidad bancaria logró una reducción del 70% en incidentes de seguridad, asegurando la integridad de los datos y restaurando la confianza de sus clientes.</p>
                                <p class="card-text"><small class="text-muted">Empresa Anónima</small></p>
                            </div>
                        </div>
                        <div class="card ">
                            <img src="/../../ASAHEL-IT-2/src/img/slide3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Seguridad Avanzada en la Era de la Información</h5>
                                <p class="card-text">La empresa logró un control total sobre su información, protegiendo sus activos y asegurando su liderazgo en el mercado.</p>
                                <p class="card-text"><small class="text-muted">Empresa Anónima</small></p>
                            </div>
                        </div>
                        <div class="card ">
                            <img src="/../../ASAHEL-IT-2/src/img/imga.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Innovación en Seguridad para el Cuidado de la Salud</h5>
                                <p class="card-text">Los hospitales mejoraron su eficiencia operativa y redujeron costos, manteniendo al mismo tiempo la más alta confidencialidad y seguridad de la información del paciente.</p>
                                <p class="card-text"><small class="text-muted">Empresa Anónima</small></p>
                            </div>
                        </div>
                    </div>
                    <br>

                    <a href="/../../ASAHEL-IT-2/php/blog.php" class="btn btn-light shadow-lg">Saber más</a>
                    <br>
                    <br>
                </section>
                <br>
                <br>
                <br>
                <br>
            </div>
            <br>




            <br>
            <br>
            <br>
            <div class="acordeon">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Nuestra Misión
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <strong>Proveer soluciones integrales </strong> que protegen activos, aumentan la eficiencia operativa, y ofrecen un ahorro de costos significativo, asegurando un mayor control de la información.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Nuestro Enfoque
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <strong>Implementamos medidas de seguridad de vanguardia </strong> como autenticación de dos factores, firewalls y soluciones antimalware. Nos aseguramos de que su información esté segura, encriptada y respaldada continuamente.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Nuestros Servicios
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <ul>
                                    <li>Monitoreo proactivo de la red</li>
                                    <li>Gestión de incidentes</li>
                                    <li>Actualización de sistemas</li>
                                    <li>Seguridad y recuperación de datos</li>
                                    <li>Gestión de amenazas avanzadas</li>
                                    <li>Educación y concienciación en seguridad</li>
                                    <li>Optimización de recursos</li>
                                    <li>Servicios de seguridad de información</li>
                                    <li><strong>SOPORTE 24/7</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>



            <div class="">
                <br>
                <br>

                <div class="row justify-content-center">
                    <div class="col-l-4">
                        <div class="card w-auto h-auto shadow-lg">
                            <div class="card-body">
                                <h3 class="card-title">¿Por qué elegir AIS ASAHEL IT SERVICES?</h3>
                                <p class="card-text">
                                    <strong>Experiencia Comprobada:</strong> Más de una década protegiendo a empresas como la tuya.
                                </p>
                                <p>

                                    <strong>Soluciones Personalizadas:</strong> Adaptamos nuestras estrategias a tus necesidades específicas.
                                </p>
                                <p>

                                    <strong>Soporte Continuo:</strong> Asistencia 24/7 para garantizar la seguridad de tu información.
                                </p>
                                <a href="/../../ASAHEL-IT-2/php/productos.php" class="btn btn-dark shadow-lg" style="max-width: 100px;">Contratar</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>


</body>

<footer class="bd-footer shadow-lg py-4 py-md-5 mt-5 bg-dark sticky-bottom">

    <div class="container-fluid">
        <div class="d-flex flex-row mb-1">

            <a class="navbar-brand" href="#">
                <img src="https://imgs.search.brave.com/B0bfG2UpSi6QnObMAa4IVKLCMJKeJ_7GPAkQCVB05k8/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9jZG4w/Lmljb25maW5kZXIu/Y29tL2RhdGEvaWNv/bnMvc3RyZWFtbGlu/ZS1lbW9qaS0xLzQ4/LzA5Mi1yb2JvdC1m/YWNlLTEtNjQucG5n" alt="" width="30" height="24" class="d-inline-block align-text-top">
                <span style="font-weight: bolder; color: #f2f2f2;">ASAHEL IT SERVICES</span>
            </a>
        </div>
        <div class="d-flex justify-content-center mb-1">
            <ul class="nav flex-column">
                <span style="font-weight: bold; color:#f2f2f2;">¡CONTACTANOS!</span>
                <li class="nav-item">
                    <a href="www.facebook.com" class="nav-link">
                        <i class="fa-brands fa-facebook-f"></i> Facebook
                    </a>
                </li>
                <li class="nav-item">
                    <a href="www.instagram.com" class="nav-link">
                        <i class="fa-brands fa-instagram"></i> Instagram
                    </a>
                <li class="nav-item">
                    <a href="www.gmail.com" class="nav-link">
                        <i class="fa-regular fa-envelope"></i> Mail
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

</html>