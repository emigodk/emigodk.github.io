<?php
require 'database.php';
if (!isset($_SESSION)) {
  session_start();
}

// Obtener los datos del formulario
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$nombreCompleto = $_POST['nombreCompleto'];
$descripcion = $_POST['descripcion'];

// Verificar si hay una sesión activa y obtener el idUsuario, si no hay sesion activa, redirigir al login
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../users/login.php");
    exit;}
    else{

      $idUsuario = isset($_SESSION['idUsuario'])
      ? $_SESSION['idUsuario'] : '';
    }

// Insertar datos en la tabla de requests usando una consulta preparada
$sql = "INSERT INTO requests (idUsuario, asunto, nombreCompleto, descripcion, correo) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "issss", $idUsuario, $asunto, $nombreCompleto, $descripcion, $correo);

if (mysqli_stmt_execute($stmt)) {
    // Mostrar mensaje de confirmación
  require 'contacto.php';
  echo '<style>
    /* COMMON STYLES*/
.popup {
    margin: 10px;
    box-shadow: 4px 4px 10px -10px rgba(0, 0, 0, 1);
    width: 300px;
    justify-content: space-around;
    align-items: center;
    display: flex;
    border-radius: 4px;
    padding: 5px 0;
    font-weight: 300;
  }
  .popup svg {
    width: 1.25rem;
    height: 1.25rem;
  }
  .popup-icon svg {
    margin: 5px;
    display: flex;
    align-items: center;
  }
  .close-icon {
    margin-left: auto;
  }
  .close-svg {
    cursor: pointer;
  }
  .close-path {
    fill: grey;
  }
  
  /*SEPERATE STYLES*/
  
  /* SUCCESS */
  .success-popup {
    background-color: #edfbd8;
    border: solid 1px #84d65a;
  }
  .success-icon path {
    fill: #84d65a;
  }
  .success-message {
    color: #2b641e;
  }
  
  /* ALERT */
  .alert-popup {
    background-color: #fefce8;
    border: solid 1px #facc15;
  }
  .alert-icon path {
    fill: #facc15;
  }
  .alert-message {
    color: #ca8a04;
  }
  
  /* ERROR */
  
  .error-popup {
    background-color: #fef2f2;
    border: solid 1px #f87171;
  }
  .error-icon path {
    fill: #f87171;
  }
  .error-message {
    color: #991b1b;
  }
  
  /* INFO */
  
  .info-popup {
      background-color: #eff6ff;
      border: solid 1px #1d4ed8;
    }
    .info-icon path {
        fill: #1d4ed8;
    }
    .info-message {
        color: #1d4ed8;
    }
    
    </style>
<center>
        <div class="cont" style="margin: 0 auto; ">
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
        <div class="success-message">Request enviado correctamente, te contactaremos!</div>
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
</div>
</center>
';
    exit();
} else {
    // Mostrar mensaje de error si falla la ejecución de la consulta
    echo '
    <style> 
    /* COMMON STYLES*/
.popup {
    margin: 10px;
    box-shadow: 4px 4px 10px -10px rgba(0, 0, 0, 1);
    width: 300px;
    justify-content: space-around;
    align-items: center;
    display: flex;
    border-radius: 4px;
    padding: 5px 0;
    font-weight: 300;
  }
  .popup svg {
    width: 1.25rem;
    height: 1.25rem;
  }
  .popup-icon svg {
    margin: 5px;
    display: flex;
    align-items: center;
  }
  .close-icon {
    margin-left: auto;
  }
  .close-svg {
    cursor: pointer;
  }
  .close-path {
    fill: grey;
  }
  
  /*SEPERATE STYLES*/
  
  /* SUCCESS */
  .success-popup {
    background-color: #edfbd8;
    border: solid 1px #84d65a;
  }
  .success-icon path {
    fill: #84d65a;
  }
  .success-message {
    color: #2b641e;
  }
  
  /* ALERT */
  .alert-popup {
    background-color: #fefce8;
    border: solid 1px #facc15;
  }
  .alert-icon path {
    fill: #facc15;
  }
  .alert-message {
    color: #ca8a04;
  }
  
  /* ERROR */
  
  .error-popup {
    background-color: #fef2f2;
    border: solid 1px #f87171;
  }
  .error-icon path {
    fill: #f87171;
  }
  .error-message {
    color: #991b1b;
  }
  
  /* INFO */
  
  .info-popup {
    background-color: #eff6ff;
    border: solid 1px #1d4ed8;
  }
  .info-icon path {
    fill: #1d4ed8;
  }
  .info-message {
    color: #1d4ed8;
  }
  
    </style>
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
          <div class="alert-message">Error en el envío de request</div>
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
';
}

mysqli_stmt_close($stmt);
mysqli_close($db);

?>
