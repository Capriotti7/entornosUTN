<?php
include '../includes/conexion.php';

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion_breve'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$id_local = $_POST['id_local'];

if ($fecha_inicio > $fecha_fin) {
  echo '<script>
            alert("La fecha de inicio no puede ser posterior a la de fin.");
            window.location = "../agregar_promocion.php";
          </script>';
  exit;
}

// Insertamos. El estado por defecto en la BD es 'pendiente'.
$estado = 'pendiente';

$query = "INSERT INTO promociones (titulo, descripcion_breve, fecha_inicio, fecha_fin, estado, id_local) 
          VALUES ('$titulo', '$descripcion', '$fecha_inicio', '$fecha_fin', '$estado', '$id_local')";

$ejecutar = mysqli_query($con, $query);

if ($ejecutar) {
  echo '<script>
            alert("Promoción creada exitosamente.");
            window.location = "../promociones.php";
          </script>';
} else {
  echo '<script>
            alert("Error al crear promoción: ' . mysqli_error($con) . '");
            window.location = "../agregar_promocion.php";
          </script>';
}
