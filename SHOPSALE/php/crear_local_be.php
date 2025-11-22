<?php
include '../includes/conexion.php';

// Recibir datos de texto
$nombre = $_POST['nombre'];
$rubro = $_POST['rubro'];
$ubicacion = $_POST['ubicacion'];
$descripcion = $_POST['descripcion'];
$id_usuario = $_POST['id_usuario'];

// MANEJO DE LA IMAGEN
$imagen = $_FILES['imagen']; // Array con info del archivo
$nombre_imagen = $imagen['name']; // Nombre original (ej: foto.jpg)
$tipo_imagen = $imagen['type'];
$ruta_temporal = $imagen['tmp_name'];

// Validar que sea imagen
if ($tipo_imagen == "image/jpg" || $tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png") {

  // Ruta donde guardaremos el archivo
  // time() agrega números al nombre para evitar duplicados si suben dos fotos con el mismo nombre
  $nombre_final = time() . "_" . $nombre_imagen;
  $destino = "../assets/img/locales/" . $nombre_final;

  // Mover el archivo a nuestra carpeta
  move_uploaded_file($ruta_temporal, $destino);

  // INSERTAR EN BASE DE DATOS
  // Guardamos solo el $nombre_final en la BD, no toda la ruta
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
