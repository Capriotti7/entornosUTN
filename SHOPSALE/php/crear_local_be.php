<?php
include '../includes/conexion.php';

$nombre = $_POST['nombre'];
$rubro = $_POST['rubro'];
$ubicacion = $_POST['ubicacion'];
$descripcion = $_POST['descripcion'];
$id_usuario = $_POST['id_usuario'];

// MANEJO DE LA IMAGEN
$imagen = $_FILES['imagen']; // Esto es un array con info de la imagen: name, type, tmp_name, error, size
$nombre_imagen = $imagen['name'];
$tipo_imagen = $imagen['type'];
$ruta_temporal = $imagen['tmp_name'];

// Validar que sea imagen
if ($tipo_imagen == "image/jpg" || $tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png") {

  // time() agrega números al nombre para evitar duplicados si suben dos fotos con el mismo nombre
  $nombre_final = time() . "_" . $nombre_imagen;
  $destino = "../assets/img/locales/" . $nombre_final;

  move_uploaded_file($ruta_temporal, $destino);

  $query = "INSERT INTO locales (nombre, rubro, ubicacion, descripcion, imagen, id_usuario) 
              VALUES ('$nombre', '$rubro', '$ubicacion', '$descripcion', '$nombre_final', '$id_usuario')";

  $ejecutar = mysqli_query($con, $query);

  if ($ejecutar) {
    echo '<script>
                alert("Local creado exitosamente");
                window.location = "../locales.php";
              </script>';
  } else {
    echo '<script>
                alert("Error al guardar en BD: ' . mysqli_error($con) . '");
                window.location = "../agregar_local.php";
              </script>';
  }
} else {
  echo '<script>
            alert("Formato de imagen no válido (use jpg, jpeg o png)");
            window.location = "../agregar_local.php";
          </script>';
}
