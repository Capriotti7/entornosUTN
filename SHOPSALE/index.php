<?php include('includes/header.php'); ?>
<?php include('includes/conexion.php'); ?>

<!-- 1. CARRUSEL DE IMÁGENES (BANNER PRINCIPAL) -->
<div id="carouselPrincipal" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="2"></button>
  </div>
  <div class="carousel-inner rounded shadow">
    <!-- Slide 1 -->
    <div class="carousel-item active">
      <img src="assets/img/banner1.jpg" class="d-block w-100" alt="Banner 1" style="height: 400px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Las mejores marcas en un solo lugar</h5>
        <p>Encontrá todo lo que buscás en Rosario.</p>
      </div>
    </div>
    <!-- Slide 2 -->
    <div class="carousel-item">
      <img src="assets/img/banner2.jpg" class="d-block w-100" alt="Banner 2" style="height: 400px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Ahorrá en tus compras</h5>
        <p>Registrate para acceder a descuentos increíbles.</p>
      </div>
    </div>
    <!-- Slide 3 -->
    <div class="carousel-item">
      <img src="assets/img/banner3.jpg" class="d-block w-100" alt="Banner 3" style="height: 400px; object-fit: cover;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

<!-- 2. ÚLTIMAS PROMOCIONES (DESTACADOS) -->
<div class="container">
  <h2 class="text-center mb-4">🔥 Últimas Promociones Agregadas</h2>
  <div class="row">
    <?php
    // Consultamos las últimas 3 promociones aprobadas
    $sql = "SELECT p.*, l.nombre as nombre_local 
                FROM promociones p 
                INNER JOIN locales l ON p.id_local = l.id 
                WHERE p.estado = 'aprobada' 
                ORDER BY p.id DESC LIMIT 3";

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <div class="col-md-4">
          <div class="card text-center h-100 shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title text-primary"><?php echo $row['titulo']; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['nombre_local']; ?></h6>
              <p class="card-text"><?php echo $row['descripcion_breve']; ?></p>
              <a href="promociones.php" class="btn btn-outline-primary btn-sm">Ver más</a>
            </div>
          </div>
        </div>
    <?php
      }
    } else {
      echo "<p class='text-center text-muted'>Aún no hay promociones destacadas.</p>";
    }
    ?>
  </div>
</div>

<!-- 3. ACCESOS RÁPIDOS -->
<div class="container mt-5 mb-5">
  <div class="row text-center">
    <div class="col-md-4">
      <div class="p-4 border rounded bg-light">
        <h3><i class="bi bi-shop"></i> Locales</h3>
        <p>Explorá todas nuestras tiendas por rubro.</p>
        <a href="locales.php" class="btn btn-dark">Ver Locales</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-4 border rounded bg-light">
        <h3><i class="bi bi-newspaper"></i> Noticias</h3>
        <p>Enterate de los últimos eventos y aperturas.</p>
        <a href="noticias.php" class="btn btn-dark">Ver Noticias</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-4 border rounded bg-light">
        <h3><i class="bi bi-envelope"></i> Contacto</h3>
        <p>¿Tenés dudas? Escribinos.</p>
        <a href="#footer" class="btn btn-dark">Contactar</a>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>