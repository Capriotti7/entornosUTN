<?php
session_start();
include '../includes/conexion.php';

// Verificamos que sea admin
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

if(isset($_GET['accion']) && isset($_GET['id'])) {
    $accion = $_GET['accion'];
    $id = mysqli_real_escape_string($con, $_GET['id']);
    
    switch($accion) {
        case 'aprobar_dueno':
            mysqli_query($con, "UPDATE usuarios SET estado_cuenta = 'aprobada' WHERE id = '$id'");
            $mensaje = "Dueño aprobado exitosamente.";
            break;
            
        case 'rechazar_dueno':
            mysqli_query($con, "DELETE FROM usuarios WHERE id = '$id'");
            $mensaje = "Solicitud de dueño denegada (cuenta eliminada).";
            break;
            
        case 'aprobar_promo':
            mysqli_query($con, "UPDATE promociones SET estado = 'aprobada' WHERE id = '$id'");
            $mensaje = "Promoción aprobada y publicada.";
            break;
            
        case 'rechazar_promo':
            mysqli_query($con, "DELETE FROM promociones WHERE id = '$id'");
            $mensaje = "Promoción denegada y eliminada.";
            break;
    }
    
    echo "<script>
            alert('$mensaje');
            window.location = '../panel_admin.php';
        </script>";
} else {
    header("Location: ../panel_admin.php");
}
?>