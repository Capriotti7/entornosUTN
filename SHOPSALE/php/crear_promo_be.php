<?php
include '../includes/conexion.php';

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion_breve'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$id_local = $_POST['id_local'];
$categoria_cliente = $_POST['categoria_cliente'];

// Los checkboxes de días llegan como un Array (ej: [1, 2, 5]). 
// Usamos implode() para convertirlo en un texto separado por comas: "1,2,5"
$dias_semana = "";
if(isset($_POST['dias']) && !empty($_POST['dias'])) {
    $dias_semana = implode(',', $_POST['dias']);
} else {
    // Validación si no marcó ningún día
    echo '<script>
            alert("Debes seleccionar al menos un día de la semana.");
            window.history.back();
          </script>';
    exit;
}

if ($fecha_inicio > $fecha_fin) {
  echo '<script>
            alert("La fecha de inicio no puede ser posterior a la de fin.");
            window.history.back();
          </script>';
  exit;
}

$estado = 'pendiente';

$query = "INSERT INTO promociones (titulo, descripcion_breve, fecha_inicio, fecha_fin, estado, id_local, categoria_cliente, dias_semana) 
          VALUES ('$titulo', '$descripcion', '$fecha_inicio', '$fecha_fin', '$estado', '$id_local', '$categoria_cliente', '$dias_semana')";

$ejecutar = mysqli_query($con, $query);

if ($ejecutar) {
  echo '<script>
            alert("¡Promoción creada! Fue enviada al administrador para su revisión.");
            window.location = "../promociones.php";
          </script>';
} else {
  echo '<script>
            alert("Error al crear promoción: ' . mysqli_error($con) . '");
            window.history.back();
          </script>';
}
?>