<?php 
include('includes/header.php'); 
include('includes/conexion.php'); 

// Averiguamos la categoría del usuario actual (si no está logueado, lo tratamos como 'Visitante')
$categoria_usuario = 'Visitante';
if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'cliente') {
    $email = $_SESSION['usuario'];
    $res = mysqli_query($con, "SELECT categoria_cliente FROM usuarios WHERE email = '$email'");
    if($row = mysqli_fetch_assoc($res)) {
        $categoria_usuario = $row['categoria_cliente'];
    }
}
?>

<div class="container mt-5 mb-5 d-flex flex-column" style="flex: 1;">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5 border-bottom pb-3">
        <div>
            <h2 class="fw-bold text-dark mb-0"><i class="bi bi-newspaper text-warning me-2"></i>Noticias del Shopping</h2>
            <p class="text-muted mt-1 mb-0">Novedades y eventos según tu nivel: <strong class="text-dark"><?php echo $categoria_usuario; ?></strong></p>
        </div>
        
        <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
            <a href="agregar_noticia.php" class="btn btn-dark rounded-pill px-4 fw-bold mt-3 mt-md-0 shadow-sm">
                <i class="bi bi-plus-lg text-warning me-2"></i>Crear Noticia
            </a>
        <?php endif; ?>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <?php
            $fecha_hoy = date('Y-m-d');
            
            // Lógica de visualización en cascada
            $filtro_categoria = "categoria_destino = 'Inicial'"; // Todos ven las Iniciales
            if($categoria_usuario == 'Medium') {
                $filtro_categoria = "categoria_destino IN ('Inicial', 'Medium')";
            } else if($categoria_usuario == 'Premium' || (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin')) {
                // Premium y Admins ven absolutamente todo
                $filtro_categoria = "1=1"; 
            }

            // Solo mostramos noticias vigentes
            $sql = "SELECT * FROM novedades 
                    WHERE '$fecha_hoy' >= fecha_desde AND '$fecha_hoy' <= fecha_hasta 
                    AND ($filtro_categoria)
                    ORDER BY fecha_desde DESC";
            
            $resultado = mysqli_query($con, $sql);

            if(mysqli_num_rows($resultado) > 0) {
                while($noticia = mysqli_fetch_assoc($resultado)) {
                    $badge_color = 'bg-secondary';
                    if($noticia['categoria_destino'] == 'Medium') $badge_color = 'bg-info text-dark';
                    if($noticia['categoria_destino'] == 'Premium') $badge_color = 'bg-dark text-warning';
                    ?>
                    
                    <div class="card shadow-sm border-0 rounded-4 mb-4 border-start border-warning border-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted small"><i class="bi bi-calendar-event me-1"></i> Publicado el <?php echo date("d/m/Y", strtotime($noticia['fecha_desde'])); ?></span>
                                <span class="badge <?php echo $badge_color; ?> rounded-pill px-3 py-2 shadow-sm">
                                    Nivel <?php echo $noticia['categoria_destino']; ?>
                                </span>
                            </div>
                            <h3 class="fw-bold text-dark mb-3"><?php echo htmlspecialchars($noticia['titulo']); ?></h3>
                            <p class="text-secondary fs-5 lh-lg mb-0"><?php echo nl2br(htmlspecialchars($noticia['texto_novedad'])); ?></p>
                        </div>
                    </div>

                    <?php
                }
            } else {
                echo '
                <div class="text-center py-5">
                    <i class="bi bi-envelope-paper text-muted mb-3" style="font-size: 4rem;"></i>
                    <h4 class="text-muted fw-bold">No hay novedades para tu nivel</h4>
                    <p class="text-secondary">Subí de categoría utilizando promociones para desbloquear noticias exclusivas.</p>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>