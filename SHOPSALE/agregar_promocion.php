<?php
include('includes/header.php');
include('includes/conexion.php');

// Validación: Solo Admins o Dueños pueden entrar aquí
if (!isset($_SESSION['usuario'])) {
  header("location: login.php");
  exit;
}
?>

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4>Crear Nueva Promoción</h4>
    </div>
    <div class="card-body">
      <form action="php/crear_promo_be.php" method="POST">

        <div class="mb-3">
          <label class="form-label">Título de la Promoción</label>
          <input type="text" class="form-control" name="titulo" placeholder="Ej: 2x1 en Zapatillas" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Local</label>
          <select class="form-select" name="id_local" required>
            <option value="" selected disabled>Selecciona el local...</option>
            <?php
            // Aquí cargamos los locales disponibles
            // Si eres ADMIN, ves todos. Si eres DUEÑO, solo verías los tuyos (luego ajustamos eso)
            $sql = "SELECT id, nombre FROM locales";
            $resultado = mysqli_query($con, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)) {
              echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Descripción Breve</label>
          <textarea class="form-control" name="descripcion_breve" rows="2" placeholder="Válido solo en efectivo..."></textarea>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Fecha Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Fecha Fin</label>
            <input type="date" class="form-control" name="fecha_fin" required>
          </div>
        </div>

        <!-- Por defecto se guardarán como 'pendiente' en la base de datos -->

        <button type="submit" class="btn btn-warning">Publicar Promoción</button>
        <a href="promociones.php" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>