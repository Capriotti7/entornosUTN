<?php
// Si la sesión no está iniciada, la iniciamos para poder leer las variables
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SHOPSALE - Promociones en tu Shopping</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
    <div class="container"> <a class="navbar-brand d-flex align-items-center" href="index.php">
        <svg width="160" height="40" viewBox="0 0 160 40" xmlns="http://www.w3.org/2000/svg" fill="none">
          <g transform="translate(0, 4)">
            <path d="M7 2V6C7 8.76142 9.23858 11 12 11C14.7614 11 17 8.76142 17 6V2" stroke="#343a40" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M3 7H21V26C21 27.6569 19.6569 29 18 29H6C4.34315 29 3 27.6569 3 26V7Z" fill="#343a40"/>
            <circle cx="16.5" cy="20.5" r="3.5" fill="#fdbd08"/>
          </g>
          <text x="32" y="28" font-family="'Segoe UI', Roboto, Helvetica, Arial, sans-serif" font-size="24" font-weight="800" fill="#343a40">SHOP<tspan fill="#fdbd08" font-weight="700">SALE</tspan></text>
        </svg>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link text-uppercase fw-semibold text-dark mx-2" href="locales.php">Locales</a></li>
          <li class="nav-item"><a class="nav-link text-uppercase fw-semibold text-dark mx-2" href="promociones.php">Promociones</a></li>
          <li class="nav-item"><a class="nav-link text-uppercase fw-semibold text-dark mx-2" href="noticias.php">Noticias</a></li>
        </ul>

        <div class="d-flex align-items-center">
          <a href="#" class="text-dark me-4 fs-5"><i class="bi bi-bell"></i></a>

          <?php if (isset($_SESSION['usuario'])): ?>
            <div class="dropdown">
              <button class="btn btn-dark dropdown-toggle rounded-pill px-4" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-1"></i> Hola, <?php echo $_SESSION['nombre_usuario']; ?>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="perfil.php">Mi Perfil</a></li>
          <?php if ($_SESSION['rol'] == 'dueno'): ?>
                  <li><a class="dropdown-item fw-bold text-warning" href="mis_locales.php"><i class="bi bi-shop-window me-1"></i> Mis Locales</a></li>
                  <li><a class="dropdown-item" href="agregar_local.php"><i class="bi bi-plus-circle me-1"></i> Crear Local</a></li>
                  <li><a class="dropdown-item" href="agregar_promocion.php"><i class="bi bi-tag me-1"></i> Crear Promoción</a></li>
                  <li><a class="dropdown-item" href="gestionar_solicitudes.php"><i class="bi bi-ticket-detailed me-1"></i> Gestionar Solicitudes</a></li>
          <?php endif; ?>
                <?php if ($_SESSION['rol'] == 'admin'): ?>
                  <li><a class="dropdown-item fw-bold" href="panel_admin.php">Panel de Administración</a></li>
                  <li><a class="dropdown-item" href="agregar_noticia.php"><i class="bi bi-newspaper me-1"></i> Publicar Noticia</a></li>
                <?php endif; ?>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="php/cerrar_sesion.php"><i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión</a></li>
              </ul>
            </div>
          <?php else: ?>
            <a href="login.php" class="btn btn-outline-dark me-2 rounded-pill px-3">Iniciar Sesión</a>
            <a href="registro.php" class="btn btn-dark rounded-pill px-3">Registrarte</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <main class="flex-grow-1" style="min-height: 80vh;">