<?php include('includes/header.php'); ?>
<?php include('includes/conexion.php'); ?>

<div class="container mt-4 mb-5">
  <div id="carouselPrincipal" class="carousel slide shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#carouselPrincipal" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/banner1.jpg" class="d-block w-100" alt="Banner 1" style="height: 450px; object-fit: cover;">
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/banner2.jpg" class="d-block w-100" alt="Banner 2" style="height: 450px; object-fit: cover;">
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/banner3.jpg" class="d-block w-100" alt="Banner 3" style="height: 450px; object-fit: cover;">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>
</div>

<div class="container mb-5 pb-4 border-bottom">
  <div class="text-center mb-5">
    <h2 class="fw-bold"><i class="bi bi-star-fill text-warning me-2"></i> Últimas Promociones</h2>
  </div>
  
  <div class="row g-4 justify-content-center">
    <?php
    // Aseguramos que la conexión exista para no tirar error
    if(isset($con)) {
        $sql = "SELECT p.*, l.nombre as nombre_local 
                FROM promociones p 
                INNER JOIN locales l ON p.id_local = l.id 
                WHERE p.estado = 'aprobada' 
                ORDER BY p.id DESC LIMIT 3";
        $res = mysqli_query($con, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
    ?>
            <div class="col-md-4">
              <div class="card text-center h-100 shadow-sm border-0 border-top border-warning border-3">
                <div class="card-body d-flex flex-column p-4">
                  <h6 class="text-muted text-uppercase small fw-bold mb-1"><?php echo $row['nombre_local']; ?></h6>
                  <h4 class="card-title fw-bold text-dark mb-3"><?php echo $row['titulo']; ?></h4>
                  <p class="card-text text-muted flex-grow-1"><?php echo $row['descripcion_breve']; ?></p>
                  <a href="promociones.php" class="btn btn-outline-dark mt-auto w-100 rounded-pill">Ver Detalle</a>
                </div>
              </div>
            </div>
    <?php
          }
        } else {
          echo "<div class='col-12'><p class='text-center text-muted'>Aún no hay promociones destacadas en este momento.</p></div>";
        }
    } else {
        echo "<div class='col-12'><p class='text-center text-danger'>Error: Falta configurar el archivo conexion.php</p></div>";
    }
    ?>
  </div>
</div>

<div class="container mb-5">
  <div class="row g-4 justify-content-center">
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 bg-white hover-zoom">
        <div class="card-body d-flex flex-column text-center p-4">
          <div class="display-5 text-warning mb-3"><i class="bi bi-shop"></i></div>
          <h4 class="card-title fw-bold mb-3">Locales</h4>
          <p class="card-text text-muted flex-grow-1">Explorá todas nuestras tiendas por rubro y descubrí tus favoritas.</p>
          <a href="locales.php" class="btn btn-dark mt-auto rounded-pill">Ver Locales</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 bg-white hover-zoom">
        <div class="card-body d-flex flex-column text-center p-4">
          <div class="display-5 text-warning mb-3"><i class="bi bi-newspaper"></i></div>
          <h4 class="card-title fw-bold mb-3">Noticias</h4>
          <p class="card-text text-muted flex-grow-1">Enterate de los últimos eventos y aperturas exclusivas en el shopping.</p>
          <a href="noticias.php" class="btn btn-dark mt-auto rounded-pill">Ver Noticias</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 bg-white hover-zoom">
        <div class="card-body d-flex flex-column text-center p-4">
          <div class="display-5 text-warning mb-3"><i class="bi bi-envelope"></i></div>
          <h4 class="card-title fw-bold mb-3">Contacto</h4>
          <p class="card-text text-muted flex-grow-1">¿Tenés dudas o sugerencias? Escribinos y nos pondremos en contacto.</p>
          <a href="contacto.php" class="btn btn-dark mt-auto rounded-pill">Contactarnos</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>