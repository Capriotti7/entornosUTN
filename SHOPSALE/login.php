<?php include('includes/header.php'); ?>

<div class="container mt-5 mb-5 d-flex justify-content-center align-items-center" style="flex: 1;">
  <div class="col-md-5 col-lg-4">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-body p-5">
        
        <div class="text-center mb-4">
          <div class="d-inline-flex align-items-center justify-content-center bg-dark text-warning rounded-circle mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-person-fill fs-2"></i>
          </div>
          <h3 class="fw-bold text-dark">¡Hola de nuevo!</h3>
          <p class="text-muted">Ingresá tus datos para continuar</p>
        </div>

        <form action="php/login_be.php" method="POST">
          <div class="mb-4">
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
              <input type="password" class="form-control border-start-0 bg-light" name="password" placeholder="••••••••" required>
            </div>
          </div>

          <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-dark btn-lg rounded-pill fw-bold shadow-sm">Ingresar</button>
          </div>
        </form>

      </div>
      
      <div class="card-footer bg-light border-0 text-center py-3 rounded-bottom-4">
        <span class="text-muted">¿No tenés cuenta?</span> 
        <a href="registro.php" class="text-dark fw-bold text-decoration-none border-bottom border-warning border-2 pb-1">Registrate acá</a>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>