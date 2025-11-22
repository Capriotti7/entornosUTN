<?php include('includes/header.php'); ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
          <h4>Iniciar Sesión</h4>
        </div>
        <div class="card-body">
          <form action="php/login_be.php" method="POST">

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="password" required>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
          </form>
        </div>
        <div class="card-footer text-center">
          <small>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></small>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>