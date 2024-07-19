<?php
session_start();
$mensaje = "";

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {

        case 'Agregar':
            //Validar los datos de envío para el carrito
            //Validar IdServicio
            if (is_numeric($_POST['idServicio'])) {
                $idServicio = $_POST['idServicio'];
                $mensaje = "OK ID correcto" . $idServicio;
            } else {
                $mensaje = "Error ID incorrecto" . $idServicio;
            }
            //Validar Nombre
            if (is_string($_POST['nombre'])) {
                $nombre = $_POST['nombre'];
                $mensaje = "OK Nombre correcto" . $nombre;
            } else {
                $mensaje = "Error Nombre incorrecto" . $nombre;
            }
            //Validar Precio
            if (is_numeric($_POST['precio'])) {
                $precio = $_POST['precio'];
                $mensaje = "OK Precio correcto" . $precio;
            } else {
                $mensaje = "Error Precio incorrecto" . $precio;
            }
            //Validar Cantidad
            if (is_numeric($_POST['cantidad'])) {
                $cantidad = $_POST['cantidad'];
                $mensaje = "OK Cantidad correcto" . $cantidad;
            } else {
                $mensaje = "Error Cantidad incorrecto" . $cantidad;
            }


            // Si no hay una sesion activa, crearla y añadir el producto al carrito
            if (!isset($_SESSION['carrito'])) {
                //Guarda el producto
                $producto = array(
                    'idServicio' => $idServicio,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad
                );

                //Crea la sesion "carrito" y guarda en la posicion 0 (el primer elemento) al producto
                $_SESSION['carrito'][0] = $producto;
                $mensaje = "Servicio agregado al carrito" . " (" . $nombre . ")";
            } else {
                //Validar que el producto seleccionado no esté dentro del carrrito
                $idProductos = array_column($_SESSION['carrito'], 'idServicio');
                //Si el producto ya está en el carrito, mensaje de error "El producto ya está en el carrito"
                //---------------------------
                if (in_array($idServicio, $idProductos)) {
                    $mensaje = "El producto ya está en el carrito";
                } else {
                    //Si el producto no está en el carrito, añadirlo
                    $numeroProductos = count($_SESSION['carrito']);
                    $producto = array(
                        'idServicio' => $idServicio,
                        'nombre' => $nombre,
                        'precio' => $precio,
                        'cantidad' => $cantidad
                    );
                    $_SESSION['carrito'][$numeroProductos] = $producto;
                    $mensaje = "Servicio agregado al carrito" . " (" . $nombre . ")";
                }
                //----------------------------
                
/* por si da error el codigo entre barras:

// Si ya hay una sesion activa, verificar si el producto ya está en el carrito
                $idProductos = array_column($_SESSION['carrito'], 'idServicio');
                // Si el producto ya está en el carrito, aumentar la cantidad
                if (in_array($idServicio, $idProductos)) {
                    foreach ($_SESSION['carrito'] as $indice => $producto) {
                        if ($producto['idServicio'] == $idServicio) {
                            $_SESSION['carrito'][$indice]['cantidad'] += $cantidad;
                            $mensaje = "Servicio agregado al carrito" . " (" . $nombre . ")";
                        }
                    }
                
                } else {
                    // Si el producto no está en el carrito, añadirlo
                    $numeroProductos = count($_SESSION['carrito']);
                    $producto = array(
                        'idServicio' => $idServicio,
                        'nombre' => $nombre,
                        'precio' => $precio,
                        'cantidad' => $cantidad
                    );
                    $_SESSION['carrito'][$numeroProductos] = $producto;

                    // confirmamos que el producto se añadió y mostramos la informacion del producto
                    
                }


*/

            }

            break;

        case 'Eliminar':

            if (is_numeric($_POST['idServicio'])) {
                $idServicio = $_POST['idServicio'];
                foreach ($_SESSION['carrito'] as $indice => $producto) {
                    if ($producto['idServicio'] == $idServicio) {
                        unset($_SESSION['carrito'][$indice]);
                        $mensaje = "Producto eliminado";
                    }
                }
            } else {
                $mensaje = "Error ID incorrecto" . $idServicio;
            }

            break;
    }
}
