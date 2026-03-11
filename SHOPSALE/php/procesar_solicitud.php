<?php
session_start();
include '../includes/conexion.php';

if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'dueno') {
    header("Location: ../index.php");
    exit;
}

if(isset($_GET['accion']) && isset($_GET['id'])) {
    $accion = $_GET['accion']; // 'aceptado' o 'rechazada'
    $id_solicitud = mysqli_real_escape_string($con, $_GET['id']);
    
    // Actualizar el estado de la solicitud
    mysqli_query($con, "UPDATE uso_promociones SET estado = '$accion' WHERE id = '$id_solicitud'");
    
    // Lógica de categorías si se aceptó la promo
    if($accion == 'aceptado') {
        // Buscamos a qué cliente le pertenece esta solicitud
        $res_solicitud = mysqli_query($con, "SELECT id_cliente FROM uso_promociones WHERE id = '$id_solicitud'");
        $id_cliente = mysqli_fetch_assoc($res_solicitud)['id_cliente'];
        
        // Contamos cuántas promos ACEPTADAS tiene este cliente en total
        $res_conteo = mysqli_query($con, "SELECT COUNT(*) as total_usos FROM uso_promociones WHERE id_cliente = '$id_cliente' AND estado = 'aceptado'");
        $total_usos = mysqli_fetch_assoc($res_conteo)['total_usos'];
        
        // Evaluamos para subir de nivel (3 para Medium, 6 para Premium)
        $nueva_categoria = 'Inicial';
        if($total_usos >= 6) {
            $nueva_categoria = 'Premium';
        } else if($total_usos >= 3) {
            $nueva_categoria = 'Medium';
        }
        
        // Actualizamos al cliente
        mysqli_query($con, "UPDATE usuarios SET categoria_cliente = '$nueva_categoria' WHERE id = '$id_cliente'");
    }
    
    echo "<script>
            alert('Solicitud " . $accion . " exitosamente.');
            window.location = '../gestionar_solicitudes.php';
        </script>";
} else {
    header("Location: ../gestionar_solicitudes.php");
}
?>