<?php include('includes/header.php'); ?>
<?php include('includes/conexion.php'); ?>

<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Promociones Vigentes</h1>
    <?php if (isset($_SESSION['usuario'])): ?>
      <a href="agregar_promocion.php" class="btn btn-warning">+ Nueva Promo</a>
    <?php endif; ?>
  </div>

  <div class="row">
    <?php
    // CONSULTA AVANZADA (JOIN)
    // Traemos datos de la promoción Y datos del local asociado
    $sql = "SELECT p.*, l.nombre as nombre_local, l.imagen as imagen_local 
                FROM promociones p 
                INNER JOIN locales l ON p.id_local = l.id 
                WHERE p.estado = 'aprobada'";

    $resultado = mysqli_query($con, $sql);

    if (mysqli_num_rows($resultado) > 0) {
      while ($fila = mysqli_fetch_assoc($resultado)) {
        // Calcular días restantes (opcional, detalle visual lindo)
        $fecha_fin = new DateTime($fila['fecha_fin']);
        $hoy = new DateTime();
        $dias_restantes = $hoy->diff($fecha_fin)->days;
    ?>

        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card border-warning h-100">
            <div class="card-header bg-transparent border-warning d-flex justify-content-between align-items-center">
              <small class="text-muted"><?php echo $fila['nombre_local']; ?></small>
              <img src="assets/img/locales/<?php echo $fila['imagen_local']; ?>"
                alt="Logo" class="rounded-circle" width="30" height="30" style="object-fit:cover;">
            </div>
            <div class="card-body text-center">
              <h2 class="card-title text-warning"><?php echo $fila['titulo']; ?></h2>
              <p class="card-text"><?php echo $fila['descripcion_breve']; ?></p>
              <hr>
              <p class="mb-0"><strong>Vigencia:</strong> <br>
                Del <?php echo date("d/m/Y", strtotime($fila['fecha_inicio'])); ?>
                al <?php echo date("d/m/Y", strtotime($fila['fecha_fin'])); ?>
              </p>
            </div>
            <div class="card-footer bg-warning text-dark text-center">
              <b>¡Quedan <?php echo $dias_restantes; ?> días!</b>
            </div>
          </div>
        </div>

    <?php
      }
    } else {
      echo "<div class='alert alert-info'>No hay promociones activas en este momento.</div>";
    }
    ?>
  </div>
</div>

<?php include('includes/footer.php'); ?>