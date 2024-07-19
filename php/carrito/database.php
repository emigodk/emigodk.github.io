<?php /* $variable = mysqli_connect('ipDB', 'usuario', 'password', 'nombreDB');  */
$db = mysqli_connect('localhost','root','Dinosaurio123#', 'asahel_db');
if(!$db){
    echo "Error en la conexión";
}
?>