<?php 
include('includes/header.php'); 
include('includes/conexion.php'); 
?>

<div class="container mt-5 mb-5 d-flex flex-column" style="flex: 1;">
    
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5 border-bottom pb-3">
        <div>
            <h2 class="fw-bold text-dark mb-0"><i class="bi bi-tags-fill text-warning me-2"></i>Promociones del Día</h2>
            <p class="text-muted mt-1 mb-0">Ofertas válidas para hoy según tu categoría</p>
        </div>
        
        <?php if(isset($_SESSION['rol']) && ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'dueno')): ?>
            <a href="agregar_promocion.php" class="btn btn-warning rounded-pill px-4 fw-bold mt-3 mt-md-0 shadow-sm text-dark">
                <i class="bi bi-plus-lg me-2"></i>Nueva Promoción
            </a>
        <?php endif; ?>
    </div>

    <div class="row g-4">
        <?php
        $filtro_local = "";
        if(isset($_GET['id_local'])) {
            $id_local = mysqli_real_escape_string($con, $_GET['id_local']);
            $filtro_local = " AND p.id_local = '$id_local'";
        }

        // LÓGICA DE FILTRADO
        $dia_hoy = date('N'); // 1 (Lunes) a 7 (Domingo)
        $fecha_hoy = date('Y-m-d');
        
        // Filtro estricto: Solo aprobadas, dentro de la fecha de vigencia, y habilitadas para el día de hoy
        $filtro_inteligente = " AND '$fecha_hoy' >= p.fecha_inicio 
                                AND '$fecha_hoy' <= p.fecha_fin 
                                AND FIND_IN_SET('$dia_hoy', p.dias_semana) > 0";

        // Filtro de categoría de cliente
        if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'cliente') {
            // Buscamos la categoría que tiene este cliente
            $email_cliente = $_SESSION['usuario'];
            $res_cat = mysqli_query($con, "SELECT categoria_cliente FROM usuarios WHERE email = '$email_cliente'");
            $datos_cli = mysqli_fetch_assoc($res_cat);
            $categoria_actual = $datos_cli['categoria_cliente'];

            if($categoria_actual == 'Inicial') {
                $filtro_inteligente .= " AND p.categoria_cliente = 'Inicial'";
            } else if($categoria_actual == 'Medium') {
                $filtro_inteligente .= " AND p.categoria_cliente IN ('Inicial', 'Medium')";
            }
            // Si es premium, no sumamos nada porque ve todo.
        }

        $sql = "SELECT p.*, l.nombre as nombre_local, l.imagen as imagen_local 
                FROM promociones p 
                INNER JOIN locales l ON p.id_local = l.id 
                WHERE p.estado = 'aprobada' $filtro_local $filtro_inteligente
                ORDER BY p.fecha_fin ASC";

        $resultado = mysqli_query($con, $sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden border-top border-warning border-3">
                        
                        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center pt-4 pb-0">
                            <span class="text-uppercase small fw-bold text-secondary">
                                <i class="bi bi-shop me-1"></i> <?php echo htmlspecialchars($fila['nombre_local']); ?>
                            </span>
                            <?php if(!empty($fila['imagen_local'])): ?>
                                <img src="assets/img/locales/<?php echo $fila['imagen_local']; ?>" 
                                    alt="Logo Local" class="rounded-circle shadow-sm" width="40" height="40" style="object-fit:cover;">
                            <?php endif; ?>
                        </div>
                        
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-3">
                                <?php 
                                    $cat_color = 'bg-secondary';
                                    if($fila['categoria_cliente'] == 'Medium') $cat_color = 'bg-info text-dark';
                                    if($fila['categoria_cliente'] == 'Premium') $cat_color = 'bg-dark text-warning';
                                ?>
                                <span class="badge <?php echo $cat_color; ?> rounded-pill px-3 shadow-sm">
                                    <i class="bi bi-star-fill me-1"></i> Nivel <?php echo $fila['categoria_cliente']; ?>
                                </span>
                            </div>

                            <h3 class="card-title fw-bold text-dark mb-3"><?php echo htmlspecialchars($fila['titulo']); ?></h3>
                            <p class="card-text text-muted flex-grow-1"><?php echo htmlspecialchars($fila['descripcion_breve']); ?></p>
                        </div>
                        
                        <div class="card-footer bg-white border-0 p-4 pt-0 text-center">
                            
                            <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'cliente'): ?>
                                <a href="php/usar_promo.php?id_promo=<?php echo $fila['id']; ?>" class="btn btn-warning rounded-pill w-100 fw-bold shadow-sm text-dark">
                                    <i class="bi bi-ticket-perforated-fill me-2"></i>Usar Promoción
                                </a>
                            
                            <?php elseif(!isset($_SESSION['rol'])): ?>
                                <a href="login.php" class="btn btn-outline-dark rounded-pill w-100 fw-bold">
                                    Iniciá sesión para usar
                                </a>
                            
                            <?php elseif($_SESSION['rol'] == 'dueno' || $_SESSION['rol'] == 'admin'): ?>
                                <span class="text-muted small"><i class="bi bi-info-circle me-1"></i>Vista previa de publicación</span>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '
            <div class="col-12 text-center py-5">
                <i class="bi bi-calendar-x text-muted mb-3" style="font-size: 3rem;"></i>
                <h4 class="text-muted fw-bold">No hay ofertas para tu nivel hoy</h4>
                <p class="text-secondary">Las promociones dependen del día de la semana y de tu categoría como cliente.</p>
                <a href="locales.php" class="btn btn-dark rounded-pill px-4 mt-2">Seguir explorando</a>
            </div>';
        }
        ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>