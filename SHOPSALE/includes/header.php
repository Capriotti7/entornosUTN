<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SHOPSALE</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilos Propios -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Iconos (FontAwesome o Bootstrap Icons) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body>

  <!-- HEADER / NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo_placeholder.png" alt="Logo" width="50">
      </a>

      <!-- Botón Hamburguesa (Responsivo) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Menú Central -->
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link btn btn-outline-secondary mx-1" href="locales.php">LOCALES</a></li>
          <li class="nav-item"><a class="nav-link btn btn-outline-secondary mx-1" href="promociones.php">PROMOCIONES</a></li>
          <li class="nav-item"><a class="nav-link btn btn-outline-secondary mx-1" href="noticias.php">NOTICIAS</a></li>
        </ul>

        <!-- Sección Derecha (Login/Notificaciones) -->
        <div class="d-flex align-items-center">
          <!-- Lógica PHP: Si NO está logueado -->
          <a href="login.php" class="btn btn-outline-primary me-2">INICIAR SESION</a>

          <!-- Iconos -->
          <a href="#" class="text-dark me-3 fs-4"><i class="bi bi-bell"></i></a>
          <a href="#" class="text-dark fs-4"><i class="bi bi-person-circle"></i></a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Contenedor principal donde irá el contenido de cada página -->
  <div class="container mt-4" style="min-height: 80vh;">