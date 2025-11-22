<?php include('includes/header.php'); ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
          <h4>Registrarse en SHOPSALE</h4>
        </div>
        <div class="card-body">
          <!-- El formulario envía los datos al archivo registro_be.php dentro de la carpeta php -->
          <form action="php/registro_be.php" method="POST">

            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre Completo</label>
              <input type="text" class="form-control" name="nombre" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="password" required>
            </div>

            <!-- Por ahora, todos se registrarán como 'cliente' por defecto. 
                             Luego gestionamos dueños -->

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Registrarse</button>
              <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
            </div>
          </form>
        </div>
        <div class="card-footer text-center">
          <small>¿Ya tienes cuenta? <a href="login.php">Iniciar Sesión</a></small>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>