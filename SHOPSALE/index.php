<?php include('includes/header.php'); ?>
<?php include('includes/conexion.php'); ?>

<!-- CONTENIDO EXCLUSIVO DE LA HOME -->
<div class="text-center">
  <h1>Bienvenido a SHOPSALE</h1>
  <p>Aquí iría el carrusel de imágenes y las promociones destacadas.</p>

  <!-- Ejemplo de estructura básica basada en boceto -->
  <div class="alert alert-info">
    Este espacio es el "Main" del boceto Página Principal.
  </div>
</div>

<div class="alert alert-success text-center">
  <?php
  if (isset($con)) {
    echo "¡Conexión Exitosa a la Base de Datos!";
  }
  ?>
</div>

<?php include('includes/footer.php'); ?>