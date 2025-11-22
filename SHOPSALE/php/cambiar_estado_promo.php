<?php
session_start();
include '../includes/conexion.php';

// Verificar que sea admin
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin'){
    header("location: ../index.php");
    exit;
}

// Recibir datos de la URL (GET)
if(isset($_GET['id']) && isset($_GET['estado'])){
    
    $id_promo = $_GET['id'];
    $nuevo_estado = $_GET['estado']; // 'aprobada' o 'rechazada'

    // Actualizar en Base de Datos
    $sql = "UPDATE promociones SET estado = '$nuevo_estado' WHERE id = $id_promo";
    
    if(mysqli_query($con, $sql)){
        // Éxito
        header("location: ../panel_admin.php");
    } else {
        echo "Error al actualizar: " . mysqli_error($con);
    }

} else {
    header("location: ../panel_admin.php");
}
?>