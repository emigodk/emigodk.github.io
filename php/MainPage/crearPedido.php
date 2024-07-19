<?php
session_start();
require 'database.php';
require 'verificarAdmin.php';
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../users/login.php");
    exit;
}

$idUsuario = $_SESSION['idUsuario'];


// Crear un nuevo pedido
    $sqlPedido = "INSERT INTO pedidos (idUsuario) VALUES ('$idUsuario')";
    if (mysqli_query($db, $sqlPedido)) {
        $idPedido = mysqli_insert_id($db);


        
        // Insertar los servicios seleccionados en el pedido
        foreach ($_POST['servicios'] as $idServicio) {
            $sqlPedidoServicio = "INSERT INTO carritos_servicios (idPedido, idServicio) VALUES ('$idPedido', '$idServicio')";
            mysqli_query($db, $sqlPedidoServicio);
        }

        // Si el query es exitoso, redirigir al carrito
        if($sqlPedidoServicio) {

            // Redirigir al carrito (opcional)
            header("Location: /../../ASAHEL-IT-2/php/carrito/carrito.php");
            echo '
            <center>
            <div class="popup-container">
            <div class="popup success-popup">
          <div class="popup-icon success-icon">
          <svg
          xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              class="success-svg"
              >
              <path
                fill-rule="evenodd"
                d="m12 1c-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11-4.925-11-11-11zm4.768 9.14c.0878-.1004.1546-.21726.1966-.34383.0419-.12657.0581-.26026.0477-.39319-.0105-.13293-.0475-.26242-.1087-.38085-.0613-.11844-.1456-.22342-.2481-.30879-.1024-.08536-.2209-.14938-.3484-.18828s-.2616-.0519-.3942-.03823c-.1327.01366-.2612.05372-.3782.1178-.1169.06409-.2198.15091-.3027.25537l-4.3 5.159-2.225-2.226c-.1886-.1822-.4412-.283-.7034-.2807s-.51301.1075-.69842.2929-.29058.4362-.29285.6984c-.00228.2622.09851.5148.28067.7034l3 3c.0983.0982.2159.1748.3454.2251.1295.0502.2681.0729.4069.0665.1387-.0063.2747-.0414.3991-.1032.1244-.0617.2347-.1487.3236-.2554z"
                clip-rule="evenodd"
              ></path>
              </svg>
              </div>
              <div class="success-message">Pedido creado correctamente</div>
              <div class="popup-icon close-icon">
              <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              aria-hidden="true"
              class="close-svg"
              >
              <path
              d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"
              class="close-path"
              ></path>
              </svg>
              </div>
              </div>
              </center>
              ';
              exit;
        } else {
            include 'productos.php';
            echo '
            <center>
            <div class="popup alert-popup">
              <div class="popup-icon alert-icon">
                <svg
                class="alert-svg"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                aria-hidden="true"
                >
                  <path
                  fill-rule="evenodd"
                  d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                  clip-rule="evenodd"
                  ></path>
                </svg>
              </div>
              <div class="alert-message"><?php echo "Error al crear el pedido: ". mysqli_error($db); ?></div>
              <div class="popup-icon close-icon">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  class="close-svg"
                >
                  <path
                    d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"
                    class="close-path"
                  ></path>
                </svg>
              </div>
            </div>
    
            </center>
    
            
            ';
        }    
            }
        
