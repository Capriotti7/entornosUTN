<?php
include('includes/header.php');
include('includes/conexion.php');

// Verificar si es admin o dueño
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'dueno')) {
  header("location: index.php");
  exit;
}
?>

<div class="container mt-5 mb-5 d-flex justify-content-center">
  <div class="col-md-8 col-lg-7">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-header bg-warning text-dark text-center rounded-top-4 py-3 border-0">
        <h4 class="mb-0 fw-bold"><i class="bi bi-tag-fill me-2"></i>Crear Nueva Promoción</h4>
      </div>
      
      <div class="card-body p-5 bg-light">
        <form action="php/crear_promo_be.php" method="POST">

          <div class="mb-3">
            <label class="form-label fw-bold text-secondary">Título de la Promoción</label>
            <input type="text" class="form-control rounded-3" name="titulo" placeholder="Ej: 2x1 en Zapatillas" required>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold text-secondary">Local</label>
            <select class="form-select rounded-3" name="id_local" required>
              <option value="" selected disabled>Selecciona el local...</option>
              <?php

              $email_dueno = $_SESSION['usuario'];
              $consulta_id = mysqli_query($con, "SELECT id FROM usuarios WHERE email = '$email_dueno'");
              $usuario_actual = mysqli_fetch_assoc($consulta_id);
              $id_usuario_actual = $usuario_actual['id'];

              $filtro_dueno = "";
              if($_SESSION['rol'] == 'dueno') {
                  $filtro_dueno = "WHERE id_usuario = '$id_usuario_actual'";
              }
              
              $sql = "SELECT id, nombre FROM locales $filtro_dueno";
              $resultado = mysqli_query($con, $sql);
              
              if(mysqli_num_rows($resultado) > 0) {
                  while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                  }
              } else {
                  echo "<option value='' disabled>No tenés locales asignados todavía</option>";
              }
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold text-secondary">Descripción Breve</label>
            <textarea class="form-control rounded-3" name="descripcion_breve" rows="2" placeholder="Válido solo en efectivo..." required></textarea>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold text-secondary">Fecha Inicio</label>
              <input type="date" class="form-control rounded-3" name="fecha_inicio" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold text-secondary">Fecha Fin</label>
              <input type="date" class="form-control rounded-3" name="fecha_fin" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold text-secondary">Categoría Mínima Requerida</label>
            <select class="form-select rounded-3" name="categoria_cliente" required>
              <option value="Inicial">Inicial (La ven todos los clientes)</option>
              <option value="Medium">Medium (Solo clientes Medium y Premium)</option>
              <option value="Premium">Premium (Exclusiva para clientes Premium)</option>
            </select>
            <div class="form-text small">Indicá qué nivel de cliente debe tener el usuario para usar esta oferta.</div>
          </div>

          <div class="mb-4">
            <label class="form-label fw-bold text-secondary d-block">Días de vigencia</label>
            <div class="d-flex flex-wrap gap-3">
              <div class="form-check">
                <input class="form-check-input border-secondary" type="checkbox" name="dias[]" value="1" id="d1" checked>
                <label class="form-check-label" for="d1">Lun</label>
              </div>
              <div class="form-check">
                <input class="form-check-input border-secondary" type="checkbox" name="dias[]" value="2" id="d2" checked>
                <label class="form-check-label" for="d2">Mar</label>
              </div>
              <div class="form-check">
                <input class="form-check-input border-secondary" type="checkbox" name="dias[]" value="3" id="d3" checked>
                <label class="form-check-label" for="d3">Mié</label>
              </div>
              <div class="form-check">
                <input class="form-check-input border-secondary" type="checkbox" name="dias[]" value="4" id="d4" checked>
                <label class="form-check-label" for="d4">Jue</label>
              </div>
              <div class="form-check">
                <input class="form-check-input border-secondary" type="checkbox" name="dias[]" value="5" id="d5" checked>
                <label class="form-check-label" for="d5">Vie</label>
              </div>
              <div class="form-check">
                <input class="form-check-input border-secondary" type="checkbox" name="dias[]" value="6" id="d6" checked>
                <label class="form-check-label" for="d6">Sáb</label>
              </div>
              <div class="form-check">
                <input class="form-check-input border-secondary" type="checkbox" name="dias[]" value="7" id="d7" checked>
                <label class="form-check-label" for="d7">Dom</label>
              </div>
            </div>
            <div class="form-text small">Desmarcá los días en que la promoción NO aplica.</div>
          </div>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top pt-4">
            <a href="promociones.php" class="btn btn-outline-dark rounded-pill px-4 fw-bold">Cancelar</a>
            <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold text-dark shadow-sm">Enviar para Aprobación</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>