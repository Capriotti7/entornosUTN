<?php 
include('includes/header.php'); 
include('includes/conexion.php');

// solo Admin y Dueños pueden ver reportes
if(!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'dueno')) {
    header("Location: index.php");
    exit;
}

$rol = $_SESSION['rol'];
$filtro_dueno = "";
$titulo_reporte = "Reporte General del Shopping";
$subtitulo = "Rendimiento global de todos los locales";

// Si es dueño, buscamos su ID y filtramos la consulta
if($rol == 'dueno') {
    $email_dueno = $_SESSION['usuario'];
    $res_id = mysqli_query($con, "SELECT id FROM usuarios WHERE email = '$email_dueno'");
    $id_dueno = mysqli_fetch_assoc($res_id)['id'];
    
    $filtro_dueno = "AND l.id_usuario = '$id_dueno'";
    $titulo_reporte = "Reporte de Mis Locales";
    $subtitulo = "Rendimiento exclusivo de tus promociones";
}

// CONSULTA 1: Total de promociones utilizadas (solo contamos las 'aceptadas')
$sql_total = "SELECT COUNT(up.id) as total_usos 
            FROM uso_promociones up 
            JOIN promociones p ON up.id_promo = p.id 
            JOIN locales l ON p.id_local = l.id 
            WHERE up.estado = 'aceptado' $filtro_dueno";
$res_total = mysqli_query($con, $sql_total);
$total_usos = mysqli_fetch_assoc($res_total)['total_usos'];
?>

<div class="container mt-5 mb-5 d-flex flex-column" style="flex: 1;">
    <div class="d-flex align-items-center mb-5 border-bottom pb-3">
        <i class="bi bi-graph-up-arrow text-warning fs-1 me-3"></i>
        <div>
            <h2 class="fw-bold text-dark mb-0"><?php echo $titulo_reporte; ?></h2>
            <p class="text-muted mb-0"><?php echo $subtitulo; ?></p>
        </div>
    </div>

    <div class="row mb-5 justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 rounded-4 text-center border-bottom border-warning border-4 bg-dark text-white">
                <div class="card-body p-4">
                    <h5 class="text-muted text-uppercase mb-3"><i class="bi bi-ticket-perforated me-2 text-warning"></i>Descuentos Aplicados</h5>
                    <h1 class="display-3 fw-bold mb-0"><?php echo $total_usos; ?></h1>
                    <p class="small text-muted mt-2">Promociones aceptadas con éxito</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-<?php echo ($rol == 'admin') ? '6' : '12'; ?>">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-header bg-light text-dark rounded-top-4 py-3 border-0">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-trophy-fill me-2 text-warning"></i>Top Promociones Más Exitosas</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-bottom-4">
                        <?php
                        $sql_top_promos = "SELECT p.titulo, l.nombre as nombre_local, COUNT(up.id) as usos 
                                        FROM uso_promociones up 
                                        JOIN promociones p ON up.id_promo = p.id 
                                        JOIN locales l ON p.id_local = l.id 
                                        WHERE up.estado = 'aceptado' $filtro_dueno 
                                        GROUP BY p.id 
                                        ORDER BY usos DESC LIMIT 5";
                        $res_top_promos = mysqli_query($con, $sql_top_promos);

                        if(mysqli_num_rows($res_top_promos) > 0) {
                            $ranking = 1;
                            while($promo = mysqli_fetch_assoc($res_top_promos)) {
                                ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-4">
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-dark rounded-circle me-3 p-2 border border-warning border-2"><?php echo $ranking; ?></span>
                                        <div>
                                            <h6 class="mb-0 fw-bold"><?php echo htmlspecialchars($promo['titulo']); ?></h6>
                                            <small class="text-muted"><i class="bi bi-shop me-1"></i><?php echo htmlspecialchars($promo['nombre_local']); ?></small>
                                        </div>
                                    </div>
                                    <span class="badge bg-warning text-dark rounded-pill px-3 fs-6"><?php echo $promo['usos']; ?> usos</span>
                                </li>
                                <?php
                                $ranking++;
                            }
                        } else {
                            echo '<li class="list-group-item text-center p-4 text-muted">Aún no hay datos suficientes para generar el ranking.</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <?php if($rol == 'admin'): ?>
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-header bg-light text-dark rounded-top-4 py-3 border-0">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-building-up me-2 text-warning"></i>Locales con Mayor Tráfico</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-bottom-4">
                        <?php
                        $sql_top_locales = "SELECT l.nombre, COUNT(up.id) as usos 
                                        FROM uso_promociones up 
                                        JOIN promociones p ON up.id_promo = p.id 
                                        JOIN locales l ON p.id_local = l.id 
                                        WHERE up.estado = 'aceptado' 
                                        GROUP BY l.id 
                                        ORDER BY usos DESC LIMIT 5";
                        $res_top_locales = mysqli_query($con, $sql_top_locales);

                        if(mysqli_num_rows($res_top_locales) > 0) {
                            $ranking_locales = 1;
                            while($local = mysqli_fetch_assoc($res_top_locales)) {
                                ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-4">
                                    <div class="d-flex align-items-center">
                                        <span class="text-muted fw-bold fs-5 me-3">#<?php echo $ranking_locales; ?></span>
                                        <h6 class="mb-0 fw-bold"><?php echo htmlspecialchars($local['nombre']); ?></h6>
                                    </div>
                                    <div class="progress w-25" style="height: 10px;">
                                        <div class="progress-bar bg-warning" style="width: 100%"></div>
                                    </div>
                                    <span class="text-dark fw-bold ms-3"><?php echo $local['usos']; ?></span>
                                </li>
                                <?php
                                $ranking_locales++;
                            }
                        } else {
                            echo '<li class=" list-group-item text-center p-4 text-muted">Aún no hay datos para mostrar.</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<?php include('includes/footer.php'); ?>