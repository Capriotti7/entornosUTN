<?php
include('includes/header.php');

// Verificar si es administrador (Seguridad)
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
  header("location: index.php");
  exit;
}
?>

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-dark text-white">
      <h4>Agregar Nuevo Local</h4>
    </div>
    <div class="card-body">
      <form action="php/crear_local_be.php" method="POST" enctype="multipart/form-data">

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Nombre del Local</label>
            <input type="text" class="form-control" name="nombre" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Rubro</label>
            <select class="form-select" name="rubro" required>
              <option value="Moda">Moda</option>
              <option value="Tecnologia">Tecnología</option>
              <option value="Gastronomia">Gastronomía</option>
              <option value="Hogar">Hogar</option>
            </select>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Ubicación (Ej: Piso 1, Local 40)</label>
          <input type="text" class="form-control" name="ubicacion" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea class="form-control" name="descripcion" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Imagen del Local</label>
          <input type="file" class="form-control" name="imagen" accept="image/*" required>
        </div>

        <!-- Asignar Dueño: Aquí cargamos los usuarios desde la BD -->
        <div class="mb-3">
          <label class="form-label">Dueño Encargado</label>
          <select class="form-select" name="id_usuario" required>
            <option value="" selected disabled>Seleccione un dueño...</option>
            <?php
            // Traemos todos los usuarios para elegir quién es el dueño
            include('includes/conexion.php');
            $sql = "SELECT id, nombre, email FROM usuarios";
            $resultado = mysqli_query($con, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)) {
              echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . " (" . $fila['email'] . ")</option>";
            }
            ?>
          </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Local</button>
        <a href="locales.php" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>