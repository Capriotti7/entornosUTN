<?php include('includes/header.php'); ?>

<div class="container mt-5 mb-5 d-flex justify-content-center align-items-center" style="flex: 1;">
  <div class="col-md-6 col-lg-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-body p-5">
        
        <div class="text-center mb-4">
          <h3 class="fw-bold text-dark mb-2">Sumate a SHOP<span class="text-warning">SALE</span></h3>
          <p class="text-muted">Creá tu cuenta y empezá a disfrutar de beneficios exclusivos.</p>
        </div>

        <form action="php/registro_be.php" method="POST">
          
          <div class="mb-3">
            <label for="nombre" class="form-label fw-semibold text-secondary">Nombre Completo</label>
            <div class="input-group">
              <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
              <input type="text" class="form-control border-start-0 bg-light" name="nombre" placeholder="Ej: Juan Pérez" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label fw-semibold text-secondary">Correo Electrónico</label>
            <div class="input-group">
              <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
              <input type="email" class="form-control border-start-0 bg-light" name="email" placeholder="tu@email.com" required>
            </div>
          </div>

          <div class="mb-4">
            <label for="password" class="form-label fw-semibold text-secondary">Contraseña</label>
            <div class="input-group">
              <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
              <input type="password" class="form-control border-start-0 bg-light" name="password" placeholder="Mínimo 6 caracteres" required>
            </div>
          </div>

          <div class="mb-4">
            <label for="rol" class="form-label fw-semibold text-secondary">¿Qué tipo de cuenta querés crear?</label>
            <div class="input-group">
              <span class="input-group-text bg-light border-end-0"><i class="bi bi-person-badge text-muted"></i></span>
              <select class="form-select border-start-0 bg-light" name="rol" id="rol" required>
                <option value="cliente" selected>Soy Cliente (Quiero ver promociones)</option>
                <option value="dueno">Soy Dueño de Local (Quiero publicar promociones)</option>
              </select>
            </div>
          </div>

          <div class="d-grid gap-3 mt-4">
            <button type="submit" class="btn btn-warning btn-lg rounded-pill fw-bold text-dark shadow-sm">Crear Cuenta</button>
            <a href="index.php" class="btn btn-outline-dark rounded-pill fw-bold">Volver al Inicio</a>
          </div>
        </form>

      </div>
      
      <div class="card-footer bg-light border-0 text-center py-3 rounded-bottom-4">
        <span class="text-muted">¿Ya tenés una cuenta?</span> 
        <a href="login.php" class="text-dark fw-bold text-decoration-none border-bottom border-warning border-2 pb-1">Iniciá Sesión</a>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>