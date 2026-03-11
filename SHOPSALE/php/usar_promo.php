<?php
session_start();
include '../includes/conexion.php';

// Solo los clientes registrados pueden usar promos
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'cliente') {
    header("Location: ../login.php");
    exit;
}

if(isset($_GET['id_promo'])) {
    $id_promo = mysqli_real_escape_string($con, $_GET['id_promo']);
    $email_cliente = $_SESSION['usuario'];

    $res_cliente = mysqli_query($con, "SELECT id FROM usuarios WHERE email = '$email_cliente'");
    $datos_cliente = mysqli_fetch_assoc($res_cliente);
    $id_cliente = $datos_cliente['id'];

    $sql_insertar = "INSERT INTO uso_promociones (id_cliente, id_promo, estado) 
                     VALUES ('$id_cliente', '$id_promo', 'enviada')";
    
    if(mysqli_query($con, $sql_insertar)) {
        echo "<script>
                alert('¡Solicitud enviada con éxito! Acercate al local, el dueño deberá aceptar tu descuento.');
                window.location = '../promociones.php';
              </script>";
    } else {
        echo "<script>
                alert('Hubo un problema al procesar tu solicitud. Intentá de nuevo.');
                window.location = '../promociones.php';
              </script>";
    }
} else {
    header("Location: ../promociones.php");
}
?>